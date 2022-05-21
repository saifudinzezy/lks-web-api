<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Society;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'id_card_number' => 'required|min:16|max:16',
            'password' => 'required|string'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $society = Society::where('id_card_number', $request->id_card_number)->first();
        if ($society) {
            if (\Hash::check($request->password, $society->password)) {
                    $society->token = md5($request->id_card_number);
                    $society->save();

                return response()->json(Society::where('id_card_number', $request->id_card_number)
                    ->with('regional')->first(),200);
            }else{
                return response()->json(['message' => 'ID Card Number or Password incorrect'],401);
            }

        } else {
            return response()
            ->json(['message' => 'ID Card Number or Password incorrect'],401);
        }

    }

    public function logout(Request $request)
    {
        $society = Society::where('token', $request->token)->firstOrFail();
        if ($society) {
            $society->token = null;
            $society->save();
            return response()->json(['message' => 'Logout success' ],200);
        } else {
            return response()->json(['message' => 'Invalid token"' ],401);
        }
    }
}

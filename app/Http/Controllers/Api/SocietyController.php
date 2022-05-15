<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Society;
use Illuminate\Http\Request;

class SocietyController extends Controller
{
    public function login(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'id_card_number' => 'required|exists:societies,id_card_number|min:16|max:16',
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

                //login sucessfully
                return response()->json(Society::where('id_card_number', $request->id_card_number)
                    ->with('regional')->get(),200);
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
        $validator = \Validator::make($request->all(),[
            'token' => 'required|string'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $society = Society::where('token', $request->token)->firstOrFail();
        if ($society) {
            $society->token = null;
            $society->save();

            //logout sucessfully
            return response()->json(['message' => 'Logout success' ],200);
        } else {
            return response()->json(['message' => 'Invalid token"' ],401);
        }
    }

    public function index()
    {
        return response()->json(Society::with('regional')->get(),200);
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'regional_id' => 'required|exists:regionals,id',
            'id_card_number' => 'required|unique:societies|min:16|max:16',
            'name' => 'required|string',
            'born_date' => 'required|date',
            'gender' => 'required|in:male,female',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:8'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        //model
        $society = Society::create([
            'regional_id' => $request->regional_id,
            'id_card_number' => $request->id_card_number,
            'name' => $request->name,
            'bord_date' => $request->bord_date,
            'gender' => $request->gender,
            'address' => $request->address,
            'password' => \Hash::make($request->password)
        ]);

         return response()
            ->json(['message' => 'Hi '.$society->name.', berhasil dibuat' ]);
    }

    public function show($id)
    {
        return response()->json(Society::find($id),200);
    }

    public function update(Request $request, $id)
    {
        $society = Society::findOrFail($id);
        $validator = \Validator::make($request->all(),[
            'regional_id' => 'required|exists:regionals,id',
            // 'id_card_number' => 'required|unique:societies|min:16|max:16',
            'name' => 'required|string',
            'born_date' => 'required|date',
            'gender' => 'required|in:male,female',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:8'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $society->name = $request->name;
        // $society->id_card_number = $request->id_card_number;
        $society->name = $request->name;
        $society->born_date = $request->born_date;
        $society->gender = $request->gender;
        $society->address = $request->address;

        $society->save();
        return response()
            ->json(['message' => 'Hi '.$society->name.', berhasil diubah' ]);
    }

    public function destroy($id)
    {
        $society = Society::findOrFail($id);
        $society->delete();

        return response()
        ->json(['message' => 'Hi '.$society->name.', berhasil dihapus' ]);
    }
}

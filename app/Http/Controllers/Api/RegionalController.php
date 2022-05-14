<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Regional;
use Illuminate\Http\Request;

class RegionalController extends Controller
{
    public function index()
    {
        return response()->json(Regional::all(),200);
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'province' => 'required|string',
            'district' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        //model
        $regional = Regional::create([
            'province' => $request->province,
            'district' => $request->district,
        ]);

         return response()
            ->json(['message' => 'Regional '.$regional->name.', berhasil dibuat' ]);
    }

    public function show($id)
    {
        return response()->json(Regional::find($id),200);
    }

    public function update(Request $request, $id)
    {

        $regional = Regional::findOrFail($id);
        $validator = \Validator::make($request->all(),[
            'province' => 'required|string',
            'district' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $regional->province = $request->province;
        $regional->regional = $request->regional;

        $regional->save();
        return response()
            ->json(['message' => 'Regional '.$regional->province.', berhasil diubah' ]);
    }

    public function destroy($id)
    {
        $regiol = Regional::findOrFail($id);
        $regiol->delete();

        return response()
        ->json(['message' => 'Regional '.$regiol->name.', berhasil dihapus' ]);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Doctor::all(),200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'name' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $doctor = Doctor::create([
            'name' => $request->name,
        ]);

         return response()
            ->json(['message' => 'Doctor '.$doctor->name.', berhasil dibuat' ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Doctor::find($id),200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);
        $validator = \Validator::make($request->all(),[
            'name' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $doctor->name = $request->name;

        $doctor->save();
        return response()
            ->json(['message' => 'doctor '.$doctor->name.', berhasil diubah' ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return response()
        ->json(['message' => 'doctor '.$doctor->name.', berhasil dihapus' ]);
    }
}

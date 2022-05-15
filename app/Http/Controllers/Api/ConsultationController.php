<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\Society;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'token' => 'required',
            'disease_history' => 'required|string',
            'current_symptoms' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $society = Society::where('token', $request->token)->first();
        if ($society) {
            Consultation::create([
                'doctor_id' => '1',
                'society_id' => $society->id,
                'disease_history' => $request->disease_history,
                'disease_history' => $request->disease_history,
            ]);

            return response()->json(['message' => 'Request consultation sent successful'],200);
        } else {
            return response()->json(['message' => 'Unauthorized user'],401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
        $society = Society::where('token', $token)->first();
        if ($society) {
            return response()->json(Consultation::where('society_id', $society->id)
                ->with('doctor')->first(),200);
        } else {
            return response()->json(['message' => 'Unauthorized user'],401);
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

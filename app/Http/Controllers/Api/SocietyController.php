<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Society;
use Illuminate\Http\Request;

class SocietyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Society::all(),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'regional_id' => 'required|exists:regionals,id',
            'id_card_number' => 'required|unique:societies|min:16|max:16',
            'name' => 'required|string',
            'gender' => 'required|in:male,female',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:8'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $society = Society::create([
            'regional_id' => $request->regional_id,
            'id_card_number' => $request->id_card_number,
            'name' => $request->name,
            'gender' => $request->gender,
            'address' => $request->address,
            'password' => \Hash::make($request->password)
        ]);

         return response()
            ->json(['message' => 'Hi '.$society->name.', berhasil dibuat' ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Society::find($id),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $society = Society::findOrFail($id);
        $validator = \Validator::make($request->all(),[
            'regional_id' => 'required|exists:regionals,id',
            // 'id_card_number' => 'required|unique:societies|min:16|max:16',
            'name' => 'required|string',
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
        $society->gender = $request->gender;
        $society->address = $request->address;

        $society->save();
        return response()
            ->json(['message' => 'Hi '.$society->name.', berhasil diubah' ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $society = Society::findOrFail($id);
        $society->delete();

        return response()
        ->json(['message' => 'Hi '.$society->name.', berhasil dihapus' ]);
    }
}

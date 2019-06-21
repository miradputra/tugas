<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\siswa;

class Siswacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $siswa = siswa::all();
            if (!$siswa){
            $response = [
                'succsess' => false,
                'data' =>'Empty',
                'message' => 'siswa tidak di temukan.'
            ];
            return response()->json($response,404);
        }
        $response = [
                'succsess' => true,
                'data' =>$siswa,
                'message' => 'Berhasil.'
            ];
            return response()->json($response,200);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = siswa::find($id);
        if (!$siswa){
            $response = [
                'succsess' => false,
                'data' =>'Empty',
                'message' => 'siswa tidak di temukan.'
            ];
            return response()->json($response,404);
        }
        $response = [
                'succsess' => true,
                'data' =>$siswa,
                'message' => 'Berhasil.'
            ];
            return response()->json($response,200);
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

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\siswa;
use Illuminate\Support\Facades\Validator;

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
        if (!$siswa) {
            $response = [
                'succsess' => false,
                'data' => 'Empty',
                'message' => 'siswa tidak di temukan.'
            ];
            return response()->json($response, 404);
        }
        $response = [
            'succsess' => true,
            'data' => $siswa,
            'message' => 'Berhasil.'
        ];
        return response()->json($response, 200);
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
        // 1. tampung semua inputan ke $input
        $input = $request->all();

        //2.buat validasi di tampung ke $validator
        $validator = Validator::make($input, [
            'nama' => 'required|min:10'
        ]);

        //3.cek validasi
        if ($validator->fails()) {
            $response = [
                'succes' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 500);
        }
        //4.buat fungsi untuk menghandle semua inputan->dimasukan ke table
        $siswa = siswa::create($input);

        //5.menampilkan response
        $response = [
            'succes' => true,
            'data' => $siswa,
            'message' => 'Siswa berhasil di tambahkan'
        ];
        //6.tampilkan hasil
        return response()->json($response, 200);
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
        if (!$siswa) {
            $response = [
                'succsess' => false,
                'data' => 'Empty',
                'message' => 'siswa tidak di temukan.'
            ];
            return response()->json($response, 404);
        }
        $response = [
            'succsess' => true,
            'data' => $siswa,
            'message' => 'Berhasil.'
        ];
        return response()->json($response, 200);
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
        $siswa = siswa::find($id);
        if (!$siswa) {
            $response = [
                'succsess' => false,
                'data' => 'Empty',
                'message' => 'siswa tidak di temukan.'
            ];
            return response()->json($response, 404);
        }
        $validator = Validator::make($input, [
            'nama' => 'required|min:10'
        ]);

        if ($validator->fails()) {
            $response = [
                'succes' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 500);
        }
        $siswa->nama = $input['nama'];
        $siswa->save();

        $response = [
            'succsess' => true,
            'data' => $siswa,
            'message' => 'Siswa berhasil di update.'
        ];
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa  = siswa::find($id);
        if (!$siswa) {
            $response = [
                'succsess' => false,
                'data' => 'gagal update',
                'message' => 'siswa tidak di temukan.'
            ];
            return response()->json($response, 404);
        }
        $siswa->delete();
        $response = [
            'succsess' => true,
            'data' => $siswa,
            'message' => 'Siswa berhasil dihapus.'
        ];
        return response()->json($response, 200);
    }
}

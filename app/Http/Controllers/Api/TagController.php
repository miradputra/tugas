<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\tag;
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tag = tag::all();
        if (count($tag) <=0) {
            $response = [
                'succsess' => false,
                'data' => 'Empty',
                'message' => 'tag tidak di temukan.'
            ];
            return response()->json($response, 404);
        }
        $response = [
            'succsess' => true,
            'data' => $tag,
            'message' => 'Berhasil berhasil diambil.'
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
            'nama_tag' => 'required|min:10'
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
        $tag = siswa::create($input);

        //5.menampilkan response
        $response = [
            'succes' => true,
            'data' => $tag,
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
         $tag = siswa::find($id);
        if (!$tag) {
            $response = [
                'succsess' => false,
                'data' => 'Empty',
                'message' => 'siswa tidak di temukan.'
            ];
            return response()->json($response, 404);
        }
        $response = [
            'succsess' => true,
            'data' => $tag,
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
         $tag = siswa::find($id);
        $input = $request->all();
        if (!$tag) {
            $response = [
                'succsess' => false,
                'data' => 'Empty',
                'message' => 'siswa tidak di temukan.'
            ];
            return response()->json($response, 404);
        }
        $validator = Validator::make($input, [
            'nama_tag' => 'required|min:10'
        ]);

        if ($validator->fails()) {
            $response = [
                'succes' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }
        $tag->nama_tag = $input['nama_tag'];
        $tag->slug = $input['slug'];
        $tag->save();

        $response = [
            'succsess' => true,
            'data' => $tag,
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
        return siswa::find($id);
        if (!$tag) {
            $response = [
                'succsess' => false,
                'data' => 'gagal update',
                'message' => 'siswa tidak di temukan.'
            ];
            return response()->json($response, 404);
        }
        $tag->delete();
        $response = [
            'succsess' => true,
            'data' => $tag,
            'message' => $tag->nama_tag.' berhasil dihapus.'
        ];
        return response()->json($response, 200);
    }
    }


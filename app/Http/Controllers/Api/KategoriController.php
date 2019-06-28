<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {
        $kategori = Kategori::all();
        if (count($kategori) <=0) {
            $response = [
                'succsess' => false,
                'data' => 'Empty',
                'message' => 'kategori tidak di temukan.'
            ];
            return response()->json($response, 404);
        }
        $response = [
            'succsess' => true,
            'data' => $kategori,
            'message' => 'Kategori berhasil diambil.'
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
            return response()->json($response, 404);
        }
        $kategpri = new Kategori;
        $kategori->nama_kategori= $request->nama_kategori;
        $kategori->slug = str_slug ($reques->nama_kategori,'-');
        $kategori->save();

        //4.buat fungsi untuk menghandle semua inputan->dimasukan ke table
        $kategori = Kategori::create($input);

        //5.menampilkan response
        $response = [
            'succes' => true,
            'data' => $kategori,
            'message' => 'Kategori berhasil di tambahkan'
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
         $kategori = Kategori::find($id);
        if (!$kategori) {
            $response = [
                'succsess' => false,
                'data' => 'Empty',
                'message' => 'Kategori tidak di temukan.'
            ];
            return response()->json($response, 404);
        }
        $response = [
            'succsess' => true,
            'data' => $kategori,
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
        $kategori = Kategori::find($id);
        $input = $request->all();
        if (!$kategori) {
            $response = [
                'succsess' => false,
                'data' => 'Empty',
                'message' => 'Kategori tidak di temukan.'
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
            return response()->json($response, 404);
        }
        $kategori->nama = $input['nama_kategori'];
        $kategori->slug = $input['slug'];
        $kategori->save();
            $response=[
            'succsess' => true,
            'data' => $kategori,
            'message' => 'Kategori berhasil di update.'
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
          return Kategori::find($id);
        if (!$kategori) {
            $response = [
                'succsess' => false,
                'data' => 'gagal update',
                'message' => 'kategori tidak di temukan.'
            ];
            return response()->json($response, 404);
        }
        $kategori->delete();
        $response = [
            'succsess' => true,
            'data' => $kategori,
            'message' => $kategori->nama_kategori.' berhasil dihapus.'
        ];
        return response()->json($response, 200);
    }
}

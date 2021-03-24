<?php

namespace App\Http\Controllers;

use App\Models\tanggapann_rahma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class TanggapannRahmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tanggapan(Request $request)
    {
        $input['id_pengaduan'] =$request->id_pengaduan;
        $input['tgl_tanggapan'] =$request->tgl_tanggapan;
        $input['tanggapan'] =$request->tanggapan;
        $input['id_petugas'] = $request->id_petugas;
        $petugas = tanggapann_rahma::create($input);
         return response()->json([
                        'status' => true,
                    ]);
     }

     public function getTanggapan($id)
     {
         $tanggapan = DB::table('tanggapann_rahmas')
         ->select('tanggapann_rahmas.*')
         ->where('tanggapann_rahmas.id_pengaduan','=', $id)
         ->get();
 
         return response()->json([
             'status' => true,
             'data' => $tanggapan
         ]);
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
     * @param  \App\tanggapann_rahma  $tanggapann_rahma
     * @return \Illuminate\Http\Response
     */
    public function show(tanggapann_rahma $tanggapann_rahma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tanggapann_rahma  $tanggapann_rahma
     * @return \Illuminate\Http\Response
     */
    public function edit(tanggapann_rahma $tanggapann_rahma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tanggapann_rahma  $tanggapann_rahma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tanggapann_rahma $tanggapann_rahma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tanggapann_rahma  $tanggapann_rahma
     * @return \Illuminate\Http\Response
     */
    public function destroy(tanggapann_rahma $tanggapann_rahma)
    {
        //
    }
}

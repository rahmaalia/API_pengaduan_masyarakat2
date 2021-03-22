<?php

namespace App\Http\Controllers;

use App\Models\tanggapann_rahma;
use Illuminate\Http\Request;

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

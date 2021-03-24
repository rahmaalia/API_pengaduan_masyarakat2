<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengaduann_rahma;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;

class PengaduannRahmaController extends Controller
{



    public function addFotoPengaduan(Request $request){

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
    
        $imageName = $request->image->getClientOriginalName();  
     
        $request->image->move(public_path('foto'), $imageName);
        
         return response()->json([
                        'status' => true,
                    ]);
     }

     public function foto(Request $request)
    {
          $input['tgl_pengaduan'] =$request->tgl_pengaduan;
        $input['nik'] =$request->nik;
        $input['isi_laporan'] =$request->isi_laporan;
        $input['foto'] = $request->foto;
        $input['status'] ="proses";
        $petugas = pengaduann_rahma::create($input);
         return response()->json([
                        'status' => true,
                    
                    ]);
     }


    public function getProses($nik)
    {
        $proses = DB::table('pengaduann_rahmas')
        ->select('pengaduann_rahmas.*')
        ->where('pengaduann_rahmas.nik','=', $nik)
        ->where(function($query){
            $query->where('pengaduann_rahmas.status','=', 'proses');
        })
        ->orderBy('id_pengaduan','DESC')
        ->get();

        return response()->json([
            'status' => true,
            'data' => $proses
        ]);
    }

    public function getSelesai($nik)
    {
        $selesai = DB::table('pengaduann_rahmas')
        ->select('pengaduann_rahmas.*')
        ->where('pengaduann_rahmas.nik','=', $nik)
        ->where(function($query){
            $query->where('pengaduann_rahmas.status','=', 'selesai');
        })
        ->orderBy('id_pengaduan','DESC')
        ->get();

        return response()->json([
            'status' => true,
            'data' => $selesai
        ]);
    }

    public function getSemua()
    {
        $semua = DB::table('pengaduann_rahmas')
        ->join('masyarakatt_rahmas', 'pengaduann_rahmas.nik', '=', 'masyarakatt_rahmas.nik')
        ->select('masyarakatt_rahmas.nama', 'pengaduann_rahmas.*')
        ->orderBy('id_pengaduan','DESC')
        ->get();

        return response()->json([
            'status' => true,
            'data' => $semua
        ]);
    }

    public function delete ($id) {
        $delete = DB::table('pengaduann_rahmas')
        ->select('pengaduann_rahmas.*')
        ->where('pengaduann_rahmas.id_pengaduan','=', $id)
        ->delete();
        return response()->json([
            'status' => true,
        ]);
      }

      

    public function UpdateStatus($id,Request $request){
        pengaduann_rahma::where('id_pengaduan', $id)->update([
            
            'status' => $request->status,
        ]);

        return response()->json([
            'status' => true,
            
        ]);
    }
        
    
    public function getProsesPetugas()
    {
        $semua = DB::table('pengaduann_rahmas')
        ->join('masyarakatt_rahmas', 'pengaduann_rahmas.nik', '=', 'masyarakatt_rahmas.nik')
        ->select('masyarakatt_rahmas.nama', 'pengaduann_rahmas.*')
        ->orderBy('id_pengaduan','DESC')
        ->where(function($query){
            $query->where('pengaduann_rahmas.status','=', 'proses');
        })
        ->get();

        return response()->json([
            'status' => true,
            'data' => $semua
        ]);
    }

    public function getSelesaiPetugas()
    {
        $semua = DB::table('pengaduann_rahmas')
        ->join('masyarakatt_rahmas', 'pengaduann_rahmas.nik', '=', 'masyarakatt_rahmas.nik')
        ->select('masyarakatt_rahmas.nama', 'pengaduann_rahmas.*')
        ->orderBy('id_pengaduan','DESC')
        ->where(function($query){
            $query->where('pengaduann_rahmas.status','=', 'selesai');
        })
        ->get();

        return response()->json([
            'status' => true,
            'data' => $semua
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pengaduann_rahma  $pengaduann_rahma
     * @return \Illuminate\Http\Response
     */
    public function show(pengaduann_rahma $pengaduann_rahma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pengaduann_rahma  $pengaduann_rahma
     * @return \Illuminate\Http\Response
     */
    public function edit(pengaduann_rahma $pengaduann_rahma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pengaduann_rahma  $pengaduann_rahma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pengaduann_rahma $pengaduann_rahma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pengaduann_rahma  $pengaduann_rahma
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengaduann_rahma $pengaduann_rahma)
    {
        //
    }
}

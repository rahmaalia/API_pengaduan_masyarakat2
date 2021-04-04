<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengaduann_rahma;
use App\Models\tanggapann_rahma;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PengaduanWebController extends Controller
{
    public function index(){

        $pengaduan = DB::table('pengaduann_rahmas')
        ->join('masyarakatt_rahmas', 'pengaduann_rahmas.nik', '=', 'masyarakatt_rahmas.nik')
        ->select('masyarakatt_rahmas.nama', 'pengaduann_rahmas.*')
        ->orderBy('id_pengaduan','DESC')
        // ->where(function($query){
        //     $query->where('pengaduann_rahmas.status','=', 'proses');
        // })
        ->get();

        return view('index',['pengaduan' => $pengaduan]);
    }

    public function inputTanggapan(Request $request, $id)
    {
        $input['id_pengaduan'] =$request->path();
        $input['tgl_tanggapan'] =$request->tgl_tanggapan;
        $input['tanggapan'] =$request->tanggapan;
        $input['id_petugas'] = "2";
        $pengaduan = tanggapann_rahma::create($input);

        return view('tanggapan');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengaduann_rahma;
use App\Models\tanggapann_rahma;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class PengaduanWebController extends Controller
{
    public function index(Request $request){

        if($request->has('cari')){
            $pengaduan = DB::table('pengaduann_rahmas')
            ->where('status','LIKE','%'.$request->cari.'%')
            ->get();
        }
            $pengaduan = DB::table('pengaduann_rahmas')
            ->join('masyarakatt_rahmas', 'pengaduann_rahmas.nik', '=', 'masyarakatt_rahmas.nik')
            ->select('masyarakatt_rahmas.nama', 'pengaduann_rahmas.*')
            ->orderBy('id_pengaduan','DESC')
            // ->where(function($query){
            //     $query->where('pengaduann_rahmas.status','=', 'proses');
            // })
            ->Paginate(10);
        
            
        

        return view('index',['pengaduan' => $pengaduan]);
    }

    public function inputTanggapan($id)
    {
        // $input['id_pengaduan'] =$request->path();
        // $input['tgl_tanggapan'] =$request->tgl_tanggapan;
        // $input['tanggapan'] =$request->tanggapan;
        // $input['id_petugas'] = "2";
        // $pengaduan = tanggapann_rahma::create($input);
        $pengaduan = Pengaduann_rahma::join('masyarakatt_rahmas', 'pengaduann_rahmas.nik', '=', 'masyarakatt_rahmas.nik')
        ->select('masyarakatt_rahmas.*', 'pengaduann_rahmas.*')
        ->find($id);

        $tanggapan = Tanggapann_rahma::where('id_pengaduan', $id)->get();
        return view('tanggapan', ['p' => $pengaduan, 't' => $tanggapan]);
        
    }

    public function search(Request $request){
        $query = $request->search;
        $pengaduan = Pengaduann_rahma::where('status','like','%'.$query.'%')
        ->paginate(10);
        return view('index', compact('pengaduan'));

    }
}

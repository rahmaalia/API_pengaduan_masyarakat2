<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengaduann_rahma;
use App\Models\petugass_rahma;
use Illuminate\Support\Facades\DB;
use PDF;
use Auth;

class laporanController extends Controller
{
    public function laporan() {

        $pengaduan = DB::table('pengaduann_rahmas')
        ->join('masyarakatt_rahmas', 'pengaduann_rahmas.nik', '=', 'masyarakatt_rahmas.nik')
        ->select('masyarakatt_rahmas.nama', 'pengaduann_rahmas.*')
        ->orderBy('id_pengaduan','DESC')
        ->Paginate(10);

        

        return view('laporan',[
            'pengaduan' => $pengaduan
        ]);
    }

    public function cetak() {
        $petugas = petugass_rahma::where('nama_petugas', Auth::user()->nama_petugas);

        $pengaduan = DB::table('pengaduann_rahmas')
        ->join('masyarakatt_rahmas', 'pengaduann_rahmas.nik', '=', 'masyarakatt_rahmas.nik')
        ->select('masyarakatt_rahmas.nama', 'pengaduann_rahmas.*')
        ->orderBy('id_pengaduan','DESC')
        ->get();

        // $petugas = DB::table('petugass_rahmas')
        // ->select('petugass_rahmas.*')
        // ->get();

        $pdf = PDF::loadview('cetak-pdf',[
            'pengaduan' => $pengaduan, 'petugas' =>$petugas
        ]);
        return $pdf->stream();

    }

    public function cetakProses() {

        $pengaduan = DB::table('pengaduann_rahmas')
        ->join('masyarakatt_rahmas', 'pengaduann_rahmas.nik', '=', 'masyarakatt_rahmas.nik')
        ->select('masyarakatt_rahmas.nama', 'pengaduann_rahmas.*')
        ->where('pengaduann_rahmas.status','=','proses')
        ->orderBy('id_pengaduan','DESC')
        ->get();

        

        $pdf = PDF::loadview('cetakproses-pdf',[
            'pengaduan' => $pengaduan
        ]);
        return $pdf->stream();

    }

    public function cetakSelesai() {

        $pengaduan = DB::table('pengaduann_rahmas')
        ->join('masyarakatt_rahmas', 'pengaduann_rahmas.nik', '=', 'masyarakatt_rahmas.nik')
        ->select('masyarakatt_rahmas.nama', 'pengaduann_rahmas.*')
        ->where('pengaduann_rahmas.status','=','selesai')
        ->orderBy('id_pengaduan','DESC')
        ->get();

        

        $pdf = PDF::loadview('cetakselesai-pdf',[
            'pengaduan' => $pengaduan
        ]);
        return $pdf->stream();

    }

    public function cetakVer() {

        $pengaduan = DB::table('pengaduann_rahmas')
        ->join('masyarakatt_rahmas', 'pengaduann_rahmas.nik', '=', 'masyarakatt_rahmas.nik')
        ->select('masyarakatt_rahmas.nama', 'pengaduann_rahmas.*')
        ->where('pengaduann_rahmas.status','=','verifikasi')
        ->orderBy('id_pengaduan','DESC')
        ->get();

        

        $pdf = PDF::loadview('cetakver-pdf',[
            'pengaduan' => $pengaduan
        ]);
        return $pdf->stream();

    }
}

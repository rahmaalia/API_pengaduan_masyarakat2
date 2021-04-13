<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengaduann_rahma;
use App\Models\petugass_rahma;
use App\Models\masyarakatt_rahma;
use App\Models\tanggapann_rahma;



class DashboardController extends Controller
{
    public function index(){
        return view ('dashboard',[
            'pengaduan' => pengaduann_rahma::count(),
            'petugas' => petugass_rahma::count(),
            'masyarakat' => masyarakatt_rahma::count(),
            'tanggapan' => tanggapann_rahma::count(),
        ]);
    }
}

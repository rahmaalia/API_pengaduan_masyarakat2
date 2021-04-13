<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tanggapann_rahma;
use App\Models\pengaduann_rahma;
use App\Models\petugass_rahma;
use Auth;

class TanggapanWebController extends Controller
{
    public function getTanggapan($id)
     {
         $tanggapan = DB::table('tanggapann_rahmas')
         ->select('tanggapann_rahmas.*')
         ->where('tanggapann_rahmas.id_pengaduan','=', $id)
         ->get();
 
         return view('tanggapan', ['t' => $tanggapan]);
     }

    public function kirim(Request $request, $id){
        date_default_timezone_set("Asia/Jakarta");
        $tgl = date("Y-m-d h:i:s");
        
        $id_petugas = Petugass_rahma::where('user_id', Auth::user()->id_user)->first();

        tanggapann_rahma::create([
            'id_pengaduan' => $id,
            'id_petugas' => $id_petugas->id_petugas,
            'tgl_tanggapan' => $tgl,
            'tanggapan' => $request->tanggapan
        ]);

      pengaduann_rahma::where('id_pengaduan', $id)->update([
            
            'status' => $request->status,
        ]);

        return redirect("/pengaduan/$id/inputTanggapan");
    }

    public function isiTanggapan($id){
        $pengaduan = pengaduann_rahma::find($id);
        return view ('isitanggapan', ['p' => $pengaduan]);
    }
}

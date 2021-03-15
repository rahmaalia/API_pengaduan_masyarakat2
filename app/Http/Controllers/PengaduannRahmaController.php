<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengaduann_rahma;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PengaduannRahmaController extends Controller
{

    public function input(Request $request){

        $input['tgl_pengaduan'] =$request->tgl_pengaduan;
        $input['nik'] =$request->nik;
        $input['isi_laporan'] =$request->isi_laporan;
        $input['foto'] = $request->foto;
        $input['status'] ="0";
        $pengaduann = pengaduann_rahma::create($input);
    
       return response()->json([
                        'status' => true,
                    ]);
         }

    public function addFotoPengaduan(Request $request){

        $request->validate([
            'foto' => 'required|foto|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
    
        $imageName = $request->foto->getClientOriginalName();  
     
        $request->foto->move(public_path('imafotoges'), $imageName);
        
         return response()->json([
                        'status' => true,
                    
                    ]);
     }


         public function getPengaduan(Request $request){

            // $pengaduan = DB::table('pengaduann_rahmas')
            $name = new Pengaduann_rahma;
            $name = $request->input('nik');
            $pengaduan = DB::table('pengaduann_rahmas')
                ->select('pengaduann_rahmas.*')
                ->get();
                return response()->json([
                    'status' => true,
                    'data' => $pengaduan
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengaduann_rahma;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;

class PengaduannRahmaController extends Controller
{

    public function inputFoto(Request $request){
        // dd($request->all());
        $attachment = new pengaduann_rahma;
                    $target_dir = "admin/assets/media/task_schedule_attachments/";
                    // $attachment->task_schedule_id = $schedule->id;
                    // $attachment->uploaded_by = $id_pengguna;
    
                    #upload foto to database
                    $file = $request->file('foto');
        
                    #JIKA FOLDERNYA BELUM ADA
                    if (!File::isDirectory($target_dir)) {
                        #MAKA FOLDER TERSEBUT AKAN DIBUAT
                        File::makeDirectory($target_dir);
                    }
        
                    #MEMBUAT NAME FILE DARI GABUNGAN TIMESTAMP DAN UNIQID()
                    $fileName = 'Pengaduan' . '_' .uniqid(). '.' . $file->getClientOriginalExtension();
        
                    #UPLOAD ORIGINAN FILE (BELUM DIUBAH DIMENSINYA)
                    Image::make($file)->save($target_dir . '/' . $fileName);
                    foreach ($this->dimensions as $row) {
        
                        #MEMBUAT CANVAS IMAGE SEBESAR DIMENSI YANG ADA DI DALAM ARRAY 
                        $canvas = Image::canvas($row, $row);
        
                        #RESIZE IMAGE SESUAI DIMENSI YANG ADA DIDALAM ARRAY 
                        #DENGAN MEMPERTAHANKAN RATIO
                        $resizeImage  = Image::make($file)->resize($row, $row, function($constraint) {
                            $constraint->aspectRatio();
                        });
        
                        #CEK JIKA FOLDERNYA BELUM ADA
                        if (!File::isDirectory($target_dir . '/' . $row)) {
                            #MAKA BUAT FOLDER DENGAN NAMA DIMENSI
                            File::makeDirectory($target_dir . '/' . $row);
                        }
        
                        #MEMASUKAN IMAGE YANG TELAH DIRESIZE KE DALAM CANVAS
                        $canvas->insert($resizeImage, 'center');
                        #SIMPAN IMAGE KE DALAM MASING-MASING FOLDER (DIMENSI)
                        $canvas->save($target_dir . '/' . $row . '/' . $fileName);
                    }
        
                    #SIMPAN DATA IMAGE YANG TELAH DI-UPLOAD
                    $attachment->attachment     = $fileName;
                    $attachment->type = "IMAGE";
                    $attachment->save();
    }

    public function addFotoPengaduan(Request $request){

        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);
    
        $imageName = $request->foto->getClientOriginalName();  
     
        $request->foto->move(public_path('images'), $imageName);
        
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
        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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

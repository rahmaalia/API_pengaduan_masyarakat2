<?php

namespace App\Http\Controllers;

use App\Models\masyarakatt_rahma;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Session;

class MasyarakattRahmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masyarakat = DB::table('masyarakatt_rahmas')
        ->select('masyarakatt_rahmas.*')
        ->Paginate(10);

        return view('masyarakat',['masyarakat' => $masyarakat]);
    }

    public function update(Request $request, $nik)
    {
        masyarakatt_rahma::where('nik', $nik)->update([
            
            'nik' => $request->nik,
            'nama' => $request->nama,
            'username' => $request->username,
            'telp' => $request->telp

        ]);

        return response()->json([
            'status' => true,
            
        ]);
    }

    public function updateUser(Request $request, $id)
    {
        User::where('id_user', $id)->update([
            
            'username' => $request->username,

        ]);

        return response()->json([
            'status' => true,
            
        ]);
    }

    public function getMasyarakat($nik){
        $masyarakat = DB::table('masyarakatt_rahmas')
        ->where('masyarakatt_rahmas.nik','=', $nik)
        ->select('masyarakatt_rahmas.*')
        ->get();

        return response()->json([
            'status' => true,
            'data' => $masyarakat
        ]);
    }


    public function delete ($id) {
        // $delete = DB::table('masyarakatt_rahmas')
        // ->select('masyarakatt_rahmas.*')
        // ->where('masyarakatt_rahmas.nik','=', $id)
        // ->delete();

        $data =DB::table('users')
                    ->leftJoin('masyarakatt_rahmas','user_id', '=','users.id_user')
                    ->where('id_user', $id); 
        DB::table('masyarakatt_rahmas')->where('user_id', $id)->delete();                           
        $data->delete();

        return redirect("/masyarakat")->with('hapus','Data berhasil ditambah');
      }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $masyarakat = masyarakatt_rahma::where('user_id', $id)->get();
        return view('tambahmasyarakat');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cek = masyarakatt_rahma::where('username', $request->username)->get()->count();

        if($request->password != $request->k_password){
            Session::flash('gagal','konfirmasi kata sandi tidak cocok!');
            return view('tambahmasyarakat');
        }
        else {
            if($cek > 0 ){
                Session::flash('ada','username sudah terdaftar');
                return view('tambahmasyarakat');
            }
            else {
                $user = User::create([
                    'username' => $request->username,
                    'password' => bcrypt($request->password),
                    'role_id' => '2'
                ]);
                    
                    
                masyarakatt_rahma::create([
                    'nik' => $request->nik,
                    'nama' => $request->nama,
                    'username' => $request->username,
                    'password' => bcrypt($request->password),
                    'telp' => $request->telp,
                    'user_id' => $user->id_user
                ]);
        
                return redirect("/masyarakat")->with('tambah','Data berhasil ditambah');
            }

            
        }
    }

    public function editmasyarakat(Request $request,$id)
    {
        User::where('id_user', $id)->update([
            
            'username' => $request->username,

        ]);

        masyarakatt_rahma::where('user_id', $id)->update([
            
            'nik' => $request->nik,
            'nama' => $request->nama,
            'username' => $request->username,
            'telp' => $request->telp

        ]);
        return redirect("/masyarakat")->with('sukses','Data berhasil di edit');
    }

    public function edit($id)
    {
        $masyarakat = masyarakatt_rahma::where('user_id', $id)->get();
        return view('editmasyarakat',['masyarakat' => $masyarakat]);
    }

    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\masyarakatt_rahma  $masyarakatt_rahma
     * @return \Illuminate\Http\Response
     */
    public function destroy(masyarakatt_rahma $masyarakatt_rahma)
    {
        //
    }
}

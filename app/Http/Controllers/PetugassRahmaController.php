<?php

namespace App\Http\Controllers;

use App\Models\petugass_rahma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Session;


class PetugassRahmaController extends Controller
{

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugas = DB::table('petugass_rahmas')
        ->select('petugass_rahmas.*')
        ->where('petugass_rahmas.level','=','petugas')
        ->Paginate(10);

        return view('petugas',['petugas' => $petugas]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $petugas = petugass_rahma::where('user_id', $id)->get();
        return view('tambahpetugas');
    }

    public function edit($id)
    {
        $tugas = petugass_rahma::where('user_id', $id)->get();
        return view('editpetugas',['petugas' => $tugas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cek = petugass_rahma::where('username', $request->username)->get()->count();

        if($request->password != $request->k_password){
            Session::flash('gagal','konfirmasi kata sandi tidak cocok!');
            return view('/tambahpetugas');
        }
        else {
            if($cek > 0 ){
                Session::flash('ada','username sudah terdaftar');
                return view('/tambahpetugas');
            }
            else {
                $user = User::create([
                    'username' => $request->username,
                    'password' => bcrypt($request->password),
                    'role_id' => '1'
                ]);
                    
                    
                petugass_rahma::create([
                    'nama_petugas' => $request->nama_petugas,
                    'username' => $request->username,
                    'password' => bcrypt($request->password),
                    'telp' => $request->telp,
                    'level' => 'petugas',
                    'user_id' => $user->id_user
                ]);
        
                return redirect("/petugas");
            }

            
        }

       

    }

    public function delete ($id) {
        // $delete = DB::table('petugass_rahmas')
        // ->select('petugass_rahmas.*')
        // ->where('petugass_rahmas.id_petugas','=', $id)
        // ->delete();

        $data =DB::table('users')
                    ->leftJoin('petugass_rahmas','user_id', '=','users.id_user')
                    ->where('id_user', $id); 
        DB::table('petugass_rahmas')->where('user_id', $id)->delete();                           
        $data->delete();

        return redirect("/petugas");
      }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\petugass_rahma  $petugass_rahma
     * @return \Illuminate\Http\Response
     */
    public function editpetugas(Request $request,$id)
    {
        User::where('id_user', $id)->update([
            
            'username' => $request->username,

        ]);

        petugass_rahma::where('user_id', $id)->update([
            
            
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'telp' => $request->telp
            // 'user_id' => $user->user_id

        ]);
        return redirect("/petugas");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\petugass_rahma  $petugass_rahma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, petugass_rahma $petugass_rahma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\petugass_rahma  $petugass_rahma
     * @return \Illuminate\Http\Response
     */
    public function destroy(petugass_rahma $petugass_rahma)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\password;
use Illuminate\Support\Facades\Auth; 
use App\Models\User;
use App\Models\masyarakatt_rahma;
use Validator;
use Illuminate\Support\Facades\DB;

class RegistrasiController extends Controller
{
    public function register(Request $request){
        $input['username'] = $request->username;
        $input['passsword'] = $request->password;

        // $data=array(
        //     'username'=> 'required|unique:users,username',
        //     'password'=> 'required',
        // );
        // $validator = Validator::make($input,$data);

        $cek = User::where('username', $request->username)->get()->count();

        if($cek > 0){
            return response()->json([
                'status'=>false,
                'message'=>'Data anda telah terdaftar'
            ]);
        }
        else {
            $user = new User;
            $user->username = $request->username;
            $user->password = bcrypt($request->password);
            $user->role_id = 2;
            $user->save();
            $id_user = $user->id;
            $input2['user_id'] = $id_user;
            $input2['nik'] = $request->nik;
            $input2['nama'] = $request->nama;
            $input2['telp'] = $request->telp;
            $input2['username'] = $request->username;
            $input2['password'] = bcrypt($request->password);
            $masyarakat = masyarakatt_rahma::create($input2);
            return response()->json([
                'status'=>true,
                'message'=>'Register berhasil'
            ]);


        }
    }
}

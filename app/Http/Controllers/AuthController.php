<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\password;
use Illuminate\Support\Facades\Auth; 
use Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request){
        $username = $request->username;
        $password = $request->password;

        $data=User::where('username',$username)->first();

        if ($data) {
            $role_id=$data->role_id;
            if (Hash::check($password,$data->password)) {

               if ($role_id == 1) {
                    $getdata=DB::table('petugass_rahmas')->join('users','petugass_rahmas.user_id','users.id_user')
                    ->select('petugass_rahmas.*','users.role_id')
                    ->where('users.id_user','=',$data->id_user)
                    ->first();
                }

                else if ($role_id == 2) {
                    $getdata=DB::table('masyarakatt_rahmas')->join('users','masyarakatt_rahmas.user_id','users.id_user')
                    ->select('masyarakatt_rahmas.*','users.role_id')
                    ->where('users.id_user','=',$data->id_user)
                    ->first();
                }

                return response()->json([
                    'status'=>true,
                    'message'=>'Login Berhasil',
                    'data'=>$getdata
                ]);
            }else{
                return response()->json([
                    'status'=>false,
                    'message'=>'Login gagal'
                ]);
            }
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'Akun belum terdaftar'
            ]);
        }
    }
}
    
<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request){


        // dd($request->all());die();

        $user = User::where('email',$request->email)->first();

        //Cek Email User
            if($user){

                if(password_verify($request->password, $user->password)){
                    return response()->json([
                        'success' => 1,
                        'message' => 'Selamat Datang '.$user->name,
                        'user'    => $user
                    ]);
                }
                
                // return response()->json([
                //     'success' => 0,
                //     'message' => 'Password Anda Salah'
                // ]);
                return $this->error('Password Anda Salah');
            } 

            // memanggil function error
            return $this->error('Email Tidak Terdaftar');
    }

    //Validasi isi user tidak boleh kosong
    public function register(Request $request){
        $validasi = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|min:6'
        ]);

        if($validasi->fails()){
            $val = $validasi->errors()->all();

            return $this->error($val[0]);
        }

        //Input from API Register to Database
        $user = User::create(array_merge($request->all(), [
            //enskripsi password
                'password' => bcrypt($request->password)
        ]));

        //validasi
            if($user){
                 //Mengembalikan nilai jika register berhasil
                return response()->json([
                    'success' => 1,
                    'message' => 'Selamat Datang Register Berhasil',
                    'user'    => $user
                ]);  
            }

            //jika gagal validasi
            return $this->error('Registrasi Gagal');
       
        
    }
    //fungsi memunculkan message jika error
    public function error($pesan){
        return response()->json([
        'success' => 0,
        'message' => $pesan
        ]);
    }
}

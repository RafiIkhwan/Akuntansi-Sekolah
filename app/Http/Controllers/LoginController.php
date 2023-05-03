<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        $date = date("d M Y - H:m");

        if(Auth::check()){
            return redirect('home')->with('success', 'Selamat Datang Kembali !');
        }
        else{
            return view('login', [
                'date'  => $date,
        ]);
        }
    }

    public function loginaksi(Request $request)
    {
        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password')
        ];

        if(Auth::attempt($data)){
            return redirect('home')->with('success', 'Selamat datang ' . Auth::user()->nama_admin . ' !' );
        }
        else{
            Session::flash('error', 'Email atau Password Salah !');
            return redirect('/');
        }
    }


    public function loginStore(Request $request)
    {
        $this->validate($request,[
            'nama_admin'    => ['required'],
            'email'         => ['required'],
            'password'      => ['required'],
            'role'          => ['required'],
        ]);

        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password')
        ];

        $data_admin = User::where('email', $request->email)->first();
       
        if($data_admin){
            Session::flash('error', 'Email sudah terdaftar, silahkan buat baru !');
            return redirect('/');
        } else {
            User::create([
                'nama_admin'    => $request->nama_admin,
                'email'         => $request->email,
                'password'      => Hash::make($request->password),
                'role'          => $request->role,
            ]);

            Auth::attempt($data);

            return redirect('home')->with('success', 'Halo, selamat datang ' . Auth::user()->nama_admin . ' !' );
        }

        
        
    }


    public function logoutaksi()
    {
        Auth::logout();
        return redirect('/')->with('logout', 'Logout Berhasil !!!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    function index(){

        return view('login/index');
    }

    function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'email wajib diisi',
            'password.required'=>'password wajib diisi',
        ]);

        $infologin = [
            'email'=> $request->email,
            'password'=> $request->password
        ];

        if(Auth::attempt($infologin)){
            //kalau otentikasi sukses
            // return 'sukses';
            return redirect('product')->with('sukses dan berhasil login');

        }else
            //kalau otentikasi gagal
            //return 'gagal';
            return redirect('login')->withErrors('username dan password anda masukkan salah');

    }
}

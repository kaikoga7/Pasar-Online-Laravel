<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class authController extends Controller
{
    public function login (){
        return view('auth.login');
    }

    public function authLogin(Request $req){
        if(Auth::attempt($req->only('email', 'password'))){
            return Redirect('/');
        }else{
            return Redirect()->back()->with('error', 'LOGIN GAGAL, EMAIL ATAU PASSWORD SALAH');
        }
    }

    public function logout(){
        Auth::logout();
        return Redirect('/login');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('login.login');
    }
    public function register(){
        return view('login.register');
    }

    public function postregister(Request $request){
        // dd($request->all());
        $data = User::create([
            'username' => $request->username,
            'notelp' => $request->notelp,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'confirmpassword' => bcrypt($request->confirmpassword),
            'remember_token' => Str::random(60),
        ]);
        return redirect('/login');
    }

     public function postlogin (Request $request){
        // dd($request->all());
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/beranda');
        }
        return redirect('/login');
    }
}

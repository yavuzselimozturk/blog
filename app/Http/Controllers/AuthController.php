<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AuthController extends Controller
{
    public function login(){
      return view('panel.auth.login');
    }
    public function loginPost(Request $request){
      $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            toastr()->success('Tekrar Hoşgeldiniz...'.Auth::user()->name);
            return redirect()->route('admin-dashboard');

        }

        return redirect()->route('admin-login')->withErrors('Email adresi veya şifre hatalı');
    }

    public function logout(){
      Auth::logout();
      return redirect()->route('admin-login');
    }
}

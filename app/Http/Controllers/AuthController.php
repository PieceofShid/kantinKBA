<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        if(!auth()->check()){
            return view('auth.index');
        }

        return redirect()->route('transaksi.create');
    }

    public function login(Request $request)
    {
        $data = $request->only(['username', 'password']);
        if(Auth::attempt($data)){
            return redirect()->route('transaksi.create');
        }

        return redirect()->back()->with('error', 'Username atau password yang anda masukkan salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }
    public function indexRegister()
    {
        return view('auth.register');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Mengarahkan pengguna berdasarkan role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard'); // Ganti dengan route yang sesuai
            } else {
                return redirect()->route('landingpage'); // Ganti dengan route yang sesuai
            }
        }
        return back()->with('loginError', 'Email atau Password yang anda masukkan salah!');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

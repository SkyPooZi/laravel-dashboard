<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register() 
    {
        if(Auth::check()) return redirect()->route('dashboard.student.all');

        return view ('register.index', [
            "title" => "Register",
        ]);
    }

    public function registerStore(Request $request)
    {
        $validateData = $request->validate([
            'name'           => 'required|max:255',
            'email'          => 'required|email|unique:users',
            'password'       => 'required|min:5|max:255',
        ]);

        $validateData['password'] = Hash::make($validateData['password']); 

        User::create($validateData);
        $request->session()->flash('success', 'Register berhasil, Silahkan login !');

        return redirect('/login/index');
    }

    public function login() 
    {
        if(Auth::check()) return redirect()->route('dashboard.student.all');

        return view ('login.index', [
            "title" => "Login",
        ]);
    }

    public function loginStore(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('/student/all')->with('success', 'Login berhasil !');
        } else {
            $request->session()->flash('failed', 'Login Gagal !');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/student/all')->with('success', 'Logout berhasil !');
    }
}

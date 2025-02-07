<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function data()
    {
        return view('auth.login');
    }

    public function loginProses(Request $request)
    {
        $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);

        $data = [
            'email'     => $request->email,
            'password'  => $request->password,
        ];

        if (Auth::attempt($data)) {
            return redirect('home')->with('success', 'Login berhasil!');
        } else {
            return redirect('login')->with('error', 'Email atau password salah.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login')->with('success', 'Anda Berhasil Logout!');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerProses(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:5'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        User::create($data);

        $login = [
            'email'     => $request->email,
            'password'  => $request->password,
        ];

        if (Auth::attempt($login)) {
            return redirect('home')->with('success', 'Login berhasil!');
        } else {
            return redirect('login')->with('error', 'Email atau password salah.');
        }
    }
}

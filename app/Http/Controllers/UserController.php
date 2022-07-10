<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function register()
    {
        return view('user.register');
    }

    public function loginauth(Request $request)
    {
        $kredensial = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->with('loginError', 'Login Gagal !');
    }

    public function registerauth(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required | email | unique:users',
            'password' => 'required | min:5 | max:255',
        ]);

        $data['password'] = bcrypt($data['password']);
        $tambah = DB::table('users')->insert($data);

        if ($tambah) {
            $request->session()->flash('success', 'Registration succesfull, please login');
            return redirect('/login');
        }
    }

    public function loginout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}

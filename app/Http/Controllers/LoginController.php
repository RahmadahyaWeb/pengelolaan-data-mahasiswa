<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect('/');
        }

        throw ValidationException::withMessages([
            'username' => "Username atau Password salah!"
        ]);
    }
}

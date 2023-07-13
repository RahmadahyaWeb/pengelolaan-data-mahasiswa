<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::id())->first();
        return view('admin.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username,' . Auth::id(),
        ]);

        if ($request->hasFile('foto')) {

            $foto = $request->file('foto');
            $foto->storeAs('public/foto', $foto->hashName());
            Storage::delete('public/foto/' . Auth::user()->foto);

            User::where('id', Auth::id())->update([
                'username' => $request->username,
                'foto'     => $foto->hashName()
            ]);
        } else {
            User::where('id', Auth::id())->update([
                'username' => $request->username,
            ]);
        }

        return redirect()->back()->with('success', 'Profile Anda berhasil diperbarui!');
    }

    public function indexPassword()
    {
        return view('admin.profile.password');
    }

    public function password(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed'
        ]);

        User::where('id', Auth::id())
            ->update([
                'password' => Hash::make($request->password)
            ]);

        return redirect()->back()->with('success', 'Password Anda berhasil diperbarui!');
    }
}

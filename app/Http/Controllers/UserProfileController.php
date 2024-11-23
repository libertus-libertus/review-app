<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use File;

class UserProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('pages.views.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        // Jika password diisi, maka perbarui password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Proses avatar
        if ($request->hasFile('avatar')) {
            // Hapus avatar lama jika ada
            if ($user->avatar && File::exists(public_path('avatars/' . $user->avatar))) {
                File::delete(public_path('avatars/' . $user->avatar));
            }

            // Upload avatar baru
            $newImageName = time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('avatars'), $newImageName);

            // Simpan nama file avatar ke database
            $user->avatar = $newImageName;
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
}

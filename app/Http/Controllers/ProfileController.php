<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
public function show(Request $request)
{
    return view('profile.show', ['user' => $request->user()]);
}
public function updatePassword(Request $request)
{
    $validated = $request->validate([
        'current_password' => 'required|string',
        'password' => 'required|string|min:8|confirmed',
    ]);
    if (! Hash::check($validated['current_password'], $request->user()->password)) {
        return back()->withErrors(['current_password' => 'Password lama tidak cocok.']);
    }
    $request->user()->update(['password' => Hash::make($validated['password'])]);
    $request->session()->regenerate();
    return back()->with('success', 'Password berhasil diperbarui.');
}
}

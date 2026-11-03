@extends('layouts.app')
@section('title', 'Profil Petugas')
@section('content')
<h1>Profil Petugas</h1>
<p>Nama: {{ $user->name }}</p>
<p>Email: {{ $user->email }}</p>
<p>Role: {{ ucfirst($user->role) }}</p>
<h2>Ganti Password</h2>
<form method="POST" action="{{ route('profile.password') }}">
    @csrf
    @method('PUT')
    <p><label for="current_password">Password lama</label><br><input id="current_password" name="current_password" type="password" autocomplete="current-password" required></p>
    @error('current_password')<p>{{ $message }}</p>@enderror
    <p><label for="password">Password baru</label><br><input id="password" name="password" type="password" autocomplete="new-password" minlength="8" required></p>
    @error('password')<p>{{ $message }}</p>@enderror
    <p><label for="password_confirmation">Konfirmasi password baru</label><br><input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required></p>
    <button class="btn" type="submit">Simpan Password</button>
</form>
@endsection

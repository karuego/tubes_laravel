@extends('layouts.app')

@section('title', 'Daftar')

@section('content')
    <h1>Daftar Pengguna Baru</h1>

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div>
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <label for="password_confirmation">Konfirmasi Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit">Daftar</button>
    </form>

    @if ($errors->any())
        <div>
            <strong>{{ $errors->first() }}</strong>
        </div>
    @endif
@endsection
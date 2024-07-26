@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <h1>Login</h1>
    <form action="{{ route('login') }}" method="POST" class="container mt-5">
        @csrf
    
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <a href="{{ route('register') }}">Daftar</a>
    @if ($errors->any())
        <div>
            <strong>{{ $errors->first() }}</strong>
        </div>
    @endif
@endsection
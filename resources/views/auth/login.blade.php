@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <h1 class="font-black">Login</h1>
    <div class="w-50 mx-auto">
        <form action="{{ route('login') }}" method="POST" class="mt-5">
            @csrf
    
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
    
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Login</button>
            <a class="btn btn-warning" href="{{ route('register') }}">Daftar</a>
        </form>
    
        @if ($errors->any())
        <div class="mt-3">
            <div class="alert alert-danger">
                <strong>{{ $errors->first() }}</strong>
            </div>
        </div>
        @endif
    </div>
    
@endsection
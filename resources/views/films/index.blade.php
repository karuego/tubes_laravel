@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Daftar Film</h1>
        <div class="row">
            @foreach($films as $film)
                <div class="md:col-span-4 mb-4 w-auto">
                    <div class="card m-2 rounded-sm">
                        <img src="{{ asset('storage/' . $film->image) }}" alt="{{ $film->title }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $film->title }}</h5>
                            <p class="card-text">{{ Str::limit($film->description, 100) }}</p>
                            <a href="{{ route('tickets.create', $film->id) }}" class="btn btn-primary">Pesan Tiket</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
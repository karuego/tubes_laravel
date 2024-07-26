@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Film</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach ($films as $film)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $film->image) }}" class="card-img-top " style="max-height: 200px; object-fit: cover;" alt="{{ $film->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $film->title }}</h5>
                        <p class="card-text text-truncate" style="max-height: 3.6em; overflow: hidden;" title="{{ $film->description }}">
                            {{ $film->description }}
                        </p>
                        <a href="{{ route('films.show', $film->id) }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
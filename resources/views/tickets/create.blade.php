@extends('layouts.app')

@section('title', 'Pemesanan Tiket')

@section('content')
    <h1>Pemesanan Tiket untuk {{ $film->title }}</h1>

    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf
        <input type="hidden" name="film_id" value="{{ $film->id }}">

        <div class="form-group">
            <label for="quantity">Jumlah Tiket:</label>
            <input type="number" id="quantity" name="quantity" class="form-control" required min="1">
        </div>

        <button type="submit" class="btn btn-primary">Pesan Tiket</button>
    </form>

    <a href="{{ route('films.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Film</a>
@endsection
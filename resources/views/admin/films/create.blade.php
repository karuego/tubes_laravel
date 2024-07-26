@extends('layouts.app')

@section('title', 'Tambah Film')

@section('content')
    <h1>Tambah Film Baru</h1>

    <form action="{{ route('films.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="title">Judul:</label>
            <input type="text" id="title" name="title" required>
        </div>

        <div>
            <label for="genre">Genre:</label>
            <input type="text" id="genre" name="genre" required>
        </div>

        <div>
            <label for="description">Deskripsi:</label>
            <textarea id="description" name="description" required></textarea>
        </div>

        <div>
            <label for="duration">Durasi (menit):</label>
            <input type="number" id="duration" name="duration" required>
        </div>

        <div>
            <label for="image">Upload Gambar:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>

        <button type="submit">Tambahkan Film</button>
    </form>

    @if ($errors->any())
        <div>
            <strong>{{ $errors->first() }}</strong>
        </div>
    @endif
@endsection
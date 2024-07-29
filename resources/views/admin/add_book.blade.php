@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')

<h1 class="mb-4">Tambah Buku</h1>

<div class="w-75 mx-auto">

    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-2">
                <label for="title" class="form-label">
                    Judul :
                </label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>

            <div class="col-md-6 mb-2">
                <label for="genre" class="form-label">
                    Genre :
                </label>
                <input type="text" id="genre" name="genre" class="form-control" required>
            </div>

            <div class="col-md-6 mb-2">
                <label for="description" class="form-label">
                    Deskripsi :
                </label>
                <textarea id="description" name="description" class="form-control" required></textarea>
            </div>

            <div class="col-md-6 mb-2">
                <label for="release_year" class="form-label">
                    Tahun Terbit :
                </label>
                <input type="date" id="release_year" name="release_year" class="form-control" required>
            </div>

            <div class="col-md-6 mb-2">
                <label for="image" class="form-label">
                    Upload Gambar :
                </label>
                <input type="file" id="image" name="image" class="form-control" accept="image/*" required>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-3">
                    Tambahkan Buku
                </button>
            </div>
        </div>
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

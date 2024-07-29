@extends('layouts.app')

@section('content')
<div class="container mt-4">

<h1 class="mb-4">Sistem Manajemen Perpustakaan</h1>

@if(Auth::check())
<div class="row row-cols-1 row-cols-md-4 g-4 mb-4">
    <div class="col">
        <div class="card text-white bg-info">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="ti ti-users card-icon"></i>
                    Anggota
                </h5>
                <p class="card-text display-6">{{ $user_count }}</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-white bg-danger">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="ti ti-book card-icon"></i>
                    Jumlah Buku
                </h5>
                <p class="card-text display-6">{{ $book_count }}</p>
            </div>
        </div>
    </div>
</div>
@endif

</div>
@endsection

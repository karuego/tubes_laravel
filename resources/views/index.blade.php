@extends('layouts.app')

@section('content')

<style>
.row .col .card {
    cursor: pointer
}

.col .card:hover {
    background-color: #007bff;
    cursor: pointer;
}

.col .card.bg-info:hover {
    background-color: #0056b3;
}

.col .card.bg-danger:hover {
    background-color: #c82333;
}
</style>

@if (session()->has('success-index'))
<div class="alert @if (session('alert')) {{ session('alert') }} @else alert-success @endif alert-dismissible fade show" role="alert">
	{{ session('success-index') }}
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session()->has('errpr'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	{{ session('error') }}
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('error'))
    <div class="alert alert-warning">
        {{ session('error') }}
    </div>
@endif

<h1 class="mb-4">Sistem Manajemen Perpustakaan</h1>

@if(auth()->check() && auth()->user()->is_admin)
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

<script>
	document.addEventListener('DOMContentLoaded', function() {
		const card_user = document.querySelector('.card.bg-info')
		const card_buku = document.querySelector('.card.bg-danger')

        card_user.addEventListener('click', function() {
            const card_text = card_user.querySelector('.card-text').textContent
            alert(card_text + ' :: Card clicked!');
        });

        card_buku.addEventListener('click', function() {
            window.location.href = '{{ route('books.all') }}';
        });
	});
</script>

@endsection

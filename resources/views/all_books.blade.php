@extends('layouts.app')

@section('content')

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div id="hiddenElement" class="alert alert-info bg-light" style="display: none;">
    <form action="{{ route('books.all') }}" method="GET">
        @csrf
        <input type="text" id="search" name="search" value="{{ request('search') }}" class="form-control mb-2" placeholder="Search books..." required>
        <button type="submit" class="btn btn-primary"><i class="ti ti-search"></i>Search</button>
    </form>
</div>

@if($search)
    <p>Showing results for "{{ $search }}"</p>
@else

@endif

@foreach($books as $book)
<div class="row my-2 border border-2 border-primary rounded px-2 py-2">
    <div class="col-md-6">
        <img
            src="{{ asset('storage/' . $book->image) }}"
            class="img-fluid"
            style="max-width: 300px; max-height: 500px"
            alt="{{ $book->title }}">
    </div>

    <div class="col-md-6">
        <h1>{{ $book->title }}</h1>

        <p>
            <strong>
                Genre :
            </strong>
            {{ $book->genre }}
        </p>

        <p>
            <strong>
                Deskripsi :
            </strong>
            {{ $book->description }}
        </p>

        <p>
            <strong>
                Tahun Terbit :
            </strong>
            {{ \Carbon\Carbon::parse($book->release_year)->format('Y') }}
        </p>

        @if(auth()->check() && auth()->user()->is_admin)
        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-3">Hapus</button>
        </form>

        {{-- <form action="{{ route('tickets.modify', $ticket->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-3">Hapus</button>
        </form> --}}
        @endif
    </div>
</div>
@endforeach

{{ $books->links() }}

<script>
document.getElementById('showElementBtn').addEventListener('click', function() {
    var element = document.getElementById('hiddenElement');

    if (element.style.display === 'none') {
        element.style.display = 'block';
    } else {
        element.style.display = 'none';
    }
});
</script>

@endsection

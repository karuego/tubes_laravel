@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Tiket</h1>

    <form method="GET" action="{{ route('admin.tickets') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari nama pembeli..." value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul Film</th>
                <th>Nama Pembeli</th>
                <th>Jumlah Tiket</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->film->title }}</td>
                    <td>{{ $ticket->user->name }}</td>
                    <td>{{ $ticket->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
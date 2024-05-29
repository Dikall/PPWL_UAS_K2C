@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Saldo</h1>
    <a href="{{ route('saldo.create') }}" class="btn btn-primary mb-3">Tambah Saldo</a>
    <table class="table">
        <thead>
            <tr>
                <th>User</th>
                <th>Saldo</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($saldos as $saldo)
            <tr>
                <td>{{ $saldo->user->name }}</td>
                <td>{{ $saldo->saldo }}</td>
                <td>
                    <a href="{{ route('saldo.edit', $saldo->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('saldo.destroy', $saldo->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Saldo</h1>
    <form action="{{ route('saldo.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_id">User</label>
            <select name="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="saldo">Saldo</label>
            <input type="number" step="0.01" name="saldo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

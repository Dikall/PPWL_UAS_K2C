@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Saldo</h1>
    <form action="{{ route('saldo.update', $saldo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="saldo">Saldo</label>
            <input type="number" step="0.01" name="saldo" class="form-control" value="{{ $saldo->saldo }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

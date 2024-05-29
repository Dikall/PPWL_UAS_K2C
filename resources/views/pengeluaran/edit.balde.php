@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pengeluaran</h1>
    <form action="{{ route('pengeluaran.update', $pengeluaran->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tanggal_transaksi">Tanggal Transaksi</label>
            <input type="date" name="tanggal_transaksi" class="form-control" value="{{ $pengeluaran->tanggal_transaksi }}" required>
        </div>
        <div class="form-group">
            <label for="total_pengeluaran">Total Pengeluaran</label>
            <input type="number" step="0.01" name="total_pengeluaran" class="form-control" value="{{ $pengeluaran->total_pengeluaran }}" required>
        </div>
        <div class="form-group">
            <label for="metode_pembayaran">Metode Pembayaran</label>
            <input type="text" name="metode_pembayaran" class="form-control" value="{{ $pengeluaran->metode_pemb

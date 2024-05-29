<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My App - Pengeluaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
          crossorigin="anonymous">
</head>
<body>
<div id="app">
    <div class="main-wrapper">
        <div class="main-content">
            <div class="container">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3>List Pengeluaran</h3>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <p>
                            <a class="btn btn-primary" href="{{ route('pengeluaran.create') }}">New Pengeluaran</a>
                        </p>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Tanggal Transaksi</th>
                                <th>Total Pengeluaran</th>
                                <th>Metode Pembayaran</th>
                                <th>Catatan</th>
                                <th>Sisa Saldo</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($pengeluarans as $pengeluaran)
                                <tr>
                                    <td>{{ $pengeluaran->id }}</td>
                                    <td>{{ $pengeluaran->name }}</td>
                                    <td>{{ $pengeluaran->tanggal_transaksi }}</td>
                                    <td>{{ $pengeluaran->total_pengeluaran }}</td>
                                    <td>{{ $pengeluaran->metode_pembayaran }}</td>
                                    <td>{{ $pengeluaran->catatan }}</td>
                                    <td>{{ $pengeluaran->saldo }}</td>
                                    <td>
                                    <a href="{{ route('pengeluaran.edit', ['pengeluaran' => $pengeluaran->id]) }}" class="btn btn-success btn-sm text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                            </svg>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger text-center" onclick="
                                            event.preventDefault();
                                            if (confirm('Do you want to remove this?')) {
                                                document.getElementById('delete-row-{{ $pengeluaran->id }}').submit();
                                            }">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash2-fill" viewBox="0 0 16 16">
                                                <path d="M2.037 3.225A.7.7 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.7.7 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z"/>
                                            </svg>
                                        </a>
                                        <form id="delete-row-{{ $pengeluaran->id }}" action="{{ route('pengeluaran.destroy', ['pengeluaran' => $pengeluaran->id]) }}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">No record found!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2zBvDOmNljxyWY/hzHjmrphSbu1rya6kbnIYZmYYJ8clUhZk43smMhnHNSq"
        crossorigin="anonymous"></script>
</body>
</html>
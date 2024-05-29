<!DOCTYPE html>
<html>
<head>
    <title>Pengeluaran Pribadi</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        @include('layouts.navbar')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

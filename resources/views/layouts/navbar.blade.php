<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('/') }}">Pengeluaran Pribadi</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pengeluaran.index') }}">Pengeluaran</a>
                </li>
                @if(auth()->user()->role == 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('saldo.index') }}">Saldo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pengeluaran.index') }}">Semua Pengeluaran</a>
                    </li>
                @endif
            @endguest
        </ul>
    </div>
</nav>

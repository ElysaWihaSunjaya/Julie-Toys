<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Toko Kami' }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background-color: #007bff; /* Warna biru */
        }
        .footer-custom {
            background-color: #343a40;
            color: #ffffff;
        }
        .footer-custom a {
            color: #007bff;
            text-decoration: none;
        }
        .footer-custom a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom navbar-dark">
        <a class="navbar-brand" href="{{ route('landing.index') }}">Toko Kami</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('landing.index') }}">Landing Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}">Daftar Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('purchase-history.index') }}">Riwayat Pembelian</a>
                </li>

                <!-- Menambahkan menu login/logout berdasarkan status autentikasi -->
                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer-custom py-4 text-center">
        <div class="container">
            <p>&copy; 2024 Toko Kami. Semua Hak Dilindungi.</p>
            <p>Temukan kami di <a href="#">Facebook</a> | <a href="#">Instagram</a> | <a href="#">Twitter</a></p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
        /* Navbar Styling */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background-color: #343a40;
            animation: slideDown 1s ease-out;
            width: 100%;
        }

        @keyframes slideDown {
            0% { transform: translateY(-100%); }
            100% { transform: translateY(0); }
        }

        .navbar-brand {
            color: #ffc107 !important;
            font-family: 'Comic Sans MS', cursive, sans-serif; /* Font asli tetap dipertahankan */
            font-size: 1.2rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .navbar-nav .nav-link {
            color: #ffc107 !important;
            font-family: 'Comic Sans MS', cursive, sans-serif; /* Font asli tetap dipertahankan */
            font-size: 1rem;
            text-transform: capitalize;
            padding: 5px 8px; /* Padding lebih kecil untuk menghemat ruang */
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #ffdd57 !important; /* Warna lebih cerah saat hover */
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            transition: background-color 0.3s ease;
            font-size: 0.9rem; /* Ukuran tombol sedikit lebih kecil */
            padding: 5px 8px; /* Padding tombol lebih kecil */
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        body {
            padding-top: 70px; /* Sesuaikan dengan tinggi navbar */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <!-- Logo -->
            <span class="navbar-brand">
                <img src="{{ asset('image/foto 1.png') }}" class="d-block w-50 h-50">
            </span>
            <!-- Hamburger Menu -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Menu Navigasi -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('purchase-history.create') }}">Belanja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('shop.index') }}">Beranda</a>
                    </li>
                    @if(auth()->check() && auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.create') }}">Tambah Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/report/profit') }}">Laporan Keuntungan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('member.dashboard') }}">Member Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('manajemen_barang.index') }}">Manajemen Barang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cek_persediaan.index') }}">Cek Persediaan</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('daftar_barang.index') }}">Daftar Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('purchase-history.index') }}">Riwayat Pembelian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('faqs.index') }}">FAQ</a>
                    </li>

                    @auth
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init(); // Menginisialisasi AOS
    </script>
</body>
</html>

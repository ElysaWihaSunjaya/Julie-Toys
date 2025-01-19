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
        /* Navbar Animasi */
        .navbar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    background-color: #343a40;
    animation: slideDown 1s ease-out;
    width: 100%; /* Pastikan navbar mengisi lebar layar */
}

        @keyframes slideDown {
            0% { transform: translateY(-100%); }
            100% { transform: translateY(0); }
        }

        .navbar-brand, .navbar-nav .nav-link {
            color: #ffc107 !important; /* Mengubah warna font menjadi kuning */
            font-family: 'Comic Sans MS', cursive, sans-serif !important; /* Font mirip contoh */
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #ffdd57 !important; /* Sedikit lebih cerah saat hover */
        }
        /* Animasi untuk gambar carousel */
        .carousel-item img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            animation: zoomIn 1.5s ease-out;
        }

        @keyframes zoomIn {
            0% { transform: scale(1.1); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }

        /* Efek Hover pada gambar produk */
        .container img {
            width: 300px;
            height: 300px;
            object-fit: cover;
            transition: transform 0.5s ease-in-out;
        }

        .container img:hover {
            transform: scale(1.1);
        }

        /* Animasi FadeIn pada konten */
        .container .row {
            opacity: 0;
            animation: fadeIn 2s forwards;
        }

        @keyframes fadeIn {
            100% { opacity: 1; }
        }

        /* Styling untuk Card di Halaman Shop */
        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            width: 300px; /* Lebar maksimum gambar */
            height: 300px; /* Tinggi maksimum gambar */
            object-fit: contain; /* Gambar tidak akan dipotong */
            margin: 0 auto; /* Memastikan gambar berada di tengah */
            display: block; /* Menjadikan gambar sebagai blok untuk margin */
            padding: 10px; /* Memberi ruang di sekitar gambar agar lebih estetis */
            border-radius: 10px; /* Membulatkan sudut gambar */
            padding: 10px; /* Memberi ruang di sekitar gambar */
        }

        .card-body {
            text-align: center; /* Konten rata tengah */
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 0.9rem;
            color: #555;
        }

        .btn {
            border-radius: 5px;
            font-size: 0.9rem;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #343a40;
            color: white;
        }

        .btn-primary:hover {
            background-color: #ffcb06;
            color: #343a40;
        }

        .btn-warning {
            color: white;
            background-color: #ffcc00;
            border-color: #ffcc00;
        }

        .btn-warning:hover {
            background-color: #e6b800;
            border-color: #e6b800;
        }

        /* Styling untuk Bagian Promosi */
        .promo-card {
            border-radius: 10px;
            background-color: #f8f9fa; /* Warna latar belakang */
            transition: transform 0.3s ease;
        }

        .promo-card:hover {
            transform: scale(1.05); /* Efek zoom saat hover */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        h3.text-primary {
            font-weight: bold;
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
            <span class="navbar-brand">JULIE-TOYS</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
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
                    <a class="nav-link" href="{{ route('daftar_barang.index') }}">Daftar Barang</a>
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


    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://cdn.ruparupa.io/filters:format(webp)/promotion/toyskingdom/update-new-category-ah/level-1/pgbanner-mainan-koleksi.png" class="d-block w-100" alt="Banner 1">
            </div>
            <div class="carousel-item">
                <img src="https://images.pexels.com/photos/163036/mario-luigi-yoschi-figures-163036.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="Banner 2">
            </div>
            <div class="carousel-item">
                <img src="https://images.pexels.com/photos/189530/pexels-photo-189530.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="Banner 3">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Bagian Promosi -->
    <div class="container my-5">
        <h2 class="text-center mb-4" data-aos="fade-up">Promosi Spesial Minggu Ini</h2>
        <div class="row text-center">
            <div class="col-md-4" data-aos="fade-up">
                <div class="promo-card p-3 border">
                    <h3 class="text-primary">Diskon 20%</h3>
                    <p class="mb-0">Dapatkan diskon hingga 20% untuk mainan edukasi!</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="promo-card p-3 border">
                    <h3 class="text-primary">Produk Baru</h3>
                    <p class="mb-0">Koleksi terbaru untuk anak usia 3-6 tahun sudah tersedia!</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
                <div class="promo-card p-3 border">
                    <h3 class="text-primary">Gratis Ongkir</h3>
                    <p class="mb-0">Gratis ongkir untuk pembelian di atas Rp500.000.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="container my-4">
        @yield('content')
    </div>

    <!-- Include Footer -->
    @include('layouts.footer')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init(); // Menginisialisasi AOS
    </script>

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cek.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Daftar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Index.css') }}">
@endpush


</body>
</html>

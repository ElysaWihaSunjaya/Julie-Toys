<!-- resources/views/layouts/xapp.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Styling for Navbar */
        .navbar {
            background-color: #007bff; /* Warna biru */
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: white !important; /* Warna teks putih */
        }
        .navbar-nav .nav-link:hover {
            color: #c8d6e5 !important; /* Warna hover teks */
        }
        footer {
            background-color: #007bff; /* Warna biru footer */
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
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
                        <a class="nav-link" href="{{ route('purchase-history.index') }}">Riwayat Pembelian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('faqs.index') }}">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/report/profit') }}">Laporan Keuntungan</a> <!-- Link ke halaman laporan keuntungan -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('member.dashboard') }}">Member Dashboard</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        @yield('content') <!-- Ini tempat konten dari halaman lain akan dimasukkan -->
    </div>

    <footer>
        <p>&copy; 2024 Julie-Toys</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

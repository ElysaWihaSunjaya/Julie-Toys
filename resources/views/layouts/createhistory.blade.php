<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Julie-Toys')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 500px;
        }

        .container {
            max-width: 1400px;

        }

        .card {
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);

        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;

        }

        .form-control {
            border-radius: 4px;
            padding: 12px;
            height: 70px;
        }

        .table thead {
            background-color: #007bff;
            color: white;
        }

        .table td, .table th {
            vertical-align: middle;
        }

        .btn-sm {
            font-size: 14px;
        }

        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }

        .btn-info {
            background-color: #17a2b8;
        }

        .btn-warning {
            background-color: #ffc107;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        footer {
            background-image: url('{{ asset('image/footerapik.jpeg') }}');
            background-size: 100% 100%; /* Gambar akan menutupi seluruh area footer tanpa terpotong */
            background-position: center;
            background-repeat: no-repeat; /* Menghindari pengulangan gambar */
            color: white;
            text-align: center;
            padding: 80px 15px; /* Menambah ruang teks agar tidak tertutup gambar */
            position: relative;
            bottom: 0;
            width: 100%;
            min-height: 300px; /* Memberikan tinggi minimal footer */
        }

        footer h5 {
            font-weight: bold;
        }

        footer a {
            text-decoration: none;
            color: black; /* Mengubah warna link menjadi hitam */
        }

        footer .social-icons a {
            margin: 0 10px;
            color: black; /* Ikon sosial berwarna hitam */
            font-size: 20px;
        }

        footer .social-icons a:hover {
            color: #007bff; /* Mengubah warna ikon sosial saat di-hover menjadi biru */
        }

        footer .container {
            position: relative;
            z-index: 2;
        }

        footer h5, footer p, footer ul, footer .social-icons {
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7);
        }

        footer .social-icons a:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <!-- Konten Halaman -->
    <div class="container my-4">
        @yield('content')
    </div>

    <!-- Footer -->
    @include('layouts.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

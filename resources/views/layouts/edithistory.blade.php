<!-- resources/views/layouts/xapp.blade.php -->
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
        }

        .container {
            max-width: 1200px;
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
        .card-body .form-control {
    padding: 12px; /* Memberikan padding agar teks lebih leluasa */
    height: 50px;  /* Menambah tinggi input */
    font-size: 1rem; /* Menyesuaikan ukuran font agar lebih mudah dibaca */
}

.card-body .form-label {
    font-size: 1.1rem; /* Membuat label sedikit lebih besar */
}

.card-body .mb-3 {
    margin-bottom: 1.5rem; /* Memberikan jarak yang lebih besar antar form field */
}


    </style>
</head>
<body>


    <div class="container my-4">
        @yield('content')
    </div>

    @include('layouts.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h2 class="mb-4">Selamat datang di Toko Kami</h2>

        <!-- Menambahkan Baris Menu dengan Navigasi -->
        <div class="row">
            <!-- Menu Item 1: Dashboard -->
            <div class="col-md-4 mb-4">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Dashboard</h5>
                        <p class="card-text">Akses halaman utama dashboard toko kami.</p>
                        <a href="{{ route('landing.index') }}" class="btn btn-light">Lihat Dashboard</a>
                    </div>
                </div>
            </div>

            <!-- Menu Item 2: Riwayat Pembelian -->
            <div class="col-md-4 mb-4">
                <div class="card text-white bg-danger">
                    <div class="card-body">
                        <h5 class="card-title">Riwayat Pembelian</h5>
                        <p class="card-text">Lihat riwayat pembelian yang telah dilakukan.</p>
                        <a href="{{ route('purchase-history.index') }}" class="btn btn-light">Lihat Riwayat</a>
                    </div>
                </div>
            </div>

            <!-- Menu Item 3: FAQ -->
            <div class="col-md-4 mb-4">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">FAQ</h5>
                        <p class="card-text">Temukan jawaban atas pertanyaan umum.</p>
                        <a href="{{ route('faqs.index') }}" class="btn btn-light">Lihat FAQ</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Menu Item 4: Daftar Barang -->
            <div class="col-md-4 mb-4">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Barang</h5>
                        <p class="card-text">Lihat daftar produk yang tersedia di toko kami.</p>
                        <a href="{{ route('products.index') }}" class="btn btn-light">Lihat Daftar Barang</a>
                    </div>
                </div>
            </div>

            <!-- Menu Item 5: Cek Persediaan -->
            <div class="col-md-4 mb-4">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Cek Persediaan</h5>
                        <p class="card-text">Periksa persediaan barang yang ada di toko.</p>
                        <a href="{{ route('stock.check') }}" class="btn btn-light">Cek Persediaan</a>
                    </div>
                </div>
            </div>

            <!-- Menu Item 6: Manajemen Barang -->
            <div class="col-md-4 mb-4">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h5 class="card-title">Manajemen Barang</h5>
                        <p class="card-text">Kelola dan tambahkan produk baru ke toko.</p>
                        <a href="{{ route('products.manage') }}" class="btn btn-light">Kelola Barang</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Menu Item 7: Laporan Keuntungan -->
            <div class="col-md-4 mb-4">
                <div class="card text-white bg-warning">
                    <div class="card-body">
                        <h5 class="card-title">Laporan Keuntungan</h5>
                        <p class="card-text">Lihat laporan keuntungan dari transaksi yang terjadi.</p>
                        <a href="{{ route('reports.profit') }}" class="btn btn-light">Lihat Laporan</a>
                    </div>
                </div>
            </div>

            <!-- Menu Item 8: Pembelian Online -->
            <div class="col-md-4 mb-4">
                <div class="card text-white bg-dark">
                    <div class="card-body">
                        <h5 class="card-title">Pembelian Online</h5>
                        <p class="card-text">Lihat dan kelola pembelian online yang dilakukan pelanggan.</p>
                        <a href="{{ route('online-purchase.index') }}" class="btn btn-light">Kelola Pembelian Online</a>
                    </div>
                </div>
            </div>

            <!-- Menu Item 9: Daftar Member -->
            <div class="col-md-4 mb-4">
                <div class="card text-white bg-secondary">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Member</h5>
                        <p class="card-text">Lihat daftar member yang terdaftar di toko.</p>
                        <a href="{{ route('members.index') }}" class="btn btn-light">Lihat Member</a>
                    </div>
                </div>
            </div>

            <!-- Menu Item 10: Pengaturan dan Bantuan -->
            <div class="col-md-4 mb-4">
                <div class="card text-white bg-dark">
                    <div class="card-body">
                        <h5 class="card-title">Pengaturan & Bantuan</h5>
                        <p class="card-text">Akses pengaturan toko dan bantuan.</p>
                        <a href="{{ route('settings.index') }}" class="btn btn-light">Pengaturan & Bantuan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

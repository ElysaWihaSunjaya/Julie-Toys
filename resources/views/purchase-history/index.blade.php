@extends('layouts.historyrw')

@section('title', 'Riwayat Pembelian')
@include('layouts.header')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Riwayat Pembelian</h2>

            <!-- Search bar -->
            <form class="d-flex" method="GET" action="{{ route('purchase-history.index') }}">
                <input class="form-control form-control-sm" type="search" name="search" value="{{ request('search') }}" placeholder="Cari Pembelian" aria-label="Search">

                <!-- Tombol Cari hanya muncul jika tidak ada pencarian -->
                @if(!request('search'))
                    <button class="btn btn-success btn-sm ms-2" type="submit">Cari</button>
                @endif

                <!-- Tombol Kembali hanya muncul jika ada pencarian -->
                @if(request('search'))
                    <a href="{{ route('purchase-history.index') }}" class="btn btn-success btn-sm ms-2">Kembali</a>
                @endif
            </form>
        </div>
        <div class="card-body">
            <!-- Feedback jika tidak ada hasil pencarian -->
            @if($purchases->isEmpty() && request('search'))
                <div class="alert alert-warning" role="alert">
                    Pencarian tidak ditemukan untuk kata kunci: <strong>{{ request('search') }}</strong> .
                </div>
            @endif

            <!-- Tabel Riwayat Pembelian dengan animasi -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover fadeIn">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Tanggal Pembelian</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Rating</th> <!-- Kolom Rating -->
                            <th>Lainnya</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($purchases as $history)
                            <tr>
                                <!-- Menangani kasus ketika product tidak ditemukan -->
                                <td>{{ optional($history->product)->name ?? 'Produk tidak tersedia' }}</td>
                                <td>{{ $history->purchase_date }}</td>
                                <td>{{ $history->quantity }}</td>
                                <td>Rp. {{ number_format($history->total_price, 2, ',', '.') }}</td>

                                <!-- Menampilkan Rating -->
                                <td>
                                    @if($history->rating)
                                        {{ $history->rating }} / 5
                                    @else
                                        Belum ada rating
                                    @endif
                                </td>

                                <td>
                                    <!-- Tombol Titik Tiga -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('purchase-history.show', $history->id) }}">Lihat</a></li>
                                            <li><a class="dropdown-item" href="{{ route('purchase-history.edit', $history->id) }}">Edit</a></li>
                                            <li>
                                                <form action="{{ route('purchase-history.destroy', $history->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

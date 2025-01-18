@extends('layouts.profit')

@section('title', 'Laporan Keuntungan')
@include('layouts.header')
@section('content')
    <div class="card">
        @include('layouts.header')

        <div class="card-body">
            <!-- Ringkasan Keuntungan -->
            <div class="profit-summary">
                <p>Total Keuntungan: Rp. {{ number_format($profit, 2, ',', '.') }}</p>
            </div>

            <h4>Detail Pembelian</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Keuntungan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchaseHistories as $index => $purchase)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <!-- Menggunakan optional() untuk menghindari error jika product tidak ada -->
                            <td>{{ optional($purchase->product)->name ?? 'Produk tidak tersedia' }}</td>
                            <td>{{ $purchase->quantity }}</td>
                            <td>Rp. {{ number_format($purchase->total_price, 2, ',', '.') }}</td>
                            <td>Rp. {{ number_format($purchase->total_price * 0.03, 2, ',', '.') }}</td> <!-- Keuntungan 3% -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

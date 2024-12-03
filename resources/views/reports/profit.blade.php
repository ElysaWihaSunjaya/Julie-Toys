@extends('layouts.profit')

@section('title', 'Laporan Keuntungan')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Laporan Keuntungan</h2>
        </div>

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
                            <td>{{ $purchase->product->name }}</td>
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

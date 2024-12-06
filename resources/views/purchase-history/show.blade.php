@extends('layouts.showhistory')

@section('title', 'Detail Pembelian')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Detail Pembelian #{{ $purchaseHistory->id }}</h2>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nama Produk</th>
                    <td>{{ $purchaseHistory->product->name }}</td>
                </tr>
                <tr>
                    <th>Tanggal Pembelian</th>
                    <td>{{ $purchaseHistory->purchase_date }}</td>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <td>{{ $purchaseHistory->quantity }}</td>
                </tr>
                <tr>
                    <th>Total Harga</th>
                    <td>Rp. {{ number_format($purchaseHistory->total_price, 2, ',', '.') }}</td>
                </tr>
            </table>

            <a href="{{ route('purchase-history.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection

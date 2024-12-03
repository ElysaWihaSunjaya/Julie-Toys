<!-- resources/views/purchase-history/index.blade.php -->
@extends('layouts.historyrw')

@section('title', 'Riwayat Pembelian')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Riwayat Pembelian</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Produk</th>
                        <th>Tanggal Pembelian</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchases as $history)
                        <tr>
                            <td>{{ $history->id }}</td>
                            <td>{{ $history->product->name }}</td>
                            <td>{{ $history->purchase_date }}</td>
                            <td>{{ $history->quantity }}</td>
                            <td>Rp. {{ number_format($history->total_price, 2, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('purchase-history.show', $history->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                <a href="{{ route('purchase-history.edit', $history->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('purchase-history.destroy', $history->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@extends('layouts.profit')

@section('title', 'Manajemen Barang')
@include('layouts.header')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Manajemen Barang</h2>
            <a href="{{ route('manajemen_barang.create') }}" class="btn btn-primary">Tambah Barang</a>
        </div>

        <div class="card-body">
            @if ($items->isEmpty())
                <div class="alert alert-warning" role="alert">
                    Tidak ada produk yang tersedia.
                </div>
            @else
                <!-- Tabel Manajemen Barang -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Gambar</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Rusak</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @if($item->image)
                                            <a href="{{ asset('images/'.$item->image) }}" target="_blank">
                                                <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name }}" style="max-width: 100px; height: auto;">
                                            </a>
                                        @else
                                            <p>No Image</p>
                                        @endif
                                    </td>
                                    <td>Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td>{{ $item->stock }}</td>
                                    <td>{{ $item->damaged_stock }}</td>
                                    <td>
                                        <a href="{{ route('manajemen_barang.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('manajemen_barang.destroy', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $items->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Index.css') }}">
@endpush

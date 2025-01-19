@extends('layouts.historyrw')

@section('title', 'Cek Persediaan')
@include('layouts.header')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Cek Persediaan</h2>
        </div>

        <div class="card-body">
            <!-- Menu navigasi -->
            <nav class="bg-gray-200 p-4 rounded mb-4">
                <ul class="flex space-x-4">
                    <li>
                        <a href="{{ route('cek_persediaan.index') }}" class="text-blue-500 hover:underline">
                            Cek Stok
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('cek_persediaan.under80') }}" class="text-blue-500 hover:underline">
                            Under 80
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Feedback jika tidak ada stok -->
            @if ($barangSedikit->isEmpty())
                <div class="alert alert-warning" role="alert">
                    Tidak ada stok barang.
                </div>
            @else
                <!-- Tabel Cek Persediaan -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">Nama</th>
                                <th class="px-4 py-2 border">Gambar</th>
                                <th class="px-4 py-2 border">Harga</th>
                                <th class="px-4 py-2 border">Stok</th>
                                <th class="px-4 py-2 border">Rusak</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangSedikit as $barang)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $barang->name }}</td>
                                    <td class="px-4 py-2 border">
                                        @if ($barang->image)
                                            <a href="{{ asset('images/'.$barang->image) }}" target="_blank">
                                                <img src="{{ asset('images/' . $barang->image) }}" alt="{{ $barang->name }}" style="max-width: 100px; height: auto;">
                                            </a>
                                        @else
                                            <p>No Image</p>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 border">Rp. {{ number_format($barang->price, 0, ',', '.') }}</td>
                                    <td class="px-4 py-2 border">{{ $barang->stock }}</td>
                                    <td class="px-4 py-2 border">{{ $barang->damaged_stock ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cek.css') }}">
@endpush

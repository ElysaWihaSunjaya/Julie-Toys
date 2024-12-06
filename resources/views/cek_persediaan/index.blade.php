@extends('layouts.app')

@section('content')
    <h1>Manajemen Persediaan Barang</h1>

    <!-- Barang dengan Stok di Bawah 80 -->
    <h2>Barang dengan Stok di Bawah 80</h2>
    @if ($barangDibawah80->isEmpty())
        <p>Tidak ada barang dengan stok di bawah 80.</p>
    @else
        <table class="min-w-full bg-white border border-gray-300">
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
                @foreach ($barangDibawah80 as $barang)
                    <tr>
                        <td class="px-4 py-2 border">{{ $barang->name }}</td>
                        <td class="px-4 py-2 border">
                            @if ($barang->image)
                                <img src="{{ asset('images/' . $barang->image) }}" alt="{{ $barang->name }}" style="max-width: 100px; height: auto;">
                            @else
                                <p>No Image</p>
                            @endif
                        </td>
                        <td class="px-4 py-2 border">{{ number_format($barang->price, 2) }}</td>
                        <td class="px-4 py-2 border">{{ $barang->stock }}</td>
                        <td class="px-4 py-2 border">{{ $barang->damaged_stock ?? '-' }}</td>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <!-- Barang dengan Stok Sedikit -->
    <h2>Barang dengan Stok Sedikit</h2>
    @if ($barangSedikit->isEmpty())
        <p>Tidak ada barang dengan stok sedikit.</p>
    @else
        <table class="min-w-full bg-white border border-gray-300">
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
                                <img src="{{ asset('images/' . $barang->image) }}" alt="{{ $barang->name }}" style="max-width: 100px; height: auto;">
                            @else
                                <p>No Image</p>
                            @endif
                        </td>
                        <td class="px-4 py-2 border">{{ number_format($barang->price, 2) }}</td>
                        <td class="px-4 py-2 border">{{ $barang->stock }}</td>
                        <td class="px-4 py-2 border">{{ $barang->damaged_stock ?? '-' }}</td>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif


@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cek.css') }}">
@endpush

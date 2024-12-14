@extends('layouts.app')

@section('content')
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

    <h2>Barang dengan Stok di Bawah 80</h2>
    @if ($barangDibawah80->isEmpty())
        <p>Tidak ada barang dengan stok di bawah 80.</p>
    @else
        <table>
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
                                <a href="{{ asset('images/'.$barang->image) }}" target="_blank">
                                    <img src="{{ asset('images/' . $barang->image) }}" alt="{{ $barang->name }}" style="max-width: 100px; height: auto;">
                                </a>
                            @else
                                <p>No Image</p>
                            @endif
                        </td>
                        <td class="px-4 py-2 border">{{ $barang->price }}</td>
                        <td class="px-4 py-2 border">{{ $barang->stock }}</td>
                        <td class="px-4 py-2 border">{{ $barang->damaged_stock ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cek.css') }}">
@endpush

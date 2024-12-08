@extends('layouts.app')

@section('content')
<h1>Daftar Barang</h1><br>

<!-- Link untuk menambah barang -->
<a href="{{ route('manajemen_barang.create') }}" class="bg-blue-500 text-white p-2 rounded">Tambah Barang</a>

<!-- Cek apakah data barang ada atau tidak -->
@if ($items->isEmpty())
    <p>Tidak ada produk yang tersedia.</p><br>
@else
    <!-- Tabel untuk menampilkan daftar barang -->
    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="px-4 py-2 border">Nama</th>
                <th class="px-4 py-2 border">Gambar</th>
                <th class="px-4 py-2 border">Harga</th>
                <th class="px-4 py-2 border">Stok</th>
                <th class="px-4 py-2 border">Rusak</th>
                <th class="px-4 py-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td class="px-4 py-2 border">{{ $item->name }}</td>

                    <!-- Menampilkan gambar produk -->
                    <td class="px-4 py-2 border">
                        @if($item->image)
                            <a href="{{ asset('images/'.$item->image) }}" target="_blank">
                            <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name }}" style="max-width: 100px; height: auto;">
                        @else
                            <p>No Image</p>
                        @endif
                    </td>

                    <td class="px-4 py-2 border">{{ $item->price }}</td>
                    <td class="px-4 py-2 border">{{ $item->stock }}</td>
                    <td class="px-4 py-2 border">{{ $item->damaged_stock }}</td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('manajemen_barang.edit', $item->id) }}" class="bg-yellow-500 text-white p-2 rounded">Edit</a>
                        <form action="{{ route('manajemen_barang.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white p-2 rounded">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Menampilkan pagination jika ada lebih dari satu halaman -->
    <div class="mt-4">
        {{ $items->links() }}
    </div>
@endif
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/tampilan.css') }}">
@endpush

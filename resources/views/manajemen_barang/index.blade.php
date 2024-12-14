@extends('layouts.app')

@section('content')

<a href="{{ route('manajemen_barang.create') }}" class="button">Tambah Barang</a>

@if ($items->isEmpty())
    <p>Tidak ada produk yang tersedia.</p><br>
@else
    <table>
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
                        <a href="{{ route('manajemen_barang.edit', $item->id) }}" class="edit">Edit</a>
                        <form action="{{ route('manajemen_barang.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="hapus">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $items->links() }}
    </div>
@endif
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Index.css') }}">
@endpush

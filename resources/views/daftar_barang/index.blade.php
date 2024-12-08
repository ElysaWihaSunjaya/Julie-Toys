@extends('layouts.app')

@section('content')
<h1>Daftar Barang</h1>

<!-- Filter Pencarian -->
<form action="{{ route('daftar_barang.index') }}" method="GET">
    <input type="text" name="search" placeholder="Cari barang..." value="{{ request('search') }}">
    <button type="submit">Cari</button>
</form>

@if ($items->isEmpty())
    <p>Tidak ada produk yang tersedia.</p>
@else
    <div class="items-container">
        @foreach ($items as $item)
            <div class="item">
                <div class="item-name">{{ $item->name }}</div>
                <div class="item-image">
                    <!-- Menampilkan gambar jika ada -->
                    @if ($item->image)
                        <a href="{{ asset('images/'.$item->image) }}" target="_blank">
                            <img src="{{ asset('images/'.$item->image) }}" alt="{{ $item->name }}" class="thumbnail" data-large="{{ asset('images/'.$item->image) }}">
                        </a>
                    @else
                        <p>No Image</p>
                    @endif
                </div>
                <div class="item-price">
                    <strong>Harga:</strong> {{ $item->price }}
                </div>
                <div class="item-stock">
                    <strong>Stok:</strong> {{ $item->stock }}
                </div>
            </div>
        @endforeach
    </div>

    {{ $items->links() }}
@endif
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/tampilan.css') }}">
@endpush

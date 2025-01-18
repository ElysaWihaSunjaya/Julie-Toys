@extends('layouts.app')

@section('content')

<!-- Filter Pencarian -->
<form action="{{ route('daftar_barang.index') }}" method="GET">
    <input type="text" name="search" placeholder="Cari barang..." value="{{ request('search') }}">
    <button type="submit">Cari</button>
</form>

@if ($items->isEmpty())
    <p>Tidak ada produk yang tersedia.</p>
@else
    <div class="items-container"> <!-- Kontainer dengan class flex -->
        @foreach ($items as $item)
            <div class="tru-product-card">
                <div class="tru-product-card-title">{{ $item->name }}</div>
                <div class="tru-product-card-image">
                    @if ($item->image)
                        <a href="{{ asset('images/'.$item->image) }}" target="_blank">
                            <img src="{{ asset('images/'.$item->image) }}" alt="{{ $item->name }}" class="thumbnail" data-large="{{ asset('images/'.$item->image) }}">
                        </a>
                    @else
                        <p>No Image</p>
                    @endif
                </div>
                <div class="tru-product-card-info">
                    <div class="tru-product-card-price">
                        <strong>Harga:</strong> {{ number_format($item->price, 0, ',', '.') }}
                    </div>
                    <div class="item-stock">
                        <strong>Stok:</strong> {{ $item->stock }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $items->links() }}
@endif
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Daftar.css') }}">
@endpush

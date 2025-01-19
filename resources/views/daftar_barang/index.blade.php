@extends('layouts.tambhproduk')

@section('title', 'Daftar Barang')
@include('layouts.header')

@section('content')
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <h3 class="mb-4">Daftar Barang</h3>

            <!-- Filter Pencarian -->
            <form action="{{ route('daftar_barang.index') }}" method="GET" class="d-flex mb-4">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari barang..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>

            @if ($items->isEmpty())
                <div class="alert alert-warning" role="alert">
                    Tidak ada produk yang tersedia.
                </div>
            @else
                <!-- Kontainer Barang -->
                <div class="row">
                    @foreach ($items as $item)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-header text-center">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                </div>
                                <div class="card-body text-center">
                                    <!-- Gambar Produk -->
                                    @if ($item->image)
                                        <a href="{{ asset('images/'.$item->image) }}" target="_blank">
                                            <img src="{{ asset('images/'.$item->image) }}" alt="{{ $item->name }}" class="img-fluid" style="max-height: 200px;">
                                        </a>
                                    @else
                                        <p class="text-muted">No Image</p>
                                    @endif

                                    <!-- Informasi Barang -->
                                    <div class="mt-3">
                                        <p class="card-text">
                                            <strong>Harga:</strong> Rp. {{ number_format($item->price, 0, ',', '.') }}
                                        </p>
                                        <p class="card-text">
                                            <strong>Stok:</strong> {{ $item->stock }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-4 d-flex justify-content-center">
                    {{ $items->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Daftar.css') }}">
@endpush

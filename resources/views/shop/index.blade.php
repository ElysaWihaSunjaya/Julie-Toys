<!-- resources/views/shop/index.blade.php -->

@extends('layouts.shop') <!-- Menggunakan layout xapp -->

@section('title', 'Belanja Online') <!-- Menyediakan title halaman -->

@section('content')
    <h2 class="mb-4">Belanja Online</h2>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <!-- Menampilkan gambar produk -->
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Rp. {{ number_format($product->price, 2, ',', '.') }}</p>
                        <a href="{{ route('shop.show', $product->id) }}" class="btn btn-primary">Lihat Detail</a>
                        <a href="{{ route('shop.edit', $product->id) }}" class="btn btn-warning ml-2">Edit</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

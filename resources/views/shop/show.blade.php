<!-- resources/views/products/show.blade.php -->
@extends('layouts.showshop')

@section('title', $product->name)

@section('content')
    <div class="row">
        <div class="col-md-6">
            <!-- Gambar Produk -->
            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
        </div>
        <div class="col-md-6">
            <h2>{{ $product->name }}</h2>
            <p class="lead">Rp. {{ number_format($product->price, 2, ',', '.') }}</p>
            <p>{{ $product->description }}</p>

            <!-- Hanya menampilkan informasi produk tanpa tombol beli -->
            <p><strong>Detail Produk:</strong> {{ $product->description }}</p>
        </div>
    </div>
@endsection

<!-- resources/views/products/edit.blade.php -->
@extends('layouts.editlay')

@section('title', 'Edit Produk')

@section('content')
    <div class="container my-4">
        <h2>Edit Produk</h2>

        <form action="{{ route('shop.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama Produk</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
            </div>

            <div class="form-group">
                <label for="price">Harga Produk</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" required>
            </div>

            <div class="form-group">
                <label for="image">Gambar Produk</label>
                <input type="file" class="form-control" id="image" name="image">

                @if($product->image)
                    <div class="mt-2">
                        <label>Gambar Saat Ini:</label>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="mt-2" width="100">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('shop.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection

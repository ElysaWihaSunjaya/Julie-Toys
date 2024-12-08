@extends('layouts.app')

@section('content')
<h1>Tambah Barang</h1>

<form action="{{ route('manajemen_barang.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Nama Barang:</label>
        <input type="text" name="name" id="name" required>
    </div>

    <div>
        <label for="price">Harga:</label>
        <input type="number" name="price" id="price" required>
    </div>

    <div>
        <label for="stock">Stok:</label>
        <input type="number" name="stock" id="stock" required>
    </div>

    <div>
        <label for="damaged_stock">Stok Rusak:</label>
        <input type="number" name="damaged_stock" id="damaged_stock" required>
    </div>

    <div>
        <label for="image">Gambar Barang:</label>
        <input type="file" name="image" id="image" accept="image/*">
    </div>

    <button type="submit" class="bg-blue-500 text-white p-2 rounded">Simpan</button>
</form>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/tampilan.css') }}">
@endpush

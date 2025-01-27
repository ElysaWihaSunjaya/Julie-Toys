@extends('layouts.tambhproduk')
@section('title', 'Manajemen Barang')
@include('layouts.header')

@section('content')

<form action="{{ route('manajemen_barang.store') }}" method="POST" enctype="multipart/form-data">
    <h1>Tambah Barang</h1>
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
        <input type="file" name="image" id="image" accept="image/*"onchange="previewImage(event)">

        <div id="imagePreviewContainer">
            <img id="imagePreview" src="#" alt="Image Preview" style="display:none; max-width: 200px; margin-top: 10px;">
        </div>
    </div>

    <button type="submit" class="bg-blue-500 text-white p-2 rounded">Simpan</button>
</form>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Manajemen.css') }}">
@endpush
@push('scripts')
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const imagePreview = document.getElementById('imagePreview');
                imagePreview.src = e.target.result;
                imagePreview.style.display = "block";
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush


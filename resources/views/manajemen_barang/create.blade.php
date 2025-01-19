@extends('layouts.tambhproduk')

@section('title', 'Tambah Barang Baru')

@include('layouts.header')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3 class="mb-4">Tambah Barang Baru</h3>
            <form action="{{ route('manajemen_barang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Barang</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}" required>
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stok</label>
                    <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock') }}" required>
                    @error('stock')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="damaged_stock" class="form-label">Stok Rusak</label>
                    <input type="number" name="damaged_stock" id="damaged_stock" class="form-control" value="{{ old('damaged_stock') }}" required>
                    @error('damaged_stock')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Barang</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                    <div id="imagePreviewContainer" class="mt-3">
                        <img id="imagePreview" src="#" alt="Image Preview" style="display:none; max-width: 200px;">
                    </div>
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('manajemen_barang.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection

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

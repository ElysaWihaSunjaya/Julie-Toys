@extends('layouts.tambhproduk')

@section('title', 'Edit Barang')
@include('layouts.header')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="text-primary">Edit Barang</h2>
            <a href="{{ route('manajemen_barang.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('manajemen_barang.update', $manajemenBarang->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Barang</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $manajemenBarang->name) }}" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Barang</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                    <div id="imagePreviewContainer" class="mt-3">
                        @if ($manajemenBarang->image)
                            <img id="imagePreview" src="{{ asset('images/' . $manajemenBarang->image) }}" alt="{{ $manajemenBarang->name }}" class="img-thumbnail" style="max-width: 200px;">
                        @else
                            <img id="imagePreview" src="#" alt="Image Preview" style="display:none; max-width: 200px;" class="img-thumbnail">
                        @endif
                    </div>
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="price" class="form-label">Harga</label>
                        <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $manajemenBarang->price) }}" required>
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="stock" class="form-label">Stok</label>
                        <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock', $manajemenBarang->stock) }}" required>
                        @error('stock')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="damaged_stock" class="form-label">Stok Rusak</label>
                    <input type="number" name="damaged_stock" id="damaged_stock" class="form-control" value="{{ old('damaged_stock', $manajemenBarang->damaged_stock) }}" required>
                    @error('damaged_stock')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success me-2">Update</button>
                    <a href="{{ route('manajemen_barang.index') }}" class="btn btn-secondary">Batal</a>
                </div>
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
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush

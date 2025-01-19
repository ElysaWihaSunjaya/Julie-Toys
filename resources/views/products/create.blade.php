@extends('layouts.tambhproduk')

@section('title', 'Tambah Produk Baru')

@include('layouts.header')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3 class="mb-4">Tambah Produk Baru</h3>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Produk</label>
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
                    <label for="is_available_online" class="form-label">Tersedia Online?</label>
                    <select name="is_available_online" id="is_available_online" class="form-select" required>
                        <option value="1" {{ old('is_available_online') == 1 ? 'selected' : '' }}>Ya</option>
                        <option value="0" {{ old('is_available_online') == 0 ? 'selected' : '' }}>Tidak</option>
                    </select>
                    @error('is_available_online')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Produk</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Inisialisasi CKEditor pada textarea
    CKEDITOR.replace('description');

    // Pastikan CKEditor menyinkronkan data ke textarea sebelum form disubmit
    document.querySelector('form').addEventListener('submit', function() {
        for (let instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
    });
</script>
@endpush

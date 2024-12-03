@extends('layouts.createhistory')

@section('title', 'Tambah Pembelian')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Belanja</h2>
        </div>

        <div class="card-body">
            <!-- Pesan Sukses -->
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Pesan Error -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Tambah Pembelian -->
            <form action="{{ route('purchase-history.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="product_id" class="form-label">Produk</label>
                    <select name="product_id" id="product_id" class="form-control" required>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                {{ $product->name }} - Rp. {{ number_format($product->price, 2, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="purchase_date" class="form-label">Tanggal Pembelian</label>
                    <input type="date" class="form-control" id="purchase_date" name="purchase_date" required>
                </div>

                <div class="form-group">
                    <label for="quantity" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                </div>

                <div class="form-group">
                    <label for="total_price_display" class="form-label">Total Harga</label>
                    <input type="text" class="form-control" id="total_price_display" readonly>
                    <input type="hidden" id="total_price" name="total_price" value="0">
                </div>

                <button type="submit" class="btn btn-primary">Simpan Pembelian</button>
            </form>
        </div>
    </div>
@endsection

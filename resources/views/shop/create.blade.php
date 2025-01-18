<!-- resources/views/purchase-history/create.blade.php -->
@extends('layouts.xapp')

@section('title', 'Tambah Pembelian')

@section('content')
    <div class="card p-4">
        <h2 class="mb-4">Tambah Pembelian</h2>

        <form action="{{ route('purchase-history.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="product_id" class="form-label">Nama Produk</label>
                <select class="form-control" id="product_id" name="product_id" required>
                    <option value="" disabled selected>Pilih Produk</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="purchase_date" class="form-label">Tanggal Pembelian</label>
                <input type="date" class="form-control" id="purchase_date" name="purchase_date" required>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Jumlah Pembelian</label>
                <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
            </div>

            <div class="mb-3">
                <label for="total_price" class="form-label">Total Harga</label>
                <input type="text" class="form-control" id="total_price" name="total_price" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Pembelian</button>
        </form>
    </div>

    <script>
        // Update total price when quantity is changed
        document.getElementById('quantity').addEventListener('input', function () {
            var productId = document.getElementById('product_id').value;
            var quantity = this.value;
            if (productId && quantity) {
                fetch(`/get-product-price/${productId}`)
                    .then(response => response.json())
                    .then(data => {
                        var totalPrice = data.price * quantity;
                        document.getElementById('total_price').value = totalPrice.toFixed(2);
                    });
            }
        });
    </script>
@endsection

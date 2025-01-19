@extends('layouts.edithistory')

@section('title', 'Edit Pembelian')
@include('layouts.header')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Edit Pembelian</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('purchase-history.update', $purchaseHistory->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="product_id" class="form-label">Produk</label>
                    <select name="product_id" id="product_id" class="form-control" required>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ $product->id == $purchaseHistory->product_id ? 'selected' : '' }} data-price="{{ $product->price }}">
                                {{ $product->name }} - Rp. {{ number_format($product->price, 2, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="purchase_date" class="form-label">Tanggal Pembelian</label>
                    <input type="date" class="form-control" id="purchase_date" name="purchase_date" value="{{ $purchaseHistory->purchase_date }}" required>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="{{ $purchaseHistory->quantity }}" required>
                </div>

                <!-- Hidden field for total_price -->
                <input type="hidden" id="total_price" name="total_price" value="{{ $purchaseHistory->total_price }}">

                <div class="mb-3">
                    <label for="total_price_display" class="form-label">Total Harga</label>
                    <input type="text" class="form-control" id="total_price_display" value="Rp. {{ number_format($purchaseHistory->total_price, 2, ',', '.') }}" readonly>
                </div>

                <!-- Rating input -->
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" value="{{ old('rating', $purchaseHistory->rating) }}" required>
                </div>

                <button type="submit" class="btn btn-warning">Perbarui Pembelian</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Fungsi untuk menghitung total harga
        function calculateTotalPrice() {
            var quantity = parseInt(document.getElementById('quantity').value) || 0;
            var productSelect = document.getElementById('product_id');
            var selectedOption = productSelect.options[productSelect.selectedIndex];
            var productPrice = parseFloat(selectedOption.getAttribute('data-price')) || 0;

            var totalPrice = quantity * productPrice;
            document.getElementById('total_price_display').value = 'Rp. ' + totalPrice.toLocaleString('id-ID');
            document.getElementById('total_price').value = totalPrice; // Update hidden total_price field
        }

        // Menambahkan event listener ketika kuantitas atau produk dipilih
        document.getElementById('quantity').addEventListener('input', calculateTotalPrice);
        document.getElementById('product_id').addEventListener('change', calculateTotalPrice);

        // Menginisialisasi perhitungan total harga saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function () {
            calculateTotalPrice();
        });
    </script>
@endsection

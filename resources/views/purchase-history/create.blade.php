@extends('layouts.createhistory')
@include('layouts.header')

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

            <<form action="{{ route('purchase-history.store') }}" method="POST">
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

                <!-- Form Rating -->
                <div class="form-group">
                    <label for="rating" class="form-label">Rating</label>
                    <input type="number" class="form-control" id="rating" name="rating" min="1" max="5">
                </div>

                <button type="submit" class="btn btn-primary">Simpan Pembelian</button>
            </form>

        </div>
    </div>

    <script>
        // Fungsi untuk menghitung total harga
        function calculateTotalPrice() {
            // Ambil elemen-elemen input
            var productSelect = document.getElementById("product_id");
            var quantityInput = document.getElementById("quantity");
            var totalPriceDisplay = document.getElementById("total_price_display");
            var totalPriceInput = document.getElementById("total_price");

            // Ambil harga produk yang dipilih
            var selectedOption = productSelect.options[productSelect.selectedIndex];
            var productPrice = parseFloat(selectedOption.getAttribute("data-price"));
            var quantity = parseInt(quantityInput.value);

            // Jika jumlahnya lebih dari 0, hitung total harga
            if (quantity > 0) {
                var totalPrice = productPrice * quantity;
                totalPriceDisplay.value = "Rp. " + totalPrice.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'); // Menampilkan total harga
                totalPriceInput.value = totalPrice.toFixed(2); // Mengirimkan total harga sebagai nilai tersembunyi
            } else {
                totalPriceDisplay.value = "Rp. 0.00"; // Jika jumlah 0, tampilkan harga 0
                totalPriceInput.value = "0"; // Set nilai total harga menjadi 0
            }
        }

        // Menambahkan event listener untuk perubahan produk dan jumlah
        document.getElementById("product_id").addEventListener("change", calculateTotalPrice);  // Menghitung ulang ketika produk dipilih
        document.getElementById("quantity").addEventListener("input", calculateTotalPrice);     // Menghitung ulang ketika jumlah diubah

        // Hitung total harga ketika halaman dimuat jika sudah ada nilai produk dan jumlah
        window.onload = calculateTotalPrice;
    </script>


    </script>
@endsection

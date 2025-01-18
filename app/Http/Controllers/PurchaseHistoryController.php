<?php

namespace App\Http\Controllers;

use App\Models\PurchaseHistory;
use App\Models\Product;
use Illuminate\Http\Request;

class PurchaseHistoryController extends Controller
{
    // Menampilkan riwayat pembelian
    public function index(Request $request)
    {
        // Query dasar untuk riwayat pembelian
        $query = PurchaseHistory::with('product')->orderBy('purchase_date', 'desc');

        // Cek apakah ada parameter pencarian
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            // Pencarian berdasarkan nama produk (tanpa melibatkan rating)
            $query->whereHas('product', function ($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%');
            });
        }

        // Ambil data pembelian yang sudah difilter
        $purchases = $query->get();

        return view('purchase-history.index', compact('purchases'));
    }

    // Menampilkan form untuk menambah pembelian
    public function create()
    {
        $products = Product::all(); // Mendapatkan data produk
        return view('purchase-history.create', compact('products'));
    }

    public function store(Request $request)
{
    // Validasi data yang dikirimkan
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'purchase_date' => 'required|date',
        'quantity' => 'required|integer|min:1',
        'total_price' => 'nullable|numeric|gt:0', // Pastikan total_price valid
        'rating' => 'nullable|integer|min:1|max:5', // Validasi rating
    ]);

    // Menghitung total harga jika belum dihitung oleh front-end
    if (!$request->total_price) {
        $product = Product::find($request->product_id);
        $request->merge(['total_price' => $product->price * $request->quantity]);
    }

    // Menyimpan pembelian beserta rating
    PurchaseHistory::create($request->only(['product_id', 'purchase_date', 'quantity', 'total_price', 'rating']));

    // Mengarahkan kembali dengan pesan sukses
    return redirect()->route('purchase-history.index')->with('success', 'Pembelian berhasil disimpan.');
}

    // Menampilkan detail pembelian berdasarkan ID
    public function show(PurchaseHistory $purchaseHistory)
    {
        return view('purchase-history.show', compact('purchaseHistory'));
    }

    // Menampilkan form untuk mengedit pembelian
    public function edit(PurchaseHistory $purchaseHistory)
    {
        $products = Product::all(); // Mendapatkan produk
        return view('purchase-history.edit', compact('purchaseHistory', 'products'));
    }

    // Memperbarui pembelian di database
    public function update(Request $request, PurchaseHistory $purchaseHistory)
{
    // Validasi data yang dikirimkan
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'purchase_date' => 'required|date',
        'quantity' => 'required|integer|min:1',
        'total_price' => 'nullable|numeric|gt:0',
        'rating' => 'nullable|integer|min:1|max:5',  // Validasi rating
    ]);

    // Mengambil harga produk yang dipilih
    $product = Product::find($request->product_id);

    // Menghitung total harga jika belum dihitung oleh front-end
    $totalPrice = $product->price * $request->quantity;

    // Memperbarui total harga di request
    $request->merge(['total_price' => $totalPrice]);

    // Memperbarui pembelian
    $purchaseHistory->update([
        'product_id' => $request->product_id,
        'purchase_date' => $request->purchase_date,
        'quantity' => $request->quantity,
        'total_price' => $request->total_price,
        'rating' => $request->rating,  // Memperbarui rating
    ]);

    // Mengarahkan kembali dengan pesan sukses
    return redirect()->route('purchase-history.index')->with('success', 'Pembelian berhasil diperbarui.');
}

    // Menghapus pembelian dari database
    public function destroy(PurchaseHistory $purchaseHistory)
    {
        $purchaseHistory->delete();
        return redirect()->route('purchase-history.index')->with('success', 'Pembelian berhasil dihapus.');
    }
}

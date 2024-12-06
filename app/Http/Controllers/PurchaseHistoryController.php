<?php

namespace App\Http\Controllers;

use App\Models\PurchaseHistory;
use App\Models\Product;
use Illuminate\Http\Request;

class PurchaseHistoryController extends Controller
{
    // Menampilkan riwayat pembelian
    public function index()
    {
        $purchases = PurchaseHistory::with('product')->orderBy('purchase_date', 'desc')->get();
        return view('purchase-history.index', compact('purchases'));
    }

    // Menampilkan form untuk menambah pembelian
    public function create()
    {
        $products = Product::all(); // Mendapatkan data produk
        return view('purchase-history.create', compact('products'));
    }

    // Menyimpan pembelian baru ke database
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'purchase_date' => 'required|date',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'nullable|numeric|gt:0', // Pastikan total_price valid
        ]);

        // Menghitung total harga jika belum dihitung oleh front-end
        if (!$request->total_price) {
            $product = Product::find($request->product_id);
            $request->merge(['total_price' => $product->price * $request->quantity]);
        }

        // Menyimpan pembelian
        PurchaseHistory::create($request->only(['product_id', 'purchase_date', 'quantity', 'total_price']));

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
            'total_price' => 'nullable|numeric|gt:0', // Pastikan total_price valid
        ]);

        // Menghitung total harga jika belum dihitung oleh front-end
        if (!$request->total_price) {
            $product = Product::find($request->product_id);
            $request->merge(['total_price' => $product->price * $request->quantity]);
        }

        // Memperbarui pembelian
        $purchaseHistory->update($request->only(['product_id', 'purchase_date', 'quantity', 'total_price']));

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

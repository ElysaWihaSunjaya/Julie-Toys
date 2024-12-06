<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();  // Mengambil semua produk dari database
        return view('shop.index', compact('products'));  // Mengirim data produk ke view
    }
    // Menampilkan semua produk yang tersedia untuk dibeli online
    public function shop()
    {
        $products = Product::where('is_available_online', true)->get(); // Menampilkan produk yang bisa dipesan online
        return view('shop.index', compact('products')); // Mengirim data produk ke view
    }

    // Menampilkan detail produk
    public function show(Product $product)
    {
        return view('shop.show', compact('product')); // Mengirim data produk ke view detail produk
    }

    // Menangani form untuk menambah produk baru
    public function create()
    {
        return view('products.create');
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        // Validasi input dari user
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'is_available_online' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validasi gambar
        ]);

        // Jika ada file gambar yang diupload
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Menyimpan gambar di folder 'public/products' dan mengambil path-nya
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Menyimpan data produk beserta gambar di database
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'is_available_online' => $request->is_available_online,
            'image' => $imagePath, // Simpan path gambar
        ]);

        // Redirect ke halaman produk setelah berhasil menambah
        return redirect()->route('products.index');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('shop.edit', compact('product'));
    }

    // Metode untuk memperbarui produk
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Validasi input (opsional)
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Mengupdate data produk
        $product->name = $request->name;
        $product->price = $request->price;

        // Jika ada gambar yang diunggah, simpan gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image && Storage::exists('public/' . $product->image)) {
                Storage::delete('public/' . $product->image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        return redirect()->route('shop.index')->with('success', 'Produk berhasil diperbarui');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        // Ambil semua produk, dan tambahkan rata-rata rating untuk setiap produk
        $products = Product::all()->map(function($product) {
            $product->average_rating = $product->averageRating(); // Menambahkan rata-rata rating
            return $product;
        });

        return view('shop.index', compact('products'));
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
            'stock' => 'required|integer',
            'description' => 'nullable|string',
            'is_available_online' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Menyimpan gambar jika ada yang diupload
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Menyimpan gambar di folder 'public/products' dan mengambil path-nya
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Menyimpan data produk beserta gambar di database
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'is_available_online' => $request->is_available_online,
            'image' => $imagePath,
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
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Temukan produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Update data produk
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');

        // Jika ada gambar baru yang diupload
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image && Storage::exists('public/' . $product->image)) {
                Storage::delete('public/' . $product->image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        // Simpan perubahan
        $product->save();

        // Redirect ke halaman produk setelah update
        return redirect()->route('shop.show', $product->id)->with('success', 'Produk berhasil diperbarui!');
    }


}

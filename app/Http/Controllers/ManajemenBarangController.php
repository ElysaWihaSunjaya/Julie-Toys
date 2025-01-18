<?php

namespace App\Http\Controllers;

use App\Models\ManajemenBarang;
use Illuminate\Http\Request;

class ManajemenBarangController extends Controller
{
    // Menampilkan semua barang dengan pagination
    public function index(Request $request)
    {
        $query = ManajemenBarang::query();

        // Cek apakah ada parameter pencarian
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Menggunakan paginate untuk menampilkan data dengan pagination
        $items = $query->paginate(10);  // Misalnya, menampilkan 10 item per halaman

        return view('manajemen_barang.index', compact('items'));
    }

    // Menampilkan form untuk tambah barang
    public function create()
    {
        return view('manajemen_barang.create');
    }

    // Menyimpan barang baru
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'damaged_stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validasi gambar
        ]);

        // Menyimpan barang baru, termasuk gambar jika ada
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }

        ManajemenBarang::create($validated); // Menyimpan barang baru

        return redirect()->route('manajemen_barang.index');
    }

    // Menampilkan form untuk edit barang
    public function edit($id)
    {
        $manajemenBarang = ManajemenBarang::findOrFail($id);

        return view('manajemen_barang.edit', compact('manajemenBarang'));
    }

    // Memperbarui data barang
    public function update(Request $request, $id)
    {
        // Validasi input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'damaged_stock' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Temukan data manajemen barang berdasarkan ID
        $manajemenBarang = ManajemenBarang::findOrFail($id);

        // Jika ada gambar baru, upload gambar dan simpan
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($manajemenBarang->image) {
                // Menggunakan public_path untuk folder public/images
                $oldImagePath = public_path('images/' . $manajemenBarang->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Hapus gambar lama
                }
            }

            // Simpan gambar baru
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validated['image'] = $imageName;
        }

        // Update data barang dengan gambar baru (jika ada)
        $manajemenBarang->update($validated);

        // Kembalikan response atau redirect sesuai kebutuhan
        return redirect()->route('manajemen_barang.index')->with('success', 'Data barang berhasil diperbarui');
    }


    // Menghapus barang
    public function destroy($id)
    {
        $manajemenBarang = ManajemenBarang::findOrFail($id);

        // Hapus gambar jika ada
        if ($manajemenBarang->image) {
            unlink(public_path('images/' . $manajemenBarang->image));
        }

        // Hapus barang
        $manajemenBarang->delete();

        return redirect()->route('manajemen_barang.index');
    }
}

//test



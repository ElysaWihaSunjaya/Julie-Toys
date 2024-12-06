<?php

namespace App\Http\Controllers;

use App\Models\ManajemenBarang;
use Illuminate\Http\Request;

class CekPersediaanController extends Controller
{
    public function index()
    {
        // Barang dengan stok sedikit
        $barangSedikit = ManajemenBarang::orderBy('stock', 'asc')->get();

        // Barang dengan stok di bawah 80
        $barangDibawah80 = ManajemenBarang::where('stock', '<', 80)->orderBy('stock', 'asc')->get();

        return view('cek_persediaan.index', compact('barangSedikit', 'barangDibawah80'));
    }

    public function create()
    {
        return view('manajemen_barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'damaged_stock' => 'nullable|integer',
        ]);

        ManajemenBarang::create($request->all());
        return redirect()->route('manajemen_barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $barang = ManajemenBarang::findOrFail($id);
        return view('manajemen_barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $barang = ManajemenBarang::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'damaged_stock' => 'nullable|integer',
        ]);

        $barang->update($request->all());
        return redirect()->route('manajemen_barang.index')->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $barang = ManajemenBarang::findOrFail($id);
        $barang->delete();
        return redirect()->route('manajemen_barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}

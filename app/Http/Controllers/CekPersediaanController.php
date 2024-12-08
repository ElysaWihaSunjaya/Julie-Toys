<?php

namespace App\Http\Controllers;

use App\Models\ManajemenBarang;
use Illuminate\Http\Request;

class CekPersediaanController extends Controller
{
    public function index()
    {
        $barangSedikit = ManajemenBarang::orderBy('stock', 'asc')->get();
        return view('cek_persediaan.index', compact('barangSedikit'));
    }

    public function under80()
    {
        $barangDibawah80 = ManajemenBarang::where('stock', '<', 80)->orderBy('stock', 'asc')->get();
        return view('cek_persediaan.under80', compact('barangDibawah80'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'damaged_stock' => 'nullable|integer',
        ]);

        ManajemenBarang::create($request->all());
        return redirect()->route('manajemen_barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ManajemenBarang; // Pastikan model yang benar digunakan
use Illuminate\Http\Request;

class DaftarBarangController extends Controller
{
    public function index(Request $request)
    {
        $query = ManajemenBarang::query();

        // Jika ada query pencarian
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Ambil data barang dengan paginasi 10 per halaman
        $items = $query->paginate(10);

        // Kirim data barang ke view
        return view('daftar_barang.index', compact('items'));
    }
}



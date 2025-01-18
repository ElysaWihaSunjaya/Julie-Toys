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
}


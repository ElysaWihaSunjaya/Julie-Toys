<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PurchaseHistory;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function profit()
    {
        // Ambil semua data pembelian untuk menghitung keuntungan
        $purchaseHistories = PurchaseHistory::with('product')->get();

        // Hitung total keuntungan
        $profit = $purchaseHistories->sum(function ($purchase) {
            // Menghitung keuntungan 3% dari total harga pembelian (total_price)
            $profit = $purchase->total_price * 0.03; // 3% dari total_price

            return $profit;
        });

        // Kirim data ke view
        return view('reports.profit', compact('profit', 'purchaseHistories'));
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseHistory extends Model
{
    use HasFactory;

    protected $table = 'purchase_history'; // Nama tabel di database

    // Menentukan apakah kolom created_at dan updated_at harus dikelola otomatis
    public $timestamps = true;

    // Kolom yang dapat diisi secara massal
    // resources/models/PurchaseHistory.php
    protected $fillable = [
        'product_id',
        'purchase_date',
        'quantity',
        'total_price',
        'rating', // Menambahkan kolom rating ke fillable
    ];


    // Relasi ke produk
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Menambahkan aksesors atau mutators jika diperlukan
    // Misalnya, jika ingin mengakses harga total dalam format tertentu
    public function getTotalPriceFormattedAttribute()
    {
        return 'Rp ' . number_format($this->total_price, 0, ',', '.');
    }

    // Jika ada kebutuhan untuk memformat tanggal pembelian
    public function getFormattedPurchaseDateAttribute()
    {
        return \Carbon\Carbon::parse($this->purchase_date)->format('d-m-Y');
    }

    // Anda juga bisa menambahkan custom methods yang lebih kompleks jika diperlukan
}

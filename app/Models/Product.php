<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Kolom yang bisa diisi secara mass assignment
    protected $fillable = [
        'name',
        'price',
        'stock',
        'description',
        'image',
        'is_available_online'
    ];

    // Menandakan timestamps aktif
    public $timestamps = true;

    /**
     * Relasi ke PurchaseHistory (riwayat pembelian)
     */
    public function purchaseHistories()
    {
        return $this->hasMany(PurchaseHistory::class);
    }

    /**
     * Menghitung rata-rata rating dari riwayat pembelian
     */
    public function averageRating()
    {
        return $this->purchaseHistories()
                    ->whereNotNull('rating')
                    ->avg('rating');
    }

    /**
     * Accessor: Mengembalikan rating dalam bentuk bintang
     */
    public function getRatingStarsAttribute()
    {
        $rating = $this->averageRating() ?? 0; // Jika tidak ada rating, default 0
        $stars = '';
        for ($i = 0; $i < 5; $i++) {
            $stars .= ($i < $rating) ? '★' : '☆';
        }
        return $stars;
    }

    /**
     * Accessor: Mengembalikan URL gambar produk
     * Jika tidak ada gambar, gunakan gambar default
     */
    public function getImageUrlAttribute()
    {
        return $this->image
            ? asset('storage/' . $this->image)
            : asset('images/default-product.png');
    }

    /**
     * Scope: Filter produk yang tersedia secara online
     */
    public function scopeAvailableOnline($query)
    {
        return $query->where('is_available_online', 1);
    }
}

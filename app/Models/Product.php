<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'stock', 'description'
    ];

    public $timestamps = true;

    public function averageRating()
{
    return $this->purchaseHistories()
               ->whereNotNull('rating')
               ->avg('rating');
}

// Accessor untuk menampilkan rating dalam bentuk bintang
public function getRatingStarsAttribute()
{
    $rating = $this->averageRating();
    $stars = '';
    for ($i = 0; $i < 5; $i++) {
        $stars .= ($i < $rating) ? '★' : '☆';
    }
    return $stars;
}

public function purchaseHistories()
{
    return $this->hasMany(PurchaseHistory::class);
}

}


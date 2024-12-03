<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Tentukan kolom yang bisa diisi secara massal
    protected $fillable = [
        'name', 'price', 'stock', 'description'
    ];

    // Opsional: Jika menggunakan timestamp, Anda bisa menambahkan ini (bisa dihilangkan jika sudah ada secara default)
    public $timestamps = true;
}

<?php

// app/Models/ManajemenBarang.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManajemenBarang extends Model
{
    use HasFactory;

    // Tentukan field yang dapat diisi secara mass-assignment
    protected $fillable = [
        'name', 'image', 'price', 'stock', 'damaged_stock',
    ];
}

//test



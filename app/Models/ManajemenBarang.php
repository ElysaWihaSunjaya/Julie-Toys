<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManajemenBarang extends Model
{
    use HasFactory;

    protected $table = 'manajemen_barang'; // Nama tabel di database
    protected $fillable = ['name', 'description', 'price', 'stock']; // Kolom yang dapat diisi
}

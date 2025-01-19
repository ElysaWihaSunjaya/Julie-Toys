<?php

// app/Models/Member.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    // Tentukan table yang digunakan
    protected $table = 'users'; // Jika menggunakan tabel 'users' di database

    // Tentukan kolom yang bisa diisi (untuk keamanan)
    protected $fillable = ['name', 'email', 'role'];

    // Ambil semua data user dengan role 'buyer'
    public static function getBuyers()
    {
        return self::where('role', 'buyer')->get();
    }
}

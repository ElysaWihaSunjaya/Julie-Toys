<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    // Menonaktifkan penggunaan timestamps (created_at & updated_at)
    public $timestamps = false;

    protected $fillable = ['question', 'answer'];
}

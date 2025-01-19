<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        // Mengambil data pengguna dengan role 'buyer'
        $buyers = User::where('role', 'buyer')->get();

        return view('member.index', compact('buyers'));
    }
}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function update(Request $request)
    {
        // Validasi data input
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required|string',
            'facebook' => 'required|url',
            'instagram' => 'required|url',
            'whatsapp' => 'required|url',
        ]);

        // Logika untuk menyimpan perubahan footer
        // Misalnya dengan menyimpan data ke konfigurasi atau database
        config(['footer.email' => $request->email]);
        config(['footer.phone' => $request->phone]);
        config(['footer.facebook' => $request->facebook]);
        config(['footer.instagram' => $request->instagram]);
        config(['footer.whatsapp' => $request->whatsapp]);

        return redirect()->back()->with('success', 'Informasi footer berhasil diperbarui!');
    }
}


<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PurchaseHistoryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\AuthenticatedSessionController; // Pastikan menggunakan controller ini untuk login/logout
use App\Http\Controllers\ReportController; // Controller untuk laporan

Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : view('welcome');
});


// Rute untuk login
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login'); // Form login
    Route::post('login', [AuthenticatedSessionController::class, 'store']); // Proses login

    // Rute untuk register (gunakan RegisteredUserController)
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register'); // Form register
    Route::post('register', [RegisteredUserController::class, 'store']); // Proses register
});

use App\Http\Controllers\FooterController;

Route::put('/footer/update', [FooterController::class, 'update'])->name('footer.update')->middleware('auth');


// *Rute untuk profile (hanya untuk pengguna yang sudah login)*
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// *Rute untuk riwayat pembelian (hanya untuk pengguna yang sudah login)*
Route::middleware('auth')->resource('purchase-history', PurchaseHistoryController::class);

// *Rute untuk FAQ*
Route::get('/faqs', [FaqController::class, 'index'])->name('faqs.index'); // Halaman utama FAQ
Route::get('/faqs/create', [FaqController::class, 'create'])->name('faqs.create'); // Halaman form tambah FAQ
Route::post('/faqs', [FaqController::class, 'store'])->name('faqs.store'); // Menyimpan FAQ baru
Route::get('/faqs/{faq}', [FaqController::class, 'show'])->name('faqs.show'); // Menampilkan FAQ tertentu
Route::get('/faqs/{faq}/edit', [FaqController::class, 'edit'])->name('faqs.edit'); // Halaman form edit FAQ
Route::put('/faqs/{faq}', [FaqController::class, 'update'])->name('faqs.update'); // Menyimpan update FAQ
Route::delete('/faqs/{faq}', [FaqController::class, 'destroy'])->name('faqs.destroy'); // Menghapus FAQ

// *Rute untuk produk (hanya untuk pengguna yang sudah login)*
Route::middleware('auth')->get('/shop', [ProductController::class, 'shop'])->name('shop.index'); // Halaman shop produk
Route::middleware('auth')->get('/shop/{product}', [ProductController::class, 'show'])->name('shop.show'); // Halaman detail produk
Route::middleware('auth')->get('/shop/{product}/edit', [ProductController::class, 'edit'])->name('shop.edit'); // Halaman edit produk
Route::middleware('auth')->put('/shop/{product}', [ProductController::class, 'update'])->name('shop.update'); // Proses update produk



// *Rute untuk logout (hanya untuk pengguna yang sudah login)*
Route::middleware('auth')->post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout'); // Proses logout

// *Rute untuk laporan (hanya untuk pengguna yang sudah login)*
Route::middleware('auth')->get('/report/profit', [ReportController::class, 'profit'])->name('report.profit'); // Laporan profit
// routes/web.php

use App\Http\Controllers\MemberController;

Route::middleware('auth')->get('/member', [MemberController::class, 'index'])->name('member.index');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// routes/web.php
Route::get('/member/dashboard', [MemberController::class, 'index'])->name('member.dashboard');


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');


use Illuminate\Http\Request;

// Route untuk mengupdate footer hanya bisa diakses oleh admin
Route::put('/footer/update', function (Request $request) {
    // Validasi input
    $request->validate([
        'email' => 'required|email',
        'phone' => 'required|string',
        'facebook' => 'required|url',
        'instagram' => 'required|url',
        'whatsapp' => 'required|url',
    ]);

    // Menyimpan informasi footer di session atau database
    session(['footer.email' => $request->email]);
    session(['footer.phone' => $request->phone]);
    session(['footer.facebook' => $request->facebook]);
    session(['footer.instagram' => $request->instagram]);
    session(['footer.whatsapp' => $request->whatsapp]);

    return redirect()->back()->with('success', 'Informasi footer berhasil diperbarui!');
})->name('footer.update')->middleware('auth');

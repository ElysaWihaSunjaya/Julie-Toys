<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProfileController,
    DashboardController,
    Auth\RegisteredUserController,
    Auth\AuthenticatedSessionController,
    PurchaseHistoryController,
    FaqController,
    ProductController,
    ReportController,
    FooterController,
    MemberController,
    DaftarBarangController,
    CekPersediaanController,
    ManajemenBarangController
};

// Route untuk halaman utama
Route::get('/', function () {
    return auth()->check() ? redirect()->route('dashboard') : view('welcome');
});

// Route untuk dashboard
Route::middleware(['auth', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Rute untuk login dan register
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
});

// Rute untuk logout
Route::middleware('auth')->post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Rute untuk profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute untuk manajemen barang dan cek persediaan
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('manajemen_barang', ManajemenBarangController::class);
    Route::get('/cek_persediaan', [CekPersediaanController::class, 'index'])->name('cek_persediaan.index');
    Route::get('/cek_persediaan/under80', [CekPersediaanController::class, 'under80'])->name('cek_persediaan.under80');
});

// Rute untuk daftar barang
Route::resource('daftar_barang', DaftarBarangController::class);

// Rute untuk riwayat pembelian
Route::middleware('auth')->resource('purchase-history', PurchaseHistoryController::class);

// Rute untuk FAQ
Route::resource('faqs', FaqController::class);

// Rute untuk produk
Route::middleware('auth')->group(function () {
    Route::get('/shop', [ProductController::class, 'shop'])->name('shop.index');
    Route::get('/shop/{product}', [ProductController::class, 'show'])->name('shop.show');
    Route::get('/shop/{product}/edit', [ProductController::class, 'edit'])->name('shop.edit');
    Route::put('/shop/{product}', [ProductController::class, 'update'])->name('shop.update');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
});

// Rute untuk laporan
Route::middleware('auth')->get('/report/profit', [ReportController::class, 'profit'])->name('report.profit');

// Rute untuk footer update (gunakan controller)
Route::middleware('auth')->put('/footer/update', [FooterController::class, 'update'])->name('footer.update');

// Rute untuk member
Route::middleware('auth')->get('/member', [MemberController::class, 'index'])->name('member.index');
Route::middleware('auth')->get('/member/dashboard', [MemberController::class, 'index'])->name('member.dashboard');

require __DIR__.'/auth.php';

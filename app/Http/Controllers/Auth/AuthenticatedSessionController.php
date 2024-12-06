<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Validation\Rules;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Cek role pengguna setelah login dan arahkan
        if (Auth::user()->role === 'admin') {
            return redirect()->route('dashboard'); // Admin diarahkan ke dashboard
        }

        return redirect()->route('members.index'); // Buyer diarahkan ke daftar members
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Display the register view.
     */
    public function createRegister(): View
    {
        return view('auth.register'); // Tampilan untuk form register
    }

    /**
     * Handle the registration of a new user.
     */
    public function storeRegister(Request $request): RedirectResponse
    {
        // Validasi input pengguna untuk register
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Buat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Mengamankan password
            'role' => 'buyer', // Role default untuk registrasi
        ]);

        // Login otomatis setelah pendaftaran
        Auth::login($user);

        // Redirect berdasarkan role pengguna
        if ($user->role === 'admin') {
            return redirect(route('dashboard')); // Admin diarahkan ke dashboard
        }

        return redirect(route('members.index')); // Buyer diarahkan ke daftar members
    }
}

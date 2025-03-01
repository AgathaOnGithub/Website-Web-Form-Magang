<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function login()
    {
        return view('auth.login');
    }

    // Menampilkan halaman register
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Proses registrasi user
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'institution' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'nik' => 'required|string|max:20|unique:users,nik',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|string|max:15',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:user,pembimbing',
            'g-recaptcha-response' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Silakan periksa kembali isian Anda.');
        }

        // Validasi Google reCAPTCHA
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ]);

        if (!$response->json()['success']) {
            return redirect()->back()->withErrors(['g-recaptcha-response' => 'Verifikasi Captcha gagal.'])->withInput();
        }

        // Simpan user ke database
        $user = User::create([
            'institution' => $request->institution,
            'major' => $request->major,
            'name' => $request->name,
            'nik' => $request->nik,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Autologin setelah registrasi
        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Registrasi berhasil! Akun Anda telah dibuat.');
    }

    // Proses autentikasi (login)
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
            'g-recaptcha-response' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Validasi Google Recaptcha
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ]);

        if (!$response->json()['success']) {
            return redirect()->back()->withErrors(['g-recaptcha-response' => 'Verifikasi Captcha gagal.'])->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        }

        return redirect()->back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logout berhasil.');
    }
}

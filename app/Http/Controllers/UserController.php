<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Internship;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $internships = Internship::all(); // Menampilkan semua program magang
        $applications = Application::where('user_id', $user->id)->get(); // Menampilkan aplikasi user

        return view('dashboard.user', compact('internships', 'applications'));
    }

    public function profile($id)
    {
        $user = User::findOrFail($id);

        // Cek apakah yang mengakses adalah pemilik akun, admin, atau pembimbing
        if (auth()->user()->id != $user->id && !in_array(auth()->user()->role, ['admin', 'pembimbing'])) {
            abort(403, 'Tidak memiliki izin untuk melihat profil ini.');
        }

        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if (auth()->user()->id != $user->id && !in_array(auth()->user()->role, ['admin', 'pembimbing'])) {
            abort(403, 'Tidak memiliki izin untuk mengedit profil ini.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $user->update($validated);

        return redirect()->route('profile.view', $user->id)->with('success', 'Profil berhasil diperbarui.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Application; // Model untuk pendaftaran magang
use App\Models\Task; // Model untuk tugas

class PembimbingController extends Controller
{
    public function dashboard()
    {
        // Ambil user yang memiliki peran "user" (mahasiswa/magang)
        $users = User::where('role', 'user')->get();

        // Ambil semua aplikasi magang yang diajukan oleh user
        $applications = Application::with('internship', 'user')->get();

        // Ambil semua tugas yang sudah dikerjakan oleh user
        $tasks = Task::with('user')->get();

        return view('dashboard.pembimbing', compact('users', 'applications', 'tasks'));
    }
}

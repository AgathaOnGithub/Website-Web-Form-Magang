<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PembimbingController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\InternshipController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route Home - Redirect ke dashboard jika sudah login
Route::get('/', function () {
    return Auth::check() ? redirect()->route('dashboard') : view('home');
})->name('home');

// Routes untuk tamu (guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');

    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// Logout hanya untuk user yang sudah login
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Routes umum yang dapat diakses tanpa login
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/about', [PageController::class, 'about'])->name('about');

// Route program magang yang dapat diakses tanpa login (hanya melihat data)
Route::get('/internships', [InternshipController::class, 'index'])->name('internships.index');
Route::get('/internships/{id}', [InternshipController::class, 'show'])->name('internships.show');

// Routes yang hanya bisa diakses setelah login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Dashboard berdasarkan peran
    Route::prefix('user')->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    });

    Route::prefix('pembimbing')->group(function () {
        Route::get('/dashboard', [PembimbingController::class, 'dashboard'])->name('pembimbing.dashboard');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    });

    // Tugas (Tasks) - Bisa diakses semua peran
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

    // Profile - Bisa diakses semua user yang login
    Route::prefix('profile')->group(function () {
        Route::get('/{id}', [UserController::class, 'showProfile'])->name('profile.view');
        Route::put('/{id}/update', [UserController::class, 'updateProfile'])->name('profile.update');
    });

    // Routes khusus admin
    Route::prefix('admin')->middleware('role:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
        // CRUD Program Magang - hanya admin yang bisa akses
        Route::resource('internships', InternshipController::class)->except(['index', 'show']);

        // Tambahan route khusus untuk edit dan delete
        Route::get('/internships/{id}/edit', [InternshipController::class, 'edit'])->name('internships.edit');
        Route::put('/internships/{id}', [InternshipController::class, 'update'])->name('internships.update');
        Route::delete('/internships/{id}', [InternshipController::class, 'destroy'])->name('internships.destroy');
    });

        Route::middleware('auth')->group(function () {
        Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
        Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
        Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
        Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
        Route::put('/tasks/{task}/review', [TaskController::class, 'review'])->name('tasks.review');
        Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    });
});

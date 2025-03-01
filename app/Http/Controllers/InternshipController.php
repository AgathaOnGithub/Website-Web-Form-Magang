<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Internship;
use Illuminate\Support\Facades\Storage;

class InternshipController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin')->except(['index', 'show']);
    }

    // Menampilkan daftar program magang (bisa diakses semua user)
    public function index()
    {
        $internships = Internship::all();
        return view('internships.index', compact('internships'));
    }

    // Menampilkan detail program magang (bisa diakses semua user)
    public function show($id)
    {
        $internship = Internship::findOrFail($id);
        return view('internships.show', compact('internship'));
    }

    // Menampilkan form tambah program magang (hanya admin)
    public function create()
    {
        return view('internships.create');
    }

    // Menyimpan program magang baru (hanya admin)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('internship_images', 'public') : null;

        Internship::create([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('internships.index')->with('success', 'Program magang berhasil ditambahkan!');
    }

    // Menampilkan form edit program magang (hanya admin)
    public function edit($id)
    {
        $internship = Internship::findOrFail($id);
        return view('internships.edit', compact('internship'));
    }

    // Menyimpan perubahan program magang (hanya admin)
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $internship = Internship::findOrFail($id);
        $internship->update([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('internships.index')->with('success', 'Program magang berhasil diperbarui!');
    }
}

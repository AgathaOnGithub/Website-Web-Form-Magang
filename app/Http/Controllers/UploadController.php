<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Upload; // Tambahkan ini!

class UploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'cv' => 'required|mimes:pdf,doc,docx|max:2048',
            'formulir' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $cvPath = $request->file('cv')->store('uploads', 'public');
        $formulirPath = $request->file('formulir')->store('uploads', 'public');

        Upload::create([
            'user_id' => auth()->id(),
            'cv' => $cvPath,
            'formulir' => $formulirPath,
        ]);

        return redirect()->back()->with('success', 'Dokumen berhasil diunggah!');
    }
}

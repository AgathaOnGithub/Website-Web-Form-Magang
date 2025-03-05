<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'cv' => 'required|mimes:pdf,doc,docx|max:2048',
            'formulir' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $cvPath = $request->file('cv')->store('uploads');
        $formulirPath = $request->file('formulir')->store('uploads');

        return redirect()->back()->with('success', 'Dokumen berhasil diunggah!');
    }
}

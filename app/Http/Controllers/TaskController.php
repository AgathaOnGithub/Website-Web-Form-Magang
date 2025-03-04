<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:2048',
            'deadline' => 'required|date',
        ]);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads', 'public'); // Simpan ke storage/public/uploads
            
            Task::create([
                'title' => 'Nama File',
                'description' => 'Deskripsi file',
                'file' => $filePath,
                'user_id' => auth()->id(),
                'deadline' => $request->deadline,
                'status' => 'pending', // Tambahkan nilai default
            ]);
        }

        return redirect()->back()->with('success', 'File berhasil diupload!');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        // Hapus file dari storage jika ada
        if ($task->file) {
            Storage::disk('public')->delete($task->file);
        }

        $task->delete();

        return redirect()->back()->with('success', 'Tugas berhasil dihapus!');
    }
}

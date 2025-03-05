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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'deadline' => 'required|date',
            'status' => 'required|in:pending,in_progress,completed',
            'file' => 'required|mimes:pdf,docx,jpg,png|max:2048', // Maksimal 2MB
        ]);

        $filePath = $request->file('file')->store('uploads', 'public');

        // Buat URL file yang disimpan
        $url = asset('storage/' . $filePath);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'status' => $request->status,
            'file_path' => $filePath, // Simpan path file
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil ditambahkan! File dapat diakses di: ' . $url);
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|mimes:pdf,doc,docx,png,jpg,jpeg|max:2048'
        ]);

        $task->title = $request->title;
        $task->description = $request->description;

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('tasks', 'public');
            $task->file_path = $filePath;
        }

        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        // Hapus file dari storage jika ada
        if ($task->file_path) {
            Storage::disk('public')->delete($task->file_path);
        }

        $task->delete();

        return redirect()->back()->with('success', 'Tugas berhasil dihapus!');
    }
}

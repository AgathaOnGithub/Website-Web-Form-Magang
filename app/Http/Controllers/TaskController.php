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
            'description' => 'nullable|string',
            'file' => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg,rar,xlsx|max:2048'
        ]);

        $filePath = $request->file('file')->store('tasks', 'public');

        Task::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
            'status' => 'submitted'
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dikirim.');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function review(Task $task)
    {
        $task->update(['status' => 'reviewed']);
        return redirect()->back()->with('success', 'Tugas telah diperiksa.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // Fitur Read [GET] - Punya Akbar
    public function index()
    {
        $tasks = Task::all();
        
        return response()->json([
            'message' => 'Berhasil mengambil semua data task',
            'data' => $tasks
        ], 200);
    }

    // Fitur Create [POST] - Punya Rifqy
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        $task = Task::create([
            'title' => $request->title
        ]);

        return response()->json([
            'message' => 'Task berhasil ditambahkan!',
            'data' => $task
        ], 201);
    }

    // Fitur Delete [DELETE] - Punya Akbar
    public function destroy($id)
    {
        $task = Task::find($id);
        
        if ($task) {
            $task->delete();
            return response()->json(['message' => 'Task berhasil dihapus']);
        }
        
        return response()->json(['message' => 'Task tidak ditemukan'], 404);
    }
}

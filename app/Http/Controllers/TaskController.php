<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; // <-- Ini sangat penting agar file Controller mengenali Model Task

class TaskController extends Controller
{
    // Fitur Create [POST] - Dikerjakan oleh Rifqy
    public function store(Request $request)
    {
        // Validasi data yang masuk (wajib diisi, berupa teks, maksimal 255 huruf)
        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        // Simpan data ke database
        $task = Task::create([
            'title' => $request->title
        ]);

        // Berikan jawaban (response) bahwa data sukses disimpan
        return response()->json([
            'message' => 'Task berhasil ditambahkan!',
            'data' => $task
        ], 201);
    }
}
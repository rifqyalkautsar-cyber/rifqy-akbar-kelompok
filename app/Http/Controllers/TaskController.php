<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    //Fitur Read [GET]
    public function index()
    {
        $tasks = Task::all();
        
        return response()->json([
            'message' => 'Berhasil mengambil semua data task',
            'data' => $tasks
        ], 200);
    }

    //Fitur Delete [DELETE]
    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'message' => 'Task tidak ditemukan'
            ], 404);
        }

        $task->delete();

        return response()->json([
            'message' => 'Task berhasil dihapus'
        ], 200);
    }
}
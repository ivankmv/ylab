<?php

namespace App\Http\Controllers;

use App\Status;
use App\Task;

class ApiController extends Controller
{
    public function tasks($field)
    {
        if (!in_array($field,['id', 'name', 'created_at', 'updated_at', 'end_time', 'status_id'])) {
            return response()->json(null, 400);
        }

        return Task::orderBy($field)->get();
    }

    public function task(Task $task)
    {
        return $task;
    }

    public function updateTaskStatus(Task $task, $status_id)
    {
        if (!Status::where('id', $status_id)->exists()) {
            return response()->json(null, 400);
        }

        if ($task->status_id !== $status_id) {
            $task->status_id = $status_id;
            $task->save();
        }

        return response()->json(null, 200);
    }
}

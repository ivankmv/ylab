<?php

namespace App\Repositories;

use App\Task;
use Carbon\Carbon;

class TaskRepository {

    public function tasks()
    {
        return Task::with('status')->get();
    }

    public function update($id, $input)
    {
        if ($task = Task::find($id)) {

            $input['end_time'] = Carbon::createFromFormat('d.m.Y H:i', $input['end_time']);

            $task->fill($input);
            $task->save();

            return true;
        }

        return false;
    }

    public function store($input)
    {
        $user = new Task();
        $input['end_time'] = Carbon::createFromFormat('d.m.Y H:i', $input['end_time']);
        $user->fill($input);
        $user->save();
    }

}
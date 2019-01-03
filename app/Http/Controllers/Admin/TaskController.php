<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Repositories\StatusRepository;
use App\Repositories\TaskRepository;
use App\Status;
use App\Task;
use Carbon\Carbon;

use Auth;

class TaskController extends Controller
{
    protected $repository;
    protected $status_rep;

    public function __construct(TaskRepository $repository, StatusRepository $status_rep)
    {
        view()->composer('*', function($view) {
            $view->with('user', Auth::user());
        });

        $this->repository = $repository;
        $this->status_rep = $status_rep;
    }

    public function tasks()
    {
        $tasks = $this->repository->tasks();

        return view('admin.tasks', compact('tasks'));
    }

    public function delete($id)
    {
        Task::destroy($id);

        return redirect()->route('admin.tasks')->with('message','Задача удалена.');
    }

    public function task($id)
    {
        if ($task = Task::find($id)) {

            $statuses = $this->status_rep->statuses();

            return view('admin.task', compact('task', 'statuses'));
        }

        return redirect()->route('admin.tasks')->with('message','Задача не найдена.');
    }

    public function update(TaskRequest $r, $id)
    {
        if ($this->repository->update($id, $r->except('_token'))) {

            return redirect()->route('admin.task',[$id])->with('message','Изменения сохранены.');
        }

        return redirect()->route('admin.tasks')->with('message','Задача не найдена.');
    }

    public function create()
    {
        $statuses = $this->status_rep->statuses();

        return view('admin.new_task', compact('statuses'));
    }

    public function store(TaskRequest $r)
    {
        $this->repository->store($r->except('_token'));

        return redirect()->route('admin.tasks')->with('message','Задача добавлена');
    }
}

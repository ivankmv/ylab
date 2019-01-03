<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\StatusRepository;
use App\Status;
use Illuminate\Http\Request;

use Auth;

class StatusController extends Controller
{
    protected $repository;

    public function __construct(StatusRepository $repository)
    {
        view()->composer('*', function($view) {
            $view->with('user', Auth::user());
        });

        $this->repository = $repository;
    }

    public function statuses()
    {
        $statuses = $this->repository->statuses();

        return view('admin.statuses', compact('statuses'));
    }

    public function store(Request $r)
    {
        $name = trim($r->name);

        if (Status::where('name', $name)->exists()) {
            return redirect()->route('admin.statuses')->withErrors(['message' => 'Такой статус уже существует.']);
        }

        $this->repository->store($name);

        return redirect()->route('admin.statuses')->with(['message' => 'Статус добавлен.']);
    }

    public function delete($id)
    {
        if ($status = Status::find($id)) {

            $this->repository->delete($status);

            return redirect()->route('admin.statuses')->with(['message' => 'Статус удален.']);
        }

        return redirect()->route('admin.statuses')->withErrors(['message' => 'Статус не найден.']);

    }

    public function update(Request $r)
    {
        $name = trim($r->name);

        if (Status::where('name', $name)->where('id','!=',$r->id)->exists()) {
            return redirect()->route('admin.statuses')->withErrors(['message' => 'Такой статус уже существует.']);
        }

        if ($this->repository->update($name, $r->id)) {
            return redirect()->route('admin.statuses')->with(['message' => 'Статус изменен.']);
        }

        return redirect()->route('admin.statuses')->withErrors(['message' => 'Статус не найден.']);
    }

    public function order(Request $r)
    {
        $this->repository->order($r->order);

        return redirect()->route('admin.statuses')->with(['message' => 'Порядок сохранен.']);
    }
}

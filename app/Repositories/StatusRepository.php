<?php

namespace App\Repositories;

use App\Status;

class StatusRepository {

    public function statuses()
    {
        return \Cache::rememberForever('statuses', function () {
            return Status::orderBy('position')->get();
        });
    }

    public function store($name)
    {
        $status = new Status();
        $status->name = $name;
        $status->position = Status::count() + 1;
        $status->save();

        \Cache::forget('statuses');
    }

    public function delete($status)
    {
        \DB::transaction(function () use ($status) {
            Status::where('position', '>', $status->position)->update([
                'position' => \DB::raw('position-1'),
            ]);
            $status->delete();
        });

        \Cache::forget('statuses');
    }

    public function order($order)
    {
        $ar = explode(',',$order);
        unset($ar[0]);

        \DB::transaction(function () use ($ar) {
            foreach ($ar as $i => $id) {
                Status::where('id', $id)->update(['position' => $i]);
            }
        });

        \Cache::forget('statuses');
    }

    public function update($name, $id)
    {
        if ($status = Status::find($id)) {

            $status->name = $name;
            $status->save();

            \Cache::forget('statuses');

            return true;
        }

        return false;
    }

}
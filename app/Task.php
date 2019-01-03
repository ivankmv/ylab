<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name', 'description', 'end_time', 'status_id'
    ];

    protected $dates=['created_at', 'updated_at', 'end_time'];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}

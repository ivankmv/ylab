<?php

use Illuminate\Http\Request;

Route::get('/tasks/{field}', 'ApiController@tasks');
Route::get('/task/{task}', 'ApiController@task')->where('task', '[0-9]+');
Route::put('/task/{task}/status/{status_id}', 'ApiController@updateTaskStatus')->where('task', '[0-9]+')->where('status_id', '[0-9]+');
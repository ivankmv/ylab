<?php

Route::get('/', 'IndexController@index');
Route::get('/api-links', 'IndexController@api');
Route::get('/out', 'IndexController@out')->name('out');

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth','admin']], function() {

    Route::get('profile', 'ProfileController@index')->name('admin.profile');
    Route::post('profile', 'ProfileController@update');

    Route::get('users', 'UserController@users')->name('admin.users');
    Route::group(['prefix'=>'user'], function() {
        Route::get('delete/{id}', 'UserController@delete')->name('admin.user.delete')->where('id', '[0-9]+');
        Route::get('{id}', 'UserController@user')->name('admin.user')->where('id', '[0-9]+');
        Route::post('{id}', 'UserController@update')->where('id', '[0-9]+');
        Route::get('create', 'UserController@create')->name('admin.user.create');
        Route::post('create', 'UserController@store');
    });

    Route::get('statuses', 'StatusController@statuses')->name('admin.statuses');
    Route::group(['prefix'=>'status'], function() {
        Route::post('store', 'StatusController@store')->name('admin.status.store');
        Route::post('update', 'StatusController@update')->name('admin.status.update');
        Route::get('delete/{id}', 'StatusController@delete')->name('admin.status.delete')->where('id', '[0-9]+');
        Route::post('order', 'StatusController@order')->name('admin.status.order');
    });

    Route::get('tasks', 'TaskController@tasks')->name('admin.tasks');
    Route::group(['prefix'=>'task'], function() {
        Route::get('delete/{id}', 'TaskController@delete')->where('id', '[0-9]+');
        Route::get('{id}', 'TaskController@task')->name('admin.task')->where('id', '[0-9]+');
        Route::post('{id}', 'TaskController@update')->where('id', '[0-9]+');
        Route::get('create', 'TaskController@create')->name('admin.task.create');
        Route::post('create', 'TaskController@store');
    });
});

Auth::routes();



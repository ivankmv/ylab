<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }
	
	public function out()
	{
		\Auth::logout();
		return redirect('/');
	}

    public function api()
    {
        return view('api_links');
    }

}

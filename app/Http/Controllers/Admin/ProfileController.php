<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

use Auth;
use Validator;

class ProfileController extends Controller
{
    public function __construct()
    {
        view()->composer('*', function($view) {
            $view->with('user', Auth::user());
        });
    }

    public function index()
    {
        return view('admin.profile');
    }

    public function update(Request $r)
    {
        $user = Auth::user();
        $input = $r->except('_token');

        $rules = [
            'email' => 'required|email|max:255|unique:users,email,'.$user->id.',id',
        ];

        if (isset($input['password']) && $input['password']!='') {
            $rules['password'] = 'required|min:6|confirmed';
            $user->password = bcrypt($input['password']);
        }

        $v = Validator::make($input, $rules);

        if ($v->fails()) {
            return redirect()->route('admin.profile')->withErrors($v);
        }

        $user->email = $input['email'];
        $user->save();

        return redirect()->route('admin.profile')->with('message','Изменения сохранены');
    }

}

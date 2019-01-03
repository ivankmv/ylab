<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewUserRequest;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;

use Auth;
use Validator;

class UserController extends Controller
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        view()->composer('*', function($view) {
            $view->with('user', Auth::user());
        });

        $this->repository = $repository;
    }

    public function users()
    {
        $users = User::all();

        return view('admin.users', compact('users'));
    }

    public function delete($id)
    {
        if (Auth::id() != $id) {

            User::destroy($id);

            return redirect()->route('admin.users')->with('message','Пользователь удален.');
        }

        return redirect()->route('admin.users')->with('message','Удаление недопустимо.');
    }

    public function user($id)
    {
        if ($id == Auth::id()) {
            return redirect()->route('admin.profile');
        }

        if ($u = User::find($id)) {
            return view('admin.user', compact('u'));
        }

        return redirect()->route('admin.users');
    }

    public function create()
    {
        return view('admin.new_user');
    }

    public function store(NewUserRequest $r)
    {
        $this->repository->store($r->except('_token'));

        return redirect()->route('admin.users')->with('message','Пользователь добавлен.');
    }

    public function update(Request $r, $id)
    {
        if ($user = User::find($id)) {

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
                return redirect()->route('admin.user',[$user->id])->withErrors($v)->withInput($input);
            }

            $user->email = $input['email'];
            $user->is_admin = $input['is_admin'] == 1;
            $user->save();

            return redirect()->route('admin.user',[$user->id])->with('message','Изменения сохранены.');
        }

        return redirect()->route('admin.users')->with('message','Пользователь не найден.');
    }
}

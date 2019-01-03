<?php

namespace App\Repositories;

use App\User;

class UserRepository {

    public function store($input)
    {
        $user = new User();
        $input['is_admin'] = $input['is_admin'] == 1;
        $user->fill($input);
        $user->save();
    }
}
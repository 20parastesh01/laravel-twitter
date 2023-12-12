<?php

namespace App\Domains\Users\Services;

use App\Domains\Users\Models\User;

class UserService
{
    public function signup($request)
    {   
        $user = User::create([
            'name' => $request -> name,
            'password' => $request -> password,
            'email' => $request -> email]);
        $user['password'] = bcrypt($user['password']);
        return $user;
    }

    public function getAUser(User $user)
    {
        return $user;
    }

    public function updateUser($request, User $user)
    {
        echo $user;

        $user->update([
            'name' => $request -> name,
            'password' => $request -> password,
            'email' => $request -> email
        ]);
        $user['password'] = bcrypt($user['password']);
        return $user;
    }

    public function deleteUser(User $user)
    {
        return $user->delete();
    }
}
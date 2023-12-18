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
        $token = $user->createToken('accessToken')->plainTextToken;
        return ['user' => $user, 'token' => $token];
    }

    public function getAUser($user)
    {
        if(!$user){
            return "user not found";
        }
        return $user;
    }

    public function updateUser($request, $user)
    {
        if(!$user){
            return "user not found";
        }
        $user->update([
            'name' => $request -> name,
            'password' => $request -> password,
            'email' => $request -> email
        ]);
        $user['password'] = bcrypt($user['password']);
        return $user;
    }

    public function deleteUser($user)
    {
        if(!$user){
            return "user not found";
        }
        return $user->delete();
    }
}
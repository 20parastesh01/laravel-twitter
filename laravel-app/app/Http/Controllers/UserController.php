<?php

namespace App\Http\Controllers;

use App\Domains\Users\Services\UserService;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    public function create(StoreUserRequest $request)
    {
        $userWithToken = $this->userService->signup($request);
        return [new UserResource($userWithToken['user']), 'token' => $userWithToken['token'],];
    }

    public function show()
    {
        $user = Auth::user();
        return new UserResource($this->userService->getAUser($user));
    }

    public function update(UpdateUserRequest $request)
    {
        $user = Auth::user();
        return new UserResource($this->userService->updateUser($request, $user));
    }

    public function destroy()
    {
        $user = Auth::user();
        $this->userService->deleteUser($user);
        return "user deleted";
    }
}

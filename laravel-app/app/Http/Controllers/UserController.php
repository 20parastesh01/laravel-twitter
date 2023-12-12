<?php

namespace App\Http\Controllers;

use App\Domains\Users\Models\User;
use App\Domains\Users\Services\UserService;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    public function create(StoreUserRequest $request)
    {
        return new UserResource($this->userService->signup($request));
    }

    public function show(User $user)
    {
        return UserResource::collection($this->userService->getAUser($user));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        return new UserResource($this->userService->updateUser($request, $user));
    }

    public function destroy(User $user)
    {
        $this->userService->deleteUser($user);
        return "user deleted";
    }
}

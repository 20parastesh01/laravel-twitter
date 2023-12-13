<?php

namespace App\Http\Controllers;

use App\Domains\Posts\Models\Post;
use App\Domains\Posts\Services\PostService;
use App\Domains\Users\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function __construct(private PostService $postService)
    {
    }

    public function create(StorePostRequest $request, User $user)
    {
        return new PostResource($this->postService->createPost($request, $user));
    }

    public function show(User $user)
    {
        return PostResource::collection($this->postService->getPosts($user));
    }

    public function update(StorePostRequest $request, User $user, Post $post)
    {
        return new PostResource($this->postService->updatePost($request, $user, $post));
    }

    public function destroy(User $user, Post $post)
    {
        $this->postService->deletePost($user, $post);
        return "post deleted";
    }
}

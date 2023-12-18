<?php

namespace App\Http\Controllers;

use App\Domains\Posts\Models\Post;
use App\Domains\Posts\Services\PostService;
use App\Domains\Users\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct(private PostService $postService)
    {
    }

    public function create(StorePostRequest $request)
    {
        // figure out: how about Auth::id() ?
        $user = Auth::user();
        return new PostResource($this->postService->createPost($request, $user));
    }

    public function show()
    {
        $user = Auth::user();
        return PostResource::collection($this->postService->getPosts($user));
    }

    public function update(StorePostRequest $request, Post $post)
    {
        $user = Auth::user();
        return new PostResource($this->postService->updatePost($request, $user, $post));
    }

    public function destroy(Post $post)
    {
        $user = Auth::user();
        $this->postService->deletePost($user, $post);
        return "post deleted";
    }
}

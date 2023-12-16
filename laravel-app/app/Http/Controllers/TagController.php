<?php

namespace App\Http\Controllers;

use App\Domains\Posts\Models\Post;
use App\Domains\Posts\Models\Tag;
use App\Domains\Posts\Services\TagService;
use App\Domains\Users\Models\User;
use App\Http\Requests\StoreTagRequest;
use App\Http\Resources\TagResource;

class TagController extends Controller
{
    public function __construct(private TagService $tagService)
    {
    }

    // public function create()
    // {
    //     return 'test';
    // }

    public function create(StoreTagRequest $request, User $user, Post $post)
    {
        return new TagResource($this->tagService->createTag($request, $user, $post));
    }

    public function show(User $user, Post $post)
    {
        return TagResource::collection($this->tagService->getPostTags($user, $post));
    }

    public function update(StoreTagRequest $request, User $user, Post $post, Tag $tag)
    {
        return new TagResource($this->tagService->updateTag($request, $user, $post, $tag));
    }

    public function destroy(User $user, Post $post, Tag $tag)
    {
        $this->tagService->deletetag($user, $post, $tag);
        return "tag deleted";
    }
}

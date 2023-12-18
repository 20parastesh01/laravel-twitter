<?php

namespace App\Http\Controllers;

use App\Domains\Posts\Models\Post;
use App\Domains\Posts\Models\Tag;
use App\Domains\Posts\Services\TagService;
use App\Domains\Users\Models\User;
use App\Http\Requests\StoreTagRequest;
use App\Http\Resources\TagResource;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function __construct(private TagService $tagService)
    {
    }

    public function create(StoreTagRequest $request, Post $post)
    {
        $user = Auth::user();
        return new TagResource($this->tagService->createTag($request, $user, $post));
    }

    public function show(Post $post)
    {
        $user = Auth::user();
        return TagResource::collection($this->tagService->getPostTags($user, $post));
    }

    public function update(StoreTagRequest $request, Post $post, Tag $tag)
    {
        $user = Auth::user();
        return new TagResource($this->tagService->updateTag($request, $user, $post, $tag));
    }

    public function destroy(Post $post, Tag $tag)
    {
        $user = Auth::user();
        $this->tagService->deletetag($user, $post, $tag);
        return "tag deleted";
    }
}

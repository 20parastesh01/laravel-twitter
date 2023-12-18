<?php

namespace App\Http\Controllers;

use App\Domains\Posts\Models\Comment;
use App\Domains\Posts\Models\Post;
use App\Domains\Posts\Services\CommentService;
use App\Domains\Users\Models\User;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Resources\CommentResource;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct(private CommentService $commentService)
    {
    }

    public function create(StoreCommentRequest $request, Post $post)
    {
        $user = Auth::user();
        return new CommentResource($this->commentService->createComment($request, $user, $post));
    }

    public function show(Post $post)
    {
        $user = Auth::user();
        return CommentResource::collection($this->commentService->getPostComments($user, $post));
    }

    public function update(StoreCommentRequest $request, Post $post, Comment $comment)
    {
        $user = Auth::user();
        return new CommentResource($this->commentService->updateComment($request, $user, $post, $comment));
    }

    public function destroy(Post $post, Comment $comment)
    {
        $user = Auth::user();
        $this->commentService->deleteComment($user, $post, $comment);
        return "comment deleted";
    }
}

<?php

namespace App\Http\Controllers;

use App\Domains\Posts\Models\Comment;
use App\Domains\Posts\Models\Post;
use App\Domains\Posts\Services\CommentService;
use App\Domains\Users\Models\User;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    public function __construct(private CommentService $commentService)
    {
    }

    public function create(StoreCommentRequest $request, User $user, Post $post)
    {
        return new CommentResource($this->commentService->createComment($request, $user, $post));
    }

    public function show(User $user, Post $post)
    {
        return CommentResource::collection($this->commentService->getPostComments($user, $post));
    }

    public function update(StoreCommentRequest $request, User $user, Post $post, Comment $comment)
    {
        return new CommentResource($this->commentService->updateComment($request, $user, $post, $comment));
    }

    public function destroy(User $user, Post $post, Comment $comment)
    {
        $this->commentService->deleteComment($user, $post, $comment);
        return "comment deleted";
    }
}

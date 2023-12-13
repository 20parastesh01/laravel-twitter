<?php

namespace App\Domains\Posts\Services;

use App\Domains\Posts\Models\Comment;

class CommentService
{
    public function createComment($request, $user, $post)
    {   
        if(!$user){
            return "user not found";
        }
        if(!$post){
            return "post not found";
        }
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->user_id = $user->id;
        $post->comments()->save($comment);
        return $comment;
    }

    public function getPostComments($user, $post)
    {
        if(!$user){
            return "user not found";
        }
        if(!$post){
            return "post not found";
        }
        return $post->comments()->get();
    }

    public function updateComment($request, $user, $post, $comment)
    {
        if(!$post){
            return "post not found";
        }
        if(!$comment){
            return "comment not found";
        }
        if($user->id != $comment['user_id']){
            return "you can not update this comment";
        }
        $comment->update([
            'comment' => $request -> comment
        ]);
        return $comment;
    }

    public function deleteComment($user, $post, $comment)
    {
        if(!$post){
            return "post not found";
        }
        if(!$comment){
            return "comment not found";
        }
        if($user->id != $comment['user_id']){
            return "you can not delete this comment";
        }
        return $comment->delete();
    }
}
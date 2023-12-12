<?php

namespace App\Domains\Posts\Services;

use App\Domains\Posts\Models\Post;
use App\Domains\Users\Models\User;

class PostService
{
    public function createPost($request, $user)
    {   
        if(!$user){
            return "user not found";
        }
        $post = $user->posts()->create([
            'content' => $request->content,
        ]);
        return $post;
    }

    public function getPosts(User $user)
    {
        if(!$user){
            return "post not found";
        }
        return $user->posts()->get();
    }

    public function updatePost($request, Post $post)
    {
        if(!$post){
            return "post not found";
        }
        $post->update([
            'content' => $request -> content
        ]);
        return $post;
    }

    public function deletePost(Post $post)
    {
        if(!$post){
            return "post not found";
        }
        return $post->delete();
    }
}
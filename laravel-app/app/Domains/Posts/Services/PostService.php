<?php

namespace App\Domains\Posts\Services;

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

    public function getPosts($user)
    {
        if(!$user){
            return "user not found";
        }
        return $user->posts()->get();
    }

    public function updatePost($request, $user, $post)
    {
        if(!$user){
            return "user not found";
        }
        if(!$post){
            return "post not found";
        }
        $post->update([
            'content' => $request -> content
        ]);
        return $post;
    }

    public function deletePost($user, $post)
    {
        if(!$user){
            return "user not found";
        }
        if(!$post){
            return "post not found";
        }
        return $post->delete();
    }
}
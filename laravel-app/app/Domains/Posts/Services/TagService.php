<?php

namespace App\Domains\Posts\Services;

use App\Domains\Posts\Models\Tag;

class TagService
{
    public function createTag($request, $user, $post)
    {    
        if(!$post){
            return "post not found";
        }
        if($user->id != $post->user_id){
            return "not allowed to create tags";
        }
        $tag = new Tag();
        $tag->tag = $request->tag;
        $tag->post_id = $post->id;
        $post->tags()->save($tag);
        return $tag;
    }

    public function getPostTags($user, $post)
    {
        if(!$post){
            return "post not found";
        }
        if($user->id != $post->user_id){
            return "not allowed to create tags";
        }
        return $post->tags()->get();
    }

    public function updateTag($request, $user, $post, $tag)
    {
        if(!$post){
            return "post not found";
        }
        if(!$tag){
            return "tag not found";
        }
        if($user->id != $post->user_id){
            return "not allowed to create tags";
        }
        $tag->update([
            'tag' => $request -> tag
        ]);
        return $tag;
    }

    public function deletetag($user, $post, $tag)
    {
        if(!$post){
            return "post not found";
        }
        if(!$tag){
            return "tag not found";
        }
        if($user->id != $post->user_id){
            return "not allowed to delete tags";
        }
        return $tag->delete();
    }
}
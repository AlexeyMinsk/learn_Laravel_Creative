<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;

class UpdateController extends \App\Http\Controllers\Controller
{
    function __invoke(Post $post)
    {
        $data = \request()->validate([
            "title" => "required|string",
            "content" => "required|string",
            "image" => "required|string",
            "tags" => "",
            "category_id" => "int",
        ]);

        if(isset($data['tags'])) {
            $tags = $data['tags'];
            unset($data['tags']);
        }

        $post->update($data);

        if(isset($tags)) {
            $post->tags()->sync($tags, ['updated_at' => new \DateTime('now')]);
        }
        return redirect()->route('post.detail', ["post" => $post->id]);
    }
}

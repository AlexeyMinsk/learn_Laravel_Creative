<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Http\Request;

class StoreController extends \App\Http\Controllers\Controller
{
    function __invoke(Request $request)
    {
        $data = $request->validate([
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

        $post = Post::create($data);

        if(isset($tags) && $post) {
            $post->tags()->attach($tags, ['created_at' => new \DateTime('now')]);
        }
        return redirect()->route('post.index');    }
}

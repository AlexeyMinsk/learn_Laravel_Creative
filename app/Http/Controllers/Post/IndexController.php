<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;

class IndexController extends BaseController
{
    function __invoke()
    {
        $posts = Post::where("is_published", '1')->get();
        return view('post.index', compact('posts'));
    }
}

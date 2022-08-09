<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;

class DetailController extends BaseController
{
    function __invoke(Post $post)
    {
        return view('post.detail', compact('post'));
    }
}

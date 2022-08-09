<?php

namespace App\Http\Controllers\Post;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;

class EditController extends \App\Http\Controllers\Controller
{
    function __invoke(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('post.edit', compact('post', 'tags', 'categories'));
    }
}

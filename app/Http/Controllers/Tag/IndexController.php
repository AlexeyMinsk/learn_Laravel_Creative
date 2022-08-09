<?php

namespace App\Http\Controllers\Tag;

use App\Models\Post;
use App\Models\Tag;

class IndexController extends BaseController
{
    function __invoke()
    {
        $tags = Tag::all();
        return view('tag.index', compact('tags'));
    }
}

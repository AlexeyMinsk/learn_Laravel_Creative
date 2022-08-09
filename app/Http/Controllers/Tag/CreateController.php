<?php

namespace App\Http\Controllers\Tag;

use App\Models\Category;
use App\Models\Tag;

class CreateController extends BaseController
{
    function __invoke()
    {
        $tags = Tag::all();
        return view('tag.create', compact('tags'));
    }
}

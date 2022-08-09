<?php

namespace App\Http\Controllers\Tag;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class StoreController extends \App\Http\Controllers\Controller
{
    function __invoke(Request $request)
    {
        $data = \request()->validate([
            "title" => "required|string",
        ]);

        $tag = Tag::firstOrCreate($data);
        return redirect()->route('tag.create');
    }
}

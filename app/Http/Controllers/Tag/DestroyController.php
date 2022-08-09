<?php

namespace App\Http\Controllers\Tag;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class DestroyController extends BaseController
{
    function __invoke(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tag.index');
    }
}

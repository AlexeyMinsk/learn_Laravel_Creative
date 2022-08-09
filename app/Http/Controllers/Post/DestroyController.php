<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class DestroyController extends \App\Http\Controllers\Controller
{
    function __invoke(Post $post)
    {
        $postId = $post->id;
        $post->delete();
        DB::table('post_tag')->where('post_id', '=', $postId)
            ->update(["deleted_at" => new \DateTime()]);

        return redirect()->route('post.index');
    }
}

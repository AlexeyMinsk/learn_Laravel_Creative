<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(){
        $posts = Post::where("is_published", '1')->get();
        return view('post.index', compact('posts'));
    }

    public function detail(Post $post){
        return view('post.detail', compact('post'));
    }

    public function create(){
        $tags = Tag::all();
        $categories = Category::all();
        return view('post.create', compact('tags', 'categories'));
    }

    public function edit(Post $post){
        $tags = Tag::all();
        $categories = Category::all();
        return view('post.edit', compact('post', 'tags', 'categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
        //dd($request);
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
        return redirect()->route('post.index');
    }


    public function update(Post $post){

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

    public function destroy(Post $post){

        $postId = $post->id;
        $post->delete();
        //DB::table('post_tag')->where('post_id', '=', $postId)->delete();
        DB::table('post_tag')->where('post_id', '=', $postId)
            ->update(["deleted_at" => new \DateTime()]);

        return redirect()->route('post.index');
    }

    public function takeOutTrash(){

        $posts = Post::onlyTrashed()->get();
        foreach($posts as $post){
            $post->forceDelete();
        }
    }
}

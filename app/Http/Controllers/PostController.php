<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\PostTag;
use Illuminate\Http\Request;

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

        $selectTagIds = [];
        foreach(PostTag::where('post_id', $post->id)->get() as $postTag){
            $selectTagIds[] = $postTag->tag_id;
        }
        $tags = Tag::all();//Tag::where('id', $tagIds)->get();
        $categories = Category::all();
        return view('post.edit', compact('post', 'tags', 'categories', 'selectTagIds'));
    }

    public function store(){

        $data = \request()->validate([
            "title" => "required|string",
            "content" => "required|string",
            "image" => "required|string",
            "tags" => "",
            "category_id" => "required|int",
        ]);

        if(isset($data['tags'])) {
            $tags = $data['tags'];
            unset($data['tags']);
        }

        $post = Post::create($data);

        if(isset($tags)) {
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
            "category_id" => "required|int",
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
        $postTags = PostTag::where("post_id", $postId)->get();

        foreach($postTags as $postTag){
            $postTag->delete();
        }
        return redirect()->route('post.index');
    }

    public function takeOutTrash(){

        $posts = Post::onlyTrashed()->get();
        foreach($posts as $post){
            $post->forceDelete();
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    function index(){
        $tags = Tag::all();
        return view('tag.index', compact('tags'));
    }

    function create (){
        $tags = Tag::all();
        return view('tag.create', compact('tags'));
    }

    function store(){
        $data = \request()->validate([
            "title" => "required|string",
        ]);

        $tag = Tag::firstOrCreate($data);
        return redirect()->route('tag.create');
    }

    function destroy(Tag $tag){
        $tag->delete();
        return redirect()->route('tag.index');
    }
}

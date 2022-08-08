<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    function index(){
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    function create (){
        $categories = Category::all();
        return view('category.create', compact('categories'));
    }

    function store(){
        $data = \request()->validate([
            "title" => "required|string",
        ]);

        $category = Category::firstOrCreate($data);
        return redirect()->route('category.create');
    }

    function destroy(){
        $data = \request()->validate([
            "delete" => "int|required",
        ]);
        $category = Category::findOrFail($data['delete']);
        $category->delete();
        return redirect()->route('category.index');
    }
}

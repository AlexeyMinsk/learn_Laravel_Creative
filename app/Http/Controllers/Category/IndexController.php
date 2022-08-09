<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;

class IndexController extends \App\Http\Controllers\Controller
{
    function __invoke()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }
}

<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;

class CreateController extends \App\Http\Controllers\Controller
{
    function __invoke()
    {
        $categories = Category::all();
        return view('category.create', compact('categories'));
    }
}

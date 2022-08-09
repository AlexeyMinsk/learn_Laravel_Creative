<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;

class CreateController extends BaseController
{
    function __invoke()
    {
        $categories = Category::all();
        return view('category.create', compact('categories'));
    }
}

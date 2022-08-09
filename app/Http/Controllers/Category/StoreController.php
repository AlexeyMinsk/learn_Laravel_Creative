<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use Illuminate\Http\Request;

class StoreController extends \App\Http\Controllers\Controller
{
    function __invoke(Request $request)
    {
        $data = \request()->validate([
            "title" => "required|string",
        ]);

        $category = Category::firstOrCreate($data);
        return redirect()->route('category.create');
    }
}

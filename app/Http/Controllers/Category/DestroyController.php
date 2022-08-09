<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DestroyController extends \App\Http\Controllers\Controller
{
    function __invoke(Request $request)
    {
        $data = $request->validate([
            "delete" => "required|int"
        ]);
        $error = "";

        try {
            $result = DB::table('categories')->where('id', '=', $data['delete'])->delete();
        }
        catch(\Illuminate\Database\QueryException $exception)
        {
            if($exception->getCode() == 23000){
                $error = $exception->getMessage();
            }
        }

        if($error) {
            return redirect()->route('category.index', compact('error'));
        }
        return redirect()->route('category.index');
    }
}

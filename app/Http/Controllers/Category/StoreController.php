<?php

namespace App\Http\Controllers\Category;

use App\Http\Requests\Category\StoreRequest;

class StoreController extends BaseController
{
    function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('category.create');
    }
}

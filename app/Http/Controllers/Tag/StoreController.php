<?php

namespace App\Http\Controllers\Tag;

use App\Http\Requests\Tag\StoreRequest;

class StoreController extends BaseController
{
    function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('tag.create');
    }
}

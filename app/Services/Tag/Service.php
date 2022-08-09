<?php


namespace App\Services\Tag;


use App\Models\Tag;

class Service
{
    public function store($data)
    {
        Tag::firstOrCreate($data);
    }
}

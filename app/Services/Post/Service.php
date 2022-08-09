<?php


namespace App\Services\Post;


use App\Models\Post;

class Service
{
    public function store($data)
    {
        if(isset($data['tags'])) {
            $tags = $data['tags'];
            unset($data['tags']);
        }

        $post = Post::create($data);

        if(isset($tags) && $post) {
            $post->tags()->attach($tags, ['created_at' => new \DateTime('now')]);
        }
    }

    public function update(Post $post, $data)
    {
        if(isset($data['tags'])) {
            $tags = $data['tags'];
            unset($data['tags']);
        }

        $post->update($data);

        if(isset($tags)) {
            $post->tags()->sync($tags, ['updated_at' => new \DateTime('now')]);
        }
    }
}

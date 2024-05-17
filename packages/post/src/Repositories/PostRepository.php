<?php

namespace datnguyen\post\Repositories;

use datnguyen\post\Models\Post;

use datnguyen\post\Interfaces\PostRepositoryInterface;


class PostRepository implements PostRepositoryInterface
{
    public function create(array $data)
    {
        return Post::create($data);
    }

    public function update($id, array $data)
    {
        $post = Post::findOrFail($id);
        $post->update($data);

        return $post;
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
    }

    public function find($id)
    {
        return Post::findOrFail($id);
    }

    public function getAll()
    {
        return Post::all();
    }

    // Other methods specific to Post repository...
}

<?php


namespace datnguyen\post\Repositories;

use datnguyen\post\Models\PostCategory;

use datnguyen\post\Interfaces\PostCategoryRepositoryInterface;


class PostCategoryRepository implements PostCategoryRepositoryInterface
{
    public function create(array $data)
    {
        // Create a new post category in the database
        return PostCategory::create($data);
    }

    public function update($id, array $data)
    {
        // Find the post category by ID and update the fields
        $postCategory = PostCategory::findOrFail($id);
        $postCategory->update($data);

        return $postCategory;
    }

    public function delete($id)
    {
        // Find the post category by ID and delete
        $postCategory = PostCategory::findOrFail($id);
        $postCategory->delete();
    }

    public function find($id)
    {
        // Find the post category by ID
        return PostCategory::findOrFail($id);
    }

    public function getAll()
    {
        return PostCategory::all();
    }
    // Other method implementations...
}

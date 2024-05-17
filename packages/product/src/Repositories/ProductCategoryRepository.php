<?php

namespace datnguyen\product\Repositories;

use datnguyen\product\Models\ProductCategory;
use datnguyen\product\Interfaces\ProductCategoryRepositoryInterface;

class ProductCategoryRepository implements ProductCategoryRepositoryInterface
{
    public function create(array $data)
    {
        return ProductCategory::create($data);
    }

    public function update($id, array $data)
    {
        $productCategory = ProductCategory::findOrFail($id);
        $productCategory->update($data);

        return $productCategory;
    }

    public function delete($id)
    {
        $productCategory = ProductCategory::findOrFail($id);
        $productCategory->delete();
    }

    public function find($id)
    {
        return ProductCategory::findOrFail($id);
    }


    public function getAll()
    {
        return ProductCategory::all();
    }

    // Other methods specific to Product Category repository...
}

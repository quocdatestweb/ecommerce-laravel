<?php

namespace datnguyen\product\Repositories;

use datnguyen\product\Models\Product;
use datnguyen\product\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update($id, array $data)
    {
        $product = Product::findOrFail($id);
        $product->update($data);

        return $product;
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    }

    public function find($id)
    {
        return Product::findOrFail($id);
    }

    public function getAll()
    {
        return Product::all();
    }

    // Other methods specific to Product repository...
}

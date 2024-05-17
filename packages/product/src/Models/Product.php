<?php

namespace datnguyen\product\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'thumbImage',
        'content',
        'categoryid',
        'author_id',
        'author_type',
        'created_at',
        'updated_at',
        // Add other fillable attributes if necessary
    ];

    // Rest of the model code...

    // Example of relationships
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'CategoryID');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'Author_ID');
    }
}

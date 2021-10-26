<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'brand_id', 'name', 'description', 'image'
    ];

    // Relationship One to Many inverse, Product - Category
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    // Relationship One to Many Inverse, Product - Brand
    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    // Relationship One to Many, Category - Prododucts
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}

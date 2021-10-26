<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name'
    ];

    // Relationship One to Many, Brand - Products
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}

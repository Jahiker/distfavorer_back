<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\Category as CategoryResouce;
use App\Http\Resources\CategoryCollection;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')
                                ->get();

        // return new CategoryCollection($categories);
        return response()->json($categories);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function count()
    {
        $count = Category::count();

        return response()->json($count);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // return new CategoryResouce($category);
        return response()->json($category);
    }

}

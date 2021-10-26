<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Resources\Product as ProductResource;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductRelationshipsResource;
use App\Http\Resources\ProductRelationshipsCollection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('status', 1)
                            ->orderBy('id', 'desc')
                            ->paginate(12);

        // return new ProductCollection($products);
        return response()->json($products);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        $products = Product::where('status', 1)
                            ->orderBy('updated_at', 'desc')
                            ->take(6)
                            ->get();

        // return new ProductCollection($products);
        return response()->json($products);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($category)
    {
        $products = Product::where('category_id', $category)
                            ->orderBy('id', 'desc')
                            ->paginate(12);

        // return new ProductRelationshipsCollection($products);
        return response()->json($products);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function count()
    {
        $count = Product::count();

        return response()->json($count);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // return new ProductResource($product);
        return response()->json($product);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search($search)
    {
        $products = Product::where('status', 1)
                            ->where('name', 'LIKE', '%'.$search.'%')
                            ->orWhere('code', 'LIKE', '%'.$search.'%')
                            ->orWhere('description', 'LIKE', '%'.$search.'%')
                            ->orderBy('name', 'asc')
                            ->paginate(12);

        // return new ProductCollection($products);
        return response()->json($products);
    }

}

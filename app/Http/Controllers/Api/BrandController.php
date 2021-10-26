<?php

namespace App\Http\Controllers\Api;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\Brand as BrandResource;
use App\Http\Resources\BrandCollection;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::where('show', 1)
                        ->inRandomOrder()
                        ->take(12)
                        ->get();

        // return new BrandCollection($brands);
        return response()->json($brands);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function count()
    {
        $count = Brand::count();

        return response()->json($count);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        // return new BrandResource($brand);
        return response()->json($brand);
    }

}

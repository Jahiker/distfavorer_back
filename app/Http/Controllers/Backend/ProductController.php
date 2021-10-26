<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\Product as ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')
                            ->paginate(5);

        return view('products.index', compact('products'))
            ->with(['page' => 'Productos']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('products.create')
            ->with([
                'categories' => $categories,
                'brands' => $brands,
                'page' => 'Productos'
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();

        $product->category_id = $request->input('category');
        $product->brand_id = $request->input('brand');
        $product->name = $request->input('name');
        $product->code = $request->input('code');
        $product->description = $request->input('description');
        $product->status = $request->input('status');
        $product->favorite = $request->input('favorite');

        if($request->hasFile('image')){
            $path = Storage::disk('public')->put('images', $request->file('image'));

            $product->image = asset($path);
        }

        $product->save();

        return redirect()->route('products.index')
            ->with([
                'message' => 'Producto '.$product->name.' registrado exitosamente',
                'alert' => 'success',
                'page' => 'Productos'
            ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return redirect()->route('products.index')
            ->with([
                'page' => 'Productos'
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('products.edit', compact('product') )
            ->with([
                'categories' => $categories,
                'brands' => $brands,
                'page' => 'Productos'
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        // dd($request);

        $product->category_id = $request->input('category');
        $product->brand_id = $request->input('brand');
        $product->name = $request->input('name');
        $product->code = $request->input('code');
        $product->description = $request->input('description');
        $product->status = $request->input('status');
        $product->favorite = $request->input('favorite');

        if($request->hasFile('image')){
            $path = Storage::disk('public')->put('images', $request->file('image'));

            $product->image = asset($path);
        }

        $product->update();

        return redirect()->route('products.index')
            ->with([
                'message' => 'Producto '.$product->name.' modificado exitosamente',
                'alert' => 'success',
                'page' => 'Productos'
            ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with([
                'message' => 'Producto '.$product->name.' fue eliminado',
                'alert' => 'warning',
                'page' => 'Productos'
            ]);
    }

    public function search(Request $request){
        $search = $request->input('search');

        $products = Product::where('name', 'LIKE', '%'.$search.'%')
                            ->orWhere('description', 'LIKE', '%'.$search.'%')
                            ->orWhere('code', 'LIKE', '%'.$search.'%')
                            ->orderBy('id', 'desc')
                            ->paginate(5);

        return view('products.search', compact('products'))
            ->with(['page' => 'Productos']);
    }
}

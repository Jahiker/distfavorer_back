<?php

namespace App\Http\Controllers\Backend;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Brand as BrandRequest;
use App\Http\Requests\BrandUpdateRequest;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->paginate(6);

        return view('brands.index', compact('brands'))
            ->with(['page' => 'Marcas']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brands.create')
            ->with(['page' => 'Marcas']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        $brand = new Brand();

        $brand->name = $request->input('name');
        $brand->show = $request->input('show');

        if($request->hasFile('logo')){
            $path = Storage::disk('public')->put('logos', $request->file('logo'));

            $brand->logo = asset($path);
        }

        $brand->save();

        return redirect()->route('brands.index')
            ->with([
                'alert' => 'success',
                'message' => 'Marca '.$brand->name.' creada exitosamente'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        $products = $brand->products()->paginate(5);

        return view('brands.show', compact('brand'))
            ->with(['products' => $products])
            ->with(['page' => $brand->name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'))
            ->with(['page' => 'Marcas']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandUpdateRequest $request, Brand $brand)
    {

        $brand->name = $request->input('name');
        $brand->show = $request->input('show');

        if($request->hasFile('logo')){
            $path = Storage::disk('public')->put('logos', $request->file('logo'));

            $brand->logo = asset($path);
        }

        $brand->update();

        return redirect()->route('brands.index')
            ->with([
                'alert' => 'success',
                'message' => 'Marca '.$brand->name.' modificada exitosamente'
            ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('brands.index')
            ->with([
                'alert' => 'warning',
                'message' => 'Marca '.$brand->name.' fue eliminada'
            ]);
    }

    public function search(Request $request){
        $search = $request->input('search');

        $brands = Brand::where('name', 'LIKE', '%'.$search.'%')
                        ->orderBy('id', 'desc')
                        ->paginate(5);

        return view('brands.search', compact('brands'))
                    ->with(['page' => 'Marcas']);
}
}

<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Category as CategoryRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(5);

        return view('categories.index', compact('categories'))
            ->with(['page' => 'Categorias']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create')
            ->with(['page' => 'Categorias']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category();

        $category->name = $request->input('name');
        $category->description = $request->input('description');

        if($request->hasFile('icon')){
            $path = Storage::disk('public')->put('icons', $request->file('icon'));

            $category->icon = asset($path);
        }

        $category->save();

        return redirect()->route('categories.index')
            ->with([
                'alert' => 'success',
                'message' => 'Categoría ' . $category->name . ' creada exitosamente'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $products = $category->products()->paginate(5);
        return view('categories.show', compact('category'))
            ->with(['products' => $products])
            ->with(['page' => $category->name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'))
            ->with(['page' => 'Categorias']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->name = $request->input('name');
        $category->description = $request->input('description');

        if($request->hasFile('icon')){
            $path = Storage::disk('public')->put('icons', $request->file('icon'));

            $category->icon = asset($path);
        }

        $category->update();

        return redirect()->route('categories.index')
            ->with([
                'alert' => 'success',
                'message' => 'Categoría ' . $category->name . ' modificada exitosamente'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with([
                'alert' => 'warning',
                'message' => 'Categoría ' . $category->name . ' eliminada'
            ]);
    }

    public function search(Request $request){
        $search = $request->input('search');

        $categories = Category::where('name', 'LIKE', '%'.$search.'%')
                            ->orWhere('description', 'LIKE', '%'.$search.'%')
                            ->orderBy('id', 'desc')
                            ->paginate(5);

        return view('categories.search', compact('categories'))
                    ->with(['page' => 'Categorias']);
    }
}

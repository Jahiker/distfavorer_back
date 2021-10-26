<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Brand;
use App\Product;

class HomeController extends Controller
{
    protected $categories;
    protected $brands;
    protected $count_users;
    protected $count_categories;
    protected $count_brands;
    protected $count_products;
    protected $data;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}

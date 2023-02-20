<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index(Product $products)
    {
        $products = Product::available()->get();
        // dd($products);
        return view('welcome', compact('products'));
    }
}

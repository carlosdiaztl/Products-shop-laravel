<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    //
    public function index(Product $products)
    {
        DB::connection()->enableQueryLog();
        //aqui es solo para ver el query log o las consultas a la base de datos 


        // ya que el scope global solo permite acceder a los availables no es necesaria esa validacion 
        // $products = Product::available()->get();
        //aqui solucionando el pronblema de las multiples consulta a la DB
        $products = Product::all();
        // dd($products);
        // este modelo si tiene ese global scope 
        return view('welcome', compact('products'));
    }
}

<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\PanelProduct;
use App\Models\Product;
use App\Scopes\AvailableScope;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{


    public function index()
    {
        // traer todos los productos 
        // $products = Product::all();

        // traer solo los productos con status === 'available'
        // get product where status = 'available' 
        $products = PanelProduct::without('images')->get();
        // dd($products);
        // dd($products);
        // return view('products.index',compact('products')) ;
        return view('products.index')->with([
            'products' => $products,
        ]);
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(ProductRequest $request)
    {


        // if ($request->status == 'available' && $request->stock == 0) {
        //     // session()->flash('error', 'If available must have stock  ');
        //     return redirect()->back()
        //         ->withInput($request->all())->withErrors('If available must have stock');
        // }
        // dd(request()->all(),$request->all(),$request->validated());
        $product = PanelProduct::create($request->validated());


        return redirect()->route('products.index')
            ->withSuccess("The new products with id: {$product->id}  was created");
    }

    public function show(PanelProduct $product)
    {
        // $product = Product::findorFail($product);
        // dd($product);
        return view('products.show')->with([
            //'product es solo el nombre que se le dio a la variable
            'product' => $product,
            'html' => '<h2>subtitle<h2/>'
        ]);
    }
    public function edit(PanelProduct $product)

    {
        // $product = Product::findorFail($product);
        return view('products.edit')->with([
            'product' => $product,
        ]);
    }
    public function update(ProductRequest $request, PanelProduct $product)
    {


        // $product = Product::findorFail($product);

        // if (request()->status == 'available' && request()->stock == 0) {

        //     return redirect()->back()
        //         ->withInput(request()->all())
        //         ->withErrors('If available must have stock');
        // }

        $product->update($request->validated());

        return redirect()->route('products.index')
            ->withSuccess("The products with id: {$product->id}  was edited");
    }
    public function destroy(PanelProduct $product)
    {
        // $product = Product::findorFail($product);

        $product->delete();
        //decir que el producto no s epuede liminar porque petence a una tabla 
        return redirect()->route('products.index')
            ->withSuccess("The products with id: {$product->id}  was deleted");;
    }
    //

}

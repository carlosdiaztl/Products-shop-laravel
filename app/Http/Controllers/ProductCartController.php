<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;


class ProductCartController extends Controller
{
    public $cartService;
    public function __construct(CartService $cartService){
        $this->cartService =  $cartService;
    }
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        //
        
        $cart = $this->cartService->getFromCookieOrCreate();
         Cart::create();
        $quantity = $cart->products()
        ->find($product->id)
        ->pivot
        ->quantity ??0;
        $cart->products()->syncWithoutDetaching([$product->id=>['quantity'=>$quantity + 1 ], ]);


        // dd($cart);
        $cookie = $this->cartService->makeCookie($cart);
        return redirect()->back()->cookie($cookie);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Cart $cart)
    {
        
    
        $cart->products()->detach($product->id);
        $cookie = $this->cartService->makeCookie($cart);
        return redirect()->back()->cookie($cookie);
        
    
        
        //
    }
    // public function getFromCookieOrCreate()
    // {
    //     $cartId = Cookie::get('cart');
    //     $cart = Cart::find($cartId);
    //     return $cart ?? Cart::create();
    // }
    // public function makeCookie(Cart $cart){
    //     return   $cookie = Cookie::make('cart', $cart->id, 7 * 24 * 60);
  
    //   }

}

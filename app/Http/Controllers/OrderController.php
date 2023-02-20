<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
        $this->middleware('auth');
    }
    public function create()
    {
        $cart = $this->cartService->getFromCookie();
        //
        if (!isset($cart) || $cart->products->isEmpty()) {
            # code...
            return redirect()->back()->withErrors('your cart is empty');
        }
        return view('orders.create', compact('cart'));
    }



    public function store(Request $request)
    {
        $user = $request->user();
        $order = $user->orders()->create([
            'status' => 'pending'
        ]);

        $cart = $this->cartService->getFromCookie();
        $cartProductWithQuantity = $cart->products->mapWithKeys(
            function ($product) {
                $element[$product->id] = ['quantity' => $product->pivot->quantity];
                return $element;
            }
        );

        $order->products()->attach($cartProductWithQuantity->toArray());
        return redirect()->route('orders.payments.create', compact('order'));
        //
    }
}

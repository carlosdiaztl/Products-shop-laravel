<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderPaymentController extends Controller
{
    public $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */

    public function create(Order $order)
    {
        // dd($order);
        return view('payments.create', compact('order'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Order $order)
    {
        return DB::transaction(function () use ($order) {
            $this->cartService->getFromCookie()->products()->detach();
            $order->payment()->create([
                'amount' => $order->total,
                'payed_at' => now(),
            ]);
            $order->status = 'payed';
            $order->save();
            return redirect()->route('main.index')->withSuccess("Your payment for $ {$order->total} was complete successfull.");
        }, 5);
        //aqui se procesaria el pago con una fuente externa o integración 
        //detach sin parametros remueve todos los productos 

        //'payed_at'=>now(),  trae la fecha actual 
    }



    public function destroy(Order $order, Payment $payment)
    {
        //
    }
}

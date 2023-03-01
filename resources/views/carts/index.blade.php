@extends('layouts.app')
@section('content')
    <h1>Your cart</h1>
    @if (!isset($cart) || $cart->products->isEmpty())
        <div class="alert alert-warning">
            Your cart is empty.
        </div>
    @else
        <h4 class="text-center">Your cart total <strong> {{ $cart->total }}</strong> </h4>
        <a class="btn btn-success mb-3" href="{{ route('orders.create') }} ">Start Order</a>
        <div class="row mb-5 content-welcome">
            @foreach ($cart->products as $product)
                {{-- @include('components.product-card') --}}
                <x-product-card :product='$product' :cart='$cart' />
                {{-- <x-card.card /> --}}
            @endforeach

        </div>
    @endempty
@endsection

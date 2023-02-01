@extends('layouts.app')
@section('content')
<h1>Your cart</h1>
@if ($cart->products->isEmpty())
<div class="alert alert-warning">
    Your cart is empty.
     </div>
    

    @else
        <div class="row">

            @foreach ($cart->products as $product)
                <div class="col-3">
                   {{-- @include('components.product-card') --}}
                   <x-product-card :product='$product' :cart='$cart' />
                   {{-- <x-card.card /> --}}


                </div>
            @endforeach
        </div>
    @endempty
@endsection
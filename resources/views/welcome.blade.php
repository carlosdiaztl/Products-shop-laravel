@extends('layouts.app')
@section('content')

    @empty($products)
        <h1> we don't have products to show </h1>
    @else
        <div class="row">

            @foreach ($products as $product)
                <div class="col-3">
                   {{-- @include('components.product-card') --}}
                   <x-product-card :product='$product' />
                   {{-- <x-card.card /> --}}


                </div>
            @endforeach
        </div>
    @endempty
@endsection

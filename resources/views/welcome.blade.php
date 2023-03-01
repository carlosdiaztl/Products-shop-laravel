@extends('layouts.app')
@section('content')

    @empty($products)
        <h1> we don't have products to show </h1>
    @else
        {{-- @dump($products) --}}

        {{-- <h1> Welcome</h1> --}}

        <div class="row mb-5 content-welcome">

            @foreach ($products as $product)
                {{-- @include('components.product-card') --}}
                <x-product-card :product='$product' />
                {{-- <x-card.card /> --}}
            @endforeach
            {{-- @dump($products)
            @dd(DB::getQueryLog()) --}}
        </div>
    @endempty
@endsection

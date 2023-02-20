@extends('layouts.app')

@section('content')
    <h1> Order Details </h1>
    <h4 class="text-center"> <strong>Grand total: </strong> {{ $cart->total }} </h4>
    <div class="text-center mb-3">
        <form class="d-inline" method="POST" action="{{ route('orders.store') }} ">
            @csrf
            <button type="submit" class="btn btn-success">Confirm Order</button>
        </form>

    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-ligth">
                <tr>
                    <th> Products</th>
                    <th>Price </th>
                    <th>Quantity </th>
                    <th>Total </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart->products as $product)
                    <tr>
                        <td>
                            <img src="{{ asset($product->images->first()->path) }}" width="100" alt="">
                            {{ $product->title == '' ? "tittle doesnt't found" : 'vacio' }}
                        </td>
                        <td> {{ $product->price }}</td>
                        <td> {{ $product->description }} </td>
                        <td> {{ $product->pivot->quantity }}</td>
                        <td>
                            $ {{ $product->total }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection

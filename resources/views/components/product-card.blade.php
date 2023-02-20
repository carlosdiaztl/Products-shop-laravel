<div class="card">
    <img class="card-img-top" src="{{ asset($product->images->first()->path) }}" height="400" alt="">
    <div class="card-body">
        <h5 class="card-right">{{ $product->title }}</h5>
        <h4 class="text-title">{{ $product->price }}$ </h4>
        <p class="card-text">{{ $product->description }}</p>
        <p class="card-text">{{ $product->stock }} left</p>
        @if (isset($cart))
            <p class="text-center">{{ $product->quantity }} in your cart <strong> (${{ $product->total }}) </strong>
            </p>

            <form class="d-inline" method="POST"
                action="{{ route('products.carts.destroy', ['cart' => $cart->id, 'product' => $product->id]) }} ">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning">Remove from cart</button>
            </form>
        @else
            <form class="d-inline" method="POST" action="{{ route('products.carts.store', $product->id) }} ">
                @csrf
                <button type="submit" class="btn btn-success">Add to Cart</button>
            </form>
        @endif
    </div>
</div>

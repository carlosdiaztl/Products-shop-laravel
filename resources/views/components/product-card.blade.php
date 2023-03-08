<div class="col-md-6 col-lg-4 mb-3 product-cards">
    <div class="card h-100">
        {{-- <img class="card-img-top" src="{{ asset($product->images->first()->path) }}" height="350" width="300"
            alt=""> --}}

        <div id="carousel{{ $product->id }}" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">
                @foreach ($product->images as $image)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img class="d-block w-100 card-img-top" src="{{ asset($image->path) }}" height="350"
                            width="300" alt="">
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carousel{{ $product->id }}" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel{{ $product->id }}" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>

        <div class="card-body">
            <h5 class="card-right">{{ $product->title }}</h5>
            <h4 class="text-title">{{ $product->price }}$ </h4>
            <p class="card-text">{{ $product->description }}</p>
            <p class="card-text">{{ $product->stock }} left</p>
            @if (isset($cart))
                <p class="text-center">{{ $product->quantity }} in your cart <strong> (${{ $product->total }})
                    </strong>
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
</div>

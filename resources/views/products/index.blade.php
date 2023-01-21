@extends('layouts.app')

@section('content')
    <h1> Product list </h1>
    <h1> <a class="btn btn-success mb-3" href="{{route('products.create')}} ">Create</a>  </h1>
    <div class="table-responsive">
    

        <table class="table table-striped">
            <thead class="thead-ligth">
                <tr>
                    <th> ID</th>
                    <th>Tittle </th>
                    <th>Description </th>
                    <th>Price </th>
                    <th>Stock </th>
                    <th>Status </th>
                    <th>Acctions </th>
                    
                </tr>
            </thead>
            <tbody>
                @empty($products)
                    <div class="alert warning">
                        The list of products is empty

                    </div>
                @else
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }} </td>
                            <td> {{ $product->title }}</td>
                            <td> {{ $product->description }} </td>
                            <td> {{ $product->price }}</td>
                            <td> {{ $product->stock }}</td>
                            <td> {{ $product->status }}</td>
                            <td> 
                                <a class="btn btn-link" href="{{route('products.edit',$product)}} "> Edit</a>
                                <a class="btn btn-link" href="{{route('products.show',$product)}} "> Show</a>
                                <form class="d-inline" action="{{route('products.destroy',$product->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                <button class="btn btn-link" type="submit"> Delete</button>
                                </form>
                                
                                

                            </td>
                        </tr>
                    @endforeach
                @endempty


            </tbody>
        </table>
    </div>
@endsection

@extends('layouts.app')
@section('content')
<h1> Edit product {{$product->id}} </h1>
<form action="{{ route('products.update', $product) }} " method="POST">
    @csrf
    @method('PUT')
    <div class="form-row">
        <label> Title</label>
        <input class="form-control" type="text" name="title" value="{{old('title')?old('title'):$product->title}}" required>
    </div>
    <div class="form-row">
        <label> Description</label>
        <input class="form-control" type="text" name="description" value="{{old('description') ?? $product->description}}" required>
    </div>
    <div class="form-row">
        <label> Price</label>
        <input class="form-control" type="number" name="price" min="1.00" step="0.01"  value="{{old('price') ??$product->price}}" required>
    </div>
    <div class="form-row">
        <label> Stock</label>
        <input class="form-control" type="number" name="stock" min="0" value="{{old('stock') ??$product->stock}}" required>
    </div>
    <div class="form-row">
        <label> Status</label>
        <select class="custom-select" name="status" required>
            <option  {{old('status')=='available'?'selected':($product->status == 'available'?'selected': '')}}  value="available">Available </option>
            <option {{old('status')=='unavailable'?'selected':($product->status == 'unavailable'?'selected': '') }}  value="unavailable">Unavailable </option>
        </select>
    </div>
    <div class="form-row mt-3">
        <button type="submit" class="btn btn-primary btn-lg">
            Edit product

        </button>
   
    </div>


</form>
@endsection
@extends('layouts.app')
@section('content')
    <h1> Create a new product</h1>
    <form action="{{ route('products.store') }} " method="POST">
        @csrf
        <div class="form-row">
            <label> Title</label>
            <input class="form-control" type="text" name="title" 
            value="{{old('title')}}" required>
        </div>
        <div class="form-row">
            <label> Description</label>
            <input class="form-control" type="text" name="description" value="{{old('description')}}"    required>
        </div>
        <div class="form-row">
            <label> Price</label>
            <input class="form-control" type="number" name="price" min="1.00" step="0.01" value="{{old('price')}}" required>
        </div>
        <div class="form-row">
            <label> Stock</label>
            <input class="form-control" type="number" name="stock" min="0" value="{{old('stock')}}" required>
        </div>
        <div class="form-row">
            <label> Status</label>
            <select class="custom-select" name="status" required>
                <option  value="" selected>Select... </option>
                <option {{old('status')=='available'?'selected':'' }} value="available">Available </option>
                <option {{old('status')=='unavailable'?'selected':'' }} value="unavailable">Unavailable </option>
            </select>
        </div>
        <div class="form-row mt-3">
            <button type="submit" class="btn btn-primary btn-lg">
                Create product

            </button>
       
        </div>


    </form>
@endsection

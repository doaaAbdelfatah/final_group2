@extends('layouts.admin')
@section('content')
<div class="container">
    {{-- <div class="row  mt-5 mb-5">
        <div class="col-md-5">
        <h5>Product</h5><hr>
        <h5>{{$category->name}}</h5>
        @if ($category->main_category)
            <h5>{{ $category->main_category->name }}</h5> 
        @endif
        <form action="/category/{{$category->id}}" method="POST">
            @csrf
            @method("delete")
            <input type="submit" class="btn btn-sm btn-danger" value="delete">
        </form>
       
        </div>
    </div> --}}
    <div class="card w-md-50 w-75 my-5">
        <h5 class="card-header text-center text-primary"> {{ $product->name }}</h5>
        <div class="card-body">
            <p class="card-text">Quantity: {{ $product->qty }}</p>
            <p class="card-text">Price: {{ $product->qty }} <sup>$</sup></p>
            <p class="card-text">Brand: {{ $brand->name }}</p>
            <p class="card-text">Category: {{ $cat->name }}</p> 
            <a href="#" class="btn btn-primary">Add to cart </a>
        </div>
    </div>
</div>

@endsection
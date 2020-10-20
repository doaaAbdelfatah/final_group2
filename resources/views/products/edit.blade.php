@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row  mt-5 mb-5">
        <div class="col-md-5">
            <h2 class="text-primary">{{$product->name}}</h2>
            <form method="POST" action="/product/{{$product->id}}">
                @csrf
                @method("put")
                <input type="hidden" name="id" value="{{ $product->id }}">
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" class="form-control" value=" {{$product->name}}" placeholder=""
                        aria-describedby="helpid">
                    @error('name')
                    <span class="alert alert-danger my-3"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="qty">quantity</label>
                    <input type="text" name="qty" id="qty" class="form-control" value=" {{$product->qty}}" placeholder=""
                        aria-describedby="helpid">
                    @error('qty')
                    <span class="alert alert-danger my-3"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">price</label>
                    <input type="text" name="price" id="price" class="form-control" value=" {{$product->price}}" placeholder=""
                        aria-describedby="helpid">
                    @error('price')
                    <span class="alert alert-danger my-3"> {{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">category</label>
                    <select class="form-control" name="category_id">
                        @foreach ($categories as $cat)
                            <option value="{{$cat->id}}"
                            @if ($cat->id == $product->category_id)
                               selected 
                            @endif    
                            >{{$cat->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="brand_id">brand</label>
                    <select class="form-control" name="brand_id">
                        <option></option>
                        @foreach ($brands as $brand)
                            <option value="{{$brand->id}}"
                            @if ($brand->id == $product->brand_id)
                               selected 
                            @endif    
                            >{{$brand->name}}</option>
                        @endforeach
                    </select>
                    @error('brand_id')
                    <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>


                <input class="btn btn-primary" type="submit" value="save">
            </form>
        </div>
    </div>

</div>

@endsection
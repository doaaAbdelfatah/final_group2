@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row  mt-5 mb-5">
        <div class="col-md-5">
            <h2>Add New Product</h2>
            <form method="POST" action="/product" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{old("name")}}" placeholder=""
                        aria-describedby="helpId">
                    @error('name')
                    <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{old("price")}}" placeholder=""
                        aria-describedby="helpId">
                    @error('price')
                    <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Quantity</label>
                    <input type="number" name="qty" id="qty" class="form-control" value="{{old("qty")}}" placeholder=""
                        aria-describedby="helpId">
                    @error('qty')
                    <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Category</label>
                    <select class="form-control" name="category_id">                        
                        @foreach (\App\Models\Category::all() as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Brand</label>
                    <select class="form-control" name="brand_id">
                        <option></option>
                        @foreach (\App\Models\Brand::all() as $b)
                            <option value="{{$b->id}}">{{$b->name}}</option>
                        @endforeach
                    </select>
                    @error('brand_id')
                    <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" multiple name="img[]" id="img" class="form-control">
                    @error('img')
                    <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>
                <input class="btn btn-primary" type="submit" value="Save">
            </form>
        </div>
    </div>

</div>

@endsection
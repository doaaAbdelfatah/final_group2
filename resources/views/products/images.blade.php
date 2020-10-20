@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row  mt-5 mb-5">
        <div class="col-md-7">
        <h2>Add New Image to Product {{$product->name}}</h2>
            <form method="POST" action="/product/images/{{$product->id}}" enctype="multipart/form-data">
                @csrf               
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="img" id="img" class="form-control">
                    @error('img')
                    <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Quantity</label>
                    <textarea class="form-control" name="comments">
                        {{old("comments")}}
                    </textarea>
                    @error('comments')
                    <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>

               
                <input class="btn btn-primary" type="submit" value="Save">
            </form>
        </div>
    </div>

</div>

@endsection
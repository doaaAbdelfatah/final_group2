@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row  mt-5 mb-5">
        <div class="col-md-5">
            <h2>Edit Category {{$category->name}}</h2>
            <form method="POST" action="/category/{{$category->id}}">
                @csrf
                @method("put")
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value=" {{$category->name}}" placeholder=""
                        aria-describedby="helpId">
                    @error('name')
                    <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Category</label>
                    <select class="form-control" name="category_id">
                        <option></option>
                        @foreach (\App\Models\Category::all() as $cat)
                            <option value="{{$cat->id}}"
                            @if ($cat->id == $category->category_id)
                               selected 
                            @endif    
                            >{{$cat->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>
                <input class="btn btn-primary" type="submit" value="Save">
            </form>
        </div>
    </div>

</div>

@endsection
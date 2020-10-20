@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row  mt-5 mb-5">
        <div class="col-md-5">
        <h5>Category</h5><hr>
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
    </div>

</div>

@endsection
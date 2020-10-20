@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row  mt-5 mb-5">
        <div class="col-md-5">
        <h5>supplier</h5><hr>
        <h5>{{$supplier->name}}</h5>
        
        <form action="/supplier/{{$supplier->id}}" method="POST">
            @csrf
            @method("delete")
            <input type="submit" class="btn btn-sm btn-danger" value="delete">
        </form>
       
        </div>
    </div>

</div>

@endsection
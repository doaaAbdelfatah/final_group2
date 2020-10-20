@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row  mt-5 mb-5">
        <div class="col-md-5">
            <h2>Edit Category {{$supplier->name}}</h2>
            <form method="POST" action="/supplier/{{$supplier->id}}">
                @csrf
                @method("put")
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value=" {{$supplier->name}}" placeholder=""
                        aria-describedby="helpId">
                    @error('name')
                    <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>
                
                <input class="btn btn-primary" type="submit" value="Save">
            </form>
        </div>
    </div>

</div>

@endsection
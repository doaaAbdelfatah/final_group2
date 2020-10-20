@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row  mt-5 mb-5">
    <div class="col-md-5">
       <h2>Edit Brand</h2>
        @if ($errors->any())
           <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $msg)
                    <li>{{$msg}}</li>                
                @endforeach  
            </ul>
           </div> 
        @endif

    <form method="POST" action="/brand/edit">
        @csrf       
    <input type="hidden" name="id" value="{{$brand->id}}">
    <div class="form-group">
      <label for="">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{$brand->name}}" placeholder="" aria-describedby="helpId">
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
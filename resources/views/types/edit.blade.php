@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row  mt-5 mb-5">
    <div class="col-md-5">
       <h2>Edit Contact Type</h2>
       
    <form method="POST" action="/types/{{$type->id}}">
        @csrf       
        @method("PUT")  
    <div class="form-group">
      <label for="">Name</label>
    <input type="text" name="type" class="form-control" value="{{$type->type}}" placeholder="" aria-describedby="helpId">
      @error('type')
          <span class="text-danger"> {{$message}}</span>
      @enderror
    </div>
    <input class="btn btn-primary" type="submit" value="Save">
</form>
    </div>
</div>

</div>
    
@endsection
@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row  mt-5 mb-5">
        <div class="col-md-5">
            <h2>@lang('messages.Add Supplier')</h2>
            <form method="POST" action="/supplier">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{old("name")}}" placeholder=""
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
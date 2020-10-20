@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row  mt-5 mb-5">
        <div class="col-md-5">
            <h2>Add New Contact</h2>
         
            <form method="POST" action="/contact/{{$type}}/{{$id}}">
                @csrf
                <div class="form-group">
                    <label for="">Contact Value</label>
                    <input type="text" name="contact" id="contact" class="form-control" value="{{old("contact")}}" placeholder=""
                        aria-describedby="helpId">
                    @error('contact')
                    <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Contact Type</label>
                    <select class="form-control" name="contact_type_id">
                        <option></option>
                        @foreach (\App\Models\ContactType::all() as $t)
                            <option value="{{$t->id}}">{{$t->type}}</option>
                        @endforeach
                    </select>
                    @error('contact_type_id')
                    <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div>
                <input class="btn btn-primary" type="submit" value="Save">
            </form>
        </div>
    </div>

</div>

@endsection
@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row  mt-5 mb-5">
    <div class="col-md-5">
       <h2> @lang('messages.Manage Brand') </h2>
        @if ($errors->any())
           <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $msg)
                    <li>{{$msg}}</li>                
                @endforeach  
            </ul>
           </div> 
        @endif

    <form method="POST" action="/brand">
        @csrf       
    <div class="form-group">
      <label for="">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{old("name")}}" placeholder="" aria-describedby="helpId">
      @error('name')
          <span class="text-danger"> {{$message}}</span>
      @enderror
    </div>
    <input class="btn btn-primary" type="submit" value="Save">
</form>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Categories</th>
                    <th>Created At</th>
                    <th>Last Update</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>   
                @forelse ($brands as $brand)
                <tr>
                    <td>{{$brand->name}}</td>
                    <td>
                        <ul>
                       @forelse ($brand->categories->unique() as $cat)
                        <li>{{$cat->name}}</li>
                       @empty
                         <li>No Categories</li>  
                       @endforelse
                    </ul>
                    </td>
                    <td>{{$brand->created_at}}</td>
                    <td>{{$brand->updated_at}}</td>
                    {{-- <th><a class="btn btn-sm btn-danger" href="/brand/delete/{{$brand->id}}">delete</a></th> --}}
                    <td><a class="btn btn-sm btn-success" href="{{route("brands_edit" , ["id"=>$brand->id])}}">edit</a>&nbsp;
                    <a class="btn btn-sm btn-danger" href="{{route("brands_delete" , ["id"=>$brand->id])}}">delete</a></td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">No Brands</td>                   
                </tr>
                @endforelse           
               
            </tbody>
        </table>
    </div>
</div>
</div>
    
@endsection
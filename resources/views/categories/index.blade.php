@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row  mt-5 mb-5">
        <div class="col">
            <h2>All Categories</h2>
            @if (session()->has("error"))
            <small class="text-danger">{{session()->get("error")}}</small>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Sub Categories Count</th>
                        <th>Main Category</th>
                        <th>Brands</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($cats as $cat)
                    <tr>
                        <td><a href="/category/{{$cat->id}}" class="btn-link"> {{$cat->name}}</a></td>
                        <td>{{$cat->sub_categories->count()}}</td>
                        <td>{{($cat->main_category)?$cat->main_category->name:""}}</td>
                        <td>
                            <ul>
                           @forelse ($cat->brands->unique() as $brand)
                            <li>{{$brand->name}}</li>
                           @empty
                             <li>No Brands</li>  
                           @endforelse
                        </ul>
                        </td>
                        <td style="width: 50px"><a class="btn  btn-sm btn-success"
                                href="/category/{{$cat->id}}/edit">edit</a></td>
                        <td style="width: 50px">
                            <form action="/category/{{$cat->id}}" method="POST">
                                @csrf
                                @method("delete")
                                <input type="submit" class="btn btn-sm btn-danger" value="delete">
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">No Categories</td>
                    </tr>
                    @endforelse


                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
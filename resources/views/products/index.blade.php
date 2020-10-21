@extends('layouts.admin')
@section('content')
@if (session()->has('deleted'))
    <div class="container text-center my-3">
        <span class="alert alert-success">{{session()->get('deleted') }}</span>
    </div>
@endif
@if (session()->has('updated'))
    <div class="container text-center my-3">
        <span class="alert alert-success">{{session()->get('updated') }}</span>
    </div>
@endif
<div class="container">
    <div class="row  mt-5 mb-5">
        <div class="col">
            <h2>All Products</h2>
            @if (session()->has("error"))
            <small class="text-danger">{{session()->get("error")}}</small>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quentity</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Seller</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                    <tr>
                        <td><a href="/product/{{$product->id}}" class="btn-link"> {{$product->name}}</a></td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->qty}}</td>
                        <td>{{($product->category)?$product->category->name:""}}</td>
                        <td>{{($product->brand)?$product->brand->name:""}}</td>
                        <th>{{$product->seller->name}}</th>
                        <td style="width: 120px"><a class="btn  btn-sm btn-info"
                            href="/product/images/{{$product->id}}/create">Add Images</a></td>
                        <td style="width: 50px"><a class="btn  btn-sm btn-success"
                                href="/product/{{$product->id}}/edit">edit</a></td>
                        <td style="width: 50px">
                            <form action="/product/{{$product->id}}" method="POST">
                                @csrf
                                @method("delete")
                                <input type="submit" class="btn btn-sm btn-danger" value="delete">
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">No Products</td>
                    </tr>
                    @endforelse


                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
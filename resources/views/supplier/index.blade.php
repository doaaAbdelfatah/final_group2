@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row  mt-5 mb-5">
        <div class="col">
            <h2>All supplier</h2>
            @if (session()->has("error"))
            <small class="text-danger">{{session()->get("error")}}</small>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Contacts</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($supplier as $sup)
                    <tr>
                        <td><a href="/supplier/{{$sup->id}}" class="btn-link"> {{$sup->name}}</a></td>
                        <td>
                            <ul>
                            @forelse ($sup->contacts as $contact)
                        <li>{{$contact->contact_type->type ." : " . $contact->contact}}</li>
                            @empty
                                <li>No Contacts</li>
                            @endforelse
                        </ul>
                        
                        </td>
                        <td style="width: 120px"><a class="btn  btn-sm btn-primary"
                            href="/contact/create/supplier/{{$sup->id}}">Add Contact</a></td>    
                            
                        <td style="width: 50px"><a class="btn  btn-sm btn-success"
                                href="/supplier/{{$sup->id}}/edit">edit</a></td>
                        <td style="width: 50px">
                            <form action="/supplier/{{$sup->id}}" method="POST">
                                @csrf
                                @method("delete")
                                <input type="submit" class="btn btn-sm btn-danger" value="delete">
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">No suppliers</td>
                    </tr>
                    @endforelse


                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
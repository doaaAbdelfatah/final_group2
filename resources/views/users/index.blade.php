@extends('layouts.admin')
@section('content')
<div class="container">

    <div class="row mt-5">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Contacts</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $u)
                    <tr>
                        <th>{{$u->name}}</th>
                        <th>{{$u->email}}</th>
                        <th>{{$u->role}}</th>
                        <td style="width: 120px"><a class="btn  btn-sm btn-primary"
                                href="/contact/create/user/{{$u->id}}">Add Contact</a></td>


                        <td>
                            <ul>
                                @forelse ($u->contacts as $contact)
                                <li>{{$contact->contact_type->type ." : " . $contact->contact}}</li>
                                @empty
                                <li>No Contacts</li>
                                @endforelse
                            </ul>

                        </td>
                        <th>&nbsp;</th>
                    </tr>
                    @empty
                    <tr>
                        <th colspan="2">No Users</th>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
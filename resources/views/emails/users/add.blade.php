@component('mail::message')
# Welcome {{$user->name}} to Our Team

we hope to enjoy with us.<br>
you registerd as {{$user->role}} using email: {{$user->email}}<br>
and your passowrd : {{$pw}}<br>
please check your accoun<br>

@component('mail::button', ['url' => config('app.url')."/login"])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

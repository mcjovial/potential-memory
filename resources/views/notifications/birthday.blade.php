@component('mail::message')
# Hello {{ $user->name }}

This is to wish you a happy birthday
@component('mail::button', ['url' => ''])
Hurray!!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

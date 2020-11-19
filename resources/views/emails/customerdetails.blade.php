@component('mail::message')
# Hello From Omar Abdelfatah

<h3>
    Customer Details
</h3>

<h4>id : {{$customer->id}}</h4>
<h4>name : {{$customer->name}}</h4>
<h4>age : {{$customer->age}}</h4>

Thanks,<br>
{{ config('app.name') }}
@endcomponent

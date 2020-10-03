@component('mail::message')
# Hi {{ $passanger->firstName}}


Thanks so much for registering!

@component('mail::button', ['url' => URL::to('/passanger/login')])
Login
@endcomponent

@component('mail::panel', ['url' => ''])
Customer service is our first priority
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

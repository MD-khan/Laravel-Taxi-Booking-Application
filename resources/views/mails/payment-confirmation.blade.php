@component('mail::message')
# Your Payment has been recieved

@component('mail::button', ['url' => '#'])
Here is you booking details
@endcomponent

@component('mail::panel', ['url' => ''])
<ul> 
<li> Pick up : {{ $pickupAddress }}  </li>
<li> Dropp Off : {{ $dropoffAddress }} </li>
<li> Date : {{ $date }} </li>
<li> Time : {{ $time }} </li>
<li> Car : {{ $car }} </li>
<li> Distance : {{ $distance }} </li>
<li> Fare: ${{ $fare }} </li>
</ul>
@endcomponent

Thank you so much for riding with us,<br>

{{ config('app.name') }}
@endcomponent

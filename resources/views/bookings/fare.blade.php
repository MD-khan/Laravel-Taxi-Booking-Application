@extends('layout')

@section('content')
<div class="container">
	
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
    	<div class="panel panel-primary">
			  <div class="panel-heading">
			    <h3 class="panel-title"> Booking Details</h3>
			  </div>
	  		<div class="panel-body">
	  			<?php //var_dump($test) ?>
	    		<ul class="list-group">
				@foreach ( $bookings as $booking )
					<li class="list-group-item">Pickup Address:
						<label> {{ $booking['pickUpAddress'] }} </label>
					</li>
					<li class="list-group-item"> Drop Off Address:
					<label> {{ $booking['dropOffAddress'] }} </label> 
					</li>
				<li class="list-group-item"> Distance: <label> {{ $booking['distance'] }}</label> </li>
					<li class="list-group-item"> Duration: <label> {{ $booking['duration'] }} 
					</label> </li>
					<li class="list-group-item"> Your Car: <label> {{ $booking['carType'] }}  </label></li>
					<li class="list-group-item"> Fare: <label> $ {{ $booking['fare'] }} </label> </li>
					<li class="list-group-item"> Date: <label>{{ $booking['date'] }}</label> </li>
					<li class="list-group-item">Time: <label> {{ $booking['time'] }} </label> </li>
				@endforeach
				</ul>
	  		</div>
	  		<div class="panel-footer">
	  			<a href="/checkout" class="btn btn-primary"> Looks Good! Continue </a>
	  			<a href="/" class="btn btn-primary pull-right"> Edit </a>

	  		</div>
		</div>
 	</div>
</div>
</div>
@endsection
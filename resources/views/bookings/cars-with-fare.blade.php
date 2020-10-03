@extends('layouts/master')

@section('content')
 <div class="row">
 		<div class="col-md-8"> 
 			<div class="panel panel-default"> 
 				<div class="panel-heading"> <h4> Economy Sedan </h4>  </div>
 				 <div class="panel-body">
 				 	<div class="row">
 				 		<div class="col-md-4">
 				 			<img class="img-responsive" src="{{ asset('img/sedan.jpg') }}">
 				 		 </div>
 				 		<div class="col-md-4">
 				 		2-Passenger Sedan for up-to 2-Passenger with Maximum 2/3 (TWO/THREE) Luggages | Economic & Spacious car.
 				 		 </div>
 				 		<div class="col-md-4">
 				 		<form action="/car/booknow" method="POST">
 				 			 {{ csrf_field() }}
 				 			 <span> <strong> Fare: ${{ $sedanFare}}  </strong>  </span> 
 				 			<input type="hidden" name="fare" value="{{$sedanFare}}">
 				 			<input type="hidden" name="car" value="Sedan">
 				 			<button type="submit" class="btn btn-success">
               						Book Now
          					</button>
 				 		</form>
 				 		  </div>
 				 	 </div>
 				 </div>
 			</div>


 			<div class="panel panel-default"> 
 				<div class="panel-heading"> <h4> Corporate Sedan </h4>  </div>
 				 <div class="panel-body">
 				 	<div class="row">
 				 		<div class="col-md-4">
 				 			<img class="img-responsive" src="{{ asset('img/sedan.jpg') }}">
 				 		 </div>
 				 		<div class="col-md-4">
 				 		2-Passenger Sedan for up-to 2-Passenger with Maximum 2/3 (TWO/THREE) Luggages.
 				 		 </div>
 				 		<div class="col-md-4">
 				 			<form action="/car/booknow" method="POST">
 				 			 {{ csrf_field() }}
 				 			 <span> <strong> Fare: ${{ $corporateSedanFare}}  </strong>  </span> 
 				 			<input type="hidden" name="fare" value="{{$corporateSedanFare}}">
 				 			<input type="hidden" name="car" value="Corporate Sedan">
 				 			<button type="submit" class="btn btn-success">
               						Book Now
          					</button>
 				 		</form>
 				 		  </div>
 				 	 </div>
 				 </div>
 			</div>


 			<div class="panel panel-default"> 
 				<div class="panel-heading"> <h4> Minivan </h4>  </div>
 				 <div class="panel-body">
 				 	<div class="row">
 				 		<div class="col-md-4">
 				 			<img class="img-responsive" src="{{ asset('img/sedan.jpg') }}">
 				 		 </div>
 				 		<div class="col-md-4">
 				 		4-Passenger Minivan for up-to 4-Passenger with Maximum 4 Luggages. 
 				 		 </div>
 				 		<div class="col-md-4">
 				 			<form action="/car/booknow" method="POST">
 				 			 {{ csrf_field() }}
 				 			 <span> <strong> Fare: ${{ $miniVanFare}}  </strong>  </span> 
 				 			<input type="hidden" name="fare" value="{{$miniVanFare}}">
 				 			<input type="hidden" name="car" value="Mini Van">
 				 			<button type="submit" class="btn btn-success">
               						Book Now
          					</button>
 				 		</form>
 				

 				 		  </div>
 				 	 </div>
 				 </div>
 			</div>

 			<div class="panel panel-default"> 
 				<div class="panel-heading"> <h4> SUV Full </h4>  </div>
 				 <div class="panel-body">
 				 	<div class="row">
 				 		<div class="col-md-4">
 				 			<img class="img-responsive" src="{{ asset('img/sedan.jpg') }}">
 				 		 </div>
 				 		<div class="col-md-4">
 				 		6-Passenger SUV for up-to 6-Passenger with Maximum 6 Luggages. 
 				 		 </div>
 				 		<div class="col-md-4">
 				 			<form action="/car/booknow" method="POST">
 				 			 {{ csrf_field() }}
 				 			 <span> <strong> Fare: ${{ $suvFare}}  </strong>  </span> 
 				 			<input type="hidden" name="fare" value="{{$suvFare}}">
 				 			<input type="hidden" name="car" value="SUV">
 				 			<button type="submit" class="btn btn-success">
               						Book Now
          					</button>
 				 		</form>
 				 		  </div>
 				 	 </div>
 				 </div>
 			</div>



 		</div> <!-- 8 -->


 		<div class="col-md-4"> 
 			<div class="panel panel-default"> 
 				<div class="panel-heading"> <h4> Booking Details </h4>  </div>
 				 <div class="panel-body">
 				 		<div class="row"> 
 				 		@foreach ( $bookings as $booking )
 				 		<div class="col-md-5"> 
 				 		Pick-up Address:
 				 		</div>
 				 		<div class="col-md-7">
 				 			{{ $booking['pickUpAddress'] }} 
 				 		</div>

 				 		<div class="col-md-5"> 
 				 		Drop-off Address:
 				 		</div>
 				 		<div class="col-md-7">
 				 			{{ $booking['dropOffAddress'] }} 
 				 		</div>

 				 		<div class="col-md-5"> 
 				 		Date and Time:
 				 		</div>
 				 		<div class="col-md-7">
 				 			{{ $booking['date'] }} <span> {{ $booking['time'] }} </span>
 				 		</div>

 				 		<div class="col-md-5"> 
 				 		Distance:
 				 		</div>
 				 		<div class="col-md-7">
 				 			{{ $booking['distance'] }} 
 				 		</div>

 				 			@endforeach
 				 	 </div>
 				 
 				 	
 				 </div>
 			</div>
 		 </div>
   </div>
@endsection
@section('footer')
<!-- Footer -->
  @include('layouts.footer-contents')
@endsection
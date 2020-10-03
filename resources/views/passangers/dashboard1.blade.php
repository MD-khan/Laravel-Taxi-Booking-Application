@extends('layout')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="container">
 <div class="row">
<div class="col-md-8">
	<div class="panel panel-primary">
		<div class="panel-heading">All Booking </div>
		<div class="panel-body">
		<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>PickUp</th>
                <th>Drop Off</th>
                <th>Service</th>
                <th>Car</th>
                <th>Date</th>
                <th>Fare</th>
            </tr>
        </thead>
        <tbody>
        	@foreach ($bookings as $booking)
        		<tr>
                <td> {{$booking->pickUpAddress}} </td>
                <td> {{$booking->dropOffAddress}} </td>
                <td> {{$booking->service}} </td>
                <td> {{$booking->car}} </td>
                <td> {{$booking->date}} ,Time- {{$booking->time}} </td>
                <td> ${{$booking->fare}} </td>
            </tr>
        	@endforeach
        </tbody>

        <tfoot>
            <tr>
                <th>PickUp</th>
                <th>Drop Off</th>
                <th>Service</th>
                <th>Car</th>
                <th>date</th>
                <th>Fare</th>
            </tr>
        </tfoot>
    </table>
	</div>
	</div>
</div> 

<div class="col-md-4"> 
	<div class="panel panel-primary">
		<div class="panel-heading">Latest Booking </div>
		<div class="panel-body">
		<p> <strong> Pickup:  </strong>{{$last_booking->pickUpAddress}} </p>
		<p> <strong> Drop off: </strong> {{$last_booking->dropOffAddress}} </p>
		<p> <strong> Date: </strong>  {{$last_booking->date}}, {{$last_booking->time}}  </p>
		<p> <strong>Car: </strong>  {{$last_booking->car}} </p>
		<p> <strong> Service: </strong>  {{$last_booking->service}} </p>
		<p><strong>Fare : </strong>  ${{$last_booking->fare}} </p>
		
	</div>
	</div>
</div>

<h1> 
	Hello {{Auth::guard('passanger')->user()->email}}
@if(Auth::guard('passanger')->check())
    Hello {{Auth::guard('')->user()->lastName}}
@elseif(Auth::guard('user')->check())
    hi {{Auth::guard('user')->user()->name}}
@endif
</h1>
</div>
</div>
</div>
@endsection

 @section('script')
 <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
 <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script> 
  	$(document).ready(function() {
    $('#example').DataTable();
} );
  </script>

 @endsection
@extends('layouts/master')

@section('content')
<div class="container page">
<!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Select a Car 
        <small>Pricing</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/">Home</a>
        </li>
        <li class="breadcrumb-item active">Pricing</li>
      </ol>

      <div class="card">
  		<div class="card-header">Booking Details:  </div>
  		<div class="card-body">
    		<p class="card-text">
    		<strong> <i class="fas fa-map-marker-alt"></i>Pickup:  </strong>	
    		 {{ $bookings[0]['pickUpAddress'] }}. 
    		<strong> <i class="fas fa-map-marker"></i>Drop-off:  </strong>	
    			{{ $bookings[0]['dropOffAddress'] }}. 
    		<strong> <i class="far fa-clock"></i>Date:  </strong>
    			{{ $bookings[0]['date'] }} {{ $bookings[0]['time'] }}. 
    		</p>
    		<a href="/" class="btn btn-warning"> Edit  </a>
  		</div>
		</div>
		<br>

      <!-- Content Row -->
      <div class="row">
        <div class="col-lg-3 mb-3">
          <div class="card h-100">
            <h3 class="card-header">Economy Sedan</h3>
            <img class="card-img-top" src="{{ asset('img/economy_sedan.jpg') }}" 
                  alt="Boston Logan Airport Car Service">
            <div class="card-body">
              <div class="display-4">${{ $sedanFare }}</div>
              <div class="font-italic"> (tax, toll included) </div>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><i class="fas fa-car"></i> 2-Passenger Sedan </li>
              <li class="list-group-item"> <i class="fas fa-user-friends">
              </i> Up-to 2-Passenger </li>
              <li class="list-group-item"><i class="fas fa-suitcase">
              </i> Maximum 2/3 (TWO/THREE) Luggages. </li>
              <li class="list-group-item">
              
                <form action="/car/booknow"" method="POST">
                  {{ csrf_field() }}
   				 		    <input type="hidden" name="car" value="Sedan">
                  <input type="hidden" name="fare" value="{{$sedanFare}}">
   				 		    <button type="submit" class="btn btn-success">
                      Book Now
            		  </button>
 				        </form>

              </li>
            </ul>
          </div>
        </div>

        <div class="col-lg-3 mb-3">
          <div class="card h-100">
            <h3 class="card-header"> Corporate Sedan </h3>
            <img class="card-img-top" src="{{ asset('img/corporate_sedan.jpg') }}"
             alt="Boston Logan Airport Car Service">
            <div class="card-body">
              <div class="display-4">${{$corporateSedanFare}}</div>
              <div class="font-italic"> (tax, toll included) </div>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><i class="fas fa-car"></i> 2-Passenger Sedan </li>
              <li class="list-group-item"> <i class="fas fa-user-friends">
              </i> Up-to 2-Passenger </li>
              <li class="list-group-item"><i class="fas fa-suitcase">
              </i> Maximum 2/3 (TWO/THREE) Luggages. </li>
              <li class="list-group-item">
              	 <form action="/car/booknow"" method="POST">
 				 	         {{ csrf_field() }}
     				 		    <input type="hidden" name="fare" value="{{$corporateSedanFare}}">
                    <input type="hidden" name="car" value="Corporate Sedan">
     				 		    <button type="submit" class="btn btn-success">
                   			Book Now
              				</button>
 				           </form>
              </li>
            </ul>
          </div>
        </div>

        <div class="col-lg-3 mb-3">
          <div class="card h-100">
            <h3 class="card-header"> Minivan </h3>
            <img class="card-img-top" src="{{ asset('img/mini_van.png') }}" alt="Boston Logan Airport Car Service">
            <div class="card-body">
              <div class="display-4">${{ $miniVanFare }}</div>
              <div class="font-italic">(tax, toll included)</div>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><i class="fas fa-car"></i> 4-Passenger Minivan </li>
              <li class="list-group-item"> <i class="fas fa-user-friends">
              </i> Up-to 4-Passenger </li>
              <li class="list-group-item"><i class="fas fa-suitcase">
              </i> Maximum 4 Luggages. </li>
              <li class="list-group-item">
              	<form action="/car/booknow"" method="POST">
 				 	         {{ csrf_field() }}
 				 		      <input type="hidden" name="fare" value="{{$miniVanFare}}">
                  <input type="hidden" name="car" value="Mini Van">
 				 		      <button type="submit" class="btn btn-success">
               			  Book Now
          				</button>
 				 </form>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 mb-3">
          <div class="card h-100">
            <h3 class="card-header"> SUV Full </h3>
            <img class="card-img-top" src="{{ asset('img/sub_full.png') }}" alt="Boston Logan Airport Car Service">
            <div class="card-body">
              <div class="display-4">${{ $suvFare }}</div>
              <div class="font-italic">(tax, toll included)</div>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><i class="fas fa-car"></i> 6-Passenger SUV  </li>
              <li class="list-group-item"> <i class="fas fa-user-friends">
              </i> Up-to 6-Passenger </li>
              <li class="list-group-item"><i class="fas fa-suitcase">
              </i> Maximum 6 Luggages. </li>
              <li class="list-group-item">
                <form action="/car/booknow" method="POST">
 				 	        {{ csrf_field() }}
     				 		    <input type="hidden" name="fare" value="{{$suvFare}}">
                    <input type="hidden" name="car" value="SUV">
 				 		      <button type="submit" class="btn btn-success">
               			Book Now
          				</button>
 				 </form>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- /.row -->
   </div> <!-- ./Container -->
  @endsection
@section('footer')
<!-- Footer -->
  @include('layouts.footer-contents')
@endsection
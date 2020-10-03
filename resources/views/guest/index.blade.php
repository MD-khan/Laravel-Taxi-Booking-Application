@extends('layout')

@section('content')
<div class="container">
  <div class="row"> 
    <div class="col-md-8"> 
      <div class="panel panel-primary">
        <div class="panel-heading"> Checkout </div>
          <div class="panel-body">
    <form action="/checkout" method="POST" id="payment-form">
       {{ csrf_field() }}
        <div class="row">
          <div class="col-sm-6"> 
          <div class="form-group">
            <label for="First Name">First Name:</label>
            <input type="text" name="firstName" id="firstName" class="form-control"
            value="{{Auth::guard('passanger')->check() ? Auth::guard('passanger')->user()->firstName : '' }}">
          </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label for="lastName">Last Name:</label>
              <input type="text" name="lastName" id="lastName" class="form-control" 
                value="{{Auth::guard('passanger')->check() ? Auth::guard('passanger')->user()->lastName : '' }}">
            </div>
           </div>
       </div>

       <div class="form-group">
          <label for="email">Email Address:</label>
          <input type="Email" name="email" id="email" class="form-control"
          value="{{Auth::guard('passanger')->check() ? Auth::guard('passanger')->user()->email : '' }}">
      </div>

      <div class="form-group">
          <label for="phone">Phone:</label>
          <input type="text" name="phone" id="phone" class="form-control">
      </div>

      <div class="form-group">
        <label for="card-element"> Card: </label>
        <div id="card-element" class="form-control">
          <!-- a Stripe Element will be inserted here. -->
        </div>
      </div>
      <div id="card-errors" role="alert"></div>

      <div class="form-group"> 
        <label class="radio-inline control-label"> 
          <input type="radio" name="amount" value="payFull" checked="checked"> 
            <span class="label label-success">
              Pay full Amount Of $  {{$fare}}
           </span>
        </label>
        <label class="radio-inline control-label"> 
          <input type="radio" name="amount" value="payBooking"> 
            <span class="label label-warning">Pay Only Booking Fee $1 Now</span> 
        </label>
      </div>

       <div class="form-group">
        <input type="hidden" name="fare" value="{{$fare}}">
          <button type="submit" class="btn btn-success">
               Chekout
          </button>
        </div>

    </form>
  </div>
</div>

</div>

    <div class="col-md-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"> Booking Details</h3>
        </div>
        <div class="panel-body">
          <ul class="list-group">
        <li class="list-group-item">Pickup Address:
            <label> {{ $bookingInfo[0]['pickUpAddress'] }} </label>
          </li>
          <li class="list-group-item"> Drop Off Address:
          <label> {{ $bookingInfo[0]['dropOffAddress'] }} </label> 
          </li>
          <li class="list-group-item"> Fare: <label> $ {{ $fare }} </label> </li>
          <li class="list-group-item"> Date: <label>{{ $bookingInfo[0]['date'] }}</label> </li>
          <li class="list-group-item">Time: <label> {{ $bookingInfo[0]['time'] }} </label> </li>
          </label> </li>
          <li class="list-group-item"> Your Car: <label>{{ $bookingInfo[1]['car'] }}   </label></li>
        </ul>
        </div>
    </div>
  </div>
</div>

</div>

</div>
  </div>

</div>

@endsection  

@section('script')
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript" src="/js/checkout.js"></script>
@endsection

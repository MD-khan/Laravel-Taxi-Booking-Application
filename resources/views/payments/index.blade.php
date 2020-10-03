@extends('layouts/master')

@section('content')
<div class="container page"> 
<h1 class="mt-4 mb-3">Payment </h1>
        
     <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/">Home/Car</a>
        </li>
        <li class="breadcrumb-item active">Payment</li>
      </ol>
      
      
     @if( ! Auth::guard('passanger')->check())
     <div class="row"> 
     	 <div class=" mx-auto col-sm-7"> 
     	 	<div class="card"> 
     	 		 <div class="card-body">
     	 		 	<p class="card-text">
        				We recomend you to <a class="btn btn-warning" href="/passanger/login">sign in </a> and pay. Don't worry! If you don't want to, you can check out as guest.
        			</p>
     	 		  </div>
     	 	</div>
     	 </div>
     </div>
     @endif
      <br>
    <div class="row">
        <div class="mx-auto col-sm-7">
                    <!-- form user info -->
                    <div class="card">
                        <div class="card-header  bg-dark text-white">
                            <h4 class="mb-0"> Guest Check out</h4>
                        </div>
                        <div class="card-body">
                            <form action="/guest/checkout" method="POST"
                            	 id="payment-form" autocomplete="off">
                            	 {{ csrf_field() }}
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">First name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control form-control-sm" type="text" name="firstName" id="firstName" value="{{Auth::guard('passanger')->check() ? Auth::guard('passanger')->user()->firstName : '' }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">
                                    	Last name
                                	</label>
                                    <div class="col-lg-9">
                                        <input class="form-control form-control-sm" type="text" 
                                        name="lastName" 
                                        id="lastName" value="{{Auth::guard('passanger')->check() ? Auth::guard('passanger')->user()->lastName : '' }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                    <div class="col-lg-9">
                                        <input name="email" id="email" class="form-control form-control-sm" type="email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"> 
                                    	Phone
                                    </label>
                                    <div class="col-lg-9">
                                        <input name="phone" id="phone" class="form-control form-control-sm" 
                                        type="text">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"> 
                                    	Pay Full 
                                    </label>
                                    <div class="col-lg-9">
                                    	<input type="radio" name="amount" value="payFull" 
                                    	checked="checked"> 
                                    	<span class="label">Pay full Amount Of ${{$fare}}  </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"> 
                                    	Booking Fee 
                                    </label>
                                    <div class="col-lg-9">
                                    	<input type="radio" name="amount" value="payBooking"> 
                                    	<span class="label">Pay Booking fee $1.00  </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Credit Card
                                    </label>
                                    <div class="col-lg-9">
                                        <div id="card-element" class="form-control">
          									<!-- a Stripe Element will be inserted here. -->
       									 </div>
                                    </div>
                                </div>                            
                        </div> <!-- --card body -->
                        <div class="card-footer">
                            <div class="form-group">
        						      <input type="hidden" name="fare" value="{{$fare}}">
          							<button type="submit" class="btn btn-success">
               							Pay Now
          							</button>
        					</div>
  						</div>
  					</form>
                    </div>
                    <!-- /form user info -->
        </div>
    </div>
</div>
@endsection
 
 @section('footer')
<!-- Footer -->
  @include('layouts.footer-contents')
@endsection

@section('script')
<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript" src="/js/checkout.js"></script>
@endsection

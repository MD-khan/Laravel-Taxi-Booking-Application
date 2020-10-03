<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe\Stripe;
use App\Mail\PaymentConfirmation;
use App\Mail\Driver;
use App\Passanger;
use App\Booking;
use DateTime;
use Illuminate\Support\Facades\Input;

class PaymentsContoller extends Controller
{ 
  
    public function index()
    {
        $car  = Input::get('car');
        //$fare = Input::get('fare');
        $fare = Session::get('fare');
        //decrypt($fare);
       return view('payments.index', compact('car', 'fare') );
    }


    public function create( Request $request )
    {
      // IMPORTATN : MUST CHECK THE FARE . ITS NOT SECURE NOW
      
      // Adding car name into the existing session
      $request->session()
              ->push('bookings',[ 
                'car' => $request->car
                ]);
      $booking = Session::get('bookings');
       //dd($booking[0]['date']);
      return view('payments.index')
              ->with([
                'fare' => $request->fare,
                'bookingInfo' => $booking 
              ]);  
  
    }

    public function checkout( Request $request )
    {
      //dd($request->all());
    /*
    
    	if (!Session::has('bookings')) {
    			$booking = Session::get('bookings');
    			return view('unauthorizes.index');
		}
     */  
      $booking = Session::get('bookings');
      $amount = 100;
     if($request->amount == 'payFull') {
        $amount =  100;
      }
    Stripe::setApiKey(config('services.stripe.secret'));
		try {
       /// Create a Customer: 
    $customer = \Stripe\Customer::create(array(
      "email" =>  $request->email,
      "source" => $request->input('stripeToken'),
      "metadata" => array(
                    "First Name" => $request->firstName, 
                    "Last Name" => $request->lastName,
                    "Phone" => $request->phone
                  )
        ));
    
		$charge = 	\Stripe\Charge::create(array(
        "customer" => $customer->id,
  			"amount" => $amount,
  			"currency" => "usd",
  			"description" => "Test Charge"
		));
    
    // Update user
    // assume user  is loged in, so that update his stripe id
      \Auth::guard('passanger')->user()->update([
        'stripe_id' => $customer->id,
     ]);

      
      \Mail::to($customer)->send(new PaymentConfirmation );
      \Mail::to("md.monir.khan707@gmail.com")->send(new Driver );
  
  
		} catch (\Exception $e) {
			return back()->with('error', $e->getMessage());
		}

      $request->session()->forget('bookings');
    // create payment 
      return redirect('/payment/thanks');

    }

    public function thanks()
    {
      return view('payments.thanks');
    }

    public function errors( Request $request)
    {
      $data = $request->all();
      return view('payments.errors', compact('data')); 
    }
}

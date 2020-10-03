<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Session;
use App\Passanger;
use App\Guest;
use App\Mail\DriverReceipt;
use App\Mail\PassangerReceipt;


class GuestController extends Controller {

public function checkout(Request $request)
{
  if (! Session::has('bookings')) { 
    return redirect("/");
  }
  $bookings = Session::get('bookings');
  $booking_info = array_merge($request->all(), $bookings);
  $request->session()->put('booking_info', $booking_info);
  
  if (Session::has('fares')) {
    $fares = Session::get('fares');
  }
    //dd($booking_info);
  $amount = 100;
  $paid_full = false;
  if($request->amount == 'payFull') {
    $amount = 100 * $request->fare;
    $paid_full = true;
  }

Stripe::setApiKey(config('services.stripe.secret'));
$token = $request->stripeToken;
try {
// Charging the passanger 
$charge = \Stripe\Charge::create([
  'source' => $token,
  'amount' => $amount,
  'currency' => 'usd',
  'description' => "Service Name: ".$booking_info[0]['ServiceType']
                  .",  Name: ".$request->firstName
                  .",  Email: ".$request->email
                  .",  Phone: ".$request->phone
                  .",  Pick up: ".$booking_info[0]['pickUpAddress'] ." "
                  .",  Drop Off: ".$booking_info[0]['dropOffAddress']
                  .",  Distance: ".$booking_info[0]['distance']
                  .",  Date:  ".$booking_info[0]['date']
                  .",  Time: ".$booking_info[0]['time']
                  .",  FlightInfo: ".$booking_info[0]['flightInfo']
                  .", Car: ".$booking_info[1]['car'],
  'receipt_email' => $request->email,
]);

// Save to data base
} catch (\Stripe\Error\Card $e) {
    $request->session()->forget('bookings');
    $request->session()->forget('booking_info');
    return redirect()->action('PaymentsContoller@errors', ['error' => $e->getMessage()]);
}
\Mail::to($request->email)->send(new PassangerReceipt );
\Mail::to("bostoneconomycar@gmail.com")->send(new DriverReceipt );

//Save to Database
$guest = new Guest;
$guest->firstName = $request->firstName;
$guest->lastName = $request->lastName;
$guest->email = $request->email;
$guest->phone = $request->phone;
$guest->pickUpAddress = $bookings[0]['pickUpAddress'];
$guest->dropOffAddress= $bookings[0]['dropOffAddress'];
$guest->distance= $bookings[0]['distance'];
$guest->date = $bookings[0]['date'];
$guest->time = $bookings[0]['time'];
$guest->riderMessage = $bookings[0]['riderMessage'];
$guest->flight = isset($bookings[0]['flightInfo'])  ? $bookings[0]['flightInfo'] : "No flight";
$guest->car = $bookings[1]['car'];
$guest->service = $booking_info[0]['ServiceType'];
$guest->duration = $bookings[0]['duration'];
$guest->fare = $request->fare;
$guest->fullPaid = $paid_full;
$guest->save();

//Delete all the sessions
$request->session()->forget('bookings');
$request->session()->forget('booking_info');
return redirect('/payment/thanks');
    
    }
}

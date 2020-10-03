<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Session;
use App\Passanger;
use App\Booking;
use App\Mail\DriverReceipt;
use App\Mail\PassangerReceipt;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {
        /*
        if (Session::has('bookings')) {
                $bookings = Session::get('bookings');
        }
        */
       // \Mail::to("md.monir.khan707@gmail.com")->send(new Driver);
       //$data = $request->session()->all();
       /// dd($data);
        $bookings = Session::get('bookings');
        $booking_info = array_merge($request->all(), $bookings);
        //$id = \Auth::user()->id;
       // $user = \Auth::user();
       // \Auth::guard('passanger')->user()->id
       $request->session()->put('booking_info', $booking_info);
       // dd($booking_info);
        if (Session::has('fares')) {
                $fares = Session::get('fares');
        }
       // dd($fares);
        // Making sure fare is not manipulated from the UI 
        if ( !in_array($request->fare, $fares) ) {
               return response("Kidding! Fare is not $request->fare fair  !.", 401);
               //abort(500, 'Kidding! Fare is not fair !');
                //return redirect('booknow')->with('status', 'Profile updated!');
            } 
           
        $amount = 100;
        $paid_full = false;
        if($request->amount == 'payFull') {
            $amount = 100 * $request->fare;
            $paid_full = true;
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

        $charge =   \Stripe\Charge::create(array(
        "customer" => $customer->id,
            "amount" => $amount,
            "currency" => "usd",
            "description" => "Test Charge"
        )); 
    // Update user
    // assume user  is loged in, so that update his stripe id
      \Auth::guard('passanger')
            ->user()
            ->update(['stripe_id' => $customer->id,]
            );
       
        //Store in Database 
        $booking = new Booking;
        $booking->passanger_id = \Auth::guard('passanger')->user()->id;
        $booking->pickUpAddress = $bookings[0]['pickUpAddress'];
        $booking->dropOffAddress= $bookings[0]['dropOffAddress'];
        $booking->distance= $bookings[0]['distance'];
        $booking->date = $bookings[0]['date'];
        $booking->time = $bookings[0]['time'];
        $booking->riderMessage = $bookings[0]['riderMessage'];
        $booking->flight = $bookings[0]['flightInfo']; 
        $booking->phone = $request->phone; 
        $booking->car = $bookings[1]['car'];
        $booking->service = $booking_info[0]['ServiceType'];
        $booking->fare = $request->fare;
        $booking->fullPaid = $paid_full;
        $booking->duration = $bookings[0]['duration'];
        $booking->save();
        
        //storing into session
        //session()->push('bookings', $request->phone);
            //$data = $request->session()->all();
           //dd($data);
            dd($booking_info);
        \Mail::to($request->email)->send(new PassangerReceipt );
        \Mail::to("omarfsami@gmail.com")->send(new DriverReceipt );
      
       $request->session()->forget('bookings');
       $request->session()->forget('booking_info');
       
      } catch ( \Exception $e ) {
          return back()->with('error', $e->getMessage());
      }

       return redirect('/payment/thanks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

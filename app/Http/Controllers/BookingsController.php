<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Utilities\BookingHours;
use App\Airport;
use App\Booking;
use App\GoogleDistanceMatrix;

class BookingsController extends Controller
{
    public $booking_details = array();
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // show pick up time with the 15 minitue   
        $hours = new BookingHours();
        $ranges = $hours->get_hours_range( 0, 86400, 60 * 15 );
        return view('bookings.index', compact('ranges'));
    }

    public function getQuote()
    {
        // show pick up time with the 15 minitue   
        $hours = new BookingHours();
        $ranges = $hours->get_hours_range( 0, 86400, 60 * 15 );
        return view('bookings.quote', compact('ranges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function selectCar()
    {
        $fare = array(
                'sedanFare'             => 2011,
                'corporateSedanFare'    =>30,
                'miniVanFare'           =>40,
                'suvFare'               =>50
                );

        $bookings = array(
                    'sedanFare'             => 2011,
                    'corporateSedanFare'    =>30,
                    'miniVanFare'           =>40,
                    'suvFare'               =>50
                );
        return view('bookings.select_car', compact('fare') );
    }
    /*
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
    }
/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function selectCar(Request $request)
    {

            $origin ="";
            $destination = "";
            $unit ="imperial"; //imperial = mile, metric = km
        // Check service type is selected 
        if( $request->ServiceType == "") {
            $this->validate(request(),['ServiceType' => 'required']);
        }
        $service = $request->ServiceType;
        // There are five types of car 
        if( $service == "from_airport") {
           $this->validate(request(), [
                'picupDate' => 'required',
                'pickup_from_airport' => 'required',
                'drop_off_from_airport' => 'required',
                'pickupTime' => 'required'
            ]); 
            $booking = new Booking();
            $origin = $request->pickup_from_airport;
            //$origin = $airport->getAirportAddressFrom($request->pickAddress);
            $origin = str_replace(' ','+',$origin);
            $destination = str_replace(' ','+',$request->drop_off_from_airport);
            $google = new GoogleDistanceMatrix($origin, $destination, $unit);
            //dd($google);
            $this->booking_details = array([ 
            'pickUpAddress' => $request->pickup_from_airport,
            'dropOffAddress' => $request->drop_off_from_airport,
            'flightInfo' => $request->flightInfo_from,
            'distance'  =>  $google->distanceInText(),
            'duration' => $google->timeInText(),
            'date' => $request->picupDate,
            'time'  => $request->pickupTime,
            'riderMessage' =>$request->message,
            'ServiceType' => "From Airport"
        ]);
        \Session::put('bookings', $this->booking_details);
        //dd($this->booking_details);
        // Airport pickup fee
        $airportDropoffFee = 20.00;
        $sedanFare = $booking->sedanCarFare($google->distanceInMeter()) + $airportDropoffFee  ;
        $corporateSedanFare = $booking->corporateSedanFare($google->distanceInMeter()) + $airportDropoffFee;
        $miniVanFare = $booking->minivanFare($google->distanceInMeter()) + $airportDropoffFee ;
        $suvFare = $booking->suvFare($google->distanceInMeter()) + $airportDropoffFee;
        
        // Put fare 
        $fares = array(
                'sedanFare'             => $sedanFare,
                'corporateSedanFare'    =>$corporateSedanFare,
                'miniVanFare'           =>$miniVanFare,
                'suvFare'               =>$suvFare
        );
        
        \Session::put('fares', $fares );

         return view('bookings.select_car')
                ->with(['bookings' => $this->booking_details, 
                        'sedanFare' => $sedanFare,
                        'corporateSedanFare' => $corporateSedanFare,
                        'miniVanFare' => $miniVanFare,
                        'suvFare' => $suvFare
                ]);
        }// from airport

        if( $service == "to_airport") {
           
           $this->validate(request(), [
                'drop_off_to_airport' => 'required',
                'pick_up_to_airport' => 'required',
                'picupDate' => 'required',
                'pickupTime' => 'required',
            ]); 
            $booking = new Booking();
            $origin = $request->pick_up_to_airport;
            //$origin = $airport->getAirportAddressFrom($request->pickAddress);
            $origin = str_replace(' ','+',$origin);
            $destination = str_replace(' ','+',$request->drop_off_to_airport);
            $google = new GoogleDistanceMatrix($origin, $destination, $unit);
            //dd($google);
            $this->booking_details = array([ 
            'pickUpAddress' => $request->pick_up_to_airport,
            'dropOffAddress' => $request->drop_off_to_airport,
            'flightInfo' => $request->flightInfo_to,
            'distance'  =>  $google->distanceInText(),
            'duration' => $google->timeInText(),
            'date' => $request->picupDate,
            'time'  => $request->pickupTime,
            'riderMessage' =>$request->message,
            'ServiceType' => "To Airport"
        ]);
        \Session::put('bookings', $this->booking_details);
        // Airport pickup fee
        $airportDropoffFee = 20.00;
        $sedanFare = $booking->sedanCarFare($google->distanceInMeter()) + $airportDropoffFee  ;
        $corporateSedanFare = $booking->corporateSedanFare($google->distanceInMeter()) + $airportDropoffFee;
        $miniVanFare = $booking->minivanFare($google->distanceInMeter()) + $airportDropoffFee ;
        $suvFare = $booking->suvFare($google->distanceInMeter()) + $airportDropoffFee;
        
        // Put fare 
        $fares = array(
                'sedanFare'             => $sedanFare,
                'corporateSedanFare'    =>$corporateSedanFare,
                'miniVanFare'           =>$miniVanFare,
                'suvFare'               =>$suvFare
        );
        
        \Session::put('fares', $fares );

         return view('bookings.select_car')
                ->with(['bookings' => $this->booking_details, 
                        'sedanFare' => $sedanFare,
                        'corporateSedanFare' => $corporateSedanFare,
                        'miniVanFare' => $miniVanFare,
                        'suvFare' => $suvFare
                ]);
        
        } //to airport


        if( $service == "point_to_point") {
            $this->validate(request(), [
                'pickUpAddress' => 'required',
                'dropOffAddress' => 'required',
                'picupDate' => 'required',
                'pickupTime' => 'required'
            ]);


           $booking = new Booking();
            $origin = $request->pickUpAddress;
            //$origin = $airport->getAirportAddressFrom($request->pickAddress);
            $origin = str_replace(' ','+',$origin);
            $destination = str_replace(' ','+',$request->dropOffAddress);
            $google = new GoogleDistanceMatrix($origin, $destination, $unit);
            //dd($google);
            $this->booking_details = array([ 
            'pickUpAddress' => $request->pickUpAddress,
            'dropOffAddress' => $request->dropOffAddress,
            'distance'  =>  $google->distanceInText(),
            'duration' => $google->timeInText(),
            'date' => $request->picupDate,
            'time'  => $request->pickupTime,
            'riderMessage' =>$request->message,
            'flightInfo' => "No Flight Number is required", // I have defined this value to avoid indefine index
            'ServiceType' => "Point To Point"
        ]);
        \Session::put('bookings', $this->booking_details);
        // Airport pickup fee
        $airportDropoffFee = 10.00;
        $sedanFare = $booking->sedanCarFare($google->distanceInMeter());
        $corporateSedanFare = $booking->corporateSedanFare($google->distanceInMeter());
        $miniVanFare = $booking->minivanFare($google->distanceInMeter());
        $suvFare = $booking->suvFare($google->distanceInMeter());
        
        // Put fare 
        $fares = array(
                'sedanFare'             => $sedanFare,
                'corporateSedanFare'    =>$corporateSedanFare,
                'miniVanFare'           =>$miniVanFare,
                'suvFare'               =>$suvFare
        );
        
        \Session::put('fares', $fares );

         return view('bookings.select_car')
                ->with(['bookings' => $this->booking_details, 
                        'sedanFare' => $sedanFare,
                        'corporateSedanFare' => $corporateSedanFare,
                        'miniVanFare' => $miniVanFare,
                        'suvFare' => $suvFare
                ]);
        
        } // door to door
    }

    /**
     * Display car option with passanger travel details
     */
    
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

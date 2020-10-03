<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;

class PassangersController extends Controller
{
	public function __constract()
	{
		$this->middleware('auth:passanger');
	}

   public function dashboard()
   {
   	$booking = new Booking;
   	//all
   	$passanger_id = auth()->user()->id;
   	$bookings = $booking->where('passanger_id', $passanger_id )->get();
   	//last
   	$last_booking = $booking->where('passanger_id', 11)->orderBy('id', 'desc')->first();;
   	return view('passangers.dashboard', compact('bookings', 'last_booking'));
   }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Session;

class DriverReceipt extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if (Session::has('booking_info')) {
            $booking_info = Session::get('booking_info');
            return $this->view('mails.driver-receipt')
                    ->with([
                            'firstName'     => $booking_info['firstName'],
                            'lastName'      => $booking_info['lastName'],
                            'email'         => $booking_info['email'],
                            'phone'         => $booking_info['phone'],
                            'amount'        => $booking_info['amount'],
                            'fare'          => $booking_info['fare'],

                            'pickUpAddress'     => $booking_info[0]['pickUpAddress'],
                            'dropOffAddress'    => $booking_info[0]['dropOffAddress'],
                            'flightInfo'        => $booking_info[0]['flightInfo'],
                            'distance'          => $booking_info[0]['distance'], 
                            'duration'          => $booking_info[0]['duration'],
                            'date'              =>$booking_info[0]['date'],
                            'time'              => $booking_info[0]['time'],
                            'riderMessage'      => $booking_info[0]['riderMessage'],
                            'ServiceType'      => $booking_info[0]['ServiceType'],
                            'car'               => $booking_info[1]['car']
                        ]);
        }
    }
}

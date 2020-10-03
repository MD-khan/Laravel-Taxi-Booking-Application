<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Passanger extends Authenticatable
{
	 use Notifiable;

	 protected $guard = 'passanger';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'email', 'stripe_id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function bookings()
    {
     return $this->hasMany(Booking::class);   
    }

//adding stripe id
    public function addStripeId( $stripeId)
    {
     return $this->update([
        'stripe_id' => $stripeId,
     ]);
    }
}

<?php
namespace App;
/**
* 
*/
class Airport
{
	protected static $airports = [
		'Nairobi_Airport'       => 'Embakasi, Nairobi, Kenya',
        'Wilson_Airport'        => "Wilson Airport/Shell, Nairobi, Nairobi County, Kenya",
        'mombasa_airport'       => "Airport Road, Mombasa, Kenya",
        'Kilimanjaro_Airport'   => "Kilimanjaro Airport Road, Hai, Kilimanjaro Region, Tanzania",         
        'Daresalam_Airport'   	=> "Airport Bus Stop, Julius K. Nyerere Road, Dar es Salaam, Tanzania",
        'Kigali_Airport'        => "KN 5 Rd, Kigali, Rwanda",
        'Entebe_Airport'   		=> "5536 Kampala Road, Entebbe, Uganda",
        'Arusha_Airport'   		=> "A104, Arusha, Tanzania"
	];

	
	
	protected  $mairports = array(
	  array(
	    "name" 		=> "Jomo Kenyatta International Airport",
	    "address" 	=> "Embakasi, Nairobi, Kenya",
	    "code"		=> "NBO",
	    "toll" 		=> 2.0
	  ),
	  array(
	    "name" 		=> "Wilson Airport",
	    "address" 	=> "Wilson Airport/Shell, Nairobi, Nairobi County, Kenya",
	    "code"		=> "WIL",
	    "toll" 		=> 2.0
	  ),

	  array(
	    "name" 		=> "Mombasa Airport",
	    "address" 	=> "Airport Road, Mombasa, Kenya",
	    "code"		=> "MBA",
	    "toll" 		=> 2.0
	  )
);

	public static function all()
	{
		return static::$airports;
	}

	public function getAirportAddressFrom($airport)
    {
     // Set  the Airport Actual address 
        $airportAddress = array(
            'nairobi_airport'       => 'Embakasi, Nairobi, Kenya',
            'wilson_airport'        => "Wilson Airport/Shell, Nairobi, Nairobi County, Kenya",
            'mombasa_airport'       => "Airport Road, Mombasa, Kenya",
            'kilimanjaro_airport'   => "Kilimanjaro Airport Road, Hai, Kilimanjaro Region, Tanzania",
            'daresalam_airport'   => "Airport Bus Stop, Julius K. Nyerere Road, Dar es Salaam, Tanzania",
            'kigali_airport'        => "KN 5 Rd, Kigali, Rwanda",
            'entebe_airport'   => "5536 Kampala Road, Entebbe, Uganda",
            'arusha_airport'   => "A104, Arusha, Tanzania"
        );  
        if (array_key_exists($airport, static::$airports)) {
                return static::$airports[$airport];
        }
    }


}
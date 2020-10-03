<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    // protected $fillable = ['fromAddress', 'toAddress'];
   // public fares = array();
     const FARE_PER_MILE_FOR_SEDAN = 2.5;
     const FARE_PER_MILE_FOR_CORPORATE_SEDAN = 3.5;
     Const FARE_PER_MILE_FOR_MINIVAN = 4.0;
     Const FARE_PER_MILE_FOR_SUV = 5.0;
     //protected airPortToll = 0;
     //
    
        public function passanger()
        {
            return $this->belongsTo(Passanger::class); //$booking->passanger
        }

        public static function incomplete()
        {
            return static::where('completed', 0)->get();    
        }

        

         public function sedanCarFare($distance)
         {
           return $this->meterToMile($distance) * self::FARE_PER_MILE_FOR_SEDAN;
         }

     // Corporate Sedan Fare
     public function corporateSedanFare($distance)
     {
       return $this->meterToMile($distance) * self::FARE_PER_MILE_FOR_CORPORATE_SEDAN;
     }

     // MiniVan Sedan Fare
     public function minivanFare($distance)
     {
       return $this->meterToMile($distance) * self::FARE_PER_MILE_FOR_MINIVAN;
     }

     // MiniVan Sedan Fare
     public function suvFare($distance)
     {
       return $this->meterToMile($distance) * self::FARE_PER_MILE_FOR_SUV;
     }




   
    public function calculateFareInMile($distanceInMeter, $carType)
    {

        if( $carType == "sedan") {
     	      return $this->meterToMile($distanceInMeter) * self::FARE_PER_KM_FOR_SEDAN;
     	      //return $this->MoneyInUSD($fare);
          }
        if( $carType == "suv") {
            return $this->meterToMile($distanceInMeter) * self::FARE_PER_KME_FOR_SUV;
              //return $this->MoneyInUSD($fare);
        }
    }

    public function calculateFareInKmeter($distanceInMeter, $carType)
    {

        if( $carType == "sedan") {
              return $this->meterToKmile($distanceInMeter) * self::FARE_PER_MILE_FOR_SEDAN;
              //return $this->MoneyInUSD($fare);
          }
        if( $carType == "suv") {
            return $this->meterToKmile($distanceInMeter) * self::FARE_PER_MILE_FOR_SUV;
             // return $this->MoneyInUSD($fare);
        }
    }


    public function meterToMile( $meter)
    {
    	return round( $meter * 0.000621371, PHP_ROUND_HALF_UP);
    }

    public function meterToKmile( $meter )
    {
        return round( $meter * 0.001, PHP_ROUND_HALF_UP);   
    }

    private function MoneyInUSD( $amount )
    {
    	setlocale(LC_MONETARY, 'en_US.UTF-8');
    	return money_format('%.2n', $amount);
    }

    public function isOriginOrDestinationAirPort( $origin, $destination)
    {
        $findAirport = $origin . $destination;
        if (strpos($findAirport, 'Airport') !== false) {
            return true;
        }
        return false;
    }



}

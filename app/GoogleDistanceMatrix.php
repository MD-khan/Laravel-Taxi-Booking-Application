<?php
namespace App;
/**
* 
*/
class GoogleDistanceMatrix 
{
	protected $key = "AIzaSyCNS9gMJXEnOPPr6RLHkoTFIVDzJSd5z5A";
	public $origin;
	public $destination;
	public $unit;
	public $response_a;
	public $errors = [];

	function __construct( $origin, $destination, $unit)
	{
		$this->origin = $origin;
		$this->destination = $destination;
		$this->unit = $unit;

		$url ="https://maps.googleapis.com/maps/api/distancematrix/json?units={$this->unit}&origins={$this->origin}&destinations={$this->destination}&key={$this->key}";
		
		$ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, $url);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    	curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    	$response = curl_exec($ch);
    	curl_close($ch);
    	$response_a = json_decode($response, true);
    	$this->response_a = $response_a;
		return $response_a;
	}

	public function setOriginAddress( $originAddress )
	{
		$this->origin = $setOriginAddress;
	}
	public function setDestinationAddress( $destinationAddress)
	{
		$this->destination = $destinationAddress;
	}
	public function setUnit( $unit)
	{
		$this->unit = $unit;
	}

	
	public function hasError()
	{
		if(is_null($this->ShowErrors() ) ){
			return false;
		}
		return true;
	}
	
	public function distanceInText()
	{
		if( !$this->hasError() ) {
		 	return $this->response_a['rows'][0]['elements'][0]['distance']['text'];
		}
	}

	public function distanceInMeter()
	{
		if( !$this->hasError() ) {
		 	return $this->response_a['rows'][0]['elements'][0]['distance']['value'];
		}
	}

	public function timeInText()
	{
		if( !$this->hasError() ) {
		 	return $this->response_a['rows'][0]['elements'][0]['duration']['text'];
		}
	}

	public function timeInSeconds()
	{
		if( !$this->hasError() ) {
		 	return $this->response_a['rows'][0]['elements'][0]['duration']['value'];
		}
	}

	public function ShowErrors()
	{
		if( $this->response_a['status'] == "UNKNOWN_ERROR") {
    		return $this->errors[] = 'Server Error';
		}
		if( $this->response_a['status'] == "REQUEST_DENIED") {
    		return $this->errors[] = 'Invalid API KEY';
		}
		if( $this->response_a['status'] == "OVER_QUERY_LIMIT") {
    		return $this->errors[] = 'the service has received too many requests from your application within the allowed time period.';
		}
		if( $this->response_a['status'] == "MAX_ELEMENTS_EXCEEDED") {
    		return $this->errors[] = 'the product of origins and destinations exceeds the per-query';
		}
		if( $this->response_a['status'] == "INVALID_REQUEST") {
   		 return $this->errors[] = 'the provided request was invalid';
		}
		if ( $this->response_a['rows'][0]['elements'][0]['status'] == "NOT_FOUND") {
			return $this->errors[] = "the origin and or destination of this pairing could not be geocoded.";
		}
		if ( $this->response_a['rows'][0]['elements'][0]['status'] == "ZERO_RESULTS") {
			return $this->errors[] = "no route could be found between the origin and destination.";
		}
		if ( $this->response_a['rows'][0]['elements'][0]['status'] == "MAX_ROUTE_LENGTH_EXCEEDED") {
			return $this->errors[] = "the requested route is too long and cannot be processed.";
		}
 }

}
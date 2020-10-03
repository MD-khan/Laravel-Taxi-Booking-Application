@extends('layout')
@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading"> Get A Quote </div>
          <div class="panel-body">
             @include('layouts.errors')
             <?php //var_dump($airports->all()) ?>
            <form class="form-horizontal" method="POST" action="/car">
              {{ csrf_field() }}

              <div class="form-group">
              <label for="ServiceType" class="col-md-4 control-label">
              Select a Service</label>
              <div class="col-md-6"> 
                <select id="ServiceType" name="ServiceType" class="form-control">
                  <option value="" selected>Please Select a Service </option>  
                  <option value="from_airport">From Airport</option>  
                  <option value="to_airport">To Airport</option> 
                  <option value="point_to_point"> Point To Point </option>
                  </select>
              </div>
              </div>

              <div id="if_from_airport" style="display: none;"> 
                
              <div class="form-group" id="from_airport"> 
                <label for="pickup_from_airport" class="col-md-4 control-label"> 
                Pick-up Address 
              </label>
              <div class="col-md-6"> 
                <input type="text" name="pickup_from_airport" class="form-control" value="Logan International Airport"> 
              </div>
              </div>

              <div class="form-group">
              <label class="col-md-4 control-label" for="pickupDate"> 
                Flight Name & Nummber:
              </label>
              <div class="col-md-6">
                <input type="text" name="flightInfo_from"  class="form-control"
                 placeholder="Optional">
              </div>
            </div>

            <div class="form-group" id="from_airport"> 
                <label for="drop_off_from_airport" class="col-md-4 control-label"> 
                Drop Off Address 
              </label>
              <div class="col-md-6"> 
                <input name="drop_off_from_airport" type="text" class="form-control" 
                  id="autocomplete-drop-off" aria-describedby="dropOffHelp" 
                  placeholder="Enter Destination Address Here" 
                  onFocus="geolocate()">
              </div>
              </div>

              </div> <!-- From Airport -->

              <div id="if_to_airport" style="display: none;"> 
                
              <div class="form-group" id="from_airport"> 
                <label for="drop_off_to_airport" class="col-md-4 control-label"> 
                Drop-Off Address 
              </label>
              <div class="col-md-6"> 
                <input type="text" name="drop_off_to_airport" class="form-control" value="Logan International Airport"> 
              </div>
              </div>

              <div class="form-group">
              <label class="col-md-4 control-label" for="pickupDate"> 
                Flight Name & Nummber:
              </label>
              <div class="col-md-6">
                <input type="text" name="flightInfo_to"  class="form-control"
                 placeholder="Optional">
              </div>
            </div>

            <div class="form-group" id="from_airport"> 
                <label for="pick_up_to_airport" class="col-md-4 control-label"> 
                Pick-Up  Address 
              </label>
              <div class="col-md-6"> 
                <input name="pick_up_to_airport" type="text" class="form-control" 
                  id="autocomplete-pick-up" aria-describedby="dropOffHelp" 
                  placeholder="Enter Destination Address Here" 
                  onFocus="geolocate()">
              </div>
              </div>

              </div> <!-- To Airport -->

              <!-- -->
              <div id="if_point_to_point"> 
              <div class="form-group"> 
                <label for="pickUpAddress" class="col-md-4 control-label"> 
                Pick-Up  Address 
              </label>
              <div class="col-md-6"> 
                <input name="pickUpAddress" type="text" class="form-control" 
                  id="autocomplete-pick-up-pt" aria-describedby="dropOffHelp" 
                  placeholder="Enter Destination Address Here" 
                  onFocus="geolocate()">
              </div>
              </div>

              <div class="form-group"> 
                <label for="dropOffAddress" class="col-md-4 control-label"> 
                Drop-off  Address 
              </label>
              <div class="col-md-6"> 
                <input name="dropOffAddress" type="text" class="form-control" 
                  id="autocomplete-drop-off-pt" aria-describedby="dropOffHelp" 
                  placeholder="Enter Destination Address Here" 
                  onFocus="geolocate()">
              </div>
              </div>

              </div> <!-- Point To point -->

              <div class="form-group">
              <label class="col-md-4 control-label" for="pickupDate"> Date & Time:</label>
              <div class="col-md-4">
                <input type="text" name="picupDate" id="datepicker" class="form-control">
              </div>
              <div class="col-md-2">
                <select name="pickupTime" id="pickupTime" class="form-control">
                    @foreach ($ranges as $key => $value)
                      <option value="{{ $value }}"> {{ $value }}</option>
                    @endforeach
                </select>
              </div>
            </div>


        <div class="form-group">
            <label class="col-md-4 control-label" for="message">
              Message us:
            </label>
            <div class="col-md-6"> 
            <textarea name="message" class="form-control" placeholder="Let Us know if you need anything"></textarea>
          </div>
        </div>
        
            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                     <button type="submit" class="btn btn-primary"> Get A Quote </button>
                </div>
              </div>
      </form>
                </div>
            </div>
        </div>
    </div>


 @endsection

 @section('script')
 <script>
  $(document).ready(function(e) {
    $('#ServiceType').change(function(){
      var ServiceType = $('#ServiceType').val();

      if(ServiceType == "to_airport") {
        $('#if_from_airport').hide();
        $('#if_point_to_point').hide();
        $('#if_to_airport').show();
      }
      
      if(ServiceType == "from_airport") {
          $('#if_from_airport').show();
          $('#if_to_airport').hide();
          $('#if_point_to_point').hide();
      }
      if(ServiceType == "point_to_point") {
        $('#if_point_to_point').show();
        $('#if_from_airport').hide();
        $('#if_to_airport').hide();
      }
    });
    
  });

  function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete_pick_up = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */
            (document.getElementById('autocomplete-pick-up')),
            	{types: ['geocode']}
            );

        autocomplete_drop_off = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */
            (document.getElementById('autocomplete-drop-off')),
            	{types: ['geocode']}
            );

        autocomplete_drop_off = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */
            (document.getElementById('autocomplete-drop-off-pt')),
              {types: ['geocode']}
            );

        autocomplete_drop_off = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */
            (document.getElementById('autocomplete-pick-up-pt')),
              {types: ['geocode']}
            );
      }

      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            //autocomplete.setBounds(circle.getBounds());
          });
        }
      }

      $( function() {
          $( "#datepicker" ).datepicker( {
            dateFormat: "d M, DD, yy",
            minDate:0,
            buttonImage: "images/calendar.gif"
          });
      });
 </script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcQVYxf-lWgVT10nsNB73WY6p7oNE_5og&libraries=places&callback=initAutocomplete"
        async defer></script>
<script src="//code.jquery.com/jquery-1.10.2.js"> </script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"> </script>

 @endsection


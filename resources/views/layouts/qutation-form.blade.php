<div class="qutation-form"> 
<div class="row"> 
  <div class=" mx-auto col-sm-7"> 
    <div class="card">
  <div class="card-header">
    <h4 class="mb-0"> Get a Free Quote </h4>
    <span class="text-green"> 
    Call US: (617)821-6721, (617)259-7671 </span>
  </div>
  <div class="card-body">
       @include('layouts.errors')
       <form class="form-horizontal" method="POST" action="/select-car">

         {{ csrf_field() }}

        <div class="form-group row">
          <label for="ServiceType" class="col-sm-4 col-form-label col-form-label-sm"> 
          <i class="far fa-hand-point-right"></i>
          Select a Service
          </label>
            <div class="col-sm-8">
              <select id="ServiceType" name="ServiceType" class="form-control form-control-sm">
                <option value="from_airport">From Airport</option>  
                <option value="to_airport">To Airport</option> 
                <option value="point_to_point"> Point To Point </option>
              </select>
            </div>
        </div>

        <!-- if passanger chose service from airport -->
        <div id="if_from_airport" style="display: none;">                  
          <div class="form-group row">
            <label for="pickup_from_airport" class="col-sm-4 col-form-label col-form-label-sm">
              <i class="fas fa-map-marker-alt"></i>
                Pick Up Address
          </label>
            <div class="col-sm-8">
              <input type="text" name="pickup_from_airport" value="Logan International Airport"
               class="form-control form-control-sm">
            </div>
        </div>

              <div class="form-group row">
              <label class="col-sm-4 col-form-label col-form-label-sm" for="flightInfo_from"> 
               <i class="fas fa-plane-departure"></i>
                Flight:
              </label>
             <div class="col-sm-8">
                <input type="text" name="flightInfo_from"  class="form-control form-control-sm"
                 placeholder="Optional: Flight name and number">
              </div>
            </div>

            <div class="form-group row"> 
                <label for="drop_off_from_airport" class="col-sm-4 col-form-label col-form-label-sm"> 
                 <i class="fas fa-map-marker"></i>
                Drop Off Address 
              </label>
             <div class="col-sm-8">
                <input name="drop_off_from_airport" type="text" 
                  class="form-control form-control-sm"
                  id="autocomplete-drop-off" aria-describedby="dropOffHelp" 
                  placeholder="Enter Destination Address Here" 
                  onFocus="geolocate()">
              </div>
              </div>

              </div> <!-- From Airport -->

        <!-- if passanger chose service To airport -->
        <div id="if_to_airport" style="display:none;">                  
          <div class="form-group row">
            <label for="drop_off_to_airport" class="col-sm-4 col-form-label col-form-label-sm">
              <i class="fas fa-map-marker-alt"></i>
                Drop off Address
          </label>
            <div class="col-sm-8">
              <input type="text" name="drop_off_to_airport" value="Logan International Airport"
               class="form-control form-control-sm">
            </div>
        </div>

              <div class="form-group row">
              <label class="col-sm-4 col-form-label col-form-label-sm" for="flightInfo_from"> 
               <i class="fas fa-plane-departure"></i>
                Flight:
              </label>
             <div class="col-sm-8">
                <input type="text" name="flightInfo_from"  class="form-control form-control-sm"
                 placeholder="Optional: Flight name and number">
              </div>
            </div>

            <div class="form-group row"> 
                <label for="pick_up_to_airport" class="col-sm-4 col-form-label col-form-label-sm"> 
                 <i class="fas fa-map-marker"></i>
                 Pick up Address 
              </label>
             <div class="col-sm-8">
                <input name="pick_up_to_airport" type="text" class="form-control form-control-sm" 
                  id="autocomplete-pick-up" aria-describedby="dropOffHelp" 
                  placeholder="Enter Destination Address Here" 
                  onFocus="geolocate()">
              </div>
              </div>
              </div> <!-- To Airport -->

        <!-- Point to Point -->
          <div id="if_point_to_point"> 
            <div class="form-group row">
          <label for="pickUpAddress" class="col-sm-4 col-form-label col-form-label-sm">
            <i class="fas fa-map-marker-alt"></i>
            Pick Up Address
          </label>
            <div class="col-sm-8">
              <input name="pickUpAddress" type="text" class="form-control form-control-sm"
                  id="autocomplete-pick-up-pt" aria-describedby="dropOffHelp" 
                  placeholder="Enter Pick Up  Address Here" 
                  onFocus="geolocate()">
            </div>
        </div>

        <div class="form-group row">
          <label for="dropOffAddress" class="col-sm-4 col-form-label col-form-label-sm">
            <i class="fas fa-map-marker"></i>
            Drop off Address
          </label>
            <div class="col-sm-8">
             <input name="dropOffAddress" type="text" class="form-control form-control-sm" 
                  id="autocomplete-drop-off-pt" aria-describedby="dropOffHelp" 
                  placeholder="Enter Destination Address Here" 
                  onFocus="geolocate()">
            </div>
        </div>
      </div>  

      <div class="form-group row">
          <label for="pickupDate" class="col-sm-4 col-form-label col-form-label-sm">
            <i class="far fa-calendar-alt"></i>
              Date & time
            </label>
              <div class="col-sm-4">
                <input type="text" name="picupDate" id="datepicker" class="form-control form-control-sm">     
              </div>
              <div class="col-sm-4">
                 <select name="pickupTime" id="pickupTime" class="form-control form-control-sm">
                  @foreach ($ranges as $key => $value)
                      <option value="{{ $value }}"> {{ $value }}</option>
                    @endforeach
                </select>   
              </div>
          </div>  


        <hr>
        <div class="form-group row">
          <div class="col-sm-4"> </div>
          <div class="col-sm-4">
            <button type="submit" class="btn btn-success"> Get A Quote </button>
        </div>
          <div class="col-sm-4"> </div>
        
        </div>

      </form>
  </div>
</div>
  </div>
</div>
</div>

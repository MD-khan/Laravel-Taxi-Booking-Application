@extends('layouts/master')
@section('style')
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
@endsection

@section('slider')
@include('layouts.top-slider')
@endsection

@section('content')
      <!-- Page Content -->
    <div class="container page">
      <h1 class="mt-4 mb-3"> Get a Free  Quote
        <small><i class="fas fa-phone-volume"></i>(617)259-7671 </small>
     </h1>
     
      <div class="row card">
        <div class="card-body"> 
        <div class="mx-auto col-sm-7">
          <div class="card">
        <div class="card-header">
          <h4 class="mb-0"> Quote </h4>
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
                    <option value="point_to_point" selected="selected"> Point To Point </option>
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
</div> <!-- ./row -->
    
      <h1 class="my-4">Welcome To {{ config('app.name') }} </h1>
      <div class="row">
        <div class="card">
        <h5 class="card-header">Boston Economy Car - Its an Auto Transportation Company, Just Faster, More Affordable and Totally Reliable!</h5>
        <div class="card-body">
      <p class="card-text">
      If youve just arrived Boston after a long flight, getting stranded is the last thing you would ever want to experience. The stress lies chiefly in hiring economy transportation cars that best suit your travel, budget and passenger requirements. Whether youre in Boston for a quick business meeting, weekend getaway or family vacation, we bet you hate to wait too long to hire a taxi. Are you looking to book an economy car to/from the Logan International Airport? Or perhaps you are in Boston and seeking the most reliable and affordable point to point pick up drop off service. Regardless of your transportation needs,  you simply can’t afford to ignore the Boston Economy Car! 
      </p>

        <h5 class="card-title">Simply Hire an economy car </h5>
        <iframe style=" float: left; width:120px;height:240px;" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="//ws-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=US&source=ac&ref=qf_sp_asin_til&ad_type=product_link&tracking_id=munisa01-20&marketplace=amazon&region=US&placement=B06WWFYCSG&asins=B06WWFYCSG&linkId=92dd1b0e5b5e5a3b1996a2e47f4b6e5a&show_border=true&link_opens_in_new_window=true&price_color=333333&title_color=008000&bg_color=ffffff">
          </iframe>
        <p class="card-text">
          At Boston Economy Car, we have simplified the whole process of booking cars online. You can simply hire an economy car on our website whilst you also choose the pick-up and drop off address that works with your schedule. 
        </p>

        <h5 class="card-title"> Luxury vehicles </h5>
        <p class="card-text">
          From SUVs to compact cars, luxury vehicles, pickup trucks and everything in between, we have got your desired option in our car fleet - including some of the big brands like Ford, Kia, Audi, Chevrolet among others. 
        </p>

        <h5 class="card-title"> Save time and money. </h5>
        <p class="card-text">
          Our choice of car brands is inspired by the need to help you save time and money. All our economy cars are well maintained and also guarantee easy maneuverability as well as high performance. So you can be sure to always reach your destination smoothly and without hassles anytime you come to us. 
        </p>

        <h5 class="card-title"> We invite you to come take advantage of our extraordinary auto transportation  </h5>
        <p class="card-text">
        Amongst all the major auto transportation companies at the Logan International Airport, Boston Economy Car stands out of the crowd. This is because we offer the best economy car deals you can't find elsewhere. Our services are efficient and many of our clients also find our customer support team very friendly, and courteous. Your experience with us is not an exception. We invite you to come take advantage of our extraordinary auto transportation services and enjoy a smooth ride around Boston.

        </p>

        <a href="#" class="btn btn-success"> Get Quote</a>
  </div>
</div>
      </div>
      <!-- /.row -->



<br>

        <!-- Marketing Icons Section -->
        <div class="card">
        <h5 class="card-header">Why choose Us?</h5>
      <div class="card-body">
        There are hundreds of companies to choose from, but our services are better by far. When you rely on us for auto transportation services, you can be rest assured to make the most of these benefits and more.
      </div>
    </div>

    <br>
      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="card">
            <h4 class="card-header"> Ease and Transparency </h4>
            <div class="card-body">
              <p class="card-text">
              Easy online booking experience with no hidden fee sets us wide apart from others. We cap it all with loads of extras to make your Boston trip an unforgettable one.
            </p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 mb-4">
          <div class="card">
            <h4 class="card-header"> Friendly, Honest and Highly Professional Drivers </h4>
            <div class="card-body">
              <p class="card-text">Not only do we offer the best economy cars and best rates, but also ensure you are driven by friendly and highly professional drivers who are totally committed to making your auto transportation experience a perfect and memorable one.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 mb-4">
          <div class="card">
            <h4 class="card-header"> Time saving and cost efficient</h4>
            <div class="card-body">
              <p class="card-text">We take the stress out of your schedule by providing economy cars with maximum mileage and at unbeatable rates. This way, youre able to cut corners and get to your destination in a faster, smoother and hassle-free way.</p>
            </div>
        </div>

      </div>
      <hr>
      <div class="row">
          <div class="col-lg-4 mb-4">
          <div class="card">
            <h4 class="card-header"> Newer Models </h4>
            <div class="card-body">
              <p class="card-text">Our fleet include latest models of economy cars. You will not only get to your destination in new model cars, but also enjoy all the benefits of a well-serviced and maintained cars. We have our own purpose-built maintenance centers where our cars are routinely serviced according to factory specifications.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 mb-4">
          <div class="card">
            <h4 class="card-header"> Roadside Support </h4>
            <div class="card-body">
              <p class="card-text">Easy online booking experience with no hidden fee sets us wide apart from others. We cap it all with loads of extras to make your Boston trip an unforgettable one.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 mb-4">
          <div class="card">
            <h4 class="card-header"> Ease and Transparency </h4>
            <div class="card-body">
              <p class="card-text">Our cars rarely breakdown. But in case of emergency, our roadside support team will respond to you with the speed of light. You can sit back, relax, and enjoy your smooth ride knowing you have a backup team waiting to attend to your emergency needs</p>
            </div>
            <div class="card-footer">
               <a href="#" class="btn btn-success"> Get a Quote</a>
            </div>
          </div>
        </div>
       </div>
        </div>

     <hr>
      <!-- Features Section -->
      <div class="row">
        <div class="col-lg-6">
          <h2> About US </h2>
          <p>Boston Economy Car is a fast-rising auto transportation agency in Boston,  Massachusetts.
          </p>
          <ul>
            <li>
              <strong>Founded in 2010 by Omar F Sami</strong>
            </li>
            <li> Boston Local Company </li>
            <li> Wide variety of economy cars </li>
          </ul>
          <p>
            We are in the business of providing you with a wide variety of economy cars so you can get to your destination in Boston City with relative ease, comfort and convenience. With an array of cars and highly friendly and professional drivers, we are able to extend our unique services to different parts of Boston like Greater Boston, East Boston, Kenmore, and Downtown Boston. 
          </p>
          <p>
          At Boston Economy Car, we believe that a good name is priceless and cannot be traded for gold. It has to be earned by gaining the trust of every customer that makes use of our services. Thats why we always strive to be true to our word by taking our responsibilities very seriously. And ensuring transparency in all of our dealings with customers  no hidden fees or unnecessary costs. 
        </p>
      <p>
        Our guiding principles revolve around excellence, integrity, and transparency. These are the core values that define the way we think and operate at Boston Economy Car. Our commitment to you as a customer is to offer you everything you need to make your next business or leisure trip to and out of Boston a pleasant experience. 
      </p>
        </div>
        <div class="col-lg-6">
          <img class="img-fluid rounded" src="/img/about-us.jpg" alt="">
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Call to Action Section -->

    <!-- /.container -->
    </div>


@section('footer')
<!-- Footer -->
@include('layouts.footer-contents')
@endsection
@endsection

@section('script')
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBV9rbHv4N-D20F5VeIVfaa4P-Ghjm6x-k&libraries=places&callback=initAutocomplete"async defer>
</script>

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
    
  @endsection



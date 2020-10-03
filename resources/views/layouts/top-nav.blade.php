 <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-success fixed-top">
      <div class="container">
        <a href="{{ url('/') }}" class="navbar-left"><img src="/logos/green6064.png"></a>
        <a class="navbar-brand" href="{{ url('/') }}"> Boston Airport Economy Car </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/about/">{{ config('app.subtitle1') }}</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="/quote/">Quote</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/about/">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/contact">Contact</a>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right menu-item"> 
             @if(Auth::guard('passanger')->check())
           <li class="nav-item">
            <a class="nav-link" href="/passanger/dashboard"> 
              <i class="fas fa-user"></i>
              {{Auth::guard('passanger')->user()->firstName}}
              </a>
          </li>
           <li class="nav-item">
              <a class="nav-link" href="{{ route('passanger.logout') }}"onclick="event.preventDefault(); 
                document.getElementById('logout-form').submit();">
                Logout
              </a>
              <form id="logout-form" action="{{ route('passanger.logout') }}" method="POST" style="display: none;">
                     {{ csrf_field() }}
                </form>
          </li>
        @else 
        <li class="nav-item">
            <a class="nav-link" href="{{ route('passanger.login') }}">
              <i class="fas fa-user"></i>
              Login
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('passanger.register') }}">
              Register
            </a>
          </li>
        @endif

          </ul>

        </div>
      </div>
    </nav>

    <!-- 
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top" style="top: 76px"> 
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" href="#">Call Us: <i class="fas fa-phone-volume"></i> 617-866-3824</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-envelope-open"></i> bostoneconomycar<i class="fas fa-at"></i>gmail.com</a>
          </li>
      </ul>
   </nav>
   -->
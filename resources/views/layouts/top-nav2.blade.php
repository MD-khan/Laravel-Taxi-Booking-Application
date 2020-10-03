
 <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a href="{{ url('/') }}" class="navbar-left"><img src="logos/orange75.png"></a>
      <button class="navbar-toggler" type="button" 
            data-toggle="collapse" 
            data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto menu-item">

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
          </li>

           <li class="nav-item">
            <a class="nav-link" href="#">Get a Quote</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>

          <li class="nav-item">
            <a class="nav-link disabled" href="#">Blog</a>
          </li>
           <li class="nav-item">
            <a class="nav-link disabled" href="#">About Us</a>
          </li>
        </ul>
         <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right menu-item">
           @if(Auth::guard('passanger')->check())
           <li class="nav-item">
            <a class="nav-link" href="/passanger/dashboard"> 
              <i class="fas fa-ghost"></i>
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
              Login
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('passanger.register') }}">
              Register
            </a>
          </li>
        @endif

      </div>

    </nav>


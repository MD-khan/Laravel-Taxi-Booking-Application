@extends('layouts/master')

<div class="container page">
	<!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3"><i class="fas fa-phone-volume"></i>Contact
        <small></small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/">Home</a>
        </li>
        <li class="breadcrumb-item active">Contact</li>
      </ol>

      <!-- Marketing Icons Section -->
      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header"> <i class="fas fa-phone-volume"></i> </i> Contact Us </h4>
            <div class="card-body">
              <p class="card-text">
                {{ config('app.name') }} <br>
                 26 Porter St. Boston,MA 02128 <br>
                  Phone: (617)821-6721, (617)259-7671 <br>
                  What's App Call: +16172597671 <br>
              </p>
            </div>
            <div class="card-footer">
              <a href="/" class="btn btn-primary">Book Now </a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
</div> <!-- Container -->

@section('footer')
<!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; {{ config('app.name') }} 2018</p>
      </div>
      <!-- /.container -->
    </footer>
@endsection
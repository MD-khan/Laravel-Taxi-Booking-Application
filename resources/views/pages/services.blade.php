@extends('layouts/master')

<div class="container page">
	<!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3"><i class="fas fa-taxi"></i>Services
        <small></small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/">Home</a>
        </li>
        <li class="breadcrumb-item active">Services</li>
      </ol>

      <!-- Image Header 
      <img class="img-fluid rounded mb-4" src="/img/service.png" alt="">
  		-->
      <!-- Marketing Icons Section -->
      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header"><i class="fas fa-plane-arrival"></i> From Logan Airport   </h4>
            <div class="card-body">
              <p class="card-text">We pick you up from Boston Logan Internation Airport. You don't need to worry wait for the Uber/Lyft ride. Our driver will wait for you.</p>
            </div>
            <div class="card-footer">
              <a href="/" class="btn btn-primary">Book Now </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header"> <i class="fas fa-plane-departure"></i> To Logan Airport  </h4>
            <div class="card-body">
              <p class="card-text"> We will drop-off you  at Logan Inter National Airport from your pick up location. Our driver will wait for you. </p>
            </div>
            <div class="card-footer">
              <a href="/" class="btn btn-primary">Book Now </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header"> <i class="fas fa-map-marker-alt"></i> Point To Point  </h4>
            <div class="card-body">
              <p class="card-text"> You can go any where you want with our point to point service. We have exprience drivers with whom you can relly. </p>
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
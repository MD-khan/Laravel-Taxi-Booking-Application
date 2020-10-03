@extends('layouts/master')

@section('content')
 <!-- Page Content -->
 <div class="container page">

 	<!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Thank You!
        <small></small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="#">Select Car</a>
        </li>
        <li class="breadcrumb-item active">Payment Confirmation</li>
      </ol>


      <div class="row">
        <div class="col-lg-6">
          <img class="img-fluid rounded mb-4" src="/logos/orange.jpg" alt="">
        </div>
        <div class="col-lg-6">
          <h2> Your Payment has been posted </h2>
          <p> Thank you so much for business with Us. One of our driver contact with you soon.</p>
			<p>
				If you have any questions queries let us know. <strong>We don't sleep</strong> Call us (617)821-6721, (617)259-7671, What's App Call: +16172597671
			</p>

		<p> <a href="/"> Book another ride </a></p>
	<p>It is our ultimate aim to provide personalized auto transportation service with comfort and real value for your money. Get in touch with us today and you won't regret! </p>

        </div>
      </div>
      <!-- /.row -->

 </div>
 
 @section('footer')
<!-- Footer -->
  @include('layouts.footer-contents')
@endsection


 @endsection


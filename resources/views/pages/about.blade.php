@extends('layouts/master')

@section('content')
 <!-- Page Content -->
 <div class="container page">
 	<!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">About
        <small></small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/">Home</a>
        </li>
        <li class="breadcrumb-item active">About</li>
      </ol>

      <div class="row">
        <div class="col-lg-6">
          <img class="img-fluid rounded mb-4" src="/logos/orange.jpg" alt="">
        </div>
        <div class="col-lg-6">
          <h2>About {{ config('app.name') }} </h2>
          <p>Boston Economy Car is a fast-rising auto transportation agency in Boston, Massachusetts. Founded in 2012 by Omor Faruk, Boston Economy Car offers one of the best transportation services covering all of Boston. </p>
			<p>We are in the business of providing you with a wide variety of economy cars so you can get to your destination in Boston City with relative ease, comfort and convenience. With an array of cars and highly friendly and professional drivers, we are able to extend our unique services to different parts of Boston like Greater Boston, East Boston, Kenmore, and Downtown Boston. 
			</p>

		<p> Boston Economy Car, we believe that a good name is priceless and cannot be traded for gold. It has to be earned by gaining the trust of every customer that makes use of our services. Thats why we always strive to be true to our word by taking our responsibilities very seriously. And ensuring transparency in all of our dealings with customers  no hidden fees or unnecessary costs. </p>
	<p>Our guiding principles revolve around excellence, integrity, and transparency. These are the core values that define the way we think and operate at Boston Economy Car. Our commitment to you as a customer is to offer you everything you need to make your next business or leisure trip to and out of Boston a pleasant experience. 
	</p>
	<p>It is our ultimate aim to provide personalized auto transportation service with comfort and real value for your money. Get in touch with us today and you won't regret! </p>

        </div>
      </div>
      <!-- /.row -->
  </div>

  @section('footer')
  @include('layouts.footer-contents')
@endsection
@endsection
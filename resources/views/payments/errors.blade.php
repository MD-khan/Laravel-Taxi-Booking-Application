@extends('layouts/master')

@section('content')
 <!-- Page Content -->
 <div class="container page">

 	<!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">
        Error
        <small></small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="#">Payment</a>
        </li>
        <li class="breadcrumb-item active">Something Went Wrong </li>
      </ol>


      <div class="row">
        <div class="col-lg-6">
          <img class="img-fluid rounded mb-4" src="/logos/orange.jpg" alt="">
        </div>
        <div class="col-lg-6">
          <h2> {{ $data['error'] }} </h2>
			<p>
        <a href="/"> Go Back Try Again </a>
				<strong>We open 24/7 </strong> <br>
        If you Like to book by Phone Call us(617)259-7671 <br>
         What's App Call: +16172597671
			</p>

        </div>
      </div>
      <!-- /.row -->

 </div>
 
 @section('footer')
<!-- Footer -->
  @include('layouts.footer-contents')
@endsection


 @endsection


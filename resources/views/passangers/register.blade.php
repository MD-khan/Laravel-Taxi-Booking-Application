@extends('layouts/master')

@section('content')
<div class="container page">
<!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3"> Passanger Register </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/">Home</a>
        </li>
        <li class="breadcrumb-item active">Sign up</li>
      </ol>

  <div class="row">
        <div class="mx-auto col-sm-7">
            <div class="card"> 
                <div class="card-header  bg-dark text-white">
                    <h4 class="mb-0"> Passanger Sign Up</h4>
                </div>
                 <div class="card-body"> 
                     @include('layouts.errors')
                     <form class="form-horizontal" method="POST" 
                            action="{{ route('passanger.register.submit') }}">
                        {{ csrf_field() }}

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">First Name</label>
                            <div class="col-lg-9">
                            <input id="firstName" type="text" class="form-control form-control-sm" 
                            name="firstName" value="{{ old('firstName') }}" required autofocus>    
                            </div>
                    </div> <!--./from-group -->
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Last Name</label>
                            <div class="col-lg-9">
                            <input id="lastName" type="text" class="form-control form-control-sm"
                             name="lastName" value="{{ old('lastName') }}" required autofocus>
                            </div>
                    </div> <!--./from-group -->
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                 <input id="email" type="email" class="form-control form-control-sm" name="email" value="{{ old('email') }}" required autocomplete="off">
                            </div>
                    </div> <!--./from-group -->
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Password</label>
                            <div class="col-lg-9">
                            <input id="password" type="password" class="form-control form-control-sm"
                             name="password" value="{{ old('password') }}" required autofocus>
                            </div>
                    </div> <!--./from-group -->
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">
                            Confirm Password
                        </label>
                            <div class="col-lg-9">
                            <input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation" required>
                            </div>
                    </div> <!--./from-group -->

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                    </div> <!--./from-group -->
                </form>
                 </div>
            </div>
        </div>
    </div>  <!--./row -->
</div>
@section('footer')
  <!-- Footer -->
  <br/>
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; {{ config('app.name') }} 2018</p>
      </div>
      <!-- /.container -->
    </footer>
@endsection

@endsection
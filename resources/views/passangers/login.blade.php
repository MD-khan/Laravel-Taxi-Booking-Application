@extends('layouts/master')

@section('content')
<div class="container page">
    <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Login
        <small></small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/">Home</a>
        </li>
        <li class="breadcrumb-item active">Login</li>
      </ol>

    <div class="row">
        <div class="mx-auto col-sm-7">
            <div class="card"> 
                <div class="card-header  bg-dark text-white">
                    <h4 class="mb-0"> Passanger Login</h4>
                </div>
                 <div class="card-body"> 
                     @include('layouts.errors')
                     <form class="form-horizontal" method="POST" action="{{ route('passanger.login.submit') }}">
                        {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                            <input id="email" type="email" class="form-control" name="email" value="    {{ old('email') }}" required autofocus>            
                            </div>
                    </div> <!--./from-group -->
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Password</label>
                            <div class="col-lg-9">
                            <input id="password" type="password" class="form-control"
                                 name="password" required>           
                            </div>
                    </div> <!--./from-group -->
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                 <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
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

@extends('layouts/master')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="container page"> 
    <h1 class="mt-4 mb-3"> Dashboard </h1>
        
     <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/">Home/Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>


      <div class="row"> 
        <div class="col-sm-8"> 
            <div class="card">
                <div class="card-header"> 
                    <h4 class="mb-0"> All Booking </h4> 
                <div class="card-body"> 
                    @if( !$bookings->isEmpty() )
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>PickUp</th>
                                <th>Drop Off</th>
                                <th>Service</th>
                                <th>Car</th>
                                <th>Date</th>
                                <th>Fare</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td> {{$booking->pickUpAddress}} </td>
                                    <td> {{$booking->dropOffAddress}} </td>
                                    <td> {{$booking->service}} </td>
                                    <td> {{$booking->car}} </td>
                                    <td> {{$booking->date}} ,Time- {{$booking->time}} </td>
                                    <td> ${{$booking->fare}} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    <tfoot>
                                <tr>
                                    <th>PickUp</th>
                                    <th>Drop Off</th>
                                    <th>Service</th>
                                    <th>Car</th>
                                    <th>date</th>
                                    <th>Fare</th>
                                </tr>
                    </tfoot>
                    </table>
                    @endif
                    @if( $bookings->isEmpty() )
                        <p> You haven't booked any ride yet </p>
                    @endif
                </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
        <div class="card"> 
            <div class="card-header"> 
            <h4 class="mb-0"> Latest Booking </h4> 
            </div>
            <div class="card-body"> 
                 @if (empty($last_booking) )
                    <p> <strong> Pickup:  </strong>{{$last_booking->pickUpAddress}} </p>
                    <p> <strong> Drop off: </strong> {{$last_booking->dropOffAddress}} </p>
                    <p> <strong> Date: </strong>  {{$last_booking->date}}, {{$last_booking->time}}  </p>
                    <p> <strong>Car: </strong>  {{$last_booking->car}} </p>
                    <p> <strong> Service: </strong>  {{$last_booking->service}} </p>
                    <p><strong>Fare : </strong>  ${{$last_booking->fare}} </p>
                @else
                    <p> You haven't booked any ride yet </p>
                @endif
            </div>
        </div>
        </div>
      </div>


</div>
@endsection

@section('footer')
 <br>
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; {{ config('app.name') }} 2018</p>
      </div>
      <!-- /.container -->
    </footer>
@endsection

@section('script')
 <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
 <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script> 
    $(document).ready(function() {
        $('#example').DataTable();
    });
  </script>

 @endsection


@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4>My Bookings</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="amazing-deals">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading text-center">
                        <h2>Check your bookings</h2>
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Check In Date</th>
                            <th scope="col">N. Guests</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$booking->destination}}</td>
                                <td>{{date('d-m-Y', strtotime($booking->check_in_date))}}</td>
                                <td>{{$booking->num_guests}}</td>
                                <td>{{$booking->price}}$</td>
                                <td>{{$booking->status}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>



            </div>
        </div>
    </div>
@endsection

@extends('layouts.adminsApp')

@section('content')
    <div class="row">
        <div class="col">
            @if (Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}</p>
            @elseif (Session::has('error'))
                <p class="alert alert-alert">{{ Session::get('error') }}</p>
            @endif
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Bookings</h5>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">phone_number</th>
                                <th scope="col">num_of_geusts</th>
                                <th scope="col">checkin_date</th>
                                <th scope="col">destination</th>
                                <th scope="col">status</th>
                                <th scope="col">price</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <th scope="row">{{ $booking->id }}</th>
                                    <td>{{ $booking->name }}</td>
                                    <td>{{ $booking->phone_number }}</td>
                                    <td>{{ $booking->num_guests }}</td>
                                    <td>{{ $booking->check_in_date }}</td>
                                    <td>{{ $booking->destination }}</td>
                                    <td>${{ $booking->price }}</td>
                                    @if ($booking->status == 'Payed')
                                        <td class="table-success">{{ $booking->status }}</td>
                                    @else
                                        <td class="table-danger">{{ $booking->status }}</td>
                                    @endif
                                    <td><a href="{{ route('admin.delete.booking', $booking->id) }}"
                                            class="btn btn-danger  text-center ">delete</a></td>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

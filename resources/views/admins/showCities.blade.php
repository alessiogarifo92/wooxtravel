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
                    <h5 class="card-title mb-4 d-inline">Cities</h5>
                    <a href="{{ route('admin.create.city') }}" class="btn btn-primary mb-4 text-center float-right">Create
                        cities</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">image</th>
                                <th scope="col">trip_days</th>
                                <th scope="col">price</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cities as $city)
                                <tr>
                                    <th scope="row">{{ $city->id }}</th>
                                    <td>{{ $city->name }}</td>
                                    <td>{{ $city->image }}</td>
                                    <td>{{ $city->trip_days }}</td>
                                    <td>${{ $city->price }}</td>
                                    <td><a href="{{ route('admin.delete.city', $city->id) }}"
                                            class="btn btn-danger  text-center ">delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

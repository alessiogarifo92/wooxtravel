@extends('layouts.app')

@section('content')

    <div class="reservation-form">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <form id="reservation-form" method="POST" role="search" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Register</h4>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <label for="username" class="form-label">Username</label>
                                    <input id="name" type="text" placeholder="Username"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </fieldset>
                            </div>

                            <div class="col-md-12">
                                <fieldset>
                                    <label for="email" class="form-label">Your Email</label>
                                    <input id="email" type="email" placeholder="Email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </fieldset>
                            </div>

                            <div class="col-md-12">
                                <fieldset>
                                    <label for="password" class="form-label">Your Password</label>
                                    <input id="password" type="password" placeholder="Password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </fieldset>
                                <fieldset>
                                    <label for="password" class="form-label">Confirm Password</label>
                                    <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">

                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button class="main-button" type="submit">register</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

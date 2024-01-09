@extends('layouts.app')

@section('content')
    @if (session())
        <script>
            setTimeout(function() {
                window.location.href = "http://localhost/home"
            }, 5000); // 5 seconds on success page and then redirect to homepage
        </script>
    @endif

    <div class="about-main-content" style="margin-top: -25px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content">
                        <div class="blur-bg"></div>
                        <h4>You booked this tour successfully!</h4>
                        <div class="line-dec"></div>
                        <h4>You'll be redirect to homepage in few seconds...</h4>
                        <div class="main-button">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

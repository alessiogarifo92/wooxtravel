@extends('layouts.app')

@section('content')
    <!-- ***** Main Banner Area Start ***** -->
    <section id="section-1">
        <div class="content-slider">
            <input type="radio" id="banner1" class="sec-1-input" name="banner" checked>
            <input type="radio" id="banner2" class="sec-1-input" name="banner">
            <input type="radio" id="banner3" class="sec-1-input" name="banner">
            <div class="slider">
                @foreach ($countries as $country)
                    <div id="top-banner-{{ $country->id }}" class="banner"
                        style="background-image:url('{{ asset('assets/images/' . $country->image) }}')">
                        <div class="banner-inner-wrapper header-text">
                            <div class="main-caption">
                                <h2>Take a Glimpse Into The Beautiful Country Of:</h2>
                                <h1>{{ $country->name }}</h1>
                                <div class="border-button"><a href="{{ route('traveling.about', $country->id) }}">Go
                                        There</a></div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="more-info">
                                            <div class="row">
                                                <div class="col-lg-3 col-sm-6 col-6">
                                                    <i class="fa fa-user"></i>
                                                    <h4><span>Population:</span><br>{{ $country->population }} M</h4>
                                                </div>
                                                <div class="col-lg-3 col-sm-6 col-6">
                                                    <i class="fa fa-globe"></i>
                                                    <h4><span>Territory:</span><br>{{ $country->territory }} KM<em>2</em>
                                                    </h4>
                                                </div>
                                                <div class="col-lg-3 col-sm-6 col-6">
                                                    <i class="fa fa-home"></i>
                                                    <h4><span>AVG Price:</span><br>${{ $country->avg_price }}</h4>
                                                </div>
                                                <div class="col-lg-3 col-sm-6 col-6">
                                                    <div class="main-button">
                                                        <a href="{{ route('traveling.about', $country->id) }}">Explore
                                                            More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <nav>
                <div class="controls">
                    <label for="banner1"><span class="progressbar"><span class="progressbar-fill"></span></span><span
                            class="text">1</span></label>
                    <label for="banner2"><span class="progressbar"><span class="progressbar-fill"></span></span><span
                            class="text">2</span></label>
                    <label for="banner3"><span class="progressbar"><span class="progressbar-fill"></span></span><span
                            class="text">3</span></label>
                </div>
            </nav>
        </div>
    </section>
    <!-- ***** Main Banner Area End ***** -->

    <div class="visit-country">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-heading">
                        <h2>Visit One Of Our Countries Now</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="items">
                        <div class="row">
                            @foreach ($countries as $country)
                                <div class="col-lg-12">
                                    <div class="item">
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-5">
                                                <div class="image">
                                                    <img src="{{ asset('assets/images/' . $country->image) }}"
                                                        alt="">
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-sm-7">
                                                <div class="right-content">
                                                    <h4>{{ $country->name }}</h4>
                                                    <span>{{ $country->continent }}</span>
                                                    <div class="main-button">
                                                        <a href="{{ route('traveling.about', $country->id) }}">Explore
                                                            More</a>
                                                    </div>
                                                    <p>{{ $country->description }}</p>
                                                    <ul class="info">
                                                        <li><i class="fa fa-user"></i> {{ $country->population }} Mil
                                                            People</li>
                                                        <li><i class="fa fa-globe"></i> {{ $country->territory }} km2</li>
                                                        <li><i class="fa fa-home"></i> ${{ $country->avg_price }}</li>
                                                    </ul>
                                                    <div class="text-button">
                                                        <a href="about.html">Need Directions ? <i
                                                                class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="side-bar-map">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="map">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5632473.46182988!2d-1.294497608415294!3d46.42429718940689!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c64ef6f596d61%3A0x5c56b5110fcb7b15!2sSwitzerland!5e0!3m2!1sen!2snl!4v1705920276486!5m2!1sen!2snl"
                                        width="100%" height="550px" frameborder="0"
                                        style="border:0; border-radius: 23px; " allowfullscreen=""></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

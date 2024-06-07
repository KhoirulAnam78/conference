@extends('layouts.main')

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top:100px">
        <ol class="carousel-indicators mb-3">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <!-- Hero Section Begin -->
                <section class="hero-section set-bg" data-setbg="{{ asset('storage/' . $image_slider_1) }}">
                    <div class="container" style="padding-top:50px; padding-bottom:50px">
                        <div class="row">
                            <div class="col-lg-7">
                                <h3 class="primary-btn mb-3" style="font-size:20px">
                                    {{ $start_date_conference }} - {{ $end_date_conference }} <br>
                                    {{ $conference_location }}
                                </h3>
                                <h3 style="color: white; font-size: 40px;text-shadow: 2px 2px 5px rgb(0, 0, 0);">
                                    {{ $topic }}</h3>

                                <br>
                                <a href="/register" class="primary-btn mb-3">Buy Ticket</a>
                            </div>
                            <div class="col-lg-5">
                                <h3 class="primary-btn mb-3" style="font-size:20px">{{ $openingSpeech[0]->name }}</h3>
                                <div class="row">
                                    @foreach ($openingSpeech[0]->listSpeaker as $item)
                                        <div class="col-5"><img class="img-thumbnail rounded-circle"
                                                src="{{ asset('storage/' . $item->image) }}" alt="">
                                        </div>
                                        <div class="col-7" style="padding-top: 12%">
                                            <h5 style="color: white;text-shadow: 2px 2px 5px rgb(0, 0, 0);">
                                                {{ $item->name }}
                                                <br>
                                                <span>{{ $item->position . $item->institution }}</span>
                                            </h5>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="justify-content-center" {{-- style="background-color: rgba(0,0,0,.5);
                        color: #fff; border: 3px solid white; border-radius: 20px " --}}>
                            <h3
                                style="text-align: center ;color: red;font: 800 40px Arial; -webkit-text-fill-color: white; -webkit-text-stroke: 1px;font-style: italic">
                                Hybrid Conference</h3>
                        </div>
                    </div>
                </section>
                <!-- Hero Section End -->

            </div>
            <div class="carousel-item">
                <!-- Hero Section Begin -->
                <section class="hero-section set-bg" data-setbg="{{ asset('storage/' . $image_slider_2) }}">
                    <div class="container" style="padding-top:50px; padding-bottom:50px">
                        <div class="row justify-content-center"
                            style="background-color: rgba(0,0,0,.7);
                        color: #fff; border: 5px solid rgba(255, 255, 255, 0.798); border-radius: 20px ">
                            <div class="col-lg-7" style="margin: auto; padding-left: 3%">
                                <h3
                                    style="padding-bottom: 5%; text-align: left;color: gold; font-size: 40px;text-shadow: 1px 1px 1px white">
                                    {{ $title_conference }}
                                </h3>
                                <h4 style="color:rgb(46, 121, 241); font-size: 30px;padding-bottom: 3%">
                                    Online Presentation</h4>
                                <div style="text-indent: 3%">
                                    <h4
                                        style="padding-bottom: 3%;text-align: left;color: white;text-shadow: 2px 2px 5px rgb(0, 0, 0);">
                                        Meeting ID : {{ $zoom_id }}</h4>
                                    <h4
                                        style="padding-bottom: 5%;text-align: left;color: white;text-shadow: 2px 2px 5px rgb(0, 0, 0);">
                                        Passcode : {{ $zoom_pass }}</h4>
                                </div>
                                <a href="{{ $zoom_link }}" class="primary-btn mb-3"> Open
                                    Zoom Here</a>
                            </div>
                            <div class="col-lg-5">
                                <img style="height: 450px" src="{{ url('') }}/assets/img/zoom-slide-2.png"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Hero Section End -->
            </div>
            <div class="carousel-item">
                <!-- Hero Section Begin -->
                <section class="hero-section set-bg" data-setbg="{{ asset('storage/' . $image_slider_3) }}">
                    <div class="container" style="padding-top:50px; padding-bottom:50px">
                        <div class="row">
                            <div class="col-lg-7">
                                <h3 class="primary-btn mb-3" style="font-size:20px">

                                    {{ $start_date_conference }} - {{ $end_date_conference }} <br>
                                    {{ $conference_location }}
                                </h3>
                                <h3 style="color: white; font-size: 40px;text-shadow: 2px 2px 5px rgb(0, 0, 0);">
                                    {{ $topic }}</h3>
                                <br>
                                <a href="/register" class="primary-btn mb-3">Buy Ticket</a>
                            </div>
                            <div class="col-lg-5">
                                <h3 class="primary-btn mb-3" style="font-size:20px">{{ $openingSpeech[0]->name }}</h3>
                                <div class="row">
                                    @foreach ($openingSpeech[0]->listSpeaker as $item)
                                        <div class="col-5"><img class="img-thumbnail rounded-circle"
                                                src="{{ asset('storage/' . $item->image) }}" alt="">
                                        </div>
                                        <div class="col-7" style="padding-top: 12%">
                                            <h5 style="color: white;text-shadow: 2px 2px 5px rgb(0, 0, 0);">
                                                {{ $item->name }}
                                                <span>{{ $item->position . $item->institution }}</span>
                                            </h5>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="justify-content-center" {{-- style="background-color: rgba(0,0,0,.5);
                        color: #fff; border: 3px solid white; border-radius: 20px " --}}>
                            <h3
                                style="text-align: center ;color: red;font: 800 40px Arial; -webkit-text-fill-color: white; -webkit-text-stroke: 1px;font-style: italic">
                                Hybrid Conference</h3>
                        </div>
                    </div>
                </section>
                <!-- Hero Section End -->
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Counter Section Begin -->
    <section class="counter-section bg-gradient">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="counter-text">
                        <span>Conference Date</span>
                        <h3>Count Every Second <br />Until the Event</h3>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="cd-timer" id="demo">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Counter Section End -->
    {{-- <section class="counter-section bg-grey">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 style="color:red">ONLINE CLOSED</h2>
                    <h3>Sorry, registration for online presenter has closed (30 September 2023)</h3>
                    <p>Full quota for online presenter.</p>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Home About Section Begin -->
    <section class="home-about-section" style="padding-bottom: 2%; margin:0;">
        <div class="container" style="margin-bottom:100px">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ha-text">
                        <h2>Topic Scopes</h2>
                        <ul>
                            @foreach ($scopes as $i)
                                <li><span class="icon_check"></span> {{ $i->scope_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ha-text">
                        <img src="{{ asset('storage/' . $logo) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="background-color: wheat;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ha-text">
                            <h3 style="font-weight: 600;padding-bottom:2%">Implementation</h3>
                            <ul>
                                <li><span class="icon_check"></span> Offline at {{ $conference_location }}</li>
                                <li><span class="icon_check"></span> Online Zoom:</li>
                                <li style="text-indent: 20px">Meeting ID: {{ $zoom_id }}
                                </li>
                                <li style="text-indent: 20px">Passcode: {{ $zoom_pass }}</li>
                                <li style="padding-top: 2%">
                                    <a href="{{ $zoom_link }}" class="primary-btn mb-3"> Open Zoom</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home About Section End -->

    <!-- Team Member Section Begin -->
    @foreach ($speakers as $item)
        <section class="team-member-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>{{ $item->name }}</h2>
                            {{-- <p>These are our communicators, you can see each person information</p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($item->listSpeaker as $ls)
                    <div class="member-item set-bg" style="margin: 10px; border: 3px solid black"
                        data-setbg="{{ asset('storage/' . $ls->image) }}">
                        <div class="mi-text" style="padding-right: 10px">
                            <h5>{{ $ls->name }}</h5>
                            <span>{{ $ls->institution }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endforeach
    <!-- Team Member Section End -->

    <!-- Schedule Section Begin -->
    {{-- <section class="schedule-section mb-5 mt-5" style="background-color: wheat; padding-top: 3%;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>IMPORTANT DATE</h2>
                        <p>Do not miss anything topic about the event</p>
                    </div>
                </div>
            </div>

            <div class="row">

                @foreach ($importantDates as $item)
                    <div class="col-lg-6 col-sm-6 mb-3">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <div class="section-title" style="margin:0px;padding:0px">
                                    <h4 class="text-white" style="font-weight: bold">{{ $item->name }}</h4>
                                </div>
                            </div>
                            @php
                                $date = \Carbon\Carbon::create($item->start_date);
                                $startDate = $date->format('d F Y');

                                if ($item->end_date) {
                                    $date = \Carbon\Carbon::create($item->end_date);
                                    $endDate = $date->format('d F Y');
                                } else {
                                    $endDate = '';
                                }
                            @endphp
                            <div class="card-body text-center">
                                <span style="font-size: 18px; padding:10px; color: white"
                                    class="badge bg-success rounded-pill">{{ $startDate }}
                                    {{ $endDate ? ' - ' . $endDate : '' }}</span>

                                <h6 class="pt-3">Time Remaining : </h6>
                                <p id="importantDates{{ $item->id }}" class="pt-2" style="font-size:18px"></p>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}
    <section class="schedule-section mb-5 mt-5" style="background-color: wheat; padding-top: 3%;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>IMPORTANT DATE</h2>
                        <p>Do not miss anything topic about the event</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($importantDates as $item)
                    <div class="col-lg-6 col-sm-6 mb-3">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <div class="section-title mb-0">
                                    <h4 class="text-white font-weight-bold">{{ $item->name }}</h4>
                                </div>
                            </div>
                            @php
                                $date = \Carbon\Carbon::create($item->start_date);
                                $startDate = $date->format('d F Y');

                                if ($item->end_date) {
                                    $date = \Carbon\Carbon::create($item->end_date);
                                    $endDate = $date->format('d F Y');
                                } else {
                                    $endDate = '';
                                }
                            @endphp
                            <div class="card-body text-center">
                                <span class="badge bg-success rounded-pill d-block mb-2 text-wrap" style="font-size:14px">
                                    {{ $startDate }} {{ $endDate ? ' - ' . $endDate : '' }}
                                </span>

                                <h6 class="mb-2">Time Remaining :</h6>
                                <p id="importantDates{{ $item->id }}" class="mb-0"></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Schedule Section End -->

    <!-- Pricing Section Begin -->
    {{-- <section class="pricing-section set-bg spad" data-setbg="{{ url('') }}/assets/img/pricing-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Ticket Pricing</h2>
                        <p>Get your event ticket plan</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">

                <div class="col-lg-4 col-md-8">
                    <div class="price-item">
                        <h4>Student Presenter</h4>
                        <div class="pi-price">
                            <ul>
                                <li>
                                    <h3 style="color: white">OFFLINE</h3>
                                </li>
                            </ul>
                        </div>
                        <h4 style="padding-bottom: 10px; color: black;font-weight: 400">550K IDR/37 USD</h4>
                        <div class="pi-price">
                            <ul>
                                <li>
                                    <h3 style="color: white">ONLINE</h3>
                                </li>
                            </ul>
                        </div>
                        <h4 style="color: black;font-weight: 400">150K IDR/10 USD</h4>

                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="price-item top-rated">
                        <div class="tr-tag">
                            <i class="fa fa-star"></i>
                        </div>
                        <h4 style="padding-top: 20px">Profesional Presenter</h4>
                        <div class="pi-price">
                            <ul>
                                <li>
                                    <h3 style="color: white">OFFLINE</h3>
                                </li>
                            </ul>
                        </div>
                        <h4 style="padding-bottom: 10px; color: black;font-weight: 400">750K IDR/50 USD</h4>
                        <div class="pi-price">
                            <ul>
                                <li>
                                    <h3 style="color: white">ONLINE</h3>
                                </li>
                            </ul>
                        </div>
                        <h4 style="color: black;font-weight: 400">250K IDR/17 USD</h4>

                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="price-item">
                        <h4>Student Participant</h4>
                        <div class="pi-price">
                            <ul>
                                <li>
                                    <h3 style="color: white">OFFLINE</h3>
                                </li>
                            </ul>
                        </div>
                        <h4 style="padding-bottom: 10px; color: black;font-weight: 400">350K IDR/24 USD</h4>
                        <div class="pi-price">
                            <ul>
                                <li>
                                    <h3 style="color: white">ONLINE</h3>
                                </li>
                            </ul>
                        </div>
                        <h4 style="color: black;font-weight: 400">100K IDR/7 USD</h4>

                    </div>
                </div>


            </div>
        </div>
    </section> --}}

    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($destinations as $index => $item)
                            <li data-target="#carouselExampleIndicators2" data-slide-to="{{ $index }}"
                                class="{{ $index === 0 ? 'active' : '' }}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach ($destinations as $index => $item)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img class="d-block w-100" width="100%" src="{{ asset('storage/' . $item->image) }}"
                                    alt="{{ $item->name }}">
                                <div class="carousel-caption d-none d-md-block text-white p-3"
                                    style="font-weight: bold; background-color:rgb(150, 150, 150);">
                                    <h4>{{ $item->name }}</h4>
                                    <p>{{ $item->info_destination }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button"
                        data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button"
                        data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section Begin -->
    <section class="contact-section spad" style="margin-top:50px;margin-bottom:100px; padding:0px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>Location</h2>
                        <p>Get directions to our event center</p>
                    </div>
                    <div class="cs-text">
                        <div class="ct-address">
                            <span>Address:</span>
                            <p>{{ $conference_location }}</p>
                        </div>
                        <ul>
                            <li>
                                <span>Phone:</span>
                                @foreach ($contact as $i)
                                    {{ $i->name . ' (' . $i->number . ')' }} <br>
                                @endforeach
                            </li>
                            <br>
                            <li class="mt-3">
                                <span>Email:</span>
                                {{ $email }}
                            </li>
                        </ul>
                        <div class="ct-links">
                            <span>Website:</span>
                            <p><a href="https://{{ $website }}" style="color:blue">{{ $website }}</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="cs-map">
                        {!! $map !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section End -->
@endsection

@push('script')
    {{-- COUNTDOWN AWAL --}}
    <script>
        const impdates = {!! json_encode($importantDates) !!};
        console.log(impdates);
        impdates.forEach(e => {
            console.log(e.end_date);
            var date = new Date();
            if (e.end_date == null) {
                date = new Date(e.start_date);
            } else {
                date = new Date(e.end_date);
            }


            const options = {
                month: 'short',
                day: 'numeric',
                year: 'numeric'
            };

            const formattedDate = date.toLocaleString('en-US', options);
            // Set the date we're counting down to
            var countDownDate = new Date(formattedDate + " 23:59:00").getTime();

            // Update the count down every 1 second
            var i = setInterval(function() {

                // Get today's date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the result in the element with id="demo"
                document.getElementById("importantDates" + e.id).innerHTML = days + " days " + hours +
                    " hour " +
                    minutes + " minutes " + seconds + " second ";

                // If the count down is finished, write some text
                if (distance < 0) {
                    clearInterval(i);
                    document.getElementById("importantDates" + e.id).innerHTML = "Sorry, the time is up.";
                }
            }, 1000);

        });
        console.log('ANAMAAMAMAM');


        // Set the date we're counting down to
        // var countDownAbstract = new Date("Nov 16, 2023 10:00:00").getTime();

        // // Update the count down every 1 second
        // var x = setInterval(function() {

        //     // Get today's date and time
        //     var now = new Date().getTime();

        //     // Find the distance between now and the count down date
        //     var distance = countDownAbstract - now;

        //     // Time calculations for days, hours, minutes and seconds
        //     var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        //     var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        //     var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        //     var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        //     // Display the result in the element with id="demo"
        //     document.getElementById("demo").innerHTML =
        //         '<div class="cd-item"><span>' + days + '</span><p>Days</p></div>' + '<div class="cd-item"><span>' +
        //         hours + '</span><p>Hour</p></div>' + '<div class="cd-item"><span>' +
        //         minutes + '</span><p>Minutes</p></div>' + '<div class="cd-item"><span>' + seconds +
        //         '</span><p>Seconds</p></div>';


        //     // days + "d " + hours + "h " +
        //     // minutes + "m " + seconds + "s "

        //     // If the count down is finished, write some text
        //     if (distance < 0) {
        //         clearInterval(x);
        //         document.getElementById("demo").innerHTML = "Sorry, the time is up.";
        //     }
        // }, 1000);
    </script>

    {{-- COUNT DOWN ABSTRACT NOTIF --}}
    {{-- <script>
        // Set the date we're counting down to
        var countDownDate = new Date("Nov 10, 2023 23:00:00").getTime();

        // Update the count down every 1 second
        var i = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("abstractAccept").innerHTML = days + " days " + hours + " hour " +
                minutes + " minutes " + seconds + " second ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(i);
                document.getElementById("abstractAccept").innerHTML = "Sorry, the time is up.";
            }
        }, 1000);
    </script> --}}

    {{-- COUNTDOWN ABSTRACT SUBMIT --}}
    {{-- <script>
        // Set the date we're counting down to
        var countDownSubmit = new Date("Nov 06, 2023 23:00:00").getTime();

        // Update the count down every 1 second
        var j = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownSubmit - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("abstractSubmit").innerHTML = days + " days " + hours + " hour " +
                minutes + " minutes " + seconds + " second ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(j);
                document.getElementById("abstractSubmit").innerHTML = "Sorry, the time is up.";
            }
        }, 1000);
    </script> --}}

    {{-- COUNTDOWN Full Paper --}}
    {{-- <script>
        // Set the date we're counting down to
        var countDownFullPaper = new Date("Nov 10, 2023 23:00:00").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownFullPaper - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("fullPaper").innerHTML = days + " days " + hours + " hour " +
                minutes + " minutes " + seconds + " second ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("fullPaper").innerHTML = "Sorry, the time is up.";
            }
        }, 1000);
    </script> --}}

    {{-- COUNTDOWN Conference --}}
    <script>
        // Set the date we're counting down to
        var cd = new Date({!! json_encode($start_date_conference) !!} + " 10:00:00").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = cd - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("demo").innerHTML =
                '<div class="cd-item"><span>' + days + '</span><p>Days</p></div>' + '<div class="cd-item"><span>' +
                hours + '</span><p>Hour</p></div>' + '<div class="cd-item"><span>' +
                minutes + '</span><p>Minutes</p></div>' + '<div class="cd-item"><span>' + seconds +
                '</span><p>Seconds</p></div>';


            // days + "d " + hours + "h " +
            // minutes + "m " + seconds + "s "

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "Sorry, the time is up.";
            }
        }, 1000);
    </script>
@endpush

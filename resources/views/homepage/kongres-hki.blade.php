@extends('layouts.main')

@section('content')
    <!-- Contact Form Section Begin -->
    <section class="hero-section set-bg" style="margin-top:200px" data-setbg="{{ url('') }}/assets/img/kongres-hki.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="text-align: center;">
                    <h2 style="color: black;text-shadow: 2px 2px 5px white; font-weight: 600">Satellite Event</h2>
                    <h2 style="color: green;text-shadow: 2px 2px 5px rgb(255, 255, 255);font-weight: 600; padding: 1%">
                        Invitation to Attend</h2>
                    <h2 style="color: black;text-shadow: 2px 2px 5px white;font-weight: 600">Congress HKI</h2>
                    <div class="row justify-content-center" style="padding: 2%">
                        <div class="col-lg-3">
                            <img src="{{ url('') }}/assets/img/Logo-HKI.png" alt="">
                        </div>
                    </div>
                    <br>
                    <h3 style="padding: 1%; color: #F5C343;text-shadow: 2px 2px 5px black;font-weight: 600">15 November 2023
                        (19.00-22.00 WIB)
                    </h3>
                    <h3 style="color: white;text-shadow: 2px 2px 5px black;font-weight: 600">Swissbell-Hotel,
                        Jambi</h3>
                    <a href="https://forms.gle/VUtbCQXuxpLthwax7" class="primary-btn my-3">Register for this
                        event</a>
                </div>
            </div>
        </div>
    </section>
@endsection

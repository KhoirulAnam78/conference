@extends('layouts.main')

@section('content')
    <!-- Contact Form Section Begin -->
    <section class="contact-from-section spad" style="margin-top:200px" style="padding-top:0px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Contact</h2>
                        {{-- <p>Fill in the form below to register.</p> --}}
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- CONTENT --}}
                            <!-- Contact Section Begin -->
                            <section class="contact-section spad">
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
                                                    <p>{{ $location }}</p>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <span>Phone:</span>
                                                        @foreach ($contact as $i)
                                                            {{ $i->name . ' (' . $i->number . ')' }} <br>
                                                        @endforeach
                                                    </li>

                                                    <li class="mt-3">
                                                        <span>Email:</span>
                                                        {{ $email }}
                                                    </li>
                                                </ul>
                                                <div class="ct-links">
                                                    <span>Website:</span>
                                                    <p>{{ $website }}</p>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

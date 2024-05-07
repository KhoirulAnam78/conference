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
                                                    <p>Swissbell-Hotel, Jambi <br /> Indonesia</p>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <span>Phone:</span>
                                                        Indra Lasmana Tarigan, M.Sc. (+6282142265676)<br />
                                                        Aulia Sanova, M.Pd. (+6285266180861) <br />
                                                        Dr. Yusnaidar, M.Si. (+628127866961) <br />
                                                        Restina Bemis, M.Si. (+6285274405887) <br>
                                                    </li>

                                                    <li class="mt-3">
                                                        <span>Email:</span>
                                                        icics2023@.unja.ac.id
                                                    </li>
                                                </ul>
                                                <div class="ct-links">
                                                    <span>Website:</span>
                                                    <p>https://icics2023unja.ac.id</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="cs-map">

                                                <iframe
                                                    src="https://maps.google.com/maps?q=swissbell jambi&t=&z=10&ie=UTF8&iwloc=&output=embed"
                                                    height="400" style="border:0;" allowfullscreen=""></iframe>
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

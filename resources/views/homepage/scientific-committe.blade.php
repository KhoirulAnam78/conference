@extends('layouts.main')

@section('content')
    <!-- Contact Form Section Begin -->
    <section class="contact-from-section spad" style="margin-top:200px" style="padding-top:0px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Scientific Committe</h2>
                        {{-- <p>Fill in the form below to register.</p> --}}
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card" style="border: 0px">
                        <div class="card-body">
                            {{-- CONTENT --}}
                            <div class="row justify-content-center">
                                {{-- Pembatas --}}
                                <div style="padding-left: 10px; padding-right: 10px">
                                    <div class="card" style="width: 16rem; border: 2px solid black">
                                        <img style="height: 280px"
                                            src="{{ url('') }}/assets/img/scientific-committe/SC-1.jpg"
                                            class="card-img-top" alt="...">
                                        <div class="card-body" style="height: 200px">
                                            <h5 class="card-title">Prof. Drs. Sutrisno, M.Sc., Ph.D</h5>
                                            <p class="card-text">Department of Chemistry, Universitas Jambi</p>
                                        </div>
                                    </div>
                                </div>
                                {{-- Pembatas --}}
                                <div style="padding-left: 10px; padding-right: 10px">
                                    <div class="card" style="width: 16rem; border: 2px solid black">
                                        <img style="height: 280px"
                                            src="{{ url('') }}/assets/img/scientific-committe/SC-2.png"
                                            class="card-img-top" alt="...">
                                        <div class="card-body" style="height: 200px">
                                            <h5 class="card-title">Dr. Sukro Muhab, M.Si</h5>
                                            <p class="card-text">Department of Educational Chemistry, Universitas Negeri
                                                Jakarta</p>
                                        </div>
                                    </div>
                                </div>
                                {{-- Pembatas --}}
                                <div style="padding-left: 10px; padding-right: 10px">
                                    <div class="card" style="width: 16rem; border: 2px solid black">
                                        <img style="height: 280px"
                                            src="{{ url('') }}/assets/img/scientific-committe/SC-3.png"
                                            class="card-img-top" alt="...">
                                        <div class="card-body" style="height: 200px">
                                            <h5 class="card-title">Muhamad A. Martoprawiro, M.S., Ph.D. </h5>
                                            <p class="card-text">Department of Chemistry, Institut Teknologi Bandung</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

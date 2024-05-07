@extends('layouts.main')

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top:100px">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <!-- Hero Section Begin -->
                <section class="hero-section set-bg" data-setbg="{{ url('') }}/assets/img/home-gentala.jpg">
                    <div class="container" style="padding-top:50px; padding-bottom:50px">
                        <div class="row">
                            <div class="col-lg-7">
                                <h3 class="primary-btn mb-3" style="font-size:20px">
                                    14-16
                                    November 2023, Swissbell-Hotel, Jambi
                                </h3>
                                <h3 style="color: white; font-size: 40px">Strengthening the Role of Chemistry as Basic
                                    Science in Supporting the
                                    Downstreaming of Agro-Industrial Products</h3>
                                <br>
                                <a href="/register" class="primary-btn mb-3">Buy Ticket</a>

                            </div>
                            <div class="col-lg-5">
                                <h3 class="primary-btn mb-3" style="font-size:20px">Opening Speech</h3>
                                <div class="row">
                                    <div class="col-5"><img src="{{ url('') }}/assets/img/opening-1.png"
                                            alt="">
                                    </div>
                                    <div class="col-7" style="padding-top: 12%">
                                        <h5 style="color: white"> Prof. Drs. Sutrisno, Ph.D
                                            <span>Rector of Jambi University</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5"><img src="{{ url('') }}/assets/img/opening-2.png"
                                            alt="">
                                    </div>
                                    <div class="col-7" style="padding-top: 12%">
                                        <h5 style="color: white"> Dr. Sukro Muhab, M.Si
                                            <span>President of HKI</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Hero Section End -->

            </div>
            <div class="carousel-item">
                <!-- Hero Section Begin -->
                <section class="hero-section set-bg" data-setbg="{{ url('') }}/assets/img/home-gentala.jpg">
                    <div class="container" style="padding-top:50px; padding-bottom:50px">
                        <div class="row">
                            <div class="col-lg-7">
                                <h3 class="primary-btn mb-3" style="font-size:20px">
                                    14-16
                                    November 2023, Swissbell-Hotel, Jambi
                                </h3>
                                <h3 style="color: white; font-size: 40px">Strengthening the Role of Chemistry as Basic
                                    Science in Supporting the
                                    Downstreaming of Agro-Industrial Products</h3>
                                <br>
                                <a href="/register" class="primary-btn mb-3">Buy Ticket</a>

                            </div>
                            <div class="col-lg-5">
                                <h3 class="primary-btn mb-3" style="font-size:20px">Opening Speech</h3>
                                <div class="row">
                                    <div class="col-5"><img src="{{ url('') }}/assets/img/opening-1.png"
                                            alt="">
                                    </div>
                                    <div class="col-7" style="padding-top: 12%">
                                        <h5 style="color: white"> Prof. Drs. Sutrisno, Ph.D
                                            <span>Rector of Jambi University</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5"><img src="{{ url('') }}/assets/img/opening-2.png"
                                            alt="">
                                    </div>
                                    <div class="col-7" style="padding-top: 12%">
                                        <h5 style="color: white"> Dr. Sukro Muhab, M.Si
                                            <span>President of HKI</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Hero Section End -->
            </div>
            <div class="carousel-item">
                <!-- Hero Section Begin -->
                <section class="hero-section set-bg" data-setbg="{{ url('') }}/assets/img/home-gentala.jpg">
                    <div class="container" style="padding-top:50px; padding-bottom:50px">
                        <div class="row">
                            <div class="col-lg-7">
                                <h3 class="primary-btn mb-3" style="font-size:20px">
                                    14-16
                                    November 2023, Swissbell-Hotel, Jambi
                                </h3>
                                <h3 style="color: white; font-size: 40px">Strengthening the Role of Chemistry as Basic
                                    Science in Supporting the
                                    Downstreaming of Agro-Industrial Products</h3>
                                <br>
                                <a href="/register" class="primary-btn mb-3">Buy Ticket</a>

                            </div>
                            <div class="col-lg-5">
                                <h3 class="primary-btn mb-3" style="font-size:20px">Opening Speech</h3>
                                <div class="row">
                                    <div class="col-5"><img src="{{ url('') }}/assets/img/opening-1.png"
                                            alt="">
                                    </div>
                                    <div class="col-7" style="padding-top: 12%">
                                        <h5 style="color: white"> Prof. Drs. Sutrisno, Ph.D
                                            <span>Rector of Jambi University</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5"><img src="{{ url('') }}/assets/img/opening-2.png"
                                            alt="">
                                    </div>
                                    <div class="col-7" style="padding-top: 12%">
                                        <h5 style="color: white"> Dr. Sukro Muhab, M.Si
                                            <span>President of HKI</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
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
@endsection

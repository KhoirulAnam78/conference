@extends('layouts.main')

@section('content')
    <!-- Contact Form Section Begin -->
    <section class="contact-from-section spad" style="margin-top:200px" style="padding-top:0px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Rundown ICICS 2023</h2>
                        {{-- <p>Fill in the form below to register.</p> --}}
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card" style="border: 0px">
                        <div class="card-body">
                            <section class="schedule-section">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="schedule-tab">
                                                <ul class="nav nav-tabs" role="tablist">
                                                    @foreach ($rundown as $item)
                                                        <li class="nav-item col-3" style="padding:0px; margin:0px">
                                                            <a class="nav-link active" data-toggle="tab"
                                                                href="#tabs-{{ $item->id }}" role="tab">
                                                                <h5>{{ $item->name }}</h5>
                                                                <p>{{ $item->date }}</p>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <div class="tab-content">
                                                    @foreach ($rundown as $item)
                                                        <div class="tab-pane active" id="tabs-{{ $item->id }}"
                                                            role="tabpanel">
                                                            @foreach ($item->detailRundown as $dr)
                                                                <div class="st-content">
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="col-lg-8" style="padding-left: 5%">
                                                                                <div class="sc-text">
                                                                                    <h4>{{ $dr->event }}</h4>
                                                                                    <ul>
                                                                                        <li><i class="fa fa-user"></i>
                                                                                            {{ $dr->organizer }}
                                                                                        </li>

                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <ul class="sc-widget">
                                                                                    <li><i class="fa fa-clock-o"></i>
                                                                                        {{ $dr->start_time }}-{{ $dr->end_time }}
                                                                                        WIB</li>
                                                                                    <li><i class="fa fa-map-marker"></i>
                                                                                        {{ $dr->place }}
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach

                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Form Section End -->
@endsection

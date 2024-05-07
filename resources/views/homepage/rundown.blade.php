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
                                                    <li class="nav-item col-3" style="padding:0px; margin:0px">
                                                        <a class="nav-link active" data-toggle="tab" href="#tabs-1"
                                                            role="tab">
                                                            <h5>Day 1</h5>
                                                            <p>November 14, 2023</p>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-3" style="padding:0px; margin:0px">
                                                        <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">
                                                            <h5>Day 2</h5>
                                                            <p>November 15, 2023</p>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-3" style="padding:0px; margin:0px">
                                                        <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">
                                                            <h5>Day 3</h5>
                                                            <p>November 16, 2023</p>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item col-3" style="padding:0px; margin:0px">
                                                        <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">
                                                            <h5>Day 4</h5>
                                                            <p>November 17, 2023</p>
                                                        </a>
                                                    </li>
                                                </ul><!-- Tab panes -->
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                                        <div class="st-content">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-lg-8" style="padding-left: 5%">
                                                                        <div class="sc-text">
                                                                            <h4>Arrival and Registration</h4>
                                                                            <ul>
                                                                                <li><i class="fa fa-user"></i> Committee
                                                                                </li>

                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <ul class="sc-widget">
                                                                            <li><i class="fa fa-clock-o"></i> 13.00-18.00
                                                                                WIB</li>
                                                                            <li><i class="fa fa-map-marker"></i>
                                                                                Swissbell-Hotel, Jambi
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="st-content">
                                                            <div class="container">
                                                                <div class="row">

                                                                    <div class="col-lg-8" style="padding-left: 5%">
                                                                        <div class="sc-text">
                                                                            <h4>Gala Dinner</h4>
                                                                            <ul>
                                                                                <li><i class="fa fa-user"></i> PNHKI, Branch
                                                                                    Head, FKJKI
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <ul class="sc-widget">
                                                                            <li><i class="fa fa-clock-o"></i> 19.30-22.00
                                                                                WIB</li>
                                                                            <li><i class="fa fa-map-marker"></i>
                                                                                Swissbell-Hotel, Jambi
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="tab-pane" id="tabs-2" role="tabpanel">
                                                        <div class="st-content">
                                                            <div class="container">
                                                                <div class="row">

                                                                    <div class="col-lg-8" style="padding-left: 5%">
                                                                        <div class="sc-text">
                                                                            <h4>FGD (Facility Sharing, MBKM and
                                                                                International Accreditation)</h4>
                                                                            <ul>
                                                                                <li><i class="fa fa-user"></i> PNHKI,
                                                                                    Branch Head, FKJKI
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <ul class="sc-widget">
                                                                            <li><i class="fa fa-clock-o"></i> 09.00-13.00
                                                                                WIB</li>
                                                                            <li><i class="fa fa-map-marker"></i>
                                                                                Swissbell-Hotel, Jambi
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="st-content">
                                                            <div class="container">
                                                                <div class="row">

                                                                    <div class="col-lg-8" style="padding-left: 5%">
                                                                        <div class="sc-text">
                                                                            <h4>HKI National Meeting and Forum of Heads of
                                                                                Chemistry Departments Indonesia
                                                                            </h4>
                                                                            <ul>
                                                                                <li><i class="fa fa-user"></i> HKI Center
                                                                                    Manager
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <ul class="sc-widget">
                                                                            <li><i class="fa fa-clock-o"></i> 14.00-17.30
                                                                                WIB</li>
                                                                            <li><i class="fa fa-map-marker"></i>
                                                                                Swissbell-Hotel, Jambi
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="st-content">
                                                            <div class="container">
                                                                <div class="row">

                                                                    <div class="col-lg-8" style="padding-left: 5%">
                                                                        <div class="sc-text">
                                                                            <h4>Congress HKI</h4>
                                                                            <ul>
                                                                                <li><i class="fa fa-user"></i> HKI Center
                                                                                    Manager
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <ul class="sc-widget">
                                                                            <li><i class="fa fa-clock-o"></i> 19.00-22.00
                                                                                WIB</li>
                                                                            <li><i class="fa fa-map-marker"></i>
                                                                                Swissbell-Hotel, Jambi
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="tab-pane" id="tabs-3" role="tabpanel">
                                                        <div class="st-content">
                                                            <div class="container">
                                                                <div class="row">

                                                                    <div class="col-lg-8" style="padding-left: 5%">
                                                                        <div class="sc-text">
                                                                            <h4>Opening Ceremony</h4>
                                                                            <ul>
                                                                                <li><i class="fa fa-user"></i> Rahmi,
                                                                                    S.Pd., M.Si.
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <ul class="sc-widget">
                                                                            <li><i class="fa fa-clock-o"></i> 08.00-08.10
                                                                                WIB</li>
                                                                            <li><i class="fa fa-map-marker"></i>
                                                                                Swissbell-Hotel, Jambi
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="st-content">
                                                            <div class="container">
                                                                <div class="row">

                                                                    <div class="col-lg-8" style="padding-left: 5%">
                                                                        <div class="sc-text">
                                                                            <h4>Presentation dance</h4>
                                                                            <ul>
                                                                                <li><i class="fa fa-user"></i> Rahmi,
                                                                                    S.Pd., M.Si.
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <ul class="sc-widget">
                                                                            <li><i class="fa fa-clock-o"></i> 08.10-08.30
                                                                                WIB</li>
                                                                            <li><i class="fa fa-map-marker"></i>
                                                                                Swissbell-Hotel, Jambi
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="st-content">
                                                            <div class="container">
                                                                <div class="row">

                                                                    <div class="col-lg-8" style="padding-left: 5%">
                                                                        <div class="sc-text">
                                                                            <h4>Indonesian National Anthem</h4>
                                                                            <ul>
                                                                                <li><i class="fa fa-user"></i>
                                                                                    Anjelli/Kania Difa
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <ul class="sc-widget">
                                                                            <li><i class="fa fa-clock-o"></i> 08.30-08.45
                                                                                WIB</li>
                                                                            <li><i class="fa fa-map-marker"></i>
                                                                                Swissbell-Hotel, Jambi
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="st-content">
                                                            <div class="container">
                                                                <div class="row">

                                                                    <div class="col-lg-8" style="padding-left: 5%">
                                                                        <div class="sc-text">
                                                                            <h4>Committee Chair Report</h4>
                                                                            <ul>
                                                                                <li><i class="fa fa-user"></i> Dr.
                                                                                    Madyawati Latief, S.P., M.Si.
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <ul class="sc-widget">
                                                                            <li><i class="fa fa-clock-o"></i> 08.45-09.00
                                                                                WIB</li>
                                                                            <li><i class="fa fa-map-marker"></i>
                                                                                Swissbell-Hotel, Jambi
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="st-content">
                                                            <div class="container">
                                                                <div class="row">

                                                                    <div class="col-lg-8" style="padding-left: 5%">
                                                                        <div class="sc-text">
                                                                            <h4>Speech by the Head of HKI Jambi Branch</h4>
                                                                            <ul>
                                                                                <li><i class="fa fa-user"></i> Prof. Drs.
                                                                                    Sutrisno, Ph.D.
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <ul class="sc-widget">
                                                                            <li><i class="fa fa-clock-o"></i> 09.00-09.15
                                                                                WIB</li>
                                                                            <li><i class="fa fa-map-marker"></i>
                                                                                Swissbell-Hotel, Jambi
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="st-content">
                                                            <div class="container">
                                                                <div class="row">

                                                                    <div class="col-lg-8" style="padding-left: 5%">
                                                                        <div class="sc-text">
                                                                            <h4>Speech by the Head of Central HKI</h4>
                                                                            <ul>
                                                                                <li><i class="fa fa-user"></i> Dr. Sukro
                                                                                    Muhab, M.Si.
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <ul class="sc-widget">
                                                                            <li><i class="fa fa-clock-o"></i> 09.15-09.30
                                                                                WIB</li>
                                                                            <li><i class="fa fa-map-marker"></i>
                                                                                Swissbell-Hotel, Jambi
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="st-content">
                                                            <div class="container">
                                                                <div class="row">

                                                                    <div class="col-lg-8" style="padding-left: 5%">
                                                                        <div class="sc-text">
                                                                            <h4>Pray</h4>
                                                                            <ul>
                                                                                <li><i class="fa fa-user"></i> Ustadz
                                                                                    Supian
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <ul class="sc-widget">
                                                                            <li><i class="fa fa-clock-o"></i> 09.30-09.40
                                                                                WIB</li>
                                                                            <li><i class="fa fa-map-marker"></i>
                                                                                Swissbell-Hotel, Jambi
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="st-content">
                                                            <div class="container">
                                                                <div class="row">

                                                                    <div class="col-lg-8" style="padding-left: 5%">
                                                                        <div class="sc-text">
                                                                            <h4>Coffee Break</h4>
                                                                            <ul>
                                                                                <li><i class="fa fa-user"></i> Restina
                                                                                    Bemis, S.Si., M.Si.
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <ul class="sc-widget">
                                                                            <li><i class="fa fa-clock-o"></i> 09.40-10.00
                                                                                WIB</li>
                                                                            <li><i class="fa fa-map-marker"></i>
                                                                                Swissbell-Hotel, Jambi
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="st-content">
                                                            <div class="container">
                                                                <div class="row">

                                                                    <div class="col-lg-8" style="padding-left: 5%">
                                                                        <div class="sc-text">
                                                                            <h4>Keynote Speaker</h4>

                                                                            <ul>
                                                                                <li><i class="fa fa-user"></i> 1. Prof.
                                                                                    Sedat Ballikaya, Ph.D(Istanbul
                                                                                    University)
                                                                                </li>
                                                                            </ul>
                                                                            <ul>
                                                                                <li><i class="fa fa-user"></i> 2. Prof.
                                                                                    Teruna Siahaan, Ph.D (Kansas
                                                                                    University)
                                                                                </li>
                                                                            </ul>
                                                                            <ul>
                                                                                <li><i class="fa fa-user"></i> 3.
                                                                                    Prof.Dr.Ir.Muh.Nurdin,
                                                                                    M.Sc. (Halu Oleo University)
                                                                                </li>
                                                                            </ul>
                                                                            <ul>
                                                                                <li><i class="fa fa-user"></i> 4. Dr.
                                                                                    AgusHaryono, (BRIN)
                                                                                </li>
                                                                            </ul>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <ul class="sc-widget">
                                                                            <li><i class="fa fa-clock-o"></i> 08:00 am -
                                                                                10:00 AM</li>
                                                                            <li><i class="fa fa-map-marker"></i>
                                                                                Swissbell-Hotel, Jambi
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="st-content">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-lg-8" style="padding-left: 5%">
                                                                        <div class="sc-text">
                                                                            <h4>Break</h4>
                                                                            <ul>
                                                                                <li><i class="fa fa-user"></i> All
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <ul class="sc-widget">
                                                                            <li><i class="fa fa-clock-o"></i> 12.30-13.30
                                                                                WIB</li>
                                                                            <li><i class="fa fa-map-marker"></i>
                                                                                Swissbell-Hotel, Jambi
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="st-content">
                                                            <div class="container">
                                                                <div class="row">

                                                                    <div class="col-lg-8" style="padding-left: 5%">
                                                                        <div class="sc-text">
                                                                            <h4>Parallel Seminars</h4>
                                                                            <ul>
                                                                                <li><i class="fa fa-user"></i> Prof. Dyah
                                                                                    Iswantini (IPB University)
                                                                                </li>
                                                                            </ul>
                                                                            <ul>
                                                                                <li><i class="fa fa-user"></i> Nazaruddin,
                                                                                    S.Si., M.Si., Ph.D(Jambi University)
                                                                                </li>
                                                                            </ul>
                                                                            <ul>
                                                                                <li><i class="fa fa-user"></i> Prof. Yuli
                                                                                    Rahmawati, Ph.D (Jakarta State
                                                                                    University)
                                                                                </li>
                                                                            </ul>
                                                                            <ul>
                                                                                <li><i class="fa fa-user"></i> Prof.
                                                                                    Indriana Kartini, Ph.D
                                                                                    (Gadjah Mada University)
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <ul class="sc-widget">
                                                                            <li><i class="fa fa-clock-o"></i> 13.30-17.30
                                                                                WIB</li>
                                                                            <li><i class="fa fa-map-marker"></i>
                                                                                Swissbell-Hotel, Jambi
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="st-content">
                                                            <div class="container">
                                                                <div class="row">

                                                                    <div class="col-lg-8" style="padding-left: 5%">
                                                                        <div class="sc-text">
                                                                            <h4>Closing Ceremony</h4>
                                                                            <ul>
                                                                                <li><i class="fa fa-user"></i> All
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <ul class="sc-widget">
                                                                            <li><i class="fa fa-clock-o"></i> 17.30-18.00
                                                                                WIB</li>
                                                                            <li><i class="fa fa-map-marker"></i>
                                                                                Swissbell-Hotel, Jambi
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tabs-4" role="tabpanel">
                                                        <div class="st-content">
                                                            <div class="container">
                                                                <div class="row">

                                                                    <div class="col-lg-8" style="padding-left: 5%">
                                                                        <div class="sc-text">
                                                                            <ul>
                                                                                <h4>Field Trip to Merangin Geopark (Option
                                                                                    1)

                                                                                </h4>
                                                                            </ul>
                                                                            <ul>
                                                                                <h4>Field trip to Muaro Jambi Temple, Jambi
                                                                                    City, Jambi Batik (Seberang City)
                                                                                    (Option 2)</h4>
                                                                            </ul>
                                                                            <ul>
                                                                                <li><i class="fa fa-user"></i> Rahmi,
                                                                                    S.Pd., M.Si.
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <ul class="sc-widget">
                                                                            <li><i class="fa fa-clock-o"></i> Full Day</li>
                                                                            <li><i class="fa fa-map-marker"></i>
                                                                                Jambi City
                                                                            </li>
                                                                        </ul>
                                                                    </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Form Section End -->
@endsection

@extends('layouts.administrator')

@section('content-dashboard')
    <h5>Selamat Datang {{ Auth::user()->email }} !</h5>
    <div class="row">
        <div class="col-xl-4 col-sm-6 mb-xl-0 my-4">
            <div class="card bg-secondary">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="numbers">
                                <h5 class="text-sm mb-0 text-uppercase font-weight-bold">All Registered User</h5>
                                <h5 class="font-weight-bolder">
                                    Online : {{ $regon }}
                                </h5>
                                <h5 class="font-weight-bolder">
                                    Offline : {{ $regof }}
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 my-4">
            <div class="card bg-secondary">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="numbers">
                                <h5 class="text-sm mb-0 text-uppercase font-weight-bold">Professional Presenter</h5>
                                <h5 class="font-weight-bolder">
                                    Online : {{ $profon }}
                                </h5>
                                <h5 class="font-weight-bolder">
                                    Offline : {{ $profof }}
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 my-4">
            <div class="card bg-secondary">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="numbers">
                                <h5 class="text-sm mb-0 text-uppercase font-weight-bold">Student Presenter</h5>
                                <h5 class="font-weight-bolder">
                                    Online : {{ $studon }}
                                </h5>
                                <h5 class="font-weight-bolder">
                                    Offline : {{ $studof }}
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 my-4">
            <div class="card bg-secondary">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="numbers">
                                <h5 class="text-sm mb-0 text-uppercase font-weight-bold">Participant</h5>
                                <h5 class="font-weight-bolder">
                                    Online : {{ $parton }}
                                </h5>
                                <h5 class="font-weight-bolder">
                                    Offline : {{ $partof }}
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

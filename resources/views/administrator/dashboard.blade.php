@extends('layouts.administrator')

@section('content-dashboard')
    <h5>Selamat Datang {{ Auth::user()->email }} !</h5>
    <div class="row">
        <div class="col-xl-4 col-sm-6 mb-xl-0 my-4">
            <div class="card bg-primary text-white">
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

        @foreach ($rekap as $i)
            <div class="col-xl-4 col-sm-6 mb-xl-0 my-4">
                <div class="card bg-primary text-white">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="numbers">
                                    <h5 class="text-sm mb-0 text-uppercase font-weight-bold">{{ $i->name }}</h5>
                                    <h5 class="font-weight-bolder">
                                        Online : {{ $i->online }}
                                    </h5>
                                    <h5 class="font-weight-bolder">
                                        Offline : {{ $i->offline }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <h5 class="my-3">Latest Activities</h5>
    <div class="row">
        <div class="col-12">
            @forelse ($log as $i)
                <div class="alert alert-success">
                    {{ $i->email . ' ' . $i->activity }}
                </div>
            @empty
                <span>No Activities !</span>
            @endforelse
        </div>
    </div>
@endsection

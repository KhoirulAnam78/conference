@extends('layouts.main')

@section('content')
    <section class="schedule-table-section spad" style="margin-top:200px">
        <div class="row justify-content-end">
            <div class="col-3 mb-3">
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                @include('dashboard-admin.sidebar')
                <div class="col-lg-9">
                    <div class="tab-content d-inline">
                        <div class="card">
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

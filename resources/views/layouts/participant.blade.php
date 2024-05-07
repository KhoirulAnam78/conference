@extends('layouts.main')

@section('content')
    <!-- Schedule Table Section Begin -->
    <section class="schedule-table-section spad" style="margin-top:200px">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="schedule-table-tab">
                        <ul class="nav nav-tabs" role="tablist">
                            @can('presenter')
                                <li class="nav-item ">
                                    <a class="nav-link {{ $title == 'Dashboard' ? 'active' : '' }}"
                                        href="/dashboard">Dashboard</a>
                                </li>
                                <li class="nav-item" style="white-space:nowrap;">
                                    <a class="nav-link {{ $title == 'My Abstrak' ? 'active' : '' }}"
                                        href="/abstrak">Abstract</a>
                                </li>
                                <li class="nav-item" style="white-space:nowrap;">
                                    <a class="nav-link {{ $title == 'Payment' ? 'active' : '' }}" href="payment">Payment</a>
                                </li>
                                <li class="nav-item" style="white-space:nowrap;">
                                    <a class="nav-link {{ $title == 'Upload Fulltext' ? 'active' : '' }}"
                                        href="/upload-fulltext">Upload
                                        Paper</a>
                                </li>
                                <li class="nav-item" style="white-space:nowrap;">
                                    <a class="nav-link {{ $title == 'My Profile' ? 'active' : '' }}" href="profile">Profile</a>
                                </li>
                            @endcan
                            @can('participant')
                                <li class="nav-item col-4" style="padding:0px;margin:0px">
                                    <a class="nav-link {{ $title == 'Dashboard' ? 'active' : '' }}"
                                        href="/dashboard">Dashboard</a>
                                </li>
                                <li class="nav-item col-4" style="padding:0px;margin:0px">
                                    <a class="nav-link {{ $title == 'Payment' ? 'active' : '' }}" href="payment">Payment</a>
                                </li>

                                <li class="nav-item col-4" style="padding:0px;margin:0px">
                                    <a class="nav-link {{ $title == 'My Profile' ? 'active' : '' }}" href="profile">Profile</a>
                                </li>
                            @endcan
                        </ul><!-- Tab panes -->
                        <div class="tab-content">
                            <div class="card">
                                <div class="card-body">
                                    @yield('content-dashboard')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="ha-text" style="padding-left:5px;padding-top:0px">
                                <h5>User Menu</h5>
                                <ul>
                                    <li><a href="/profile" class="btn btn-primary my-2">My Profile</li></a>
                                    @can('presenter')
                                        <li><a href="/abstrak" class="btn btn-primary mb-2">My Abstract</li></a>
                                    @endcan

                                    <li><a href="/payment" class="btn btn-primary mb-2">Payment</li></a>
                                    @can('presenter')
                                        <li><a href="/upload-fulltext" class="btn btn-primary mb-2">Full Paper</li></a>
                                    @endcan
                                    <li><a href="/change-password" class="btn btn-primary mb-2">Change Password</li></a>

                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </section>
    <!-- Schedule Table Section End -->
@endsection

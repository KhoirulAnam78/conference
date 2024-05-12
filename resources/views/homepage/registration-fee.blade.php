@extends('layouts.main')

@section('content')
    <!-- Contact Form Section Begin -->
    <section class="contact-from-section spad" style="margin-top:200px" style="padding-top:0px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Registration Fee</h2>
                        {{-- <p>Fill in the form below to register.</p> --}}
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- CONTENT --}}
                            <h4 class="mt-5">Fee</h4>
                            <table class="table my-3">

                                @foreach ($fee_information as $fee)
                                    <tr>
                                        <td colspan="4" class="bg-dark text-white" align="center">{{ $fee['dates'] }}
                                        </td>
                                    </tr>
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Online/Offline</th>
                                            <th scope="col">Fee</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fee['data'][0] as $i)
                                            <tr>
                                                <td>{{ $i->name }}</td>
                                                <td>{{ $i->attendance }}</td>
                                                <td>IDR. {{ $i->price }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                @endforeach
                            </table>


                            <h4 class="mt-5">Payment</h4>
                            <table class="table my-3">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Bank Name</th>
                                        <th scope="col">Account Number</th>
                                        <th scope="col">Account Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $bank_name }}</td>
                                        <td>{{ $payment_number }}</td>
                                        <td>{{ $recipient }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

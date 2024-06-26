@extends('layouts.participant')

@section('content-dashboard')
    <div class="row mx-3">
        @if (Auth::user()->participant->participant_type !== 'participant')
            @if (Auth::user()->participant->uploadAbstracts->first())
                <p><strong>Abstract Information : </strong>Your abstract status is
                    <strong>{{ Auth::user()->participant->uploadAbstracts->first()->status }}</strong>
                    <br>
                </p>
            @else
                <p><strong>Information : </strong>You haven't added abstract yet, add abstract in abstract menu</p>
            @endif
        @endif
    </div>
    <div class="row mx-3">
        @if (Auth::user()->participant->payments->first())
            <p><strong>Payment Information : </strong>Your payment status is
                <strong>{{ Auth::user()->participant->payments->first()->validation }}</strong>
            </p>
        @else
            <p><strong>Information : </strong>you have not made a payment, add payment in payment menu</p>
        @endif
    </div>
    <div class="row mx-3">
        @if (Auth::user()->participant->participant_type !== 'participant')
            <p>
                Download the article template in the download menu
            </p>
        @endif
    </div>

@endsection

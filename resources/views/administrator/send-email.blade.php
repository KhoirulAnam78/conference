@extends('layouts.administrator')

@section('content-dashboard')
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
                <h4>Send Email</h4>
            </div>
        </div>
    </div>
    <livewire:send-email-user />
@endsection

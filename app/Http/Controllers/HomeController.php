<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GlobalSetting;
use App\Models\ParticipantType;

class HomeController extends Controller
{
    public function index(){
        return view('homepage.index', [
            'title' => 'Home'
        ]);
    }

    public function rundown(){
        return view('homepage.rundown', [
            'title' => 'Rundown ICICS 2023'
        ]);
    }

    public function registrationFee(){
        $payment_number = GlobalSetting::where('name','payment_number')->first();
        $payment_number = $payment_number->value ?? null;
        $recipient = GlobalSetting::where('name','recipient')->first();
        $recipient = $recipient->value ?? null;
        $bank_name = GlobalSetting::where('name','bank_name')->first();
        $bank_name = $bank_name->value ?? null;
        $dates = ParticipantType::where('is_deleted',0)->groupBy('start_date')->orderBy('start_date')->select('start_date','end_date')->get();
        $fee_information = [];
        foreach($dates as $d){
            $participant = ParticipantType::where('start_date',$d->start_date)->get();
            $data = [];
            array_push($data,$participant);
            
            $start = \Carbon\Carbon::create($d->start_date);
            $startDate = $start->format('d F Y');
            $end = \Carbon\Carbon::create($d->end_date);
            $endDate = $end->format('d F Y');
            array_push($fee_information,[
                'dates' => $startDate .' - '.$endDate,
                'data' => $data
            ]);
        }
        $title = 'Registration Fee';
        
        return view('homepage.registration-fee', compact('payment_number','recipient','bank_name','title','fee_information'));
    }
}
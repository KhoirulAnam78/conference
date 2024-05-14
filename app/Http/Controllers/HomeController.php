<?php

namespace App\Http\Controllers;

use App\Models\TopicScope;
use Illuminate\Http\Request;
use App\Models\GlobalSetting;
use App\Models\ImportantDates;
use App\Models\ParticipantType;
use App\Models\Rundown;
use App\Models\Speakers;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home';
        $title_conference = GlobalSetting::where('name', 'title')->select('value')->first()->value;
        $topic = GlobalSetting::where('name', 'topic')->select('value')->first()->value;
        $website = GlobalSetting::where('name', 'website')->select('value')->first()->value;
        $email = GlobalSetting::where('name', 'email')->select('value')->first()->value;
        $logo = GlobalSetting::where('name', 'logo')->select('value')->first()->value;
        $start_date_conference = GlobalSetting::where('name', 'start_date_conference')->select('value')->first();
        $start_date_conference = $start_date_conference->value ?? null;
        if ($start_date_conference) {
            $start = \Carbon\Carbon::create($start_date_conference);
            $start_date_conference = $start->format('M d, Y');
        }
        $end_date_conference = GlobalSetting::where('name', 'end_date_conference')->select('value')->first();
        $end_date_conference = $end_date_conference->value ?? null;
        if ($end_date_conference) {
            $end = \Carbon\Carbon::create($end_date_conference);
            $end_date_conference = $end->format('M d, Y');
        }

        $conference_location = GlobalSetting::where('name', 'conference_location')->select('value')->first();
        $conference_location = $conference_location->value ?? null;

        $importantDates = ImportantDates::orderBy('start_date', 'ASC')->get();
        $scopes = TopicScope::where('is_delete', 0)->get();

        // IMAGE SLIDER
        $image_slider_1 = GlobalSetting::where('name', 'image-slider-1')->select('value')->first();
        $image_slider_1 = $image_slider_1->value ?? null;
        $image_slider_2 = GlobalSetting::where('name', 'image-slider-2')->select('value')->first();
        $image_slider_2 = $image_slider_2->value ?? null;
        $image_slider_3 = GlobalSetting::where('name', 'image-slider-3')->select('value')->first();
        $image_slider_3 = $image_slider_3->value ?? null;

        $map = GlobalSetting::where('name', 'maps')->first();
        if ($map) {
            $map = $map->value;
        }
        $contact = GlobalSetting::where('name', 'contacts')->first();
        if ($contact) {
            $contact = json_decode($contact->value);
        }

        $openingSpeech = Speakers::where('name', 'Opening Speech')->with('listSpeaker')->get();
        $openingSpeech = $openingSpeech ?? null;

        $speakers = Speakers::where('name', '!=', 'Opening Speech')->with('listSpeaker')->get();
        $speakers = $speakers ?? null;
        // dd($speakers);

        return view('homepage.index', compact('title', 'title_conference', 'topic', 'logo', 'website', 'email', 'start_date_conference', 'end_date_conference', 'conference_location', 'importantDates', 'scopes', 'image_slider_1', 'image_slider_2', 'image_slider_3', 'map', 'contact', 'openingSpeech', 'speakers'));
    }

    public function rundown()
    {
        $title = 'Rundown';
        $rundown = Rundown::with('detailRundown')->get();
        return view(
            'homepage.rundown',
            compact('title', 'rundown')
        );
    }

    public function registrationFee()
    {
        $payment_number = GlobalSetting::where('name', 'payment_number')->first();
        $payment_number = $payment_number->value ?? null;
        $recipient = GlobalSetting::where('name', 'recipient')->first();
        $recipient = $recipient->value ?? null;
        $bank_name = GlobalSetting::where('name', 'bank_name')->first();
        $bank_name = $bank_name->value ?? null;
        $dates = ParticipantType::where('is_deleted', 0)->groupBy('start_date')->orderBy('start_date')->select('start_date', 'end_date')->get();
        $fee_information = [];
        foreach ($dates as $d) {
            $participant = ParticipantType::where('start_date', $d->start_date)->get();
            $data = [];
            array_push($data, $participant);

            $start = \Carbon\Carbon::create($d->start_date);
            $startDate = $start->format('d F Y');
            $end = \Carbon\Carbon::create($d->end_date);
            $endDate = $end->format('d F Y');
            array_push($fee_information, [
                'dates' => $startDate . ' - ' . $endDate,
                'data' => $data
            ]);
        }
        $title = 'Registration Fee';

        return view('homepage.registration-fee', compact('payment_number', 'recipient', 'bank_name', 'title', 'fee_information'));
    }

    public function contact()
    {
        $title = 'Contact';
        $map = GlobalSetting::where('name', 'maps')->first();
        if ($map) {
            $map = $map->value;
        }
        $contact = GlobalSetting::where('name', 'contacts')->first();
        if ($contact) {
            $contact = json_decode($contact->value);
        }

        $location = GlobalSetting::where('name', 'conference_location')->first();
        if ($location) {
            $location = $location->value;
        }
        $email = GlobalSetting::where('name', 'email')->first();
        if ($email) {
            $email = $email->value;
        }
        $website = GlobalSetting::where('name', 'website')->first();
        if ($website) {
            $website = $website->value;
        }


        return view('homepage.contact', compact('title', 'map', 'contact', 'location', 'email', 'website'));
    }
}

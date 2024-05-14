<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function globalSetting()
    {
        $title = 'Global Setting';
        return view('dashboard-admin.global-setting', compact('title'));
    }

    public function scope()
    {
        $title = 'Scope';
        return view('dashboard-admin.scope', compact('title'));
    }

    public function participantType()
    {
        $title = 'Participant Type';
        return view('dashboard-admin.participant-type', compact('title'));
    }

    public function downloadFile()
    {
        $title = 'Download File';
        return view('dashboard-admin.download-file', compact('title'));
    }

    public function importantDates()
    {
        $title = 'Important Dates';
        return view('dashboard-admin.important-dates', compact('title'));
    }

    public function rundown()
    {
        $title = 'Rundown';
        return view('dashboard-admin.rundown', compact('title'));
    }

    public function speaker()
    {
        $title = 'Speakers';
        return view('dashboard-admin.speaker', compact('title'));
    }

    public function partner()
    {
        $title = 'Partner';
        return view('dashboard-admin.partner', compact('title'));
    }

    public function frontImageSlider()
    {
        $title = 'Front Image Slider';
        return view('dashboard-admin.front-image-slider', compact('title'));
    }

    public function dataLoaInvoice()
    {
        $title = 'Loa and Invoice';
        return view('dashboard-admin.loa-invoice-data', compact('title'));
    }

    public function additionalEvents(){
        $title = "Additional Events";
        return view('dashboard-admin.additional-event',compact('title'));
    }
}
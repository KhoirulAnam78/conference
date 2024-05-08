<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function globalSetting(){
        $title = 'Global Setting';
        return view('dashboard-admin.global-setting',compact('title'));
    }

    public function scope(){
        $title = 'Scope';
        return view('dashboard-admin.scope',compact('title'));
    }

    public function participantType(){
        $title = 'Participant Type';
        return view('dashboard-admin.participant-type',compact('title'));
    }

    public function downloadFile(){
        $title = 'Download File';
        return view('dashboard-admin.download-file',compact('title'));
    }
}

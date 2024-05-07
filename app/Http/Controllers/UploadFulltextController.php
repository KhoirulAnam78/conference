<?php

namespace App\Http\Controllers;

use App\Models\UploadFulltext;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUploadFulltextRequest;
use App\Http\Requests\UpdateUploadFulltextRequest;

class UploadFulltextController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function upload()
    {
        $this->authorize('presenter');
        return view('participant.fulltext', [
            'title' => 'Upload Fulltext'
        ]);
    }

    public function uploadedPaper()
    {
        $this->authorize('administrator');
        return view('administrator.uploaded-paper', [
            'title' => 'Uploaded Paper'
        ]);
    }

    public function sendEmail(){
        $this->authorize('administrator');
        return view('administrator.send-email',[
            'title' => 'Send Email'
        ]);
    }
}

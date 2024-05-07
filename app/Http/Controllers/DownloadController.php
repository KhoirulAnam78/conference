<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function downloadTemplate()
    {
        // return response()->download(public_path('uploads/downloads/template ICCS 2023.docx'));
        
        return response()->download(public_path('uploads/downloads/Anonymous Manuscript.docx'));
    }
    
    public function downloadGuidebook()
    {
        return response()->download(public_path('uploads/downloads/International Scientific Poster_ICICS_2023.pdf'));
    }

    public function downloadAbstractBook(){
        return response()->download(public_path('uploads/downloads/Program and Abstract Book of ICICS 2023.pdf'));
    }
}

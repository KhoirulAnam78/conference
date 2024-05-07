<?php

namespace App\Http\Controllers;

use PDF;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class UploadAbstractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function review()
    {
        $this->authorize('administrator');
        return view('administrator.review-abstract', [
            'title' => 'Review Abstract'
        ]);
    }

    public function testEmail()
    {
        $data = array('name' => 'Khoirul Anam');
        $attachment = [
            public_path() . '/storage/letter-of-acceptance/LOA-Muhammad Ridho.pdf'
        ];


        Mail::to('anam@gmail.com', 'Anam')->send(new SendMail('Abstract Rejected', "<p>
        Dear ANAM, <br>
        Congratulation! We are happy to inform you that your abstract for The 11st International Conference of the
        Indonesian
        Chemical Society
        (ICICS 2023) <br>
        Title of abstract : <strong>ANM ANAM</strong> has been accepted. <br>
        It is our great pleasure therefore to request that you submit your full paper, no later than September 30th
        2023 by following the template as attached in the website: icics2023.unja.ac.id.
        In addition, you are requested to proceed with the payment of the registration fee (no later than September 16th
        2023). <br> <br>
        After finishing the payment, kindly send the receipt to the committee via website. Here is the bank information
        detail: <br>
        Account name : Perkumpulan Indonesian Chemical Society <br>
        Account number : 698124931 <br>
        Bank name : Bank Negara Indonesia (BNI) <br> <br>
        For the purpose of the conference proceeding, we also require that you submit a detailed resume. Please kindly
        acknowledge the receipt of this email, and do not hesitate to contact the organizing committee
        (icics2023@.unja.ac.id) for any inquiry. Thank you for your attention. <br> <br>
        Warm regards, <br><br><br><br>
        Steering Committee ICICS 2023</p>", $attachment));

        // Mail::send('mail.accepted-abstract', $data, function ($message) {
        //     $message->to('anam@gmail.com', 'Anam')->subject('Abstract Accepted');
        //     // $message->attach(asset('storage/letter-of-acceptance/LOA-Muhammad Ridho.pdf'));
        //     $message->attach(public_path() . '/storage/letter-of-acceptance/LOA-Muhammad Ridho.pdf');
        // });

        dd('Email Sended');
    }
}

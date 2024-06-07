<?php

namespace App\Http\Livewire;

use PDF;
use App\Mail\SendMail;
use Livewire\Component;
use App\Models\TopicScope;
use Livewire\WithPagination;
use App\Models\GlobalSetting;
use Livewire\WithFileUploads;
use App\Models\UploadAbstract;
use App\Exports\AbstractExport;
use App\Models\ParticipantType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class ReviewAbstract extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $review = false;
    public $topic, $type, $title, $authors, $institutions, $abstract, $keywords, $presenter;
    public $status = '', $search2, $abstract_review, $status_hki;

    //LOA
    public $full_name, $institution, $abstractTitle, $loa, $loaPath;
    //Invoice
    public $email, $fee, $participant_type, $invoicePath, $rejectMessage;

    public function empty()
    {
        $this->dispatchBrowserEvent('close-modal');
        $this->topic = null;
        $this->type = null;
        $this->title = null;
        $this->keywords = null;
        $this->authors = null;
        $this->abstract = null;
        $this->institutions = null;
        $this->presenter = null;
        $this->abstract_review = null;
    }

    public function cancel()
    {
        $this->review = false;
    }

    public function showReview($id)
    {
        $abstract = UploadAbstract::find($id);
        if($this->status_hki = $abstract->participant->hki_status == 'not yet validated'){
            
        return redirect('/review-abstract')->with('message', "Cannot review ".$abstract->participant->full_name1." 's abstract because his/her HKI member status has not been validated. click the member hki validation menu to validate!");
        }else{
            $this->review = true;
            $this->abstract_review = $id;
            $this->topic = $abstract->topic;
            $this->type = $abstract->type;
            $this->title = $abstract->title;
            $this->keywords = $abstract->keywords;
            $this->authors = $abstract->authors;
            $this->abstract = $abstract->abstract;
            $this->loa = $abstract->loa;
            $this->institutions = $abstract->institutions;
            $this->presenter = $abstract->presenter;
        }
        

    }

    public function showValidate()
    {
        $participant = UploadAbstract::find($this->abstract_review)->participant;
        $participant_type = ParticipantType::find($participant->participant_type);
        $this->fee = $participant_type->price;
        $this->full_name = $participant->full_name1;
        $this->institution = $participant->institution;
        $this->abstractTitle = UploadAbstract::find($this->abstract_review)->title;
        $this->email = $participant->user->email;
        $this->participant_type = $participant_type->name .' ('. $participant_type->attendance.')';
        $this->dispatchBrowserEvent('show-modal');
    }

    public function back()
    {
        $this->review = false;
        $this->dispatchBrowserEvent('to-top');
    }

    public function accept()
    {
        set_time_limit(0);
        ini_set('memory_limit', '64M');
        // $this->email = UploadAbstract::find($this->abstract_review)->participant->user->email;

        $loa = PDF::loadView('administrator.pdf.loa', [
            'full_name' => $this->full_name,
            'institution' => $this->institution,
            'abstractTitle' => $this->abstractTitle
        ])
        ->setOptions(['defaultFont' => 'sans-serif'])
        ->setPaper('a4', 'potrait');
        
        $this->loaPath = 'uploads/letter-of-acceptance/' . 'LOA-ABS' . $this->abstract_review . '-' . $this->full_name . '.pdf';
        Storage::delete($this->loaPath);
        Storage::put($this->loaPath, $loa->output());

        
        $invoice = PDF::loadView('administrator.pdf.invoice', [
            'full_name' => $this->full_name,
            'fee' => $this->fee,
            'participant_type' => $this->participant_type,
            'email' => $this->email
        ])->setOptions(['defaultFont' => 'sans-serif'])
        ->setPaper('a4', 'landscape');
        
        $this->invoicePath = 'uploads/invoice/' . 'Invoice-ABS' . $this->abstract_review . '-' . $this->full_name . '.pdf';
        Storage::delete($this->invoicePath);
        Storage::put($this->invoicePath, $invoice->output());
        UploadAbstract::where('id', $this->abstract_review)->update([
            'status' => 'accepted',
            'loa' => $this->loaPath,
            'invoice' => $this->invoicePath,
            'reviewed_by' => Auth::user()->email
        ]);

        // $attachment = [
        //     Storage::path('uploads/' . $this->loaPath),
        //     Storage::path('uploads/' . $this->invoicePath),
        // ];
        $linkLoa = "'".asset('storage/'.$this->loaPath)."'";
        $linkInvoice = "'".asset('storage/'.$this->invoicePath)."'";
        
        // $linkLoa = "'https://icics2023.unja.ac.id/storage/uploads/" . $this->loaPath . "'";
        // $linkInvoice = "'https://icics2023.unja.ac.id/storage/uploads/" . $this->invoicePath . "'";
        
        $title = GlobalSetting::where('name','title')->first();
        $title = $title->value ?? null;

        $abbreviation = GlobalSetting::where('name','abbreviation')->first();
        $abbreviation = $abbreviation->value ?? null;

        $title = GlobalSetting::where('name','title')->first();
        $title = $title->value ?? null;

        $website = GlobalSetting::where('name','website')->first();
        $website = $website->value ?? null;

        $payment_number = GlobalSetting::where('name','payment_number')->first();
        $payment_number = $payment_number->value ?? null;
        
        $bank_name = GlobalSetting::where('name','bank_name')->first();
        $bank_name = $bank_name->value ?? null;
        
        $recipient = GlobalSetting::where('name','recipient')->first();
        $recipient = $recipient->value ?? null;
        
        $email = GlobalSetting::where('name','email')->first();
        $email = $email->value ?? null;

        Mail::to($this->email, $this->full_name)->send(new SendMail('ABSTRACT ACCEPTANCE', "<p>
        Dear" . $this->full_name . ", <br>
        Congratulation! We are happy to inform you that your abstract for ".$title.' ('.$abbreviation.')'." <br>
        Title of abstract : <strong>" . $this->abstractTitle . "</strong> has been accepted. <br>
        <a href=" . $linkLoa . ">Download LOA</a>
        <br>
        <a href=" . $linkInvoice . ">Download Invoice</a>
        <br>  
        <br>
        It is our great pleasure therefore to request that you submit your full paper, no later than July 9th
        2024 by following the template as attached in the website: <a href='".$website."'>".$website."</a>. <br>
        In addition, you are requested to proceed with the payment of the registration fee (no later than September 13th
        2024). <br> <br>
        After finishing the payment, kindly send the receipt to the committee via website. Here is the bank information
        detail: <br>
        Account name : ".$recipient."<br>
        Account number : ".$payment_number." <br>
        Bank name : ".$bank_name." <br> <br>
        For the purpose of the conference proceeding, we also require that you submit a detailed resume. Please kindly
        acknowledge the receipt of this email, and do not hesitate to contact the organizing committee
        (".$email.") for any inquiry. Thank you for your attention. <br> <br>
        Warm regards, <br><br><br><br>
        Steering Committee ".$abbreviation."</p>"));

        return redirect('/review-abstract')->with('message', 'Review succefully !');
    }

    public function showReject(){
        $participant = UploadAbstract::find($this->abstract_review)->participant;
        $this->email = $participant->user->email;
        $this->dispatchBrowserEvent('show-reject');
    }

    public function reject()
    {
        $email = UploadAbstract::find($this->abstract_review)->participant->user->email;
        $abstract = UploadAbstract::find($this->abstract_review)->title;
        UploadAbstract::where('id', $this->abstract_review)->update([
            'status' => 'rejected',
            'reviewed_by' => Auth::user()->email
        ]);
        $title = GlobalSetting::where('name','title')->first();
        $title = $title->value ?? null;

        Mail::to($email)->send(new SendMail('Abstract Rejected', "Dear Author,
        Sorry, your article ''" . $abstract . "'' has been rejected to be presented at ".$title." Conference. <br> <br>".$this->rejectMessage));
        session()->flash('message', 'Review succesfully !');
        return redirect('/review-abstract')->with('message', 'Review succefully !');
    }

    public function export()
    {
        set_time_limit(0);
        ini_set('memory_limit', '2048M');
        return Excel::download(new AbstractExport($this->status), 'Abstract Submitted Isolleac 2024.xlsx');
    }

    public function render()
    {

        return view('livewire.review-abstract', [
            'abstracts' => UploadAbstract::where('status', 'like', '%' . $this->status)->whereHas('participant', function ($query) {
                $query->where('full_name1', 'like', '%' . $this->search2 . '%');
            })->orderBy('topic')->paginate(10),
            'scopes' => TopicScope::where('is_delete',0)->get()
        ]);
    }
}
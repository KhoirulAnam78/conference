<?php

namespace App\Http\Livewire;

use PDF;
use App\Mail\SendMail;
use Livewire\Component;
use App\Models\TopicScope;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\UploadAbstract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ReviewAbstract extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $review = false;
    public $topic, $type, $title, $authors, $institutions, $abstract, $keywords, $presenter;
    public $search = '', $search2, $abstract_review, $status_hki;

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
        if ($participant->hki_status == 'valid') {
            if ($participant->participant_type == 'participant') {
                if ($participant->attendance == 'offline') {
                    $harga = 350000;
                    $discount = $harga * 0.25;
                    $this->fee = 'IDR ' . $harga - $discount;
                } else {
                    $harga = 100000;
                    $discount = $harga * 0.25;
                    $this->fee = 'IDR ' . $harga - $discount;
                }
            } elseif ($participant->participant_type == 'professional presenter') {
                if ($participant->attendance == 'offline') {
                    $harga = 750000;
                    $discount = $harga * 0.25;
                    $this->fee = 'IDR ' . $harga - $discount;
                } else {
                    $harga = 250000;
                    $discount = $harga * 0.25;
                    $this->fee = 'IDR ' . $harga - $discount;
                }
            } else {
                if ($participant->attendance == 'offline') {
                    $harga = 550000;
                    $discount = $harga * 0.25;
                    $this->fee = 'IDR ' . $harga - $discount;
                } else {
                    $harga = 150000;
                    $discount = $harga * 0.25;
                    $this->fee = 'IDR ' . $harga - $discount;
                }
            }
        } else {
            if ($participant->participant_type == 'participant') {
                if ($participant->attendance == 'offline') {
                    $this->fee = 'IDR 350.000 / $24 USD';
                } else {
                    $this->fee = 'IDR 100.000 / $7 USD';
                }
            } elseif ($participant->participant_type == 'professional presenter') {
                if ($participant->attendance == 'offline') {
                    $this->fee = 'IDR 750.000 / $50 USD';
                } else {
                    $this->fee = 'IDR 250.000 / $17 USD';
                }
            } else {
                if ($participant->attendance == 'offline') {
                    $this->fee = 'IDR 550.000 / $37 USD';
                } else {
                    $this->fee = 'IDR 150.000 / $10 USD';
                }
            }
        }
        $this->full_name = $participant->full_name1;
        $this->institution = $participant->institution;
        $this->abstractTitle = UploadAbstract::find($this->abstract_review)->title;
        $this->email = $participant->user->email;
        $this->participant_type = $participant->participant_type;
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
        ])->setPaper('a4', 'potrait');
        
        // Storage::put('invoice/' . 'Invoice-ABS' . $this->abstract_review . '-' . $this->full_name . '.pdf', $invoice->output());
        
        // dd('success');
        $loa->save('/home/icics2023/public_html/uploads/letter-of-acceptance/LOA-ABS' . $this->abstract_review . '-' . $this->full_name . '.pdf');
        // Storage::put('letter-of-acceptance/' . 'LOA-ABS' . $this->abstract_review . '-' . $this->full_name . '.pdf', $loa->output());
        $this->loaPath = 'letter-of-acceptance/' . 'LOA-ABS' . $this->abstract_review . '-' . $this->full_name . '.pdf';

        $invoice = PDF::loadView('administrator.pdf.invoice', [
            'full_name' => $this->full_name,
            'fee' => $this->fee,
            'participant_type' => $this->participant_type,
            'email' => $this->email
        ])->setPaper('a4', 'landscape');
        
        $invoice->save('/home/icics2023/public_html/uploads/invoice/Invoice-ABS'. $this->abstract_review . '-' . $this->full_name . '.pdf');
        
        $this->invoicePath = 'invoice/' . 'Invoice-ABS' . $this->abstract_review . '-' . $this->full_name . '.pdf';

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
        
        $linkLoa = "'https://icics2023.unja.ac.id/uploads/" . $this->loaPath . "'";
        $linkInvoice = "'https://icics2023.unja.ac.id/uploads/" . $this->invoicePath . "'";

        Mail::to($this->email, $this->full_name)->send(new SendMail('ABSTRACT ACCEPTANCE', "<p>
        Dear" . $this->full_name . ", <br>
        Congratulation! We are happy to inform you that your abstract for The 11st International Conference of the
        Indonesian
        Chemical Society
        (ICICS 2023) <br>
        Title of abstract : <strong>" . $this->abstractTitle . "</strong> has been accepted. <br>
        <a href=" . $linkLoa . ">Download LOA</a>
        <br>
        <a href=" . $linkInvoice . ">Download Invoice</a>
        <br>  
        <br>
        It is our great pleasure therefore to request that you submit your full paper, no later than September 30th
        2023 by following the template as attached in the website: <a href='icics2023.unja.ac.id'>icics2023.unja.ac.id</a>. <br>
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
        Steering Committee ICICS 2023</p>"));

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
        Mail::to($email)->send(new SendMail('Abstract Rejected', "Dear Author,
        Sorry, your article ''" . $abstract . "'' has been rejected to be presented at the 11st ICICS 2023 Conference. <br> <br>".$this->rejectMessage));
        session()->flash('message', 'Review succesfully !');
        return redirect('/review-abstract')->with('message', 'Review succefully !');
    }

    public function render()
    {

        return view('livewire.review-abstract', [
            'abstracts' => UploadAbstract::where('status', 'like', '%' . $this->search)->whereHas('participant', function ($query) {
                $query->where('full_name1', 'like', '%' . $this->search2 . '%');
            })->orderBy('topic')->paginate(10),
            'scopes' => TopicScope::where('is_delete',0)->get()
        ]);
    }
}
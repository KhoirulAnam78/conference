<?php

namespace App\Http\Livewire;

use PDF;
use App\Mail\SendMail;
use App\Models\Payment;
use Livewire\Component;
use App\Utils\LogActivity;
use App\Models\Participant;
use Livewire\WithPagination;
use App\Models\GlobalSetting;
use App\Exports\PaymentExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class PaymentValidation extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $validation = false;
    public $full_name1, $email, $participant_type, $payment_for, $fee, $discount, $fee_after_discount, $total_bill, $proof_of_payment, $paymentValidate;
    public $search = '', $search2 = '';
    public $no_receipt, $for_payment_of, $amount, $receipt, $receiptPath;

    public $title,$abbreviation;

    public function mount(){
        
        $title = GlobalSetting::where('name','title')->first();
        $this->title = $title->value ?? null;
        
        $abbreviation = GlobalSetting::where('name','abbreviation')->first();
        $this->abbreviation = $abbreviation->value ?? null;
    }

    public function empty()
    {
        $this->full_name1 = null;
        $this->proof_of_payment = null;
        $this->paymentValidate = null;
        $this->email = null;
        $this->participant_type = null;
        $this->payment_for = null;
        $this->fee = null;
        $this->discount = null;
        $this->fee_after_discount = null;
        $this->total_bill = null;
        $this->proof_of_payment = null;
    }
    public function showDetail($id)
    {
        $this->validation = true;
        $this->paymentValidate = $id;
        $payment = Payment::find($id);
        $this->full_name1 = $payment->participant->full_name1;
        $this->email = $payment->participant->user->email;
        $participant = $payment->participant->participantType;
        $this->participant_type = $participant->name .'('.$participant->attendance.')';
        $this->payment_for = 'participant';
        if ($payment->upload_abstract_id !== null) {
            $this->payment_for = $payment->uploadAbstract->title;
        }
        $this->receipt = $payment->receipt;
        $this->fee = $payment->fee;
        $this->discount = $payment->discount;
        $this->fee_after_discount = $payment->fee_after_discount;
        $this->total_bill = $payment->total_bill;
        $this->proof_of_payment = $payment->proof_of_payment;
    }

    public function showValidate()
    {
        $this->amount = $this->total_bill;
        $participant = Payment::find($this->paymentValidate)->participant->participant_type;
        if ($participant !== 'participant') {
            $this->for_payment_of = 'Registration Fee of '.$this->abbreviation.' as Author';
        } else {
            $this->for_payment_of = 'Registration Fee of '.$this->abbreviation.' as Participant';
        }
        $this->dispatchBrowserEvent('show-modal');
    }

    public function valid()
    {
        $this->validate([
            'no_receipt' => 'required',
            'full_name1' => 'required',
            'amount' => 'required',
            'for_payment_of' => 'required'
        ]);
        
        set_time_limit(0);
        ini_set('memory_limit', '64M');
        $participant_id = Payment::find($this->paymentValidate)->participant_id;
        // $email = Participant::find($participant_id)->user->email;
        $receipt = PDF::loadView('administrator.pdf.receipt', [
            'full_name' => $this->full_name1,
            'fee' => $this->amount,
            'receipt_no' => $this->no_receipt,
            'payment_for' => $this->for_payment_of
        ])->setOptions(['defaultFont' => 'sans-serif'])
        ->setPaper('a4', 'potrait');
        $abstract = Payment::find($this->paymentValidate)->uploadAbstract;
        if ($abstract) {
            $id = $abstract->id;
        } else {
            $id = 'participant';
        }
        Storage::put('uploads/receipt/' . 'receipt-abs-' . $id . '-' . $this->full_name1 . '.pdf', $receipt->output());
        $this->receiptPath = 'uploads/receipt/' . 'receipt-abs-' . $id . '-' . $this->full_name1 . '.pdf';
        Payment::where('id', $this->paymentValidate)->update([
            'validation' => 'valid',
            'receipt' => $this->receiptPath,
            'validated_by' => Auth::user()->email
        ]);


        $attachment = [
            public_path() . 'storage/' . $this->receiptPath,
        ];

        $linkreceipt = asset('storage/'.$this->receiptPath);

        if ($abstract) {
            Mail::to($this->email, $this->full_name1)->send(new SendMail('Payment Validation', "<p>
            Dear " . $this->full_name1 . ", <br>
            We have validated your payment for the abstract entitled <strong>" . $abstract->title . "</strong>, here we include
            your receipt of payment. <br>
            <a href=" . $linkreceipt . ">Download Receipt</a>
            <br> <br>
            Warm regards, <br><br><br><br>
            Steering Committee ".$this->abbreviation." </p>"));
        } else {
            Mail::to($this->email, $this->full_name1)->send(new SendMail('Payment Validation', "<p>
            Dear " . $this->full_name1 . ", <br>
            We have validated your payment for the participant ".$this->abbreviation.", here we include
            your receipt of payment. <br>
            Warm regards, <br><br><br><br>
            Steering Committee ".$this->abbreviation." </p>"));
        }
        LogActivity::addLog("Validate payment 'valid' for ".$this->full_name1." (".$this->email.")");

        return redirect('/payment-validation')->with('message', 'Validation succesfully !');
    }

    public function back()
    {
        $this->validation = false;

        $this->dispatchBrowserEvent('to-top');
    }

    public function invalid()
    {
        $participant_id = Payment::find($this->paymentValidate)->participant_id;
        $email = Participant::find($participant_id)->user->email;
        Payment::where('id', $this->paymentValidate)->update([
            'validation' => 'invalid',
            'validated_by' => Auth::user()->email
        ]);
        Mail::to($email)->send(new SendMail('Payment Validation', 'Yout payment for ' . $this->for_payment_of . ' is invalid!', []));
        
        LogActivity::addLog("Validate payment 'valid' for (".$email.")");
        return redirect('/payment-validation')->with('message', 'Validation succesfully !');
    }

    public function export()
    {
        set_time_limit(0);
        ini_set('memory_limit', '2048M');
        return Excel::download(new PaymentExport(), 'All Payment '.$this->abbreviation.'.xlsx');
    }

    public function render()
    {
        return view('livewire.payment-validation', [
            'payments' => Payment::where('validation', 'like', '%' . $this->search)->orderBy('created_at')->whereHas('participant', function ($query) {
                $query->where('full_name1', 'like', '%' . $this->search2 . '%');
            })->paginate(10)
        ]);
    }
}
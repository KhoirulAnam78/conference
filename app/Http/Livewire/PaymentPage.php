<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Livewire\Component;
use App\Utils\LogActivity;
use App\Models\GlobalSetting;
use Livewire\WithFileUploads;
use App\Models\UploadAbstract;
use App\Models\ParticipantType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PaymentPage extends Component
{
    public $fee, $discount, $total_bill, $fee_after_discount, $proof_of_payment;
    public $add = false, $edit = false, $payment_edit_id, $abstract_delete_id;
    public $abstract, $uploadAbstractId;

    use WithFileUploads;

    public function mount()
    {
        if (Auth::user()->participant->participantType->type != 'Participant') {
            $this->abstract = UploadAbstract::where('participant_id', Auth::user()->participant->id)->where('status', 'accepted')->get();
        }
    }
    public function rules()
    {
        if (Auth::user()->participant->participantType->type == 'Participant') {
            return
                [
                    'total_bill' => 'required',
                    'proof_of_payment' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                ];
        } else {
            return
                [
                    'total_bill' => 'required',
                    'uploadAbstractId' => 'required',
                    'proof_of_payment' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                ];
        }
    }

    //Custom Errror messages for validation
    protected $messages = [
        'total_bill.required' => 'Total bill is required !',
        'uploadAbstractId.required' => 'Pay for abstract is required !',
        'proof_of_payment.required' => 'Invoice is required !',
    ];

    //Reatime Validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $this->fee = 'IDR. ' . auth()->user()->participant->participantType->price;
        $this->total_bill = $this->fee;
        $this->discount = 0;
        $this->fee_after_discount = $this->total_bill;
        

        $this->add = true;
        $this->dispatchBrowserEvent('to-top');
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function empty()
    {
        $this->payment_edit_id = null;
        $this->fee = null;
        $this->discount = null;
        $this->total_bill = null;
        $this->fee_after_discount = null;
        $this->proof_of_payment = null;
        $this->uploadAbstractId = null;
        $this->edit = false;
    }

    // public function editAbstract($id)
    // {
    //     $abstract = UploadAbstract::find($id);
    //     $this->payment_edit_id = $id;
    //     $this->total_bill = $abstract->total_bill;
    //     $this->fee_after_discount = $abstract->fee_after_discount;
    //     $this->proof_of_payment = $abstract->proof_of_payment;
    //     $this->edit = true;
    // }

    // public function update()
    // {
    //     $this->validate();
    //     Payment::where('id', $this->payment_edit_id)->update([
    //         'total_bill' => $this->total_bill,
    //         'proof_of_payment' => $this->proof_of_payment,
    //     ]);

    //     session()->flash('message', 'Edit abstract was successful !');
    //     $this->empty();
    //     $this->cancel();
    // }

    public function cancel()
    {
        $this->add = false;
        $this->edit = false;
        $this->resetErrorBag();
        $this->resetValidation();
        $this->dispatchBrowserEvent('to-top');
    }

    public function save()
    {
        $this->validate();
        $imagePath = $this->proof_of_payment->store('images');
        Payment::create([
            'fee' => $this->fee,
            'discount' => $this->discount,
            'fee_after_discount' => $this->fee_after_discount,
            'total_bill' => $this->total_bill,
            'proof_of_payment' => $imagePath,
            'validation' => 'not yet validated',
            'participant_id' => Auth::user()->participant->id,
            'upload_abstract_id' => $this->uploadAbstractId
        ]);

        
        LogActivity::addLog("Add new payment ");

        session()->flash('message', 'Add payment was successful !');
        $this->cancel();
        $this->empty();
    }

    public function render()
    {
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
        // dd($fee_information);
        
        $payments = Payment::where('participant_id', Auth::user()->participant->id)->latest()->get();
        return view('livewire.payment-page', compact('payments','payment_number','recipient','bank_name','fee_information'));
    }
}
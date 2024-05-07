<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\UploadAbstract;
use Illuminate\Support\Facades\Auth;

class PaymentPage extends Component
{
    public $fee, $discount, $total_bill, $fee_after_discount, $proof_of_payment;
    public $add = false, $edit = false, $payment_edit_id, $abstract_delete_id;
    public $abstract, $uploadAbstractId;

    use WithFileUploads;

    public function mount()
    {
        if (Auth::user()->participant->participant_type !== 'participant') {
            $this->abstract = UploadAbstract::where('participant_id', Auth::user()->participant->id)->where('status', 'accepted')->get();
        }
    }
    public function rules()
    {
        if (Auth::user()->participant->participant_type == 'participant') {
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
        if (Auth::user()->participant->participant_type !== 'participant') {
            $this->abstract = UploadAbstract::where('participant_id', Auth::user()->participant->id)->where('status', 'accepted')->get();
        }
        if (Auth::user()->participant->hki_status == 'valid') {
            if (Auth::user()->participant->participant_type == 'participant') {
                if (Auth::user()->participant->attendance == 'offline') {
                    $this->fee = 350000;
                    $this->discount = $this->fee * 0.25;
                    $this->fee_after_discount = $this->fee - $this->discount;
                    $this->total_bill = $this->fee_after_discount;
                } else {
                    $this->fee = 100000;
                    $this->discount = $this->fee * 0.25;
                    $this->fee_after_discount = $this->fee - $this->discount;
                    $this->total_bill = $this->fee_after_discount;
                }
            } elseif (Auth::user()->participant->participant_type == 'professional presenter') {
                if (Auth::user()->participant->attendance == 'offline') {
                    $this->fee = 750000;
                    $this->discount = $this->fee * 0.25;
                    $this->fee_after_discount = $this->fee - $this->discount;
                    $this->total_bill = $this->fee_after_discount;
                } else {
                    $this->fee = 250000;
                    $this->discount = $this->fee * 0.25;
                    $this->fee_after_discount = $this->fee - $this->discount;
                    $this->total_bill = $this->fee_after_discount;
                }
            } else {
                if (Auth::user()->participant->attendance == 'offline') {
                    $this->fee = 550000;
                    $this->discount = $this->fee * 0.25;
                    $this->fee_after_discount = $this->fee - $this->discount;
                    $this->total_bill = $this->fee_after_discount;
                } else {
                    $this->fee = 150000;
                    $this->discount = $this->fee * 0.25;
                    $this->fee_after_discount = $this->fee - $this->discount;
                    $this->total_bill = $this->fee_after_discount;
                }
            }
        } else {
            if (Auth::user()->participant->participant_type == 'participant') {
                if (Auth::user()->participant->attendance == 'offline') {
                    $this->fee = 'IDR 350K / $24 USD';
                    $this->discount = 0;
                    $this->fee_after_discount =  $this->fee;
                    $this->total_bill = $this->fee_after_discount;
                } else {
                    $this->fee = 'IDR 100K / $7 USD';
                    $this->discount = 0;
                    $this->fee_after_discount =  $this->fee;
                    $this->total_bill = $this->fee_after_discount;
                }
            } elseif (Auth::user()->participant->participant_type == 'professional presenter') {
                if (Auth::user()->participant->attendance == 'offline') {
                    $this->fee = 'IDR 750K / $50 USD';
                    $this->discount = 0;
                    $this->fee_after_discount =  $this->fee;
                    $this->total_bill = $this->fee_after_discount;
                } else {
                    $this->fee = 'IDR 250K / $17 USD';
                    $this->discount = 0;
                    $this->fee_after_discount =  $this->fee;
                    $this->total_bill = $this->fee_after_discount;
                }
            } else {
                if (Auth::user()->participant->attendance == 'offline') {
                    $this->fee = 'IDR 550K / $37 USD';
                    $this->discount = 0;
                    $this->fee_after_discount =  $this->fee;
                    $this->total_bill = $this->fee_after_discount;
                } else {
                    $this->fee = 'IDR 150K / $10 USD';
                    $this->discount = 0;
                    $this->fee_after_discount =  $this->fee;
                    $this->total_bill = $this->fee_after_discount;
                }
            }
        }

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

        session()->flash('message', 'Add payment was successful !');
        $this->cancel();
        $this->empty();
    }

    public function render()
    {
        return view('livewire.payment-page', [
            'payments' => Payment::where('participant_id', Auth::user()->participant->id)->latest()->get()
        ]);
    }
}

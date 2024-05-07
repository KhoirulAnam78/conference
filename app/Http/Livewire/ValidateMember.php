<?php

namespace App\Http\Livewire;

use App\Mail\SendMail;
use Livewire\Component;
use App\Models\Participant;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ValidateMember extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $full_name1, $hki_id, $member_card, $memberValidate;
    public $search = '', $search2 = '';

    public function empty()
    {
        $this->full_name1 = null;
        $this->member_card = null;
        $this->memberValidate = null;
        $this->hki_id = null;
    }
    public function showValidate($id)
    {
        $this->memberValidate = $id;
        $participant = Participant::find($id);
        $this->full_name1 = $participant->full_name1;
        $this->hki_id = $participant->hki_id;
        $this->member_card = $participant->member_card;
        $this->dispatchBrowserEvent('show-modal');
    }

    public function valid()
    {
        $email = Participant::find($this->memberValidate)->user->email;
        Participant::where('id', $this->memberValidate)->update([
            'hki_status' => 'valid',
            'hki_validated_by' => Auth::user()->email
        ]);
        Mail::to($email)->send(new SendMail('Validation HKI Member', 'Your hki member status has been validated, now you get a 25% discount'));
        $this->empty();
        session()->flash('message', 'Validation succesfully !');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function invalid()
    {
        $email = Participant::find($this->memberValidate)->user->email;
        Participant::where('id', $this->memberValidate)->update([
            'hki_status' => 'invalid',
            'hki_validated_by' => Auth::user()->email
        ]);
        $this->empty();
        Mail::to($email)->send(new SendMail('Validation HKI Member', "Your hki member status is invalid, you don't get 25% discount."));
        session()->flash('message', 'Validation succesfully !');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        return view('livewire.validate-member', [
            'participants' => Participant::where('hki_status', 'like', '%' . $this->search)->where('member_card', '!=', null)->where('full_name1', 'like', '%' . $this->search2 . '%')->orderBy('full_name1')->paginate(10)
        ]);
    }
}

<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class SendEmailUser extends Component
{
    public $sendTo, $email, $file, $receiver = [], $subject;
    use WithFileUploads;

    public function rules()
    {
        return
            [
            'sendTo' => 'required',
            'subject' => 'required',
            'email' => 'required',
        ];
    }

    //Reatime Validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function sendEmail()
    {
        set_time_limit(0);

        if ($this->file) {
            $this->validate([
                'sendTo' => 'required',
                'subject' => 'required',
                'email' => 'required',
                'file' => 'mimes:jpg,png,jpeg,gif,svg,pdf,docx',
            ]);
        } else {
            $this->validate();
        }
        if ($this->sendTo == 'all-registered') {
            $data = DB::table('participants as a')
                ->leftjoin('users as b', 'b.id', 'a.user_id')
                ->where('b.email_verified_at', '!=', null)
                ->select('b.email')->get();
            foreach ($data as $value) {
                array_push($this->receiver, $value->email);
            }
        } elseif ($this->sendTo == 'not-yet-paid') {
            $data = UploadAbstract::doesnthave('payments')
                ->join('participants', 'participants.id', 'upload_abstracts.participant_id')
                ->join('users', 'users.id', 'participants.user_id')
                ->select('users.email')
                ->get();
            foreach ($data as $value) {
                array_push($this->receiver, $value->email);
            }
        } elseif ($this->sendTo == 'have-paid') {
            $data = UploadAbstract::has('payments')
                ->join('participants', 'participants.id', 'upload_abstracts.participant_id')
                ->join('users', 'users.id', 'participants.user_id')
                ->select('users.email')
                ->get();
            foreach ($data as $value) {
                array_push($this->receiver, $value->email);
            }
        } else {
            array_push($this->receiver, $this->sendTo);
        }

        $attach = [];
        if ($this->file) {
            $path = $this->file->store('email');
            // $path = $this->file->store('/home/icics2023/public_html/uploads/email');
            // dd($path);
            $attach = [asset('storage/' . $path)];
        }

        foreach ($this->receiver as $r) {
            Mail::to($r)->send(new FreeMail($this->subject, $this->email, $attach));

            LogActivity::addLog("Send Email to : " . $r);
        }

        session()->flash('message', 'Email sent!');
        $this->dispatchBrowserEvent('to-top');
        $this->file = null;
        $this->senTo = '';
        $this->subject = null;
        $this->email = null;
    }
    public function render()
    {
        return view('livewire.send-email-user', [
            'participant' => DB::table('participants as a')
                ->leftjoin('users as b', 'b.id', 'a.user_id')
                ->where('b.email_verified_at', '!=', null)
                ->select('b.email')->get(),
        ]);
    }
}

<?php

namespace App\Http\Livewire;

use App\Mail\SendMail;
use Livewire\Component;
use App\Utils\LogActivity;
use App\Models\Participant;
use Livewire\WithPagination;
use App\Models\UploadFulltext;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UploadedPaper extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $title, $fulltext, $uploadedPaper;
    public $search = '', $search2 = '';

    public function empty()
    {
        $this->title = null;
        $this->fulltext = null;
        $this->uploadedPaper = null;
    }
    public function showValidate($id)
    {
        $this->uploadedPaper = $id;
        $paper = UploadFulltext::find($id);
        $this->title = $paper->title;
        $this->fulltext = $paper->fulltext;
        $this->dispatchBrowserEvent('show-modal');
    }

    public function valid()
    {
        $email = UploadFulltext::find($this->uploadedPaper)->payment->participant->user->email;
        UploadFulltext::where('id', $this->uploadedPaper)->update([
            'validation' => 'valid',
            'validated_by' => Auth::user()->email
        ]);
        Mail::to($email)->send(new SendMail('Validation Fulltext', 'Your fulltext status has been validated', []));
        $this->empty();
        
        LogActivity::addLog("Validation 'valid' for uploaded paper : ".$this->title);
        session()->flash('message', 'Validation succesfully !');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function invalid()
    {
        $email = UploadFulltext::find($this->uploadedPaper)->payment->participant->user->email;
        UploadFulltext::where('id', $this->uploadedPaper)->update([
            'validation' => 'invalid',
            'validated_by' => Auth::user()->email
        ]);
        Mail::to($email)->send(new SendMail('Validation Fulltext', 'Your fulltext status has been validated, your uploaded fulltext is invalid', []));
        $this->empty();
        
        LogActivity::addLog("Validation 'invalid' for uploaded paper : ".$this->title);
        session()->flash('message', 'Validation succesfully !');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        return view('livewire.uploaded-paper', [
            'fulltexts' => UploadFulltext::whereHas('payment', function($query){
                $query->whereHas('participant', function($query){
                    $query->where('full_name1', 'like', '%' . $this->search2 . '%');
                });  
            })->orWhere('title', 'like', '%' . $this->search2 . '%')
            ->orderBy('title')->paginate(10)
        ]);
    }
}
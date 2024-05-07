<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\GlobalSetting;
use Livewire\WithFileUploads;

class CrudGlobalSetting extends Component
{
    public $title, $website, $email, $payment_number, $logo;

    use WithFileUploads;

    public function save(){
        $this->validate([
            'title' => 'required',
            'website' => 'required',
            'email' => 'required',
            'payment_number' => 'required'
        ]);

        $title = GlobalSetting::where('name','title')->first();
        if($title){
            $title->update([
                'value' => $this->title
            ]);
        }else{
            GlobalSetting::create([
                'name' => 'title',
                'value' => $this->title
            ]);
        }

        $website = GlobalSetting::where('name','website')->first();
        if($website){
            $website->update([
                'value' => $this->website
            ]);
        }else{
            GlobalSetting::create([
                'name' => 'website',
                'value' => $this->website
            ]);
        }

        $email = GlobalSetting::where('name','email')->first();
        if($email){
            $email->update([
                'value' => $this->email
            ]);
        }else{
            GlobalSetting::create([
                'name' => 'email',
                'value' => $this->email
            ]);
        }

        $payment_number = GlobalSetting::where('name','payment_number')->first();
        if($payment_number){
            $payment_number->update([
                'value' => $this->payment_number
            ]);
        }else{
            GlobalSetting::create([
                'name' => 'payment_number',
                'value' => $this->payment_number
            ]);
        }

        $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil mengubah data !']);
    }

    protected $messages = [
        'title.required' => 'Judul konferensi harus diisi!'
    ];

    public function mount(){
        $title = GlobalSetting::where('name','title')->first();
        $this->title = $title->value;
        $website = GlobalSetting::where('name','website')->first();
        $this->website = $website->value ?? null;
        $email = GlobalSetting::where('name','email')->first();
        $this->email = $email->value ?? null;
        $payment_number = GlobalSetting::where('name','payment_number')->first();
        $this->payment_number = $payment_number->value ?? null;
        
    }
    
    public function render()
    {
        return view('livewire.crud-global-setting');
    }
}
<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\GlobalSetting;
use Livewire\WithFileUploads;

class CrudGlobalSetting extends Component
{
    public $title, $website, $email, $payment_number, $logo, $pathLogo;

    use WithFileUploads;

    public function save(){
        $validations = [
            'title' => 'required',
            'website' => 'required',
            'email' => 'required',
            'payment_number' => 'required',
            // 'logo' => 'max:5024|mimes:jpg,jpeg,png'
        ];


        if($this->logo){
            $validations['logo'] = 'max:5024|mimes:jpg,jpeg,png';
        }

        $this->validate($validations);

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

        if($this->logo){
            $logo = GlobalSetting::where('name','logo')->first();
            $path = $this->logo->store('images');
            if($logo){
                $logo->update([
                    'value' => $path
                ]);
            }else{
                GlobalSetting::create([
                    'name' => 'logo',
                    'value' => $path
                ]);
            }
        }

        $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil mengubah data !']);
    }

    public function updatedLogo(){
        $this->pathLogo = null;
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
        $logo = GlobalSetting::where('name','logo')->first();
        $this->pathLogo = $logo->value ?? null;

    }

    public function render()
    {
        return view('livewire.crud-global-setting');
    }
}

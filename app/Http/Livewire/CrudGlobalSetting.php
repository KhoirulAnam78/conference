<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\GlobalSetting;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class CrudGlobalSetting extends Component
{
    public $title, $website, $email, $payment_number, $logo, $pathLogo, $abbreviation, $topic, $recipient, $bank_name;
    public $start_date_conference, $end_date_conference,$zoom_id,$zoom_pass,$zoom_link, $conference_location, $maps;
    public $contact_name, $contact_number, $list_contact=[];
    public $primary_color1, $primary_color2;

    use WithFileUploads;

    public function inputGlobalSetting($name,$value){
        $data = GlobalSetting::where('name',$name)->first();
        if($data){
            $data->update([
                'value' => $value
            ]);
        }else{
            GlobalSetting::create([
                'name' => $name,
                'value' => $value
            ]);
        }
    }
    
    public function save(){
        $validations = [
            'title' => 'required',
            'website' => 'required',
            'email' => 'required',
            'payment_number' => 'required',
            'abbreviation' => 'required',
            'topic' => 'required',
            'recipient' => 'required',
            'bank_name' => 'required'
            // 'logo' => 'max:5024|mimes:jpg,jpeg,png'
        ];


        if($this->logo){
            $validations['logo'] = 'max:5024|mimes:jpg,jpeg,png';
        }

        $this->validate($validations);

        // update or create title 
        $this->inputGlobalSetting('title',$this->title);
        
        $this->inputGlobalSetting('website',$this->website);
        
        $this->inputGlobalSetting('email',$this->email);

        $this->inputGlobalSetting('payment_number',$this->payment_number);

        
        $this->inputGlobalSetting('conference_location',$this->conference_location);

        if($this->logo){
            $path = $this->logo->store('images');
            $logo = GlobalSetting::where('name','logo')->first();
            if($logo){
                Storage::delete($logo->value);
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

        $this->inputGlobalSetting('abbreviation',$this->abbreviation);
        $this->inputGlobalSetting('topic',$this->topic);
        $this->inputGlobalSetting('recipient',$this->recipient);
        $this->inputGlobalSetting('bank_name',$this->bank_name);
        $this->inputGlobalSetting('title',$this->title);
        $this->inputGlobalSetting('start_date_conference',$this->start_date_conference);
        $this->inputGlobalSetting('end_date_conference',$this->end_date_conference);
        $this->inputGlobalSetting('zoom_id',$this->zoom_id);
        $this->inputGlobalSetting('zoom_pass',$this->zoom_pass);
        $this->inputGlobalSetting('zoom_link',$this->zoom_link);
        $this->inputGlobalSetting('contacts',json_encode($this->list_contact));
        $this->inputGlobalSetting('maps',$this->maps);
        $this->inputGlobalSetting('primary_color1',$this->primary_color1);
        $this->inputGlobalSetting('primary_color2',$this->primary_color2);
        
        $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil mengubah data !']);
    }


    public function updatedLogo(){
        $this->pathLogo = null;
    }

    protected $messages = [
        'title.required' => 'Judul konferensi harus diisi!'
    ];

    public function getValue($name){
        $data = GlobalSetting::where('name',$name)->first();
        return $data->value ?? null;
    }

    public function deleteContact($key){
        unset($this->list_contact[$key]);
    }

    public function addContact(){
        array_push($this->list_contact,[
            'name' => $this->contact_name,
            'number' => $this->contact_number
        ]);

        $this->contact_name = null;
        $this->contact_number = null;
    }
    public function mount(){
        $this->title = $this->getValue('title');
        $this->website = $this->getValue('website');
        $this->email = $this->getValue('email');
        $this->payment_number = $this->getValue('payment_number');
        $this->abbreviation = $this->getValue('abbreviation');
        $this->topic = $this->getValue('topic');
        $this->recipient = $this->getValue('recipient');
        $this->bank_name = $this->getValue('bank_name');
        $this->pathLogo = $this->getValue('logo');
        $this->start_date_conference = $this->getValue('start_date_conference');
        $this->end_date_conference = $this->getValue('end_date_conference');
        $this->conference_location = $this->getValue('conference_location');
        $this->zoom_id = $this->getValue('zoom_id');
        $this->zoom_pass = $this->getValue('zoom_pass');
        $this->zoom_link = $this->getValue('zoom_link');
        $this->maps = $this->getValue('maps');
        $this->primary_color1 = $this->getValue('primary_color1');
        $this->primary_color2 = $this->getValue('primary_color2');
        $contacts= json_decode($this->getValue('contacts')) ?? [];

        foreach($contacts as $c){
            array_push($this->list_contact,[
                'name' => $c->name,
                'number' => $c->number
            ]);
        }
        // if($contact !=  []){
        //     $this->list_contact = json_decode($contact);
        // }
        // dd($this->list_contact);
    }

    public function render()
    {
        return view('livewire.crud-global-setting');
    }
}
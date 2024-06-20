<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\GlobalSetting;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class CrudImageSlider extends Component
{
    use WithFileUploads;
    public $slider1, $slider2, $slider3;
    public $path1, $path2, $path3;

    public function getValue($name){
        $data = GlobalSetting::where('name',$name)->first();
        return $data->value ?? null;
    }

    public function inputNewValue($file,$name){
        if($file){
            $path = $file->store('images');
            $imageSlider = GlobalSetting::where('name',$name)->first();
            if($imageSlider){
                Storage::delete($imageSlider->value);
                $imageSlider->update([
                    'value' => $path
                ]);
                
                LogActivity::addLog('Update global setting '.$name,json_encode([
                    'value' => $path
                ]));
            }else{
                GlobalSetting::create([
                    'name' => $name,
                    'value' => $path
                ]);
                
                LogActivity::addLog('Add new global setting '.$name,json_encode([
                    'name' => $name,
                    'value' => $path
                ]));
            }
        }
    }
    public function save(){
        if($this->slider1){
            $validation['slider1'] = 'required|mimes:png,jpg,jpeg';
        }
        if($this->slider2){
            $validation['slider2'] = 'required|mimes:png,jpg,jpeg';
        }
        if($this->slider3){
            $validation['slider3'] = 'required|mimes:png,jpg,jpeg';
        }

        $this->validate($validation);

        $this->inputNewValue($this->slider1,'image-slider-1');
        $this->inputNewValue($this->slider2,'image-slider-2');
        $this->inputNewValue($this->slider3,'image-slider-3');
        
        $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil mengubah data !']);

    }

    public function mount(){
        $this->path1 = $this->getValue('image-slider-1');
        $this->path2 = $this->getValue('image-slider-2');
        $this->path3 = $this->getValue('image-slider-3');
    }

    public function render()
    {
        return view('livewire.crud-image-slider');
    }
}
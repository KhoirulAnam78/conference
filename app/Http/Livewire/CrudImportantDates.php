<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Utils\LogActivity;
use App\Models\ImportantDates;

class CrudImportantDates extends Component
{
    public $name, $start_date, $end_date, $proses_id;

    public function save(){
        $this->validate([
            'name' => 'required|unique:important_dates,name',
            'start_date' => 'required'
        ]);

        ImportantDates::create([
            'name' => $this->name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date
        ]);
        
        LogActivity::addLog('Add new Important Dates '.$this->name);

        $this->empty();
        
        $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil menambahkan data !']);
    }

    public function showEdit($id){
        $this->proses_id = $id;
        $data = ImportantDates::find($id);
        $this->name = $data->name;
        $this->start_date = $data->start_date;
        $this->end_date = $data->end_date;
        $this->dispatchBrowserEvent('show-edit');
    }

    public function update(){
        $this->validate([
            'name' => 'required|unique:important_dates,name,'.$this->proses_id
        ]);

        ImportantDates::where('id',$this->proses_id)->update([
            'name' => $this->name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date
        ]);

        
        LogActivity::addLog('Update Important Dates '.$this->name,json_encode([
            'name' => $this->name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date
        ]));
        
        $this->empty();

        $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil mengubah data !']);
        $this->dispatchBrowserEvent('close-edit');
    }

    public function hapus($id){
        $important = ImportantDates::find($id);
        LogActivity::addLog('Delete Important Dates :'.$important->name);
        $important->delete();
        $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil menghapus data !']);
    }

    public function empty(){
        // dd('DUARR');
        $this->name = null;
        $this->start_date = null;
        $this->end_date = null;
    }
    
    public function render()
    {
        $data = ImportantDates::get();
        return view('livewire.crud-important-dates',compact('data'));
    }
}
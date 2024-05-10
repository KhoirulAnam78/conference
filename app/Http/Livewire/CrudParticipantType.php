<?php

namespace App\Http\Livewire;

use App\Models\ParticipantType;
use Livewire\Component;

class CrudParticipantType extends Component
{
    public $name, $attendance, $price, $start_date, $end_date;
    public $proses_id;

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'attendance' => 'required',
            'price' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        ParticipantType::create([
            'name' => $this->name,
            'attendance' => $this->attendance,
            'price' => $this->price,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'is_deleted' => 0
        ]);
        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil menambahkan data !']);
    }

    public function showEdit($id)
    {
        $this->proses_id = $id;
        $data = ParticipantType::find($id);
        $this->name = $data->name;
        $this->attendance = $data->attendance;
        $this->price = $data->price;
        $this->start_date = $data->start_date;
        $this->end_date = $data->end_date;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'attendance' => 'required',
            'price' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        ParticipantType::where('id', $this->proses_id)->update([
            'name' => $this->name,
            'attendance' => $this->attendance,
            'price' => $this->price,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);


        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil mengubah data !']);
        $this->name = null;
        $this->attendance = null;
        $this->price = null;
        $this->start_date = null;
        $this->end_date = null;
        // $this->dispatchBrowserEvent('close-edit');
    }

    public function hapus($id)
    {
        ParticipantType::where('id', $id)->update([
            'is_deleted' => 1
        ]);
        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil menghapus data !']);
    }

    public function render()
    {
        $data = ParticipantType::where('is_deleted', 0)->get();
        return view('livewire.crud-participant-type', compact('data'));
    }
}

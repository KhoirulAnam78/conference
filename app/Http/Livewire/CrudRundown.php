<?php

namespace App\Http\Livewire;

use App\Models\DetailRundown;
use App\Models\Rundown;
use Livewire\Component;

class CrudRundown extends Component
{

    public $name, $date, $proses_id;
    public $event, $organizer, $start_time, $end_time, $place;


    public function input_detail()
    {
        $this->validate([
            'event' => 'required',
            'organizer' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'place' => 'required',

        ]);

        DetailRundown::create([
            'event' => $this->event,
            'organizer' => $this->organizer,
            'id_rundown' => $this->proses_id,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'place' => $this->place,
        ]);
        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil menambahkan data !']);
    }


    public function tambah($id)
    {
        $this->proses_id = $id;
        $this->dispatchBrowserEvent('show-tambah');
    }

    public function edit_detail($id)
    {
        $this->proses_id = $id;
        $data = DetailRundown::where('id', $id)->first();
        $this->event = $data->event;
        $this->organizer = $data->organizer;
        $this->start_time = $data->start_time;
        $this->end_time = $data->end_time;
        $this->place = $data->place;
        $this->dispatchBrowserEvent('show-edit');
    }

    public function update_detail()
    {
        $this->validate([
            'event' => 'required',
            'organizer' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'place' => 'required',
        ]);
        DetailRundown::where('id', $this->proses_id)->update([
            'event' => $this->event,
            'organizer' => $this->organizer,
            'id_rundown' => $this->proses_id,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'place' => $this->place,
        ]);
        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil mengubah data !']);
    }

    public function edit_hari($id)
    {
        $this->proses_id = $id;
        $data = Rundown::where('id', $id)->first();
        $this->name = $data->name;
        $this->date = $data->date;
        $this->dispatchBrowserEvent('show-edit-rundown');
    }

    public function update_hari()
    {
        $this->validate([
            'name' => 'required',
            'date' => 'required',

        ]);
        Rundown::where('id', $this->proses_id)->update([
            'name' => $this->name,
            'date' => $this->date,
        ]);
        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil mengubah data !']);
    }

    public function hapus_acara($id)
    {
        DetailRundown::where('id_rundown', $id)->delete();
        Rundown::where('id', $id)->delete();
        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil menghapus data !']);
    }

    public function hapus_detail($id)
    {
        DetailRundown::where('id', $id)->delete();
        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil menghapus data !']);
    }

    public function save()
    {

        $this->validate([
            'name' => 'required',
            'date' => 'required',
        ]);

        Rundown::create([
            'name' => $this->name,
            'date' => $this->date,
        ]);
        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil menambahkan data !']);
    }
    public function render()
    {
        $data = Rundown::with('detailRundown')->get();
        return view('livewire.crud-rundown', compact('data'));
    }
}

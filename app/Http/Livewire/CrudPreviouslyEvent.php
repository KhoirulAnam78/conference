<?php

namespace App\Http\Livewire;

use App\Models\PreviouslyEvent;
use Livewire\Component;

class CrudPreviouslyEvent extends Component
{

    public $name, $url, $proses_id;

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'url' => 'required'
        ]);

        PreviouslyEvent::create([
            'name' => $this->name,
            'url' => $this->url,
        ]);
        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil menambahkan data !']);
        $this->name = null;
        $this->url = null;
    }

    public function hapus($id)
    {
        PreviouslyEvent::where('id', $id)->delete();
        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil menghapus data !']);
    }

    public function showEdit($id)
    {
        $this->proses_id = $id;
        $data = PreviouslyEvent::find($id);
        $this->name = $data->name;
        $this->url = $data->url;
        $this->dispatchBrowserEvent('show-edit');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'url' => 'required',
        ]);

        PreviouslyEvent::where('id', $this->proses_id)->update([
            'name' => $this->name,
            'url' => $this->url,
        ]);


        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil mengubah data !']);
        $this->name = null;
        $this->url = null;
    }


    public function render()
    {
        $data = PreviouslyEvent::get();
        return view('livewire.crud-previously-event', compact('data'));
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Destination;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrudDestination extends Component
{

    public $name, $desc, $image, $proses_id, $old_path;
    use WithFileUploads;
    public function save()
    {
        $this->validate([
            'name' => 'required',
            'image' => 'required',
            'desc' => 'required',
        ]);

        $path = $this->image->store('downloads');
        Destination::create([
            'name' => $this->name,
            'image' => $path,
            'info_destination' => $this->desc,
        ]);
        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil menambahkan data !']);
        $this->name = null;
        $this->image = null;
        $this->desc = null;
    }

    public function showEdit($id)
    {
        $this->proses_id = $id;
        $data = Destination::find($id);
        $this->name = $data->name;
        $this->old_path = $data->image;
        $this->desc = $data->info_destination;
        $this->dispatchBrowserEvent('show-edit');
    }

    public function hapus($id)
    {
        Destination::where('id', $id)->delete();
        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil menghapus data !']);
    }


    public function update()
    {
        $validations = [
            'name' => 'required',
            'desc' => 'required',
        ];

        if ($this->image) {
            $validations['image'] = 'max:5024|mimes:jpg,jpeg,png,pdf';
        }

        $this->validate($validations);

        $path = $this->image ? $this->image->store('downloads') : null;

        $updateData = [
            'name' => $this->name,
            'info_destination' => $this->desc,
        ];

        if ($path) {
            $updateData['image'] = $path;
        }

        Destination::where('id', $this->proses_id)->update($updateData);

        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil mengubah data !']);
        $this->name = null;
        $this->image = null;
        $path = null;
        $this->desc = null;
    }

    public function render()
    {
        $data = Destination::get();
        return view('livewire.crud-destination', compact('data'));
    }
}

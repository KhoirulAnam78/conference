<?php

namespace App\Http\Livewire;

use App\Models\Partner;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrudPartner extends Component
{

    use WithFileUploads;
    public $name, $image, $url, $desc, $proses_id, $old_path;

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'image' => 'required',
            'url' => 'required',
        ]);

        $path = $this->image->store('downloads');
        Partner::create([
            'name' => $this->name,
            'image' => $path,
            'url' => $this->url,
            'info_partner' => $this->desc,
        ]);
        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil menambahkan data !']);
        $this->name = null;
        $this->image = null;
        $this->url = null;
        $this->desc = null;
    }

    public function showEdit($id)
    {
        $this->proses_id = $id;
        $data = Partner::find($id);
        $this->name = $data->name;
        $this->url = $data->url;
        $this->old_path = $data->image;
        $this->desc = $data->info_partner;
        $this->dispatchBrowserEvent('show-edit');
    }

    public function hapus($id)
    {
        Partner::where('id', $id)->delete();
        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil menghapus data !']);
    }

    public function update()
    {
        $validations = [
            'name' => 'required',
            'url' => 'required',
        ];

        if ($this->image) {
            $validations['image'] = 'max:5024|mimes:jpg,jpeg,png,pdf';
        }

        $this->validate($validations);

        $path = $this->image ? $this->image->store('downloads') : null;

        $updateData = [
            'name' => $this->name,
            'url' => $this->url,
            'info_partner' => $this->desc,
        ];

        if ($path) {
            $updateData['image'] = $path;
        }

        Partner::where('id', $this->proses_id)->update($updateData);

        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil mengubah data !']);
        $this->name = null;
        $this->image = null;
        $path = null;
        $this->url = null;
        $this->desc = null;
    }

    public function render()
    {
        $data = Partner::get();
        return view('livewire.crud-partner', compact('data'));
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\detailSpeakers;
use App\Models\Speakers;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrudSpeaker extends Component
{

    public $name;
    public $proses_id;
    public $name_speaker, $image, $institution, $position, $old_path;
    use WithFileUploads;



    // public function mount()
    // {
    // }

    public function input_speaker()
    {
        $this->validate([
            'name_speaker' => 'required',
            'image' => 'required',
            'institution' => 'required',

        ]);

        $path = $this->image->store('downloads');
        DetailSpeakers::create([
            'name' => $this->name_speaker,
            'image' => $path,
            'id_speakers' => $this->proses_id,
            'institution' => $this->institution,
            'position' => $this->position,
        ]);
        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil menambahkan data !']);
        $this->name_speaker = null;
        $this->image = null;
        $path = null;
        $this->institution = null;
        $this->position = null;
    }


    public function tambah($id)
    {
        $this->proses_id = $id;
        $this->dispatchBrowserEvent('show-tambah');
    }

    public function edit_speaker($id)
    {
        $this->proses_id = $id;
        $data = DetailSpeakers::where('id', $id)->first();
        $this->name_speaker = $data->name;
        $this->institution = $data->institution;
        $this->position = $data->position;
        $this->old_path = $data->image;
        $this->dispatchBrowserEvent('show-edit');
    }

    public function update_speaker()
    {
        $validations = [
            'name_speaker' => 'required',
            'institution' => 'required',
        ];

        if ($this->image) {
            $validations['image'] = 'max:5024|mimes:jpg,jpeg,png,pdf';
        }

        $this->validate($validations);

        $path = $this->image ? $this->image->store('downloads') : null;

        $updateData = [
            'name' => $this->name_speaker,
            'institution' => $this->institution,
            'position' => $this->position,
        ];

        if ($path) {
            $updateData['image'] = $path;
        }

        DetailSpeakers::where('id', $this->proses_id)->update($updateData);

        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil mengubah data !']);
        $this->name_speaker = null;
        $this->image = null;
        $path = null;
        $this->institution = null;
        $this->position = null;
    }


    public function edit_jenis_speaker($id)
    {
        $this->proses_id = $id;
        $data = Speakers::where('id', $id)->first();
        $this->name = $data->name;
        $this->dispatchBrowserEvent('show-edit-jenis');
    }

    public function update_jenis()
    {
        $this->validate([
            'name' => 'required',
        ]);
        Speakers::where('id', $this->proses_id)->update([
            'name' => $this->name,
        ]);
        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil mengubah data !']);
        $this->name = null;
    }

    public function hapus_jenis($id)
    {
        DetailSpeakers::where('id_speakers', $id)->delete();
        Speakers::where('id', $id)->delete();
        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil menghapus data !']);
    }

    public function hapus_speaker($id)
    {
        DetailSpeakers::where('id', $id)->delete();
        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil menghapus data !']);
    }
    public function save()
    {
        $this->validate([
            'name' => 'required',
        ]);

        Speakers::create([
            'name' => $this->name,
        ]);
        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil menambahkan data !']);
        $this->name = null;
    }

    public function render()
    {
        $data = Speakers::with('listSpeaker')->get();
        return view('livewire.crud-speaker', compact('data'));
    }
}

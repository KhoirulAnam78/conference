<?php

namespace App\Http\Livewire;

use App\Models\DownloadFilePath;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrudDownloadFile extends Component
{
    public $file_name, $path_file;
    use WithFileUploads;


    public function save()
    {
        $this->validate([
            'file_name' => 'required',
            'path_file' => 'required',
        ]);
        // dd('Suksess');
        DownloadFilePath::create([
            'name' => $this->file_name,
            'path_file' => $this->path_file,
        ]);
        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil menambahkan data !']);
    }

    public function render()
    {
        $data = DownloadFilePath::all();
        return view('livewire.crud-download-file', compact('data'));
    }
}

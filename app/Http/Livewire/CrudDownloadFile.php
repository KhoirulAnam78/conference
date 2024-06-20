<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Utils\LogActivity;
use Livewire\WithFileUploads;
use App\Models\DownloadFilePath;

class CrudDownloadFile extends Component
{
    public $file_name, $path_file, $old_path;
    public $proses_id;

    use WithFileUploads;


    public function save()
    {
        $this->validate([
            'file_name' => 'required',
            'path_file' => 'required',
        ]);
        // dd('Suksess');
        $path = $this->path_file->store('downloads');
        DownloadFilePath::create([
            'name' => $this->file_name,
            'path_file' => $path,
        ]);
        
        LogActivity::addLog("Add new download file : ".$this->file_name);
        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil menambahkan data !']);
    }

    public function hapus($id)
    {
        $download = DownloadFilePath::find($id);
        
        LogActivity::addLog("Delete download file : ".$download->name);
        $download->delete();
        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil menghapus data !']);
    }

    public function showEdit($id)
    {

        $this->proses_id = $id;
        $data = DownloadFilePath::find($id);
        $this->file_name = $data->name;
        $this->old_path = $data->path_file;
    }

    public function update()
    {

        $validations = [
            'file_name' => 'required',
        ];


        if ($this->path_file) {
            $validations['path_file'] = 'max:5024|mimes:jpg,jpeg,png,pdf';
        }

        $this->validate($validations);

        $path = $this->path_file->store('downloads');
        DownloadFilePath::where('id', $this->proses_id)->update([
            'name' => $this->file_name,
            'path_file' => $path,
        ]);

        
        LogActivity::addLog("Update download file : ".$this->file_name,json_encode([
            'name' => $this->file_name,
            'path_file' => $path,
        ]));

        $this->dispatchBrowserEvent('alert', ['title' => 'Success', 'message' => 'Berhasil mengubah data !']);
        $this->file_name = null;
        $this->path_file = null;

        // $this->dispatchBrowserEvent('close-edit');
    }

    public function updatedPathFile()
    {
        $this->old_path = null;
    }

    public function mount()
    {
        $file_name = DownloadFilePath::where('name', 'file_name')->first();
        $this->file_name = $file_name->name ??  null;
        $path_file = DownloadFilePath::where('path_file', 'path_file')->first();
        $this->old_path = $path_file ?? null;
    }

    public function render()
    {
        $data = DownloadFilePath::all();
        return view('livewire.crud-download-file', compact('data'));
    }
}
<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TopicScope;
use App\Utils\LogActivity;

class CrudScope extends Component
{
    public $scope_name;
    public $proses_id;

    public function save(){
        $this->validate([
            'scope_name' => 'required|unique:topic_scope,scope_name'
        ]);

        TopicScope::create([
            'scope_name' => $this->scope_name,
            'is_delete' => 0
        ]);

        
        LogActivity::addLog("Add new scope : ".$this->scope_name);

        $this->scope_name = null;
        
        $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil menambahkan data !']);
    }

    public function showEdit($id){
        $this->proses_id = $id;
        $data = TopicScope::find($id);
        $this->scope_name = $data->scope_name;
        $this->dispatchBrowserEvent('show-edit');
    }

    public function update(){
        $this->validate([
            'scope_name' => 'required|unique:topic_scope,scope_name,'.$this->proses_id
        ]);

        TopicScope::where('id',$this->proses_id)->update([
            'scope_name' => $this->scope_name
        ]);

        $this->scope_name=null;
        
        LogActivity::addLog("Update scope : ".$this->scope_name);

        $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil mengubah data !']);
        $this->dispatchBrowserEvent('close-edit');
    }

    public function hapus($id){
        $topic = TopicScope::find($id);
        
        LogActivity::addLog("Delete scope : ".$topic->scope_name);
        $topic->update([
            'is_delete' => 1
        ]);
        $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil menghapus data !']);
    }
    
    public function render()
    {
        $data=TopicScope::where('is_delete',0)->get();
        return view('livewire.crud-scope',compact('data'));
    }
}
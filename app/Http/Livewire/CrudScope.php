<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TopicScope;

class CrudScope extends Component
{
    public $scope_name;

    public function save(){
        $this->validate([
            'scope_name' => 'required'
        ]);

        TopicScope::create([
            'scope_name' => $this->scope_name,
            'is_delete' => 0
        ]);

        $this->scope_name = null;
        
        $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil menambahkan data !']);
    }

    public function hapus($id){
        TopicScope::where('id',$id)->update([
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
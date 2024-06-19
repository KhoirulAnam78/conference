<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Utils\LogActivity;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class CrudPermissions extends Component
{
    public $name, $guard_name, $descriptions, $proses_id, $search='';
    use WithPagination;
    protected $paginationTheme="bootstrap";

    public function save(){
        $this->validate([
            'name' => 'required|unique:permissions,name',
            'guard_name' => 'required'
        ]);

        Permission::create([
            'name' => $this->name,
            'guard_name' => $this->guard_name,
            'descriptions' => $this->descriptions
        ]);

        LogActivity::addLog('Create Permission '.$this->name);

        $this->empty();
        
        $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil menambahkan data !']);
    }

    public function showEdit($id){
        $this->proses_id = $id;
        $data = Permission::find($id);
        $this->name = $data->name;
        $this->guard_name = $data->guard_name;
        $this->descriptions = $data->descriptions;
        $this->dispatchBrowserEvent('show-edit');
    }

    public function update(){
        $this->validate([
            'name' => 'required|unique:permissions,name,'.$this->proses_id
        ]);

        Permission::where('id',$this->proses_id)->update([
            'name' => $this->name,
            'guard_name' => $this->guard_name,
            'descriptions' => $this->descriptions
        ]);

        
        LogActivity::addLog('Edit Permission '.$this->name,json_encode([
            'name' => $this->name,
            'guard_name' => $this->guard_name,
            'descriptions' => $this->descriptions
        ]));
        
        $this->empty();

        $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil mengubah data !']);
        $this->dispatchBrowserEvent('close-edit');
    }

    public function hapus($id){
        $permission = Permission::find($id);
        LogActivity::addLog('Delete Permission '.$permission->name);
        $permission->delete();
        $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil menghapus data !']);
    }

    public function empty(){
        // dd('DUARR');
        $this->name = null;
        $this->guard_name = null;
        $this->descriptions = null;
    }
    
    public function render()
    {
        $permissions = Permission::where('name','like','%'.$this->search.'%')
        ->orwhere('descriptions','like','%'.$this->search.'%')->paginate(20);
        return view('livewire.crud-permissions',compact('permissions'));
    }
}
<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CrudRoles extends Component
{
    public $name, $guard_name='web', $permission=[], $permissions, $proses_id, $search='', $selectAll;
    use WithPagination;
    protected $paginationTheme="bootstrap";

    
    public function mount(){
        $this->permissions = Permission::orderBy('name')->get();
    }
    
    public function save(){
        $this->validate([
            'name' => 'required|unique:roles,name',
            'permission' => 'required'
        ]);

        $role = Role::create([
            'name' => $this->name,
            'guard_name' => $this->guard_name,
        ]);

        $role->givePermissionTo($this->permission);

        $this->empty();
        
        $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil menambahkan data !']);
    }

    public function updatedSelectAll(){
        if($this->selectAll){
            foreach($this->permissions as $item){
                array_push($this->permission,$item->name);
            }
        }else{
            $this->permission = [];
        }
    }


    public function showEdit($id){
        $this->proses_id = $id;
        $data = Role::find($id);
        $this->name = $data->name;
        foreach($data->permissions as $p){
            array_push($this->permission,$p->name);
        }
        $this->dispatchBrowserEvent('show-edit');
    }

    public function update(){
        $this->validate([
            'name' => 'required|unique:roles,name,'.$this->proses_id,
        ]);
        $role = Role::find($this->proses_id);


        $role->update([
            'name' => $this->name
        ]);
        
        $role->syncPermissions($this->permission);
        
        $this->empty();

        $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil mengubah data !']);
        $this->dispatchBrowserEvent('close-edit');
    }

    public function hapus($id){
        Role::where('id',$id)->delete();
        $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil menghapus data !']);
    }

    public function empty(){
        // dd('DUARR');
        $this->name = null;
        $this->guard_name = null;
        $this->selectAll = null;
        $this->permission = [];
    }
    
    public function render()
    {
        $roles = Role::where('name','like','%'.$this->search.'%')
        ->orwhere('guard_name','like','%'.$this->search.'%')->paginate(10);
        return view('livewire.crud-roles',compact('roles'));
    }
}
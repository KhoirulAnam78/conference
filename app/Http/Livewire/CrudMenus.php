<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MenuGroup;
use App\Utils\LogActivity;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class CrudMenus extends Component
{
    public $name, $permission_name, $status, $proses_id, $search='';
    use WithPagination;
    protected $paginationTheme="bootstrap";

    public function save(){
        $this->validate([
            'name' => 'required|unique:menu_groups,name',
            'permission_name' => 'required',
            'status' => 'required'
        ]);

        MenuGroup::create([
            'name' => $this->name,
            'permission_name' => $this->permission_name,
            'status' => $this->status
        ]);

        
        LogActivity::addLog('Create Menu : '.$this->name);

        $this->empty();
        
        $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil menambahkan data !']);
    }

    public function showEdit($id){
        $this->proses_id = $id;
        $data = MenuGroup::find($id);
        $this->name = $data->name;
        $this->permission_name = $data->permission_name;
        $this->status = $data->status;
        $this->dispatchBrowserEvent('show-edit');
    }

    public function update(){
        $this->validate([
            'name' => 'required|unique:menu_groups,name,'.$this->proses_id,
            'permission_name' => 'required',
            'status' => 'required'
        ]);

        MenuGroup::where('id',$this->proses_id)->update([
            'name' => $this->name,
            'permission_name' => $this->permission_name,
            'status' => $this->status
        ]);

        LogActivity::addLog('Update Menu : '.$this->name, json_encode([
            'name' => $this->name,
            'permission_name' => $this->permission_name,
            'status' => $this->status,
            'posision' => $this->posision,
            'route' => $this->route,
            'menu_group_id' => $this->menu_group->id
        ]));
        
        $this->empty();

        $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil mengubah data !']);
        $this->dispatchBrowserEvent('close-edit');
    }

    public function hapus($id){
        $menu = MenuGroup::find($id);
        LogActivity::addLog('Delete menu items : '.$menu->name);
        $menu->delete();
        $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil menghapus data !']);
    }

    public function empty(){
        // dd('DUARR');
        $this->name = null;
        $this->permission_name = null;
        $this->status = null;
    }
    
    public function render()
    {
        $menus = MenuGroup::where('name','like','%'.$this->search.'%')
        ->orwhere('status','like','%'.$this->search.'%')->paginate(10);
        $permissions = Permission::get();
        return view('livewire.crud-menus',compact('permissions','menus'));
    }
}
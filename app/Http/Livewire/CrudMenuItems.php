<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MenuItem;
use App\Models\MenuGroup;
use App\Utils\LogActivity;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class CrudMenuItems extends Component
{
    public $menu_group, $name,$posision,$route,$permission_name, $status, $proses_id, $search='';
    use WithPagination;
    protected $paginationTheme="bootstrap";

    public function mount($id){
        $this->menu_group=MenuGroup::find($id);

    }

    public function save(){
        $this->validate([
            'name' => 'required|unique:menu_items,name',
            'permission_name' => 'required',
            'status' => 'required',
            'posision' => 'required',
            'route' => 'required'
        ]);

        $menu_items = MenuItem::where('menu_group_id',$this->menu_group->id)->where('posision','>=',$this->posision)->get();

        foreach ($menu_items as $m) {
            $posision_new = $m->posision + 1;
            $m->update([
                'posision' => $posision_new
            ]);
        }

        MenuItem::create([
            'name' => $this->name,
            'permission_name' => $this->permission_name,
            'status' => $this->status,
            'posision' => $this->posision,
            'route' => $this->route,
            'menu_group_id' => $this->menu_group->id
        ]);
        
        LogActivity::addLog('Create Menu Items : '.$this->name);

        $this->empty();
        
        $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil menambahkan data !']);
    }

    public function showEdit($id){
        $this->proses_id = $id;
        $data = MenuItem::find($id);
        $this->name = $data->name;
        $this->permission_name = $data->permission_name;
        $this->status = $data->status;
        $this->route = $data->route;
        $this->posision = $data->posision;
        
        $this->dispatchBrowserEvent('show-edit');
    }

    public function update(){
        $this->validate([
            'name' => 'required|unique:menu_items,name,'.$this->proses_id,
            'permission_name' => 'required',
            'status' => 'required',
            'posision' => 'required',
            'route' => 'required'
        ]);
        
        $menu_items = MenuItem::where('menu_group_id',$this->menu_group->id)->where('posision','>=',$this->posision)->get();

        foreach ($menu_items as $m) {
            $posision_new = $m->posision + 1;
            $m->update([
                'posision' => $posision_new
            ]);
        }

        MenuItem::where('id',$this->proses_id)->update([
            'name' => $this->name,
            'permission_name' => $this->permission_name,
            'status' => $this->status,
            'posision' => $this->posision,
            'route' => $this->route,
            'menu_group_id' => $this->menu_group->id
        ]);

        
        LogActivity::addLog('Update Menu Items : '.$this->name, json_encode([
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
        $menu = MenuItem::find($id);
        LogActivity::addLog('Delete menu items : '.$menu->name);
        $menu->delete();
        $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil menghapus data !']);
    }

    public function empty(){
        // dd('DUARR');
        $this->name = null;
        $this->permission_name = null;
        $this->status = null;
        $this->posision=null;
        $this->route=null;
    }
    
    public function render()
    {
        $menus = MenuItem::where('menu_group_id',$this->menu_group->id)->where('name','like','%'.$this->search.'%')
        ->orderBy('posision')->paginate(10);
        $permissions = Permission::get();
        $routes = Route::getRoutes();
        return view('livewire.crud-menu-items',compact('permissions','menus','routes'));
    }
}
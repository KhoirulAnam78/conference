<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Utils\LogActivity;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class CrudUserRoles extends Component
{
    public $email, $password, $role, $proses_id, $search='';
    use WithPagination;
    protected $paginationTheme="bootstrap";

    public function save(){
        $this->validate([
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'role' => 'required'
        ]);

        $user = User::create([
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'role' => 'administrator'
        ]);
        
        LogActivity::addLog("Set ".$this->email." as ".$this->role);

        $user->assignRole($this->role);

        $this->empty();
        
        $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil menambahkan data !']);
    }

    public function showEdit($id){
        $this->proses_id = $id;
        $data = User::find($id);
        $this->email = $data->email;
        if(count($data->roles)>0){
            $this->role = $data->roles[0]->name;
        }
        $this->dispatchBrowserEvent('show-edit');
    }

    public function update(){
        $this->validate([
            'role' => 'required'
        ]);
        
        $user = User::find($this->proses_id);
        $user->syncRoles($this->role);
    
        LogActivity::addLog("Change ".$this->email." as ".$this->role);
        $this->empty();

        $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil mengubah data !']);
        $this->dispatchBrowserEvent('close-edit');
    }

    public function hapus($id){
        $user = User::find($id);
        
        LogActivity::addLog("Delete user ".$user->email);
        $user->delete();
        $this->dispatchBrowserEvent('alert',['title'=>'Success','message' => 'Berhasil menghapus data !']);
    }

    public function empty(){
        // dd('DUARR');
        $this->email = null;
        $this->password = null;
        $this->role = null;
    }
    
    public function render()
    {
        $users = User::where('email','like','%'.$this->search.'%')
        ->where('role','!=','participant')->paginate(10);
        $roles = Role::get();
        return view('livewire.crud-user-roles',compact('roles','users'));
    }
}
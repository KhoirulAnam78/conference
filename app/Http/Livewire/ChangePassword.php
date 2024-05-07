<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ChangePassword extends Component
{
    public $password, $current_password, $password_confirmation;

    public function rules()
    {
        return
            [
                'current_password' => ['required', 'current_password'],
                'password' => ['required', 'min:8', Password::defaults(), 'confirmed'],
            ];
    }

    //Reatime Validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();
        User::where('id', Auth::user()->id)->update([
            'password' => Hash::make($this->password),
        ]);

        session()->flash('message', 'Password updated');
        $this->password = null;
        $this->password_confirmation = null;
        $this->current_password = null;
    }
    public function render()
    {
        return view('livewire.change-password');
    }
}

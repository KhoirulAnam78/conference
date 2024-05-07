<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class LoginForm extends Component
{
    public $email, $password;


    public function rules()
    {
        return
            [
                'email' => 'required|email:rfc',
                'password' => 'required|min:8',
            ];
    }

    //Custom Errror messages for validation
    protected $messages = [
        'email.required' => 'Email is required !',
        'email.email' => 'The field must have email format ',
        'password.required' => 'Password is required !',
        'password.min' => 'Password must consist of at least 8 characters',
    ];

    //Reatime Validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $validatedData = $this->validate();
        if (Auth::attempt($validatedData)) {
            request()->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::HOME);
        } else {
            return redirect('/login')->with('loginError', 'Invalid login !');
        }
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}

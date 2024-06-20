<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Utils\LogActivity;
use App\Models\Participant;
use Livewire\WithFileUploads;
use App\Models\ParticipantType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisterForm extends Component
{
    public $full_name1, $full_name2, $gender, $participant_type, $institution, $address, $phone, $member_card, $hki_id, $email, $password, $confirmPassword;

    use WithFileUploads;
    public function rules()
    {
        return
            [
                'full_name1' => 'required',
                'full_name2' => 'required',
                'gender' => 'required|in:male,female',
                'participant_type' => 'required',
                'institution' => 'required',
                'address' => 'required',
                'phone' => 'required|regex:/^([0-9\s\+]*)$/',
                'email' => 'required|unique:users|email:rfc',
                'password' => 'required|min:8',
                'confirmPassword' => 'required|same:password'
            ];
    }

    //Custom Errror messages for validation
    protected $messages = [
        'full_name1.required' => 'Full name without academic title is required !',
        'full_name2.required' => 'Full name with academic title is required !',
        'gender.required' => 'Gender is required !',
        'gender.in' => 'Gender can only contain male or female !',
        'phone.required' => 'Phone number is required !',
        'phone.regex' => 'The phone number must be a number and the + character is allowed !',
        'participant_type.required' => 'Participant type is required !',
        'institution.required' => 'Institution is required !',
        'address.required' => 'Address is required !',
        'email.required' => 'Email is required !',
        'email.unique' => 'Email has been registered',
        'email.email' => 'The field must have email format ',
        'password.required' => 'Password is required !',
        'password.min' => 'Password must consist of at least 8 characters',
        'confirmPassword.required' => 'Confirmation password is required!',
        'confirmPassword.same' => 'Incorrect password confirmation !',
    ];

    //Reatime Validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $imagePath = null;
        $status = 'not a member';
        
        $this->validate();

        $user = User::create([
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'role' => 'participant',
        ]);

        Participant::create([
            'full_name1' => $this->full_name1,
            'full_name2' => $this->full_name2,
            'gender' => $this->gender,
            'participant_type' => $this->participant_type,
            'institution' => $this->institution,
            'address' => $this->address,
            'phone' => $this->phone,
            'user_id' => $user->id
        ]);

        event(new Registered($user));

        Auth::login($user);
        LogActivity::addLog('New user registered');

        return redirect(RouteServiceProvider::HOME);
    }
    
    public function render()
    {
        $participant = ParticipantType::where('is_deleted',0)->where('start_date','<=',date('Y-m-d'))->where('end_date','>=',date('Y-m-d'))->get();
        
        return view('livewire.register-form', compact('participant'));
    }
}
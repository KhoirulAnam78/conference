<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Participant;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class ProfilePage extends Component
{
    public $full_name1, $full_name2, $gender, $participant_type, $institution, $address, $phone, $member_card, $hki_status, $email, $password, $confirmPassword, $attendance;


    use WithFileUploads;

    public function mount()
    {

        $user = Auth::user();
        $this->email = $user->email;
        $this->full_name1 = $user->participant->full_name1;
        $this->full_name2 = $user->participant->full_name2;
        $this->gender = $user->participant->gender;
        $this->participant_type = $user->participant->participant_type;
        $this->institution = $user->participant->institution;
        $this->address = $user->participant->address;
        $this->hki_status = $user->participant->hki_status;
        $this->phone = $user->participant->phone;
        $this->attendance = $user->participant->attendance;
    }


    public function empty()
    {

        $user = Auth::user();
        $this->email = $user->email;
        $this->full_name1 = $user->participant->full_name1;
        $this->full_name2 = $user->participant->full_name2;
        $this->gender = $user->participant->gender;
        $this->participant_type = $user->participant->participant_type;
        $this->institution = $user->participant->institution;
        $this->address = $user->participant->address;
        $this->phone = $user->participant->phone;
        $this->attendance = $user->participant->attendance;

        $this->dispatchBrowserEvent('to-top');
    }
    public function rules()
    {
        return
            [
                'full_name1' => 'required',
                'full_name2' => 'required',
                'gender' => 'required|in:male,female',
                'attendance' => 'required|in:online,offline',
                'participant_type' => 'required|in:professional presenter,student presenter,participant',
                'institution' => 'required',
                'address' => 'required',
                'phone' => 'required|regex:/^([0-9\s\+]*)$/',
                'email' => 'required|unique:users,email,' . Auth::user()->id . '|email:rfc',
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
        'attendance.required' => 'Attendance is required !',
        'attendance.in' => 'Attendance can only contain online or offline !',
        'phone.required' => 'Phone number is required !',
        'phone.regex' => 'The phone number must be a number and the + character is allowed !',
        'participant_type.required' => 'Participant type is required !',
        'participant_type.in' => 'Participan can only contain (Professional Presenter, Student Presenter and Participant) !',
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

    public function update()
    {
        if ($this->email !== Auth::user()->email) {
            dd('Masuk');
            User::where('id', Auth::user()->id)->update([
                'email' => $this->email,
                'email_verified_at' => null
            ]);
        }

        Participant::where('user_id', Auth::user()->id)->update([
            'full_name1' => $this->full_name1,
            'full_name2' => $this->full_name2,
            'gender' => $this->gender,
            'participant_type' => $this->participant_type,
            'institution' => $this->institution,
            'address' => $this->address,
            'phone' => $this->phone,
            'attendance' => $this->attendance,
        ]);

        $this->empty();
        return redirect('/profile')->with('message', 'Update profile succes!');
    }
    public function render()
    {
        return view('livewire.profile-page');
    }
}

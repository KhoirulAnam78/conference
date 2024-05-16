<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Participant;
use Livewire\WithPagination;
use App\Models\ParticipantType;
use App\Exports\RegisteredExport;
use Maatwebsite\Excel\Facades\Excel;

class RegisteredParticipant extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '', $participant_type='';

    public function render()
    {
        $participants = Participant::where('full_name1', 'like', '%' . $this->search . '%')
        ->where('participant_type','like','%'.$this->participant_type.'%')
        ->orderBy('full_name1')
        ->with('participantType','user')
        ->paginate(10);
        $types = ParticipantType::where('is_deleted',0)->get();
        return view('livewire.registered-participant',compact('participants','types'));
    }

    public function export()
    {
        set_time_limit(0);
        ini_set('memory_limit', '2048M');
        return Excel::download(new RegisteredExport(), 'All registered user.xlsx');
    }
}
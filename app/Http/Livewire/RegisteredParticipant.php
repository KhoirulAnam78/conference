<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Participant;
use Livewire\WithPagination;
use App\Exports\RegisteredExport;
use Maatwebsite\Excel\Facades\Excel;

class RegisteredParticipant extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search2 = '', $attendance = '', $participant_type='';

    public function render()
    {
        return view('livewire.registered-participant', [
            'participants' => Participant::where('full_name1', 'like', '%' . $this->search2 . '%')->where('attendance','like','%'.$this->attendance.'%')->where('participant_type','like','%'.$this->participant_type.'%')->orderBy('full_name1')->paginate(10)
        ]);
    }

    public function export()
    {
        set_time_limit(0);
        ini_set('memory_limit', '2048M');
        return Excel::download(new RegisteredExport(), 'All registered user.xlsx');
    }
}

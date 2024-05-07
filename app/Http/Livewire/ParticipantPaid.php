<?php

namespace App\Http\Livewire;

use App\Exports\PaidParticipantExport;
use Livewire\Component;
use App\Models\Participant;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class ParticipantPaid extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search2 = '',$attendance = '';

    public function render()
    {
        return view('livewire.participant-paid', [
            'participants' => Participant::where('participant_type', 'participant')->where('attendance','like','%'.$this->attendance.'%')->where('full_name1', 'like', '%' . $this->search2 . '%')->whereHas('payments', function ($query) {
                $query->where('validation', 'valid');
            })->orderBy('full_name1')->paginate(10)
        ]);
    }

    public function export()
    {
        set_time_limit(0);
        ini_set('memory_limit', '2048M');
        return Excel::download(new PaidParticipantExport(), 'Participant have paid ICICS 2023.xlsx');
    }
}

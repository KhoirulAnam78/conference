<?php

namespace App\Http\Livewire;

use App\Exports\PaidParticipantExport;
use App\Models\Participant;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class ParticipantPaid extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search2 = '', $attendance = '';

    public function render()
    {
        $participants = Participant::join('participant_type as b', 'b.id', 'participants.participant_type')
            ->join('payments as c', 'participants.id', 'c.participant_id')
            ->where('c.validation', 'valid')
            ->where('b.type', 'Participant ')
            ->where('b.attendance', 'like', '%' . $this->attendance . '%')
            ->where('full_name1', 'like', '%' . $this->search2 . '%')
            ->paginate(10);

        return view('livewire.participant-paid', compact('participants'));
    }

    public function export()
    {
        set_time_limit(0);
        ini_set('memory_limit', '2048M');
        return Excel::download(new PaidParticipantExport(), 'Participant have paid ISOLLEAC 2024.xlsx');
    }
}

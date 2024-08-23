<?php

namespace App\Http\Livewire;

use App\Exports\PaidPresenterExport;
use Livewire\Component;
use App\Models\Participant;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class PresenterPaid extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search2 = '',$attendance = '', $participant_type='';

    public function render()
    {
        $participants = Participant::join('participant_type as b','b.id','participants.participant_type')
        ->join('payments as c','participants.id','c.participant_id')
        ->where('c.validation','valid')
        ->where('b.type','Presenter')
        ->where('b.attendance','like','%'.$this->attendance. '%')
        ->where('full_name1', 'like', '%' . $this->search2 . '%')
        ->paginate(10);

        // Participant::where('participant_type', '<>', 'participant')->where('attendance','like','%'.$this->attendance.'%')->where('participant_type','like','%'.$this->participant_type.'%')->whereHas('payments', function ($query) {
        //     $query->where('validation', 'valid');
        // })->orderBy('full_name1')->paginate(10);
        return view('livewire.presenter-paid', compact('participants'));
    }

    public function export()
    {
        set_time_limit(0);
        ini_set('memory_limit', '2048M');
        return Excel::download(new PaidPresenterExport(), 'Presenter have paid ISOLLEAC 2024.xlsx');
    }
}
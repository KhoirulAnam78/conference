<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreParticipantRequest;
use App\Http\Requests\UpdateParticipantRequest;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('administrator');
        return view('administrator.registered-participant', [
            'title' => 'Registered Participant',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function validateMember()
    {
        $this->authorize('administrator');
        return view('administrator.validate-member', [
            'title' => 'Validation HKI Member'
        ]);
    }

    public function abstract()
    {
        $this->authorize('presenter');
        return view('participant.abstrak', [
            'title' => 'My Abstrak'
        ]);
    }
}

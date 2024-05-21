<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DashboardController extends Model
{
    use HasFactory;

    public function index(){
        if (auth()->user()->role === 'administrator' or auth()->user()->role == 'developer') {
            $regon = DB::table('participants as a')
            ->join('participant_type as b','b.id','a.participant_type')
            ->where('b.attendance','Online')
            ->count();
            $regof = DB::table('participants as a')
            ->join('participant_type as b','b.id','a.participant_type')
            ->where('b.attendance','Offline')
            ->count();

            $rekap = DB::table('participant_type as b')
            ->join('participants as a', 'b.id','a.participant_type')
            ->select(
                'b.name',
                DB::raw('SUM(CASE WHEN b.attendance="Online" THEN 1 ELSE 0 END) as online'),
                DB::raw('SUM(CASE WHEN b.attendance="Offline" THEN 1 ELSE 0 END) as offline')
            )
            ->groupBy('b.name')
            ->get();
    
            $title = "Dashboard";
            return view('administrator.dashboard', compact('title', 'regon', 'regof','rekap'));
        } else {
            return view('participant.dashboard', [
                'title' => 'Dashboard'
            ]);
        }
    }
}
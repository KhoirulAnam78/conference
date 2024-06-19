<?php

namespace App\Utils;

use Request;
use App\Models\LogActivities;

class LogActivity{
    public static function addLog($activity,$what_changes=null){
        $log = [];
        $log['user_id'] = auth()->user()->id;    	
        $log['ip'] = Request::ip();
    	$log['user_agent'] = Request::header('user-agent');
        $log['activity'] = $activity;
        $log['what_changes'] = $what_changes;

        LogActivities::create($log);
    }

    public static function getLog(){
        return LogActivities::join('users','users.id','log_activities.user_id')
        ->when(!auth()->user()->hasRole('Developer'), function($q){
            $q->whereIn('users.role',['participant','administrator']);
        })
        ->select('users.email','log_activities.*')
        ->limit(20)
        ->latest()
        ->get();
    }
}
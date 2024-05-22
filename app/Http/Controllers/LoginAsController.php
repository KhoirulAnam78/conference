<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginAsController extends Controller
{
    public function loginAs(Request $request){
        $user = User::where('email',$request->user_login_as)->first();
        session()->flush();
        session()->put('main_user',$request->user_request_login_as);
        session()->put('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d',$user->id);
        return redirect()->to('dashboard');
    }

    public function logoutAs(Request $request){
        $user = User::where('email',$request->main_user)->first();
        session()->flush();
        session()->put('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d',$user->id);
        return redirect()->to('dashboard');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevController extends Controller
{
    public function roles(){
        $title = "Roles";
        return view('dashboard-admin.roles', compact('title'));
    }

    public function permissions(){
        $title = "Permissions";
        return view('dashboard-admin.permissions', compact('title'));
    }

    public function menus(){
        $title = "Menu";
        return view('dashboard-admin.menus', compact('title'));
    }

    public function users(){
        $title = "Users";
        return view('dashboard-admin.menus', compact('title'));
    }
}
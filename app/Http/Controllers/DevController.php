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
    
    public function menu_items($id){
        $title = "Menu";
        return view('dashboard-admin.menu_items', compact('title','id'));
    }

    public function users(){
        $title = "User Roles";
        return view('dashboard-admin.user_roles', compact('title'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuActivity;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function permissionview(){

        $menu_activities = Menu::get();

        return view('permission.permission_view',compact('menu_activities'));
    }
}

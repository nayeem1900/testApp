<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Menu;
use App\Models\MenuActivity;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function permissionview(){

        $menu_activities = Menu::with('actions')->get();
        $actions = Action::get();
        $roles = Role::get();

        return view('permission.permission_view',compact('menu_activities', 'actions', 'roles'));
    }
}

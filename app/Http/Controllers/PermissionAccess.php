<?php

namespace App\Http\Controllers;

use App\Models\MenuToUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionAccess extends Controller
{
    public static function menuAccess($menuId, $actionId){

        $checkAccess = MenuToUser::where('menu_id', $menuId)->where('action_id', $actionId)->where('user_id', Auth::user()->id)->count();
        if($checkAccess){
            return true;
        }        
        return false;
    }
}

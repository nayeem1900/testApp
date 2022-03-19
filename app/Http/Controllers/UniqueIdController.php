<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UniqueIdController extends Controller
{
    static public function otp(){
        $otp = rand(100000, 999999);
        $check = User::where('otp', $otp)->count();

        if($check > 0){
            $otp = self::otp();
        }

        return $otp;
    }
}

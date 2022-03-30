<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RgestrationController extends Controller
{
    public function userview(Request $request){

        return view('user-reg.user_reg_view');
    }
    public function userstore(Request $request)
    {


        $user = new User();
        $user->otp = UniqueIdController::otp();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role_id = 3;
        $user->password=Hash::make($request->password);

        $user->save();


        return redirect()->route('index')->with('success', 'Data Insert successfull');


    }


}

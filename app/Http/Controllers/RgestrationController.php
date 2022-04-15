<?php

namespace App\Http\Controllers;

use App\Models\MenuToRole;
use App\Models\MenuToUser;
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


        $user['otp'] = UniqueIdController::otp();
        $user['name'] = $request->name;
        $user['username'] = $request->username;
        $user['email'] = $request->email;
        $user['phone'] = $request->phone;
        $user['role_id'] = 3;
        $user['password'] = Hash::make($request->password);

        $store = User::create($user);
        
        $this->permission($store);
        return redirect()->route('index')->with('success', 'Data Insert successfull');

    }


    private static function permission($userData){
        
        $permissions = MenuToRole::where('role_id', $userData->role_id)->get();
        $userTopermission['user_id'] = $userData->id;
        foreach($permissions as $permission){
            $userTopermission['menu_id'] = $permission->menu_id;
            $userTopermission['action_id'] = $permission->action_id;

            MenuToUser::create($userTopermission);

            
        }
            
        
    } 



    //SubAdmin User Create

    public function subadminview(){


        $data['allData']=User::all();


        return view ('backend.reg-user.user_view',$data);


    }
//add


    public function add(){



        $data['allData']=User::all();


        return view ('backend.reg-user.user_add',$data);
        }





}

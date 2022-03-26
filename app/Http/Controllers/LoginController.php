<?php

namespace App\Http\Controllers;

use App\Mail\Mail\ForgetPassword;
use App\Models\User;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $requestData = $request->only('email', 'password');

        $passwordField = $requestData['password'];
        $login = $requestData['email'];


        if(is_numeric($login)){
            $field = 'phone';
        } elseif (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
        } else {
            $field = 'username';
        }


        $credentials = [
            $field => $login,
            'password' => $passwordField,
        ];

        if (Auth::attempt($credentials, 1)) {
            // if success login

                if(session('cart') == null){
                    return redirect()->intended('/dashboard');
                }

                return redirect()->intended();



        }
        // if failed login
        return redirect('/')->with(['msg' => 'Your credentional not mathch']);
    }


    /**
     * Forget Password
     * @method Post
     */

    public function getMailSms(Request $request){

        $login = $request->email;
        $getUserInfo = User::where('email', $login)
                            ->orWhere('phone', $login)
                            ->orwhere('username', $login)
                            ->first();


        if(!$getUserInfo){
            return back()->with(['not' => "Unable to find your user mail or phone number"])->withInput();
        }

        Session::put('token', $getUserInfo->password, 1);

        if(is_numeric($login)){
            return $this->sendSMS($getUserInfo);
        } else {
            return self::sendEmail($getUserInfo);
        }


    }

     public function forget(){

         return view('auth.forget');
     }

    /**
     * send sms function goes
     *
     */
    public function sendSMS($getUserInfo){


        //POST Method example

        $url = "http://66.45.237.70/api.php";
        $number="88017,88018,88019";
        $text="Hello Bangladesh";
        $data= array(
        'username'=>"YourID",
        'password'=>"YourPasswd",
        'number'=>"$number",
        'message'=>"$text"
        );

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|",$smsresult);
        $sendstatus = $p[0];
    }

    /**
     * send mail function goes
     *
     */

    static public function sendEmail($getUserInfo){

        Mail::to($getUserInfo->email)->send(new ForgetPassword($getUserInfo));

        return redirect('/password_reset?token='.$getUserInfo->password.'&name='.Str::slug($getUserInfo->name, '-').'&token_id='.$getUserInfo->password)->with(['msg' => 'we send a otp by your email']);

    }

    /**
     * Reset Password
     */

    public function resetPassword(){
        return view('auth.reset_password');
    }

    /**
     * Update passowrd
     * @method POST
     * Request $request
     */
    public function passwordUpdate(Request $request){

        $validation = Validator::make($request->all(), [
            'otp' => 'required|numeric|min:6',
            'password' => 'required|confirmed|min:8',
        ]);

        if($validation->fails()){
            return back()->withErrors($validation->errors())->withInput();
        }

        $userUpdate['otp'] = UniqueIdController::otp();
        $userUpdate['password'] = Hash::make( $request->password);

        $user = User::where('otp', $request->otp)->where('password', Session::get('token'))
        ->update($userUpdate);


        if($user){
            return redirect('/login');
        }else{
            return back()->withErrors($validation->errors())->withInput();
        }




    }

    /**
     * Logout function goes here
    */
    public function logout(){
        Auth::logout();
        return redirect('/');
    }

}

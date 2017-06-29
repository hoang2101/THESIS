<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

     use ResetsPasswords;
     function RandomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $randstring = '';
        for ($i = 0; $i < 10; $i++) {
            $randstring =  $randstring.$characters[rand(0, strlen($characters)-1)];
        }
        return $randstring;
    }
   
public function reset(Request $request)
    {
       $messages = [];
        $validator = Validator::make($request->all(),[],$messages);
        $user = DB::table('users')->where('username' , '=', $request['username2'])->where('email','=',$request['email'])->first();
        if($user == null){
            \Session::flash('username2', 'Tài khoản hoặc email không đúng');
            $hotels = count(DB::table('hotel')->get());
        $users = count(DB::table('users')->where('type',"=", 2)->get());
        $accounts = count(DB::table('account')->get());
        $rooms = count(DB::table('room')->get());
        return view('main.index')->with('hotels',$hotels)->with('users',$users)->with('accounts',$accounts)->with('rooms',$rooms);
     }
        // thesismanagehotel@gmail.com
     // pass luanhoang


            $data_toview = array();
            $mk = $this->RandomString();
            DB::table('users')
                ->where('username', '=',  $request['username2'])
                ->update(['password' => bcrypt($mk)]);
            $data_toview['bodymessage'] = "mật khẩu của bạn là: ".$mk;
 
            $email_sender   = 'thesismanagehotel@gmail.com';
            $email_pass     = 'luanhoang';
            $email_to       = $request['email'];

 
            // Backup your default mailer
            $backup = \Mail::getSwiftMailer();
 
            try{
 
                        //https://accounts.google.com/DisplayUnlockCaptcha
                        // Setup your gmail mailer
                        $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 587, 'tls');
                        $transport->setUsername($email_sender);
                        $transport->setPassword($email_pass);
 
                        // Any other mailer configuration stuff needed...
                        $gmail = new Swift_Mailer($transport);
 
                        // Set the mailer as gmail
                        \Mail::setSwiftMailer($gmail);
 
                        $data['emailto'] = $email_to;
                        $data['sender'] = $email_sender;
                        //Sender dan Reply harus sama
 
                        Mail::send('emails', $data_toview, function($message) use ($data)
                        {
 
                            $message->from($data['sender'], 'THESIS hotel manage');
                            $message->to($data['emailto'])
                            ->replyTo($data['sender'], 'THESIS hotel manage')
                            ->subject('Cấp lại mật khẩu');
 
                             \Session::put('resetmessage','Mật khẩu mới đươc gửi vào email của bạn.');
                        });
 
            }catch(\Swift_TransportException $e){
                $response = $e->getMessage() ;
                echo $response;
            }
 
 
            // Restore your original mailer
            Mail::setSwiftMailer($backup);
 
            $hotels = count(DB::table('hotel')->get());
        $users = count(DB::table('users')->where('type',"=", 2)->get());
        $accounts = count(DB::table('account')->get());
        $rooms = count(DB::table('room')->get());
        return redirect()->route('mainHome');

    }
    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\User;
use App\Hotel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class SubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('auth:account');
    // }
    public function checkAuthAccount(){
        

    }
    public function index($subdomain)
    {
        //

        $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
       // return $hotels;

         if($hotels != null){
           if(Auth::guard('account')->Check()){

            if(Auth::guard('account')->user()->hotel_id != $hotels->hotel_id ){
                Auth::guard('account')->logout();
            }
       }
            

            $info = array(
            "name" => $hotels->hotel_name,
            "subdomain" => $subdomain, 
            );

             return view('sub.index')->with('info',$info);
         }
       return view('sub.404');
    }

    public function account(Request $request, $subdomain){
       
        if($request['typePost']=='login')
        {
             
            

            $getUsername = DB::table('account')->where('username', '=', $request['username'])->first();

            if($getUsername == null){
                $errors = ['username' => 'Tài khoản hoặc mật khẩu không đúng'];
                return redirect()->route('subHome',['subdomain' => $subdomain])->withErrors($errors)->withInput();
                
            }
             if($getUsername->type != 3 && $getUsername->type != 4 && $getUsername->type != 5) 

            // if($getUsername['type'] != 3 && $getUsername['type'] != 4 $getUsername['type'] != 5)
            {
                 $errors = ['username' => 'Tài khoản hoặc mật khẩu không đúng'];
                return redirect()->route('subHome',['subdomain' => $subdomain])->withErrors($errors)->withInput();
            }
           $getHotel = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
           if($getUsername->hotel_id != $getHotel->hotel_id){
             $errors = ['username' => 'Tài khoản hoặc mật khẩu không đúng'];
                return redirect()->route('subHome',['subdomain' => $subdomain])->withErrors($errors)->withInput();
           }
            if (Auth::guard('account')->attempt(['username' => $request['username'], 'password' => $request['password']])){
                return redirect()->route('subHome',['subdomain' => $subdomain]);
            }else{
                $errors = ['username' => 'Tài khoản hoặc mật khẩu không đúng'];
                return redirect()->route('subHome',['subdomain' => $subdomain])->withErrors($errors)->withInput();
            }
        }   
        if($request['typePost']=='register'){
           
            $messages = ['email.unique' => 'email đã tồn tại',
                    'username.unique' => 'Tài khoản đã tồn tại',];

             $validator =Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:account',
            'email' => 'required|string|email|max:255|unique:account',
            'password' => 'required|string|min:6|confirmed',
        ],$messages);
            if ($validator->fails()){
                return redirect()->route('subHome',['subdomain' => $subdomain])->withErrors($validator)->withInput();
            }
            $getHotel = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
             // $getUsername = DB::table('users')->where('username', '=', $request['username'])->first();
            DB::table('account')->insertGetId([
             'first_name' => $request['first_name'],
             'last_name' => $request['last_name'],
             'email' => $request['email'],
             'username' => $request['username'],
             'password' => bcrypt($request['password']),
             'type' => 5,
             'hotel_id' => $getHotel->hotel_id,
         ]);
             $getUsername = DB::table('account')->where('username', '=', $request['username'])->get();
            //Auth::guard()->login($getUsername);
           Auth::guard('account')->attempt(['username' => $request['username'], 'password' => $request['password']]);
            return redirect()->route('subHome',['subdomain' => $subdomain]);

        }
          if($request['typePost']=='logout'){
                Auth::guard('account')->logout();
                return redirect()->route('subHome',['subdomain' => $subdomain]);
          }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function prolife($subdomain){
        

    $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
     $users = Auth::guard('account')->user();
      if($hotels != null){
             
            if(Auth::guard('account')->Check()){

                if(Auth::guard('account')->user()->hotel_id != $hotels->hotel_id ){
                    Auth::guard('account')->logout();
                }
            }
            if(!Auth::guard('account')->Check()){
                return redirect()->route('subHome',['subdomain' => $subdomain]);
            }

            $info = array(
            "name" => $hotels->hotel_name,
            "subdomain" => $subdomain, 
            );
            if(Auth::guard('account')->user()->type == 5){
                return view('sub.ManageProlife')->with('users',$users)->with('info',$info);
            }
            if(Auth::guard('account')->user()->type == 4 || Auth::guard('account')->user()->type == 3){
                return view('sub.mainManageProlife')->with('users',$users)->with('info',$info);
            }
            
            
         }
       return view('sub.404');
     
     
}

public function editProlife(Request $request, $subdomain){

    if($request['typePost'] == "updateUser"){

        

        DB::table('account')
            ->where('id', $request['id'])
            ->update(['first_name' => $request['first_name'], 'last_name' => $request['last_name'], 'username' => $request['username'],'email' => $request['email'], 'country' => $request['country'], 'phone_number' => $request['phone_number'], 'dob' => $request['dob'], 'gender' => $request['gender']]);
           
            return redirect()->route('subProfile',['subdomain' => $subdomain]);


     
    // validator


     return $request;
  }

  if($request['typePost'] == "updateAvatar"){
   
        $imageName = Auth::guard('account')->user()->username.'/avatar2.'.$request->image->getClientOriginalExtension();
        
        $request->image->move(public_path('img/User/'.Auth::guard('account')->user()->username), $imageName);
         DB::table('account')
            ->where('id', Auth::guard('account')->user()->id)
            ->update( ['image_link' => $imageName]);

         return redirect()->route('subProfile',['subdomain' => $subdomain] );
  }
    // $users = Auth::user();
    // return view('main.manageProlife')->with('users',$users);
}
public function manage( $subdomain){
        

        $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
        $users = DB::table('account')->where([['hotel_id', '=', $hotels->hotel_id],['type', '=', 5],])->get();
        if($hotels != null){
             
            if(Auth::guard('account')->Check()){

                if(Auth::guard('account')->user()->hotel_id != $hotels->hotel_id ){
                    Auth::guard('account')->logout();
                }
            }
            if(!Auth::guard('account')->Check()){
                return redirect()->route('subHome',['subdomain' => $subdomain]);
            }

            $info = array(
            "name" => $hotels->hotel_name,
            "subdomain" => $subdomain, 
            );
            return view('sub.custommanage')->with('users',$users)->with('info',$info);
            // if(Auth::guard('account')->user()->type == 4 || Auth::guard('account')->user()->type == 3){
            //     return view('sub.mainManageProlife')->with('users',$users)->with('info',$info);
            // }
            
            
         }
       return view('sub.404');
     
}
public function manageSubmit(Request $request,  $subdomain){
   if($request['typePost'] == "addUser"){
    // validator
          
    
   $messages = [
        'password.confirmed' => 'password không giống!',
    ];


    $validator = Validator::make($request->all(),[
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ],$messages);
        if ($validator->fails()) {
           $messagesResult = "fails";

            $validator->errors()->add('typePost', 'addUser');
            //return $validator->errors();
           // return Redirect::back()->withErrors($validator)->with('users',$users)->withInput();
             return redirect()->route('subManage',['subdomain' => $subdomain])->withErrors($validator)->withInput();
           // return Redirect::to('main.manage')->withErrors($validator)->with('users',$users)->withInput();
            // return view('main.manage')->withErrors($validator)->with('users',$users)->withInput(Input::all());          
        }

    $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();    
    $users = DB::table('account')->where([['hotel_id', '=', $hotels->hotel_id],['username','=',$request['username']]])->first();
    if($users != null){
            $messagesResult = "fails";
            $validator->errors()->add('typePost', 'addUser');
            $validator->errors()->add('username', 'Username đã tồn tại!');
             return redirect()->route('subManage',['subdomain' => $subdomain])->withErrors($validator)->withInput();
    }
    $users = DB::table('account')->where([['hotel_id', '=', $hotels->hotel_id],['email','=',$request['email']],])->first();
    if($users != null){
            $messagesResult = "fails";
            $validator->errors()->add('typePost', 'addUser');
            $validator->errors()->add('email', 'Email đã tồn tại!');
            return redirect()->route('subManage',['subdomain' => $subdomain])->withErrors($validator)->withInput();
    }
    DB::table('account')->insertGetId([
             'first_name' => $request['first_name'],
             'last_name' => $request['last_name'],
             'email' => $request['email'],
             'username' => $request['username'],
             'password' => bcrypt($request['password']),
             'type' => 5,
             'hotel_id' => $hotels->hotel_id,
         ]);
        //return view('main.manage')->with('users',$users)->withErrors($errors);
        return redirect()->route('subManage',['subdomain' => $subdomain]);
  }



  if($request['typePost'] == "updateUser"){

    $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();  
     $getUser = DB::table('account')->where('id', '=', $request['id'])->get();
     if($getUser != null){

            $messages = [
            'id.not-in' => 'Khách hàng không tồn tại!',];


    $validator = Validator::make($request->all(),[
            'id' => 'required|not-in:account',
        ],$messages);
        if ($validator->fails()) {
           $messagesResult = "fails";
           
            $validator->errors()->add('typePost', 'updateUser');
            $validator->errors()->add('id', $request['id']);
            //return $validator->errors();
             return redirect()->route('subManage',['subdomain' => $subdomain])->withErrors($validator)->withInput();            
        }
        $getUsername = DB::table('account')->where('id', '<>', $request['id'])->where('hotel_id','=',$hotels->hotel_id)->where('username','=',$request['username']) ->first();
        if($getUsername != null){ 
           $messagesResult = "fails";

           $validator->errors()->add('typePost', 'updateUser');
            $validator->errors()->add('id', $request['id']);
           $validator->errors()->add('username', 'username đã tồn tại!');
             return redirect()->route('subManage',['subdomain' => $subdomain])->withErrors($validator)->withInput();
        }
        $getUsername = DB::table('account')->where('id', '<>', $request['id'])->where('hotel_id','=',$hotels->hotel_id)->where('email','=',$request['email']) ->first();
        if($getUsername != null){
           $messagesResult = "fails";

           $validator->errors()->add('typePost', 'updateUser');
            $validator->errors()->add('id', $request['id']);
           $validator->errors()->add('email', 'email đã tồn tại!');
             return redirect()->route('subManage',['subdomain' => $subdomain])->withErrors($validator)->withInput();
        }

        DB::table('account')
            ->where('id', $request['id'])
            ->update(['first_name' => $request['first_name'], 'last_name' => $request['last_name'], 'username' => $request['username'],'email' => $request['email'], 'country' => $request['country'], 'phone_number' => $request['phone_number'], 'dob' => $request['dob'], 'gender' => $request['gender']]);
            //return $request;
            return redirect()->route('subManage',['subdomain' => $subdomain]);


     }else{
        $messagesResult = "fails";
        return redirect()->route('subManage',['subdomain' => $subdomain]);
     }
        // validator


        return $request;
    }




    if($request['typePost'] == "deleteUser"){
        $getUser = DB::table('account')->where('id', '=', $request['id'])->first();
        if($getUser != null){
        DB::table('account')->where('id', '=', $request['id'])->delete();
    }
        return redirect()->route('subManage',['subdomain' => $subdomain]);

    }
}
public function staffManage( $subdomain){
       
        $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
        $users = DB::table('account')->where([['hotel_id', '=', $hotels->hotel_id],['type', '=', 4],])->get();
        if($hotels != null){
             
            if(Auth::guard('account')->Check()){

                if(Auth::guard('account')->user()->hotel_id != $hotels->hotel_id ){
                    Auth::guard('account')->logout();
                }
            }
            if(!Auth::guard('account')->Check()){
                return redirect()->route('subHome',['subdomain' => $subdomain]);
            }

            $info = array(
            "name" => $hotels->hotel_name,
            "subdomain" => $subdomain, 
            );
            return view('sub.staffManage')->with('users',$users)->with('info',$info);
            // if(Auth::guard('account')->user()->type == 4 || Auth::guard('account')->user()->type == 3){
            //     return view('sub.mainManageProlife')->with('users',$users)->with('info',$info);
            // }
            
            
         }
       return view('sub.404');
     
}
public function staffManageSubmit(Request $request,  $subdomain){
   if($request['typePost'] == "addUser"){
    // validator
          
    
   $messages = [
        'password.confirmed' => 'password không giống!',
    ];


    $validator = Validator::make($request->all(),[
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ],$messages);
        if ($validator->fails()) {
           $messagesResult = "fails";

            $validator->errors()->add('typePost', 'addUser');
            //return $validator->errors();
           // return Redirect::back()->withErrors($validator)->with('users',$users)->withInput();
             return redirect()->route('subStaffManage',['subdomain' => $subdomain])->withErrors($validator)->withInput();
           // return Redirect::to('main.manage')->withErrors($validator)->with('users',$users)->withInput();
            // return view('main.manage')->withErrors($validator)->with('users',$users)->withInput(Input::all());          
        }

    $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();    
    $users = DB::table('account')->where([['hotel_id', '=', $hotels->hotel_id],['username','=',$request['username']]])->first();
    if($users != null){
            $messagesResult = "fails";
            $validator->errors()->add('typePost', 'addUser');
            $validator->errors()->add('username', 'Username đã tồn tại!');
             return redirect()->route('subStaffManage',['subdomain' => $subdomain])->withErrors($validator)->withInput();
    }
    $users = DB::table('account')->where([['hotel_id', '=', $hotels->hotel_id],['email','=',$request['email']],])->first();
    if($users != null){
            $messagesResult = "fails";
            $validator->errors()->add('typePost', 'addUser');
            $validator->errors()->add('email', 'Email đã tồn tại!');
            return redirect()->route('subStaffManage',['subdomain' => $subdomain])->withErrors($validator)->withInput();
    }
    DB::table('account')->insertGetId([
             'first_name' => $request['first_name'],
             'last_name' => $request['last_name'],
             'email' => $request['email'],
             'username' => $request['username'],
             'password' => bcrypt($request['password']),
             'type' => 4,
             'hotel_id' => $hotels->hotel_id,
         ]);
        //return view('main.manage')->with('users',$users)->withErrors($errors);
        return redirect()->route('subStaffManage',['subdomain' => $subdomain]);
  }



  if($request['typePost'] == "updateUser"){

    $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();  
     $getUser = DB::table('account')->where('id', '=', $request['id'])->get();
     if($getUser != null){

            $messages = [
            'id.not-in' => 'Khách hàng không tồn tại!',];


    $validator = Validator::make($request->all(),[
            'id' => 'required|not-in:account',
        ],$messages);
        if ($validator->fails()) {
           $messagesResult = "fails";
           
            $validator->errors()->add('typePost', 'updateUser');
            $validator->errors()->add('id', $request['id']);
            //return $validator->errors();
             return redirect()->route('subStaffManage',['subdomain' => $subdomain])->withErrors($validator)->withInput();            
        }
        $getUsername = DB::table('account')->where('id', '<>', $request['id'])->where('hotel_id','=',$hotels->hotel_id)->where('username','=',$request['username']) ->first();
        if($getUsername != null){ 
           $messagesResult = "fails";

           $validator->errors()->add('typePost', 'updateUser');
            $validator->errors()->add('id', $request['id']);
           $validator->errors()->add('username', 'username đã tồn tại!');
             return redirect()->route('subStaffManage',['subdomain' => $subdomain])->withErrors($validator)->withInput();
        }
        $getUsername = DB::table('account')->where('id', '<>', $request['id'])->where('hotel_id','=',$hotels->hotel_id)->where('email','=',$request['email']) ->first();
        if($getUsername != null){
           $messagesResult = "fails";

           $validator->errors()->add('typePost', 'updateUser');
            $validator->errors()->add('id', $request['id']);
           $validator->errors()->add('email', 'email đã tồn tại!');
             return redirect()->route('subStaffManage',['subdomain' => $subdomain])->withErrors($validator)->withInput();
        }

        DB::table('account')
            ->where('id', $request['id'])
            ->update(['first_name' => $request['first_name'], 'last_name' => $request['last_name'], 'username' => $request['username'],'email' => $request['email'], 'country' => $request['country'], 'phone_number' => $request['phone_number'], 'dob' => $request['dob'], 'gender' => $request['gender']]);
            //return $request;
            return redirect()->route('subStaffManage',['subdomain' => $subdomain]);


     }else{
        $messagesResult = "fails";
        return redirect()->route('subStaffManage',['subdomain' => $subdomain]);
     }
        // validator


        return $request;
    }




    if($request['typePost'] == "deleteUser"){
        $getUser = DB::table('account')->where('id', '=', $request['id'])->first();
        if($getUser != null){
        DB::table('account')->where('id', '=', $request['id'])->delete();
    }
        return redirect()->route('subManage',['subdomain' => $subdomain]);

    }
}

public function configManage($subdomain){
   
        $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
        $config = DB::table('web_config')->where('config_id', '=', $hotels->config_id)->first();
        // $users = DB::table('account')->where([['hotel_id', '=', $hotels->hotel_id],['type', '=', 4],])->get();
        if($hotels != null){
             
            if(Auth::guard('account')->Check()){

                if(Auth::guard('account')->user()->hotel_id != $hotels->hotel_id ){
                    Auth::guard('account')->logout();
                }
            }
            if(!Auth::guard('account')->Check()){
                return redirect()->route('subHome',['subdomain' => $subdomain]);
            }

            $info = array(
            "name" => $hotels->hotel_name,
            "subdomain" => $subdomain, 
            );
            return view('sub.config')->with('info',$info)->with('config', $config);
            // if(Auth::guard('account')->user()->type == 4 || Auth::guard('account')->user()->type == 3){
            //     return view('sub.mainManageProlife')->with('users',$users)->with('info',$info);
            // }
            
            
         }
       return view('sub.404');


}
public function configManageSubmit(Request $request,  $subdomain){
    return $$request;
}
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

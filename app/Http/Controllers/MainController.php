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

class MainController extends Controller
{

    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        if(Auth::user()->type !=1 && Auth::user()->type !=2)
             Auth::guard()->logout();
        return view('main.index');
    }

    public function manage()

    {
        if(Auth::user()->type !=1)
             return view('sub.404');
        $users = $this->getUsersks();
        return view('main.manage')->with('users',$users);
    }
public function addUserMain(Request $request){
    // $messagesResult = "Thêm tài kh";

  if($request['typePost'] == "addUser"){
    // validator
    $validator = $this->validator($request->all());
        if ($validator->fails()) {
           $messagesResult = "fails";

            $validator->errors()->add('typePost', 'addUser');
            $users = $this->getUsersks();
            //return $validator->errors();
           // return Redirect::back()->withErrors($validator)->with('users',$users)->withInput();
            return redirect()->route('mainManage')->withErrors($validator)->with('users',$users)->withInput();
           // return Redirect::to('main.manage')->withErrors($validator)->with('users',$users)->withInput();
            // return view('main.manage')->withErrors($validator)->with('users',$users)->withInput(Input::all());          
        }

    DB::table('users')->insertGetId([
             'first_name' => $request['first_name'],
             'last_name' => $request['last_name'],
             'email' => $request['email'],
             'username' => $request['username'],
             'password' => bcrypt($request['password']),
             'type' => 2,
         ]);
     $users = $this->getUsersks();
        //return view('main.manage')->with('users',$users)->withErrors($errors);
        return redirect()->route('mainManage')->with('users',$users);
  }



  if($request['typePost'] == "updateUser"){

     $getUser = DB::table('users')->where('id', '=', $request['id'])->get();
     if($getUser != null){

            $messages = [
            'id.not-in' => 'id không tồn tại!',];


    $validator = Validator::make($request->all(),[
            'id' => 'required|not-in:users',
        ],$messages);
        if ($validator->fails()) {
           $messagesResult = "fails";
           
            $validator->errors()->add('typePost', 'updateUser');
            $validator->errors()->add('id', $request['id']);
            $users = $this->getUsersks();
            //return $validator->errors();
             return redirect()->route('mainManage')->withErrors($validator)->with('users',$users)->withInput();            
        }
        $getUsername = DB::table('users')->where('id', '<>', $request['id'])->where('username','=',$request['username']) ->first();
        if($getUsername != null){ 
           $messagesResult = "fails";

           $validator->errors()->add('typePost', 'updateUser');
            $validator->errors()->add('id', $request['id']);
           $validator->errors()->add('username', 'username đã tồn tại!');
            $users = $this->getUsersks();
             return redirect()->route('mainManage')->withErrors($validator)->with('users',$users)->withInput();
        }
        $getUsername = DB::table('users')->where('id', '<>', $request['id'])->where('email','=',$request['email']) ->first();
        if($getUsername != null){
           $messagesResult = "fails";

           $validator->errors()->add('typePost', 'updateUser');
            $validator->errors()->add('id', $request['id']);
           $validator->errors()->add('email', 'email đã tồn tại!');
            $users = $this->getUsersks();
             return redirect()->route('mainManage')->withErrors($validator)->with('users',$users)->withInput();
        }

        DB::table('users')
            ->where('id', $request['id'])
            ->update(['first_name' => $request['first_name'], 'last_name' => $request['last_name'], 'username' => $request['username'],'email' => $request['email'], 'country' => $request['country'], 'phone_number' => $request['phone_number'], 'dob' => $request['dob'], 'gender' => $request['gender']]);
            //return $request;
            $users = $this->getUsersks();
            return redirect()->route('mainManage')->with('users',$users);


     }else{
        $messagesResult = "fails";
         $users = $this->getUsersks();
         return redirect()->route('mainManage')->with('users',$users);
     }
    // validator


     return $request;
  }




  if($request['typePost'] == "deleteUser"){
   $getUser = DB::table('users')->where('id', '=', $request['id'])->first();
     if($getUser != null){
        DB::table('users')->where('id', '=', $request['id'])->delete();
  }
   $users = $this->getUsersks();
   return redirect()->route('mainManage')->with('users',$users);

}
 
    
}

public function prolife(){
     $users = Auth::user();
     
     return view('main.manageProlife')->with('users',$users);
}

public function editProlife(Request $request){

    if($request['typePost'] == "updateUser"){

        // $getUsername = DB::table('users')->where('id', '<>', $request['id'])->where('email','=',$request['email']) ->first();
        // if($getUsername != null){
        //    $messagesResult = "fails";

        //    $validator->errors()->add('typePost', 'updateUser');
        //     $validator->errors()->add('id', $request['id']);
        //    $validator->errors()->add('email', 'email đã tồn tại!');
        //     $users = Auth::user();
        //      return redirect()->route('manageProlife')->withErrors($validator)->with('users',$users)->withInput();
        // }

        DB::table('users')
            ->where('id', $request['id'])
            ->update(['first_name' => $request['first_name'], 'last_name' => $request['last_name'], 'username' => $request['username'],'email' => $request['email'], 'country' => $request['country'], 'phone_number' => $request['phone_number'], 'dob' => $request['dob'], 'gender' => $request['gender']]);
            //return $request;
            // $user = DB::table('users')->where('id', '=',  Auth::user()->id)->get(); 
            // Auth::setUser($user);
            return redirect()->route('mainProfile');


     
    // validator


     return $request;
  }

  if($request['typePost'] == "updateAvatar"){
   
        $imageName = Auth::user()->username.'/avatar2.'.$request->image->getClientOriginalExtension();
        
        $request->image->move(public_path('img/'.Auth::user()->username), $imageName);
         DB::table('users')
            ->where('id', Auth::user()->id)
            ->update( ['image_link' => $imageName]);

         return redirect()->route('mainProfile');
  }
    // $users = Auth::user();
    // return view('main.manageProlife')->with('users',$users);
}

public function getUsersks(){
    return $users = DB::table('users')->where('type', '=',2)->get();
}
protected function validatorUpdate(arrray $data){
    $messages = [
        'id.in' => 'id không tồn tại!',
        'dob.before' => 'ngày sinh không hợp lệ',
    ];

    return Validator::make($data, [
            'id' => 'required|in:users,id',
            'dob' => 'required|date|before:created_at',
        ],$messages);
    }

protected function validator(array $data)
    {
        $messages = [
        'typePost'=>"typePost = addUser",
        'username.unique' => 'Tài khoản đả tồn tại!',
        'email.unique' => 'Email đả tồn tại!',
        'password.confirmed' => 'password không giống!',
    ];
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ],$messages);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function messages()
{
    return [
        'username.unique' => 'Tài khoản đả tồn tại',
        'email.unique' => 'Email already taken m8',
    ];
}
    public function manageHotel(){
        $hotels = DB::table('hotel')->get();
        return view('main.manageMainHotel')->with('hotels',$hotels);
    }

// controller manage hotel
    public function addHotelMain(Request $request){
    // $messagesResult = "Thêm tài kh";

      if($request['typePost'] == "addHotel"){
    
        $messages = ['hotel_url.unique' => 'Tên miền đã tồn tại',
                    'hotel_account.exists' => 'Tài khoản không tồn tại',];
        


        $validator = Validator::make($request->all(),[
                'hotel_url' => 'required|unique:hotel',
                'hotel_account' => 'required|exists:users,username',

            ],$messages);
        if ($validator->fails()) {
              // $messagesResult = "fails";
               
                $validator->errors()->add('typePost', 'addHotel');
                $validator->errors()->add('id', $request['id']);
                $hotels = DB::table('hotel')->get();
                 return redirect()->route('mainManageHotel')->withErrors($validator)->with('hotels',$hotels)->withInput();            
            }
        DB::table('hotel')->insertGetId([
                 'hotel_name' => $request['hotel_name'],
                 'hotel_account' => $request['hotel_account'],
                 'hotel_url' => $request['hotel_url'],
                 'expire_date' => $request['expire_date'],
                 'hotel_star' => $request['hotel_star'],
                 
             ]);
         $hotels = DB::table('hotel')->get();
            //return view('main.manage')->with('users',$users)->withErrors($errors);
            return redirect()->route('mainManageHotel')->with('hotels',$hotels);
      }



      if($request['typePost'] == "updateHotel"){

         $getUser = DB::table('hotel')->where('hotel_id', '=', $request['id'])->get();
         if($getUser != null){

                $messages = ['hotel_account.exists' => 'Tài khoản không tồn tại',];


        $validator = Validator::make($request->all(),[
                'hotel_account' => 'required|exists:users,username',
            ],$messages);
            if ($validator->fails()) {
              // $messagesResult = "fails";
               
                $validator->errors()->add('typePost', 'addHotel');
                $validator->errors()->add('id', $request['id']);
                 return redirect()->route('mainManageHotel')->withErrors($validator)->withInput();            
            }
            $getUsername = DB::table('hotel')->where('hotel_id', '<>', $request['id'])->where('hotel_url','=',$request['hotel_url']) ->first();
            if($getUsername != null){
               $messagesResult = "fails";

               $validator->errors()->add('typePost', 'addHotel');
                $validator->errors()->add('id', $request['id']);
               $validator->errors()->add('hotel_url', 'tên miền đã tồn tại!');
                 return redirect()->route('mainManageHotel')->withErrors($validator)->withInput();
            }
            

            DB::table('hotel')
                ->where('hotel_id', $request['id'])
                ->update(['hotel_name' => $request['hotel_name'], 'hotel_url' => $request['hotel_url'], 'hotel_account' => $request['hotel_account'],'hotel_star' => $request['hotel_star'], 'expire_date' => $request['expire_date']]);
                //return $request;
                return redirect()->route('mainManageHotel');


         }else{
            $messagesResult = "fails";
             return redirect()->route('mainManageHotel')->with('users',$users);
         }
        // validator


         return $request;
      }




      if($request['typePost'] == "deleteHotel"){
       $getUser = DB::table('hotel')->where('hotel_id', '=', $request['id'])->get();
         if($getUser != null){
            DB::table('hotel')->where('hotel_id', '=', $request['id'])->delete();
      }
       return redirect()->route('mainManageHotel');

    }
     
    
}
//
// end controller manage hotel


// Manage hoteler

    public function manageHoteler(){
       $hotels = DB::table('hotel')->where('hotel_account', '=', Auth::user()->username)->get();
       // $hotels="zxcx";
        return view('main.manageHoteler')->with('hotels',$hotels);
    }

    public function addHotelHoteler(Request $request){

        if($request['typePost'] == "addHotel"){
    
        $messages = ['hotel_url.unique' => 'Tên miền đã tồn tại',];
        


        $validator = Validator::make($request->all(),[
                'hotel_url' => 'required|unique:hotel',

            ],$messages);
        if ($validator->fails()) {
              // $messagesResult = "fails";
               
                $validator->errors()->add('typePost', 'addHotel');
                $validator->errors()->add('id', $request['id']);
                 return redirect()->route('mainManageHoteler')->withErrors($validator)->withInput();            
            }
        DB::table('hotel')->insertGetId([
                 'hotel_name' => $request['hotel_name'],
                 'hotel_account' => Auth::user()->username,
                 'hotel_url' => $request['hotel_url'],
                 'expire_date' => $request['expire_date'],
                 'hotel_star' => $request['hotel_star'],
                 
             ]);
        
         //$hotels = DB::table('hotel')->where('hotel_account', '=', Auth::user()->username)->get()->get();
            //return view('main.manage')->with('users',$users)->withErrors($errors);
            return redirect()->route('mainManageHoteler');
      }



      if($request['typePost'] == "updateHotel"){

         $getUser = DB::table('hotel')->where('hotel_id', '=', $request['id'])->get();
         if($getUser != null){

                $messages = ['hotel_account.required' => 'tên miền không được để trống',];


        $validator = Validator::make($request->all(),[
                'hotel_url' => 'required',
            ],$messages);
            if ($validator->fails()) {
              // $messagesResult = "fails";
               
                $validator->errors()->add('typePost', 'addHotel');
                $validator->errors()->add('id', $request['id']);
                 return redirect()->route('mainManageHoteler')->withErrors($validator)->with('users',$users)->withInput();            
            }
            $getUsername = DB::table('hotel')->where('hotel_id', '<>', $request['id'])->where('hotel_url','=',$request['hotel_url']) ->first();
            if($getUsername != null){
               $messagesResult = "fails";

               $validator->errors()->add('typePost', 'addHotel');
                $validator->errors()->add('id', $request['id']);
               $validator->errors()->add('hotel_url', 'tên miền đã tồn tại!');
                 return redirect()->route('mainManageHoteler')->withErrors($validator)->withInput();
            }
            

            DB::table('hotel')
                ->where('hotel_id', $request['id'])
                ->update(['hotel_name' => $request['hotel_name'], 'hotel_url' => $request['hotel_url'], 'hotel_star' => $request['hotel_star'], 'expire_date' => $request['expire_date']]);
                //return $request;
                return redirect()->route('mainManageHoteler');


         }else{
            $messagesResult = "fails";
             return redirect()->route('mainManageHoteler');
         }
        // validator


         return $request;
      }




      if($request['typePost'] == "deleteHotel"){
       $getUser = DB::table('hotel')->where('hotel_id', '=', $request['id'])->get();
         if($getUser != null){
            DB::table('hotel')->where('hotel_id', '=', $request['id'])->delete();
      }
      

    }

}


//manage goverm hoteler
public function manageGovermHoteler(){
        $hotels =  DB::table('hotel')->where('hotel_account', '=', Auth::user()->username)->get();
        $users = DB::table('account')->where('type', '=',3)->get();
       // $hotels="zxcx";
        return view('main.ManageGovernHoteler')->with('users',$users)->with('hotels',$hotels);
    }

    public function addGovermHoteler(Request $request){

        if($request['typePost'] == "addUser"){
    // validator
    $validator = $this->validator($request->all());
        if ($validator->fails()) {
           $messagesResult = "fails";

            $validator->errors()->add('typePost', 'addUser');
            //return $validator->errors();
           // return Redirect::back()->withErrors($validator)->with('users',$users)->withInput();
            return redirect()->route('mainManageGovermHoteler')->withErrors($validator)->withInput();
           // return Redirect::to('main.manage')->withErrors($validator)->with('users',$users)->withInput();
            // return view('main.manage')->withErrors($validator)->with('users',$users)->withInput(Input::all());          
        }

    DB::table('account')->insertGetId([
             'first_name' => $request['first_name'],
             'last_name' => $request['last_name'],
             'email' => $request['email'],
             'username' => $request['username'],
             'password' => bcrypt($request['password']),
             'type' => 3,
             'hotel_id' => $request['hotel_id'],
         ]);
        //return view('main.manage')->with('users',$users)->withErrors($errors);
        return redirect()->route('mainManageGovermHoteler');
  }



  if($request['typePost'] == "updateUser"){

     $getUser = DB::table('users')->where('id', '=', $request['id'])->get();
     if($getUser != null){

            $messages = [
            'id.not-in' => 'id không tồn tại!',];


    $validator = Validator::make($request->all(),[
            'id' => 'required|not-in:users',
        ],$messages);
        if ($validator->fails()) {
           $messagesResult = "fails";
           
            $validator->errors()->add('typePost', 'updateUser');
            $validator->errors()->add('id', $request['id']);
            //return $validator->errors();
             return redirect()->route('mainManageGovermHoteler')->withErrors($validator)->withInput();            
        }
        $getUsername = DB::table('users')->where('id', '<>', $request['id'])->where('username','=',$request['username']) ->first();
        if($getUsername != null){ 
           $messagesResult = "fails";

           $validator->errors()->add('typePost', 'updateUser');
            $validator->errors()->add('id', $request['id']);
           $validator->errors()->add('username', 'username đã tồn tại!');
             return redirect()->route('mainManageGovermHoteler')->withErrors($validator)->withInput();
        }
        $getUsername = DB::table('users')->where('id', '<>', $request['id'])->where('email','=',$request['email']) ->first();
        if($getUsername != null){
           $messagesResult = "fails";

           $validator->errors()->add('typePost', 'updateUser');
            $validator->errors()->add('id', $request['id']);
           $validator->errors()->add('email', 'email đã tồn tại!');
             return redirect()->route('mainManageGovermHoteler')->withErrors($validator)->withInput();
        }

        DB::table('users')
            ->where('id', $request['id'])
            ->update(['first_name' => $request['first_name'], 'last_name' => $request['last_name'], 'username' => $request['username'],'email' => $request['email'], 'country' => $request['country'], 'phone_number' => $request['phone_number'], 'dob' => $request['dob'], 'gender' => $request['gender']]);
            //return $request;
            return redirect()->route('mainManageGovermHoteler');


     }else{
        $messagesResult = "fails";
         return redirect()->route('mainManageGovermHoteler');
     }
    // validator


     return $request;
  }




  if($request['typePost'] == "deleteUser"){
   $getUser = DB::table('users')->where('id', '=', $request['id'])->first();
     if($getUser != null){
        DB::table('users')->where('id', '=', $request['id'])->delete();
  }
   return redirect()->route('mainManageGovermHoteler');

}

}


// end manage goverm
    public function editUserMain(Request $request){
        $users = DB::table('users')->get();
        return view('main.manage')->with('users',$users);
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

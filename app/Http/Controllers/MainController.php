<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\User;
use App\Hotel;

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
        return view('main.index');
    }

    public function manage()
    {
        $users = DB::table('users')->get();
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
            $users = DB::table('users')->get();
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
         ]);
     $users = DB::table('users')->get();
        //return view('main.manage')->with('users',$users)->withErrors($errors);
        return redirect()->route('mainManage')->with('users',$users);
  }



  if($request['typePost'] == "updateUser"){

     $getUser = DB::table('users')->where('id', '=', $request['id'])->get();
     if($getUser != null){

            $messages = [
            'id.not-in' => 'id không tồn tại!',
        'dob.before' => 'ngày sinh không hợp lệ',];


    $validator = Validator::make($request->all(),[
            'id' => 'required|not-in:users',
            'dob' => 'required|date|before:'. date('Y-m-d') . '|date_format:Y-m-d',
        ],$messages);
        if ($validator->fails()) {
           $messagesResult = "fails";
           
            $validator->errors()->add('typePost', 'updateUser');
            $validator->errors()->add('id', $request['id']);
            $users = DB::table('users')->get();
            //return $validator->errors();
             return redirect()->route('mainManage')->withErrors($validator)->with('users',$users)->withInput();            
        }
        $getUsername = DB::table('users')->where('id', '<>', $request['id'])->where('username','=',$request['username']) ->get();
        if($getUsername != null){
           $messagesResult = "fails";

           $validator->errors()->add('typePost', 'updateUser');
            $validator->errors()->add('id', $request['id']);
           $validator->errors()->add('username', 'username đã tồn tại!');
            $users = DB::table('users')->get();
             return redirect()->route('mainManage')->withErrors($validator)->with('users',$users)->withInput();
        }
        $getUsername = DB::table('users')->where('id', '<>', $request['id'])->where('email','=',$request['email']) ->get();
        if($getUsername != null){
           $messagesResult = "fails";

           $validator->errors()->add('typePost', 'updateUser');
            $validator->errors()->add('id', $request['id']);
           $validator->errors()->add('email', 'email đã tồn tại!');
            $users = DB::table('users')->get();
             return redirect()->route('mainManage')->withErrors($validator)->with('users',$users)->withInput();
        }

        DB::table('users')
            ->where('id', $request['id'])
            ->update(['first_name' => $request['first_name'], 'last_name' => $request['last_name'], 'username' => $request['username'],'email' => $request['email'], 'country' => $request['country'], 'phone_number' => $request['phone_number'], 'dob' => $request['dob'], 'gender' => $request['gender']]);
            //return $request;
            $users = DB::table('users')->get();
            return redirect()->route('mainManage')->with('users',$users);


     }else{
        $messagesResult = "fails";
         $users = DB::table('users')->get();
         return redirect()->route('mainManage')->with('users',$users);
     }
    // validator


     return $request;
  }




  if($request['typePost'] == "deleteUser"){
   $getUser = DB::table('users')->where('id', '=', $request['id'])->get();
     if($getUser != null){
        DB::table('users')->where('id', '=', $request['id'])->delete();
  }
   $users = DB::table('users')->get();
   return redirect()->route('mainManage')->with('users',$users);

}
 
    
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
        // validator

        // $validator = $this->validator($request->all());
        //     if ($validator->fails()) {
        //        //$messagesResult = "fails";

        //         $validator->errors()->add('typePost', 'addHotel');
        //         $users = DB::table('hotel')->get();
        //         //return $validator->errors();
        //        // return Redirect::back()->withErrors($validator)->with('users',$users)->withInput();
        //         return redirect()->route('mainManage')->withErrors($validator)->with('users',$users)->withInput();
        //        // return Redirect::to('main.manage')->withErrors($validator)->with('users',$users)->withInput();
        //         // return view('main.manage')->withErrors($validator)->with('users',$users)->withInput(Input::all());          
        //     }
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
                 'config_id' => $request['config_id'],
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
                $users = DB::table('users')->get();
                //return $validator->errors();
                 return redirect()->route('mainManageHotel')->withErrors($validator)->with('users',$users)->withInput();            
            }
            $getUsername = DB::table('hotel')->where('hotel_id', '<>', $request['id'])->where('hotel_url','=',$request['hotel_url']) ->get();
            if($getUsername != null){
               $messagesResult = "fails";

               $validator->errors()->add('typePost', 'addHotel');
                $validator->errors()->add('id', $request['id']);
               $validator->errors()->add('hotel_url', 'tên miền đã tồn tại!');
                $users = DB::table('users')->get();
                 return redirect()->route('mainManageHotel')->withErrors($validator)->with('users',$users)->withInput();
            }
            

            DB::table('hotel')
                ->where('hotel_id', $request['id'])
                ->update(['hotel_name' => $request['hotel_name'], 'hotel_url' => $request['hotel_url'], 'hotel_account' => $request['hotel_account'],'hotel_star' => $request['hotel_star'], 'expire_date' => $request['expire_date']]);
                //return $request;
                $hotels = DB::table('hotel')->get();
                return redirect()->route('mainManageHotel')->with('hotels',$hotels);


         }else{
            $messagesResult = "fails";
             $users = DB::table('users')->get();
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
       $hotels = DB::table('hotel')->get();
       return redirect()->route('mainManageHotel')->with('hotels',$hotels);

    }
     
    
}

// end controller manage hotel

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

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
    public function index($subdomain)
    {
        //
        $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
       // return $hotels;

         if($hotels != null){
             if($user = Auth::user())
            {
              if(Auth::user()->type != 5 && Auth::user()->type != 3 && Auth::user()->type != 4){
                Auth::guard()->logout();
            }
            }
            

            $info = array(
            "name" => $hotels->hotel_name,
            );

             return view('sub.index')->with('info',$info);
         }
       return view('sub.404');
    }

    public function account(Request $request, $subdomain){
       
        if($request['typePost']=='login')
        {
             
            if($user = Auth::user())
            {
               if(Auth::user()->type != 5 && Auth::user()->type != 3 && Auth::user()->type != 4){
                Auth::guard()->logout();

                // if (Auth::attempt(['username' => $request['username'], 'password' => $request['password']])) {
                //     if(Auth::user()->type != 5 && Auth::user()->type != 3 && Auth::user()->type != 4){
                //     Auth::guard()->logout();

                //     $errors = [$this->username() => trans('auth.failed')];
                //     return redirect('subHome')->withInput()->withErrors($errors);
                //  }

                // }
                }
            }

            $getUsername = DB::table('users')->where('username', '=', $request['username'])->first();

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
            if (Auth::attempt(['username' => $request['username'], 'password' => $request['password']])){
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
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ],$messages);
            if ($validator->fails()){
                return redirect()->route('subHome',['subdomain' => $subdomain])->withErrors($validator)->withInput();
            }
            $getHotel = DB::table('hotel')->where('hotel_name', '=', $subdomain)->first();
             // $getUsername = DB::table('users')->where('username', '=', $request['username'])->first();
            DB::table('users')->insertGetId([
             'first_name' => $request['first_name'],
             'last_name' => $request['last_name'],
             'email' => $request['email'],
             'username' => $request['username'],
             'password' => bcrypt($request['password']),
             'type' => 5,
             'hotel_id' => $getHotel->hotel_id,
         ]);
             $getUsername = DB::table('users')->where('username', '=', $request['username'])->get();
            //Auth::guard()->login($getUsername);
           Auth::attempt(['username' => $request['username'], 'password' => $request['password']]);
            return redirect()->route('subHome',['subdomain' => $subdomain]);

        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

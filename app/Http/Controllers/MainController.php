<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

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
    // DB::table('users')->insertGetId([
    //         'first_name' => $request->,
    //         'last_name' => $data['last_name'],
    //         'email' => $data['email'],
    //         'username' => $data['username'],
    //         'password' => bcrypt($data['password']),
    //     ]);
    User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'username' => $request['username'],
            'password' => bcrypt($request['password']),
        ]);
     $users = DB::table('users')->get();
        return view('main.manage')->with('users',$users);
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageHotel(){
        $hotels = DB::table('hotel')->get();
        return view('main.manageMainHotel')->with('hotels',$hotels);
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

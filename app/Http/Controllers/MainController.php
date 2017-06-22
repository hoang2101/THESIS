<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\User;
use App\Hotel;
use URL;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Session;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentCard;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use PayPal\Api\FundingInstrument;

 

class MainController extends Controller
{
     private $_api_context ;
     public $_namePay ;
     public $_amountPay = null;
     public $_addressPay = null;
     public $_resultPay = null;
     public $_actionPay = null;
     public $_data = null;

    public function __construct()
    {
        $this->middleware('auth');
        $paypal_conf = Config('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
        $this->_namePay = "zxc";
       
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test(){
        return view('main.test');
    }

    public function testsubmit(){
         $info = array(
            "name" => "Goi Basis",
            "amount" =>"10"
            
            );
         

       
    }
    public function acctionPay(){
        if($namePay == null){
           return null;


        }
        if($this->_actionPay == "addHotel"){
            dd("addhotel");
        }
        if($this->_actionPay == "updataHotel"){
            dd("update hotel");
        }
    }

    public function paypal(){
        
        //dd($this->_namePay);
       $dataPay =  \Session::get('dataPay');
       // dd($dataPay);
         $info = array(
            "name" => $dataPay['namePay'],
            "amount" => $dataPay['amountPay']
            );
        return view('main.pay')->with('info', $info);
    }
 function convertCurrency($amount, $from, $to, $amountt){
    $url  = "https://www.google.com/finance/converter?a=".$amount."&from=VND&to=JPY";
    
    $data = file_get_contents($url);
    preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);
    $converted = preg_replace("/[^0-9.]/", "", $converted[1]);


    $url  = "https://www.google.com/finance/converter?a=".$converted."&from=JPY&to=USD";
    
    $data = file_get_contents($url);
    preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);
    $converted = preg_replace("/[^0-9.]/", "", $converted[1]);

    $amountt = round($converted, 3);
    return round($converted, 3);
  }
    public function paypalSubmit(Request $request){

        

        $amountt = null;
        $amountt = $this->convertCurrency($request['amount'],"VND", 'USD', $amountt);
        
        // $url  = "https://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
        $resultpayf = array(
            "msg" => "Thanh toán thất bại",
            );

        $resultpayt = array(
            "msg" => "Thanh toán thành công",
            );
        if($request['typePost'] == "paypal"){

       $payer = new Payer();
         $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName($request['name']) /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($amountt); /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($amountt);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Thanh Toán');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(route('paypaldone')) /** Specify return URL **/
            ->setCancelUrl(route('paypalcancel'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
            /** dd($payment->create($this->_api_context));exit; **/
         try {
                    $payment->create($this->_api_context);
                } catch (\PayPal\Exception\PPConnectionException $ex) {
                    if (\Config::get('app.debug')) {
                       
                       \Session::flash('messagesResult','hết thời hạn kết nối');

                        
                        return Redirect::route('mainManageHoteler')->with('message', $resultpay);
                        /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
                        /** $err_data = json_decode($ex->getData(), true); **/
                        /** exit; **/
                    } else {
                       \Session::flash('messagesResult','có lỗi trong quá trình thanh toán vui lòng thanh toán lại');
                        
                        return Redirect::route('mainManageHoteler');
                        /** die('Some error occur, sorry for inconvenient'); **/
                    }
                }
                foreach($payment->getLinks() as $link) {
                    if($link->getRel() == 'approval_url') {
                        $redirect_url = $link->getHref();
                        break;
                    }
                }
                /** add payment ID to session **/
                
                \Session::flash('paypal_payment_id', $payment->getId());
                if(isset($redirect_url)) {
                    /** redirect to paypal **/
                    return Redirect::away($redirect_url);
                }
                 \Session::flash('messagesResult','có lỗi trong quá trình thanh toán vui lòng thanh toán lại');
                
                return Redirect::route('mainManageHoteler');

               
        }
        else{
           
        $amountt = null;
        $amountt = $this->convertCurrency($request['amount'],"VND", 'USD', $amountt);
        
        // $url  = "https://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
        $resultpayf = array(
            "msg" => "Thanh toán thất bại",
            );

        $resultpayt = array(
            "msg" => "Thanh toán thành công",
            );


          
            $card = new PaymentCard();
            $card->setType($request['typecredit'])
            ->setNumber($request['numberCredit'])
            ->setExpireMonth($request['month'])
            ->setExpireYear($request['year'])
            ->setCvv2($request['ccv'])
            ->setFirstName($request['first_name'])
            ->setBillingCountry("US")
            ->setLastName($request['last_name']);

            $fi = new FundingInstrument();
            $fi->setPaymentCard($card);
            $payer = new Payer();
            $payer->setPaymentMethod("credit_card")
                ->setFundingInstruments(array($fi));
                // $payer = new Payer();
                // $payer->setPaymentMethod('paypal');
                $item_1 = new Item();
                $item_1->setName($request['name']) /** item name **/
                    ->setCurrency('USD')
                    ->setQuantity(1)
                    ->setPrice($amountt); /** unit price **/
                $item_list = new ItemList();
                $item_list->setItems(array($item_1));
                $amount = new Amount();
                $amount->setCurrency('USD')
                    ->setTotal($amountt);
                $transaction = new Transaction();
                $transaction->setAmount($amount)
                    ->setItemList($item_list)
                    ->setDescription('Thanh Toán');
                $redirect_urls = new RedirectUrls();

                $redirect_urls->setReturnUrl(route('paypaldone')) /** Specify return URL **/
                    ->setCancelUrl(route('paypalcancel'));
                $payment = new Payment();
                $payment->setIntent('Sale')
                    ->setPayer($payer)
                    ->setRedirectUrls($redirect_urls)
                    ->setTransactions(array($transaction));

                   
                    /** dd($payment->create($this->_api_context));exit; **/
                try {
                    $payment->create($this->_api_context);
                } catch (\PayPal\Exception\PayPalConnectionException  $ex) {
                    
                       \Session::flash('messagesResult','có lỗi trong quá trình thanh toán vui lòng thanh toán lại');
                        
                        return Redirect::route('mainManageHoteler');
                        /** die('Some error occur, sorry for inconvenient'); **/
                    
                }
               
                /** add payment ID to session **/
                $intro = "Chào mừng bạn đến với khách sạn của chúng tôi, khách sạn chúng tôi .
Khách sạn được chia thành 5 hạng phòng khác nhau, được du khách yêu thích bởi sự sạch sẽ và dịch vụ phòng hoàn hảo. Ngoài ra, khách sạn Đệ Nhất còn trang bị phòng tập thể hình, hồ bơi, 3 sân tennis, CLB trò chơi có thưởng (chỉ dành cho khách nước ngoài) & khu mát-xa – xông hơi để phục vụ khách lưu trú.
Ẩm thực cũng là một thế mạnh bởi sự đa dạng phong cách và tinh tế trong từng món ăn. Nhà hàng Phố Nướng Đệ Nhất, Korea House và Hanasushi mang đến những món ăn cũng như không gian đặc trưng đậm chất Việt Nam, Hàn Quốc & Nhật Bản. Với nhà hàng Buffet Đệ Nhất là sự tổng hợp hài hòa các món ăn đến từ Việt – Á – Âu, là một bữa tiệc hoành tráng thật sự cho khách lưu trú tại khách sạn nói riêng và thực khách Sài Gòn nói chung.";
DB::table('web_config')->insertGetId([
                 'background' => "img/bg1.jpg",
                 'color1' => "#ffffff",
                 'color2' => "#f6f6f6",
                 'author' =>  Auth::user()->id,
                 'intro' => $intro
             ]);
$config = DB::table('web_config')->latest()->first();
                $dataPay =  \Session::get('dataPay');
                DB::table('hotel')->insertGetId([
                 'hotel_name' => $dataPay['hotel_name'],
                 'account_id' => Auth::user()->username,
                 'hotel_url' => $dataPay['hotel_url'],
                 'expire_date' => $dataPay['expire_date'],
                 'total_room' => $dataPay['total_room'],
                 'config_id' =>$config->config_id
             ]);
            DB::table('users')
                ->where('id', Auth::User()->id)
                ->update(['total_cost' => $dataPay['total_cost']]);

          \Session::forget('dataPay');
          \Session::flash('messagesResult','Thanh toán thành công');
                return Redirect::route('mainManageHoteler');
            }
    }


public function getDone(Request $request)
{
    $id = $request->get('paymentId');
    $token = $request->get('token');
    $payer_id = $request->get('PayerID');
    
    $payment = Payment::get($id, $this->_api_context);

    $paymentExecution = new PaymentExecution();

    $paymentExecution->setPayerId($payer_id);
    $executePayment = $payment->execute($paymentExecution, $this->_api_context);

    // Clear the shopping cart, write to database, send notifications, etc.

    // Thank the user for the purchase
    $dataPay =  \Session::get('dataPay');
     $intro = "Chào mừng bạn đến với khách sạn của chúng tôi, khách sạn chúng tôi .
Khách sạn được chia thành 5 hạng phòng khác nhau, được du khách yêu thích bởi sự sạch sẽ và dịch vụ phòng hoàn hảo. Ngoài ra, khách sạn Đệ Nhất còn trang bị phòng tập thể hình, hồ bơi, 3 sân tennis, CLB trò chơi có thưởng (chỉ dành cho khách nước ngoài) & khu mát-xa – xông hơi để phục vụ khách lưu trú.
Ẩm thực cũng là một thế mạnh bởi sự đa dạng phong cách và tinh tế trong từng món ăn. Nhà hàng Phố Nướng Đệ Nhất, Korea House và Hanasushi mang đến những món ăn cũng như không gian đặc trưng đậm chất Việt Nam, Hàn Quốc & Nhật Bản. Với nhà hàng Buffet Đệ Nhất là sự tổng hợp hài hòa các món ăn đến từ Việt – Á – Âu, là một bữa tiệc hoành tráng thật sự cho khách lưu trú tại khách sạn nói riêng và thực khách Sài Gòn nói chung.";
DB::table('web_config')->insertGetId([
                 'background' => "img/bg1.jpg",
                 'color1' => "#ffffff",
                 'color2' => "#f6f6f6",
                 'author' =>  Auth::user()->id,
                 'intro' => $intro
             ]);
$config = DB::table('web_config')->latest()->first();
    DB::table('hotel')->insertGetId([
                 'hotel_name' => $dataPay['hotel_name'],
                 'account_id' => Auth::user()->username,
                 'hotel_url' => $dataPay['hotel_url'],
                 'expire_date' => $dataPay['expire_date'],
                 'total_room' => $dataPay['total_room'],
                 'config_id' => $config->config_id,
             ]);


        DB::table('users')
                ->where('id', Auth::User()->id)
                ->update(['total_cost' => $dataPay['total_cost']]);

    \Session::forget('dataPay');
    \Session::flash('messagesResult','Thanh toán thành công');
                return Redirect::route('mainManageHoteler');
}

public function getCancel()
{
    // Curse and humiliate the user for cancelling this most sacred payment (yours)
                 \Session::flash('messagesResult','có lỗi trong quá trình thanh toán vui lòng thanh toán lại');
   
                return Redirect::route('mainManageHoteler');
}

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
        
        $request->image->move(public_path('img/User/'.Auth::user()->username), $imageName);
         DB::table('users')
            ->where('id', Auth::user()->id)
            ->update( ['image_link' => $imageName]);

         return redirect()->route('mainProfile');
  }
  if($request['typePost'] == "updatePassword"){
            $messages = [];
            $validator = Validator::make($request->all(),[],$messages);
         
       if (Hash::check($request['current_pass'],Auth::user()->password))
        {
            
          if($request['now_pass'] != $request['now_pass_confirmation']){
              $validator->errors()->add('typePost', 'updatePassword');
                $validator->errors()->add('now_pass', 'Mật khấu nhập lại không giống');
                return redirect()->route('mainProfile')->withErrors($validator)->withInput();
          }
           DB::table('users')
             ->where('id', Auth::user()->id)
            ->update( ['password' =>  bcrypt($request['now_pass'])]);
            \Session::flash('messagesResult',"Thay đổi mật khẩu thành công");
            return redirect()->route('mainProfile');
        }
        $validator->errors()->add('typePost', 'updatePassword');
                $validator->errors()->add('current_pass', 'Mật khấu củ không giống');
                return redirect()->route('mainProfile')->withErrors($validator)->withInput();
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
       
        'password.confirmed' => 'password không giống!',
    ];
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255',
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
        
    ];
}

public function report(){
  $first_day_this_month = date('Y-m-01'); // hard-coded '01' for first day date("Y/m/d")
        
        $last_day_this_month  = date('Y-m-t');
        $info = array(
            
            "first_day" => $first_day_this_month,
            "last_day" => $last_day_this_month,
            );

  for($i = 1; $i <=  date('t'); $i++)
        {
            // add the date to the dates array
            $listDay[] = date('Y') . "-" . date('m') . "-" . str_pad($i, 2, '0', STR_PAD_LEFT);
        }
  $hotels = DB::table('hotel')->where('account_id','=',Auth::user()->username)->get();
  $total_cost= null;
  $total_spend = null;
  $abc = null;
  $cba = null;
  foreach ( $hotels as $key => $hotel ) {
    foreach ($listDay as $key2 => $day) {
     $invoices = DB::table('invoice')->where('hotel_id','=',$hotel->hotel_id)->where('date','=',$day)->get();
     $total = 0;
     foreach ($invoices as $key3 => $invoice) {
        $total = $total + $invoice->cost;
     }
     $spends = DB::table('spends')->where('hotel_id','=',$hotel->hotel_id)->where('date','=',$day)->get();
     foreach ($spends as $key4 => $spend) {
        $total = $total - $spend->cost;
     }
     $abc[$key][$key2] = $total;
    }
  }
// dd($abc); laf hotel theo ngayf  2 -> 30

  foreach ( $listDay   as $key => $day  ) {
    foreach ($hotels as $key2 => $hotel) {
     $invoices = DB::table('invoice')->where('hotel_id','=',$hotel->hotel_id)->where('date','=',$day)->get();
     $total = 0;
     foreach ($invoices as $key3 => $invoice) {
        $total = $total + $invoice->cost;
     }
     $spends = DB::table('spends')->where('hotel_id','=',$hotel->hotel_id)->where('date','=',$day)->get();
     foreach ($spends as $key4 => $spend) {
        $total = $total - $spend->cost;
     }
     $cba[$key][$key2] = $total;
    }
  }


  $hotelname = null;
foreach ($hotels as $key => $hotel) {
 $hotelname[] = $hotel->hotel_name;
}
  return view('main.report')->with('info',$info)->with('listDay',$listDay)->with('cost',$abc)->with('cost2',$cba)->with('hotels',$hotelname);

}

public function reportsubmit(){

}

    public function manageHotel(){
        $usersHotel = DB::table('users')->where('type','=','2' )->get();
        $hotels = DB::table('hotel')->get();
        return view('main.manageMainHotel')->with('hotels',$hotels)->with('usersHotel', $usersHotel);
    }

// controller manage hotel
    public function addHotelMain(Request $request){
    // $messagesResult = "Thêm tài kh";

      if($request['typePost'] == "addHotel"){
    
        $messages = ['hotel_url.unique' => 'Tên miền đã tồn tại',
                    'account_id.exists' => 'Tài khoản không tồn tại',];
        


        $validator = Validator::make($request->all(),[
                'hotel_url' => 'required|unique:hotel',
                'account_id' => 'required|exists:users,username',

            ],$messages);
        if ($validator->fails()) {
              // $messagesResult = "fails";
               
                $validator->errors()->add('typePost', 'addHotel');
                $validator->errors()->add('id', $request['id']);
                $hotels = DB::table('hotel')->get();
                 return redirect()->route('mainManageHotel')->withErrors($validator)->with('hotels',$hotels)->withInput();            
            }
            $getUser = DB::table('users')->where('username', '=',$request['account_id'])->first();
            $date = null;
            $total_cost = null;
            if($request['expire_date'] == 1){
                $date = Carbon::now()->addMonths(1);
                $total_cost = 100 + $getUser->total_cost;
            }
            if($request['expire_date'] == 2){
                $date = Carbon::now()->addMonths(2);
                $total_cost = 150 + $getUser->total_cost;
            }
            if($request['expire_date'] == 3){
                $date = Carbon::now()->addMonths(4);
                 $total_cost = 250 + $getUser->total_cost;
            }
            if($request['expire_date'] == 4){
                $date = Carbon::now()->addMonths(6);
                 $total_cost = 400 + $getUser->total_cost;
            }
        DB::table('hotel')->insertGetId([
                 'hotel_name' => $request['hotel_name'],
                 'account_id' => $request['account_id'],
                 'hotel_url' => $request['hotel_url'],
                 'expire_date' => $date,
                 'hotel_star' => $request['hotel_star'],
                 'total_room' => $request['total_room'],
             ]);
        DB::table('users')
                ->where('id', $getUser->id)
                ->update(['total_cost' => $total_cost]);

         $hotels = DB::table('hotel')->get();
            //return view('main.manage')->with('users',$users)->withErrors($errors);
            return redirect()->route('mainManageHotel')->with('hotels',$hotels);
      }



      if($request['typePost'] == "updateHotel"){

         $getHotel = DB::table('hotel')->where('hotel_id', '=', $request['id'])->first();
         if($getHotel != null){

                $messages = ['account_id.exists' => 'Tài khoản không tồn tại',];


        $validator = Validator::make($request->all(),[
                'account_id' => 'required|exists:users,username',
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

            $getUser = DB::table('users')->where('username', '=',$request['account_id'])->first();
            $date = $getHotel->expire_date;
            $total_Cost = null;
             if($request['expire_date'] == 0){
                $date = Carbon::createFromFormat('Y-m-d', $date)->addMonths(0);
                $total_Cost = $getUser->total_cost;
            }
            if($request['expire_date'] == 1){
                $date = Carbon::createFromFormat('Y-m-d', $date)->addMonths(1);
                $total_Cost = 100 + $getUser->total_cost;
            }
            if($request['expire_date'] == 2){
                $date = Carbon::createFromFormat('Y-m-d', $date)->addMonths(2);
                $total_Cost = 150 + $getUser->total_cost;
            }
            if($request['expire_date'] == 3){
                $date = Carbon::createFromFormat('Y-m-d', $date)->addMonths(4);
                 $total_Cost = 250 + $getUser->total_cost;
            }
            if($request['expire_date'] == 4){
                $date = Carbon::createFromFormat('Y-m-d', $date)->addMonths(6);
                $total_Cost = 400 + $getUser->total_cost;
            }

            DB::table('hotel')
                ->where('hotel_id', $request['id'])
                ->update(['hotel_name' => $request['hotel_name'], 'hotel_url' => $request['hotel_url'], 'account_id' => $request['account_id'],'hotel_star' => $request['hotel_star'], 'expire_date' => $date,'total_room' => $request['total_room']]);

             DB::table('users')
                ->where('id',  $getUser->id)
                ->update(['total_cost' => $total_Cost]);
                //return $request;
                return redirect()->route('mainManageHotel');


         }else{
            $messagesResult = "fails";
             return redirect()->route('mainManageHotel');
         }
        // validator


         return $request;
      }




      if($request['typePost'] == "deleteHotel"){
       $getUser = DB::table('hotel')->where('hotel_id', '=', $request['id'])->get();
         if($getUser != null){
           DB::table('account')->where('hotel_id', '=', $request['id'])->delete();
                DB::table('hotel')->where('hotel_id', '=', $request['id'])->delete();
                 $messagesResult = 'Xóa thành công' ;
                return redirect()->route('mainManageHoteler')->with('messagesResult', $messagesResult);
      }
      $messagesResult = 'Xóa thất bại' ;
      return redirect()->route('mainManageHoteler')->with('messagesResult', $messagesResult);

    }
     
    
}
//
// end controller manage hotel


// Manage hoteler

    public function manageHoteler(){

       $hotels = DB::table('hotel')->where('account_id', '=', Auth::user()->username)->get();
       // $hotels="zxcx";
       $totalbook = null;
       foreach ($hotels as $key => $hotel) {
         $totalbook[] =count(DB::table('booking')->where('hotel_id', '=', $hotel->hotel_id)->get());
       }
       
       
        return view('main.manageHoteler')->with('hotels',$hotels)->with('totalbook', $totalbook);
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
            $date = null;
            $total_cost = null;
            $amountPay = 1000000 ;
            $namePay = "Gói BASIS";
            if($request['expire_date'] == 1){
                $date = Carbon::now()->addMonths(1);
                $total_cost = 1000000 + Auth::User()->total_cost;
                $amountPay = 1000000;
                $namePay = "Gói BASIS";
            }
            if($request['expire_date'] == 2){
                $date = Carbon::now()->addMonths(2);
                $total_cost = 150000 + Auth::User()->total_cost;
                $amountPay = 150000;
                $namePay = "Gói SILVER";
            }
            if($request['expire_date'] == 3){
                $date = Carbon::now()->addMonths(4);
                 $total_cost = 250000 + Auth::User()->total_cost;
                 $amountPay = 250000;
                 $namePay = "Gói GOLD";
            }
            if($request['expire_date'] == 4){
                $date = Carbon::now()->addMonths(6);
                 $total_cost = 400000 + Auth::User()->total_cost;
                 $amountPay = 400000;
                 $namePay = "Gói VIP";
            }
             $dataPay = array(
                    'namePay' => $namePay,
                    'amountPay' => $amountPay,
                 'hotel_name' => $request['hotel_name'],
                 'account_id' => Auth::user()->username,
                 'hotel_url' => $request['hotel_url'],
                 'expire_date' => $date,
                 'total_room' => $request['total_room'],
                 'total_cost' => $total_cost,
            );

            \Session::put("dataPay",$dataPay);
            

           
            return  redirect()->route('paypal');


        // DB::table('hotel')->insertGetId([
        //          'hotel_name' => $request['hotel_name'],
        //          'account_id' => Auth::user()->username,
        //          'hotel_url' => $request['hotel_url'],
        //          'expire_date' => $date,
        //          'total_room' => $request['total_room'],
        //      ]);
        // DB::table('users')
        //         ->where('id', Auth::User()->id)
        //         ->update(['total_cost' => $total_cost]);
        
         //$hotels = DB::table('hotel')->where('account_id', '=', Auth::user()->username)->get()->get();
            //return view('main.manage')->with('users',$users)->withErrors($errors);
            return redirect()->route('mainManageHoteler');
      }



      if($request['typePost'] == "updateHotel"){

         $getHotel = DB::table('hotel')->where('hotel_id', '=', $request['id'])->first();
         if($getHotel != null){

            $messages = ['account_id.required' => 'tên miền không được để trống',];


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
            $getUser = Auth::User();
            $date = $getHotel->expire_date;
            $total_Cost = null;
             if($request['expire_date'] == 0){
                $date = Carbon::createFromFormat('Y-m-d', $date)->addMonths(0);
                $total_Cost = Auth::User()->total_cost;
            }
            if($request['expire_date'] == 1){
                $date = Carbon::createFromFormat('Y-m-d', $date)->addMonths(1);
                $total_Cost = 100 + Auth::User()->total_cost;
            }
            if($request['expire_date'] == 2){
                $date = Carbon::createFromFormat('Y-m-d', $date)->addMonths(2);
                $total_Cost = 150 + Auth::User()->total_cost;
            }
            if($request['expire_date'] == 3){
                $date = Carbon::createFromFormat('Y-m-d', $date)->addMonths(4);
                 $total_Cost = 250 + Auth::User()->total_cost;
            }
            if($request['expire_date'] == 4){
                $date = Carbon::createFromFormat('Y-m-d', $date)->addMonths(6);
                $total_Cost = 400 + Auth::User()->total_cost;
            }

            DB::table('hotel')
                ->where('hotel_id', $request['id'])
                ->update(['hotel_name' => $request['hotel_name'], 'hotel_url' => $request['hotel_url'], 'hotel_star' => $request['hotel_star'], 'expire_date' => $date]);

             DB::table('users')
                ->where('id', Auth::User()->id)
                ->update(['total_cost' => $total_Cost]);
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
                DB::table('account')->where('hotel_id', '=', $request['id'])->delete();
                DB::table('hotel')->where('hotel_id', '=', $request['id'])->delete();
                 $messagesResult = 'Xóa thành công' ;
                return redirect()->route('mainManageHoteler')->with('messagesResult', $messagesResult);
        }
            $messagesResult = "Xóa thất bại";
            return redirect()->route('mainManageHoteler')->with('messagesResult', $messagesResult);
          

    }

}


//manage goverm hoteler
public function manageGovermHoteler(){
        $hotels =  DB::table('hotel')->where('account_id', '=', Auth::user()->username)->get();
        $users = DB::table('account')->where('type', '=',3)->where('mn_user', '=',Auth::User()->id)->get();
       // $hotels="zxcx";
        return view('main.ManageGovernHoteler')->with('users',$users)->with('hotels',$hotels);
    }

    public function addGovermHoteler(Request $request){

        if($request['typePost'] == "addUser"){
    // validator
          
    
   $messages = [
        'typePost'=>"typePost = addUser",
        'username.unique' => 'Tài khoản đả tồn tại!',
        
        'password.confirmed' => 'password không giống!',
    ];


    $validator = Validator::make($request->all(),[
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:account',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ],$messages);
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
             'mn_user' => Auth::User()->id,
         ]);
        //return view('main.manage')->with('users',$users)->withErrors($errors);
        return redirect()->route('mainManageGovermHoteler');
  }



  if($request['typePost'] == "updateUser"){

     $getUser = DB::table('account')->where('id', '=', $request['id'])->get();
     if($getUser != null){

            $messages = [
            'id.not-in' => 'id không tồn tại!',];


    $validator = Validator::make($request->all(),[
            'id' => 'required|not-in:account',
        ],$messages);
        if ($validator->fails()) {
           $messagesResult = "fails";
           
            $validator->errors()->add('typePost', 'updateUser');
            $validator->errors()->add('id', $request['id']);
            //return $validator->errors();
             return redirect()->route('mainManageGovermHoteler')->withErrors($validator)->withInput();            
        }
        $getUsername = DB::table('account')->where('id', '<>', $request['id'])->where('username','=',$request['username']) ->first();
        if($getUsername != null){ 
           $messagesResult = "fails";

           $validator->errors()->add('typePost', 'updateUser');
            $validator->errors()->add('id', $request['id']);
           $validator->errors()->add('username', 'username đã tồn tại!');
             return redirect()->route('mainManageGovermHoteler')->withErrors($validator)->withInput();
        }
        
        DB::table('account')
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
   $getUser = DB::table('account')->where('id', '=', $request['id'])->first();
     if($getUser != null){
        DB::table('account')->where('id', '=', $request['id'])->delete();

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

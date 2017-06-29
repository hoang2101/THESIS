<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\User;
use App\Hotel;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

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
 use DatePeriod; 
  use DateTime; 
  use DateInterval;
use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;
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

    private $_api_context;
   



    public function __construct()
    {
        
        $paypal_conf = Config('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
        \Cloudinary::config(array( 
      "cloud_name" => "khtn", 
      "api_key" => "557229639398344", 
      "api_secret" => "v88_pABUmR0rIp3ZsjhmqmU-CyI" 
    ));
       
    }
function RandomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $randstring = '';
        for ($i = 0; $i < 10; $i++) {
            $randstring =  $randstring.$characters[rand(0, strlen($characters)-1)];
        }
        return $randstring;
    }
   
public function reset(Request $request,$subdomain)
    {
        
 


    }
    public function paypal($subdomain){
        $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
        $users = Auth::guard('account')->user();
      if($hotels != null){
             


            $info = array(
            "name" => $hotels->hotel_name,
            "subdomain" => $subdomain, 
            );
            $namepay =  \Session::get('namepay');
            $amount =  \Session::get('amount');
            \Session::put('cost', $amount);
       // dd($dataPay);
         $infopay = array(
            "name" => $namepay,
            "amount" => $amount,
            );
        return view('sub.pay')->with('info', $info)->with('infopay',$infopay )->with('users',$users);
            
         }
       return view('sub.404');

        
        //dd($this->_namePay);
      
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

    public function paypalSubmit(Request $request, $subdomain){
 $messages = [];
        $validator = Validator::make($request->all(),[],$messages);
        $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
        if($request['ho'] == null || $request['ho'] == ""){
         
            $validator->errors()->add('ho', 'Không được để trống họ.');
             return redirect()->route('subpaypal',['subdomain' => $subdomain])->withErrors($validator)->withInput();
     }
 if($request['ten'] == null || $request['ten'] == ""){
         
            $validator->errors()->add('ten', 'PKhông được để trống tên.');
             return redirect()->route('subpaypal',['subdomain' => $subdomain])->withErrors($validator)->withInput();
     }
 if($request['quocgia'] == null || $request['quocgia'] == ""){
         
            $validator->errors()->add('quocgia', 'Không được để trống quốc gia.');
             return redirect()->route('subpaypal',['subdomain' => $subdomain])->withErrors($validator)->withInput();
     }
        \Session::put("first_name",$request['ho']);
        \Session::put("last_name",$request['ten']);
        \Session::put("country",$request['quocgia']);

       
    

        $amountt = null;
        $amountt = $this->convertCurrency($request['amount'],"VND", 'USD', $amountt);
        $amountt = $amountt*2.9/100 + 0.3;
        // $url  = "https://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
        $resultpayf = array(
            "msg" => "Thanh toán thất bại",
            );

        $resultpayt = array(
            "msg" => "Thanh toán thành công",
            );
        if($request['typePost'] == "paypal"){

        \Session::put('type',"Paypal");
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
        $redirect_urls->setReturnUrl(route('subpaypaldone',['subdomain' => $subdomain])) /** Specify return URL **/
            ->setCancelUrl(route('subpaypalcancel',['subdomain' => $subdomain]));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
            /** dd($payment->create($this->_api_context));exit; **/
         try {
                    $payment->create($this->_api_context);
                } catch (\PayPal\Exception\PayPalHttpConnection $ex) {
                    if (\Config::get('app.debug')) {
                       
                       \Session::flash('messagesResult','hết thời hạn kết nối');

                        
                        return Redirect::route('subCongra',['subdomain' => $subdomain]);
                        /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
                        /** $err_data = json_decode($ex->getData(), true); **/
                        /** exit; **/
                    } else {
                       \Session::flash('messagesResult','có lỗi trong quá trình thanh toán vui lòng thanh toán lại');
                        
                        return Redirect::route('subCongra',['subdomain' => $subdomain]);
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
                
                return Redirect::route('subCongra',['subdomain' => $subdomain]);

               
        }
        else{
        \Session::put('type',"Credit card");
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

                $redirect_urls->setReturnUrl(route('subpaypaldone',['subdomain' => $subdomain])) /** Specify return URL **/
                    ->setCancelUrl(route('subpaypalcancel',['subdomain' => $subdomain]));
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
                        
                       return Redirect::route('subpaypal',['subdomain' => $subdomain]);
                        /** die('Some error occur, sorry for inconvenient'); **/
                    
                }
               
                /** add payment ID to session **/
            // $subdomain = \Session::get("subdomain");
            $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
                $nroom =  \Session::get("nroom");
            $checkin =  \Session::get("checkin");
            $checkout=  \Session::get("checkout");
            $people = \Session::get("people");
            $first_name = \Session::get("first_name");
            $last_name =\Session::get("last_name");
            $country = \Session::get("country");
            $cost =  \Session::get("cost");
            $type =  \Session::get("type");
            $resulttype_room = \Session::get("resulttype_room");

            $iduser = null;
          if(Auth::guard('account')->Check()){
            $iduser = Auth::guard('account')->user()->id;
          }
DB::table('booking')->insertGetId([
             'first_name' => $first_name,
             'last_name' => $last_name,
             'date_from' => $checkin,
             'date_to' => $checkout,
             'number_people' => $people,
             'contry' => $country,
             'hotel_id' => $hotels->hotel_id,
             'total_cost_room' => $cost,
             'deposit' => $cost,
             'account_id' => $iduser
         ]);

$book = DB::table('booking')->latest()->first();

$roombook = "";
$rooms = DB::table('room')->where('hotel_id', '=', $hotels->hotel_id)->where('room_type_id', '=', $resulttype_room)->get();

DB::table('invoice')->insertGetId([
         'booking_id' => $book->booking_id,
         'cost' => $cost,
         'type' => "room",
         'date' => date('Y-m-d'),
         'name' => $type,
         'hotel_id' => $hotels->hotel_id,
         ]);  

for($i = 0; $i < $nroom; $i++){
    foreach ($rooms as $key => $room) {
        if($room->is_booked == 0){
            DB::table('room')->where('room_id', '=', $room->room_id)->update(['is_booked' => 1, 'booked_id' => $book->booking_id]);
            $roombook =$roombook .((string)($room->room_number) ." ");
           
            break;
        }
    }
}

DB::table('booking')->where('booking_id', '=', $book->booking_id)->update(['room_id' => $roombook]);




    
    \Session::forget("nroom");
    \Session::forget("checkin");
    \Session::forget("checkout");
    \Session::forget("people");
    \Session::forget("first_name");
    \Session::forget("last_name");
    \Session::forget("country");
    \Session::forget("subdomain");
    \Session::forget("cost");
    \Session::forget("type");
    \Session::flash('messagesResult','Thanh toán thành công');
    \Session::flash('idbooking',$book->booking_id);

                return Redirect::route('subCongra',['subdomain' => $subdomain]);
            }
    }


                


public function getDone(Request $request)
{
    $subdomain = \Session::get("subdomain");
    $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
    $id = $request->get('paymentId');
    $token = $request->get('token');
    $payer_id = $request->get('PayerID');
    
    $payment = Payment::get($id, $this->_api_context);

    $paymentExecution = new PaymentExecution();

    $paymentExecution->setPayerId($payer_id);
    $executePayment = $payment->execute($paymentExecution, $this->_api_context);

    // Clear the shopping cart, write to database, send notifications, etc.

    // Thank the user for the purchase
   

            $nroom =  \Session::get("nroom");
            $checkin =  \Session::get("checkin");
            $checkout=  \Session::get("checkout");
            $people = \Session::get("people");
            $first_name = \Session::get("first_name");
            $last_name =\Session::get("last_name");
            $country = \Session::get("country");
            $cost =  \Session::get("cost");
            $type =  \Session::get("type");
            $resulttype_room = \Session::get("resulttype_room");

          $iduser = null;
          if(Auth::guard('account')->Check()){
            $iduser = Auth::guard('account')->user()->id;
          }
DB::table('booking')->insertGetId([
             'first_name' => $first_name,
             'last_name' => $last_name,
             'date_from' => $checkin,
             'date_to' => $checkout,
             'number_people' => $people,
             'contry' => $country,
             'hotel_id' => $hotels->hotel_id,
             'total_cost_room' => $cost,
             'deposit' => $cost,
             'account_id' => $iduser
         ]);

$book = DB::table('booking')->latest()->first();

$roombook = "";
$rooms = DB::table('room')->where('hotel_id', '=', $hotels->hotel_id)->where('room_type_id', '=', $resulttype_room)->get();

DB::table('invoice')->insertGetId([
         'booking_id' => $book->booking_id,
         'cost' => $cost,
         'type' => "room",
         'date' => date('Y-m-d'),
         'name' => $type,
         'hotel_id' => $hotels->hotel_id,
         ]);  

for($i = 0; $i < $nroom; $i++){
    foreach ($rooms as $key => $room) {
        if($room->is_booked == 0){
            DB::table('room')->where('room_id', '=', $room->room_id)->update(['is_booked' => 1, 'booked_id' => $book->booking_id]);
            $roombook =$roombook .((string)($room->room_number) ." ");
           
            break;
        }
    }
}

DB::table('booking')->where('booking_id', '=', $book->booking_id)->update(['room_id' => $roombook]);




    
    \Session::forget("nroom");
    \Session::forget("checkin");
    \Session::forget("checkout");
    \Session::forget("people");
    \Session::forget("first_name");
    \Session::forget("last_name");
    \Session::forget("country");
    \Session::forget("subdomain");
    \Session::forget("cost");
    \Session::forget("type");
    \Session::flash('messagesResult','Thanh toán thành công');
    \Session::flash('idbooking',$book->booking_id);

                return Redirect::route('subCongra',['subdomain' => $subdomain]);
}

public function getCancel()
{
    // Curse and humiliate the user for cancelling this most sacred payment (yours)
                 \Session::flash('messagesResult','có lỗi trong quá trình thanh toán vui lòng thanh toán lại');
   
                return Redirect::route('subpaypal',['subdomain' => $subdomain]);
}
public function congra($subdomain){
    $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
    if($hotels != null){
            $users = Auth::guard('account')->user();
            



           
            $info = array(
                    "name" => $hotels->hotel_name,
                    "subdomain" => $subdomain, 
                    );
           
            return view('sub.congra')->with('users',$users)->with('info',$info);
        
         }
       return view('sub.404');

}
    public function checkAuthAccount(){
        

    }
    public function index($subdomain)
    {
        //

        $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
        
       // return $hotels;

         if($hotels != null){
          $config = DB::table('web_config')->where('config_id','=', $hotels->config_id)->first();
        $type_rooms = DB::table('type_room')->where('hotel_id','=', $hotels->hotel_id)->get();
        $services = DB::table('service')->where('hotel_id','=', $hotels->hotel_id)->get();
           if(Auth::guard('account')->Check()){

            if(Auth::guard('account')->user()->hotel_id != $hotels->hotel_id ){
                Auth::guard('account')->logout();
                
            }
       }
            
            $config->intro = preg_split("/\\r\\n|\\r|\\n/", $config->intro); 
            // explode('PHP_EOL', $config->intro);
           
            $info = array(
            "name" => $hotels->hotel_name,
            "subdomain" => $subdomain, 
            );

             return view('sub.index')->with('info',$info)->with('config',$config)->with('type_rooms', $type_rooms)->with('services', $services);
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
           
            $messages = [
                    'username.unique' => 'Tài khoản đã tồn tại',];

             $validator =Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:account',
            'email' => 'required|string|email|max:255',
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
            if(Auth::guard('account')->check()){
                 Auth::guard('account')->logout();
            }
               
                return redirect()->route('subHome',['subdomain' => $subdomain]);
          }

///////////////////////reset
          if($request['typePost']=='reset'){
            $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
       $messages = [];
        $validator = Validator::make($request->all(),[],$messages);
        $user = DB::table('account')->where('username' , '=', $request['username2'])->where('email','=',$request['email'])->where('hotel_id','=',$hotels->hotel_id)->first();
        if($user == null){
            \Session::flash('username2', 'Tài khoản hoặc email không đúng');
          
        redirect()->route('subHome',['subdomain' => $subdomain])->withInput();
     }
        // thesismanagehotel@gmail.com
     // pass luanhoang


            $data_toview = array();
            $mk = $this->RandomString();
            DB::table('account')
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
                        $data['hotel_name'] =$hotels->hotel_name;
                        $data['subdomain'] =$subdomain;
                        //Sender dan Reply harus sama
                        // Mail::to($data['emailto'])
                        // ->cc($data['sender'], $data['hotel_name'].' hotel manage')
                        // ->send($data_toview);
                        Mail::send('emails', $data_toview, function($message) use ($data)
                        {
 
                            $message->from($data['sender'], $data['hotel_name'].' hotel manage');
                            $message->to($data['emailto'])
                            ->replyTo($data['sender'], $data['hotel_name'].' hotel manage')
                            ->subject('Cấp lại mật khẩu');
 
                            \Session::flash('resetmessage','Mật khẩu mới đươc gửi vào email của bạn.');
                            
                        });
            return redirect()->route('subHome',['subdomain' =>  $data['subdomain']]);
            }catch(\Swift_TransportException $e){
                $response = $e->getMessage() ;
                echo $response;
            }
            
 
            // Restore your original mailer
            Mail::setSwiftMailer($backup);
           return redirect()->route('subHome',['subdomain' =>  $data['subdomain']]);
          }
////////////////////////search rooom
          if($request['typePost']=='searchRoom'){
            
            
            // /echo "Today is " . date("Y/m/d") . "<br>";
            // dd("Today is " . date("Y/m/d  H:i:s"));
            $checkin = $request['check_in'];
            $checkout = $request['check_out'];
            $people = $request['people'];
            $nroom = $request['room'];
            $today =  date('Y-m-d');
            // $first_name = $request['first_name'];
            // $last_name = $request['last_name'];
            // $country = $request['country'];
           
            $messages = [];
            $validator = Validator::make($request->all(),[],$messages);
            $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
            $info = array(
            "name" => $hotels->hotel_name,
            "subdomain" => $subdomain, 
            );
            if(strtotime($checkin) > strtotime($checkout)){ 
                $validator->errors()->add('typePost', 'searchRoom');
                $validator->errors()->add('check_in', 'Ngày checkin không thể lớn hơn ngày checkout');
                 return redirect()->route('subHome',['subdomain' => $subdomain])->withErrors($validator)->withInput();
            }

            if(strtotime($checkin) < $today){ 
                $validator->errors()->add('typePost', 'searchRoom');
                $validator->errors()->add('check_in', 'Ngày checkin không thể không thể nhỏ hơn hôm nay');
                 return redirect()->route('subHome',['subdomain' => $subdomain])->withErrors($validator)->withInput();
            }
            if($nroom > ($people)){ 
                $validator->errors()->add('typePost', 'searchRoom');
                $validator->errors()->add('people', 'Số phòng không được lớn hơn số người');
                 return redirect()->route('subHome',['subdomain' => $subdomain])->withErrors($validator)->withInput();
            }

             $startTimeStamp = strtotime($checkin);
            $endTimeStamp = strtotime($checkout);

            $timeDiff = abs($endTimeStamp - $startTimeStamp);

            $numberDays = $timeDiff/86400;  // 86400 seconds in one day

            // and you might want to convert to integer
            $numberDays = intval($numberDays);



            $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
            $rooms = DB::table('room')->leftJoin('booking', 'booking.booking_id', '=', 'room.booked_id')->where('room.hotel_id', '=', $hotels->hotel_id)->select('room.*', 'booking.date_from','booking.date_to')->get();
            foreach ($rooms as $room) {
                if($room->date_to != null){
                    if(strtotime($room->date_to) < strtotime($checkin)){
                        $room->is_booked = 0;

                    }
                }
            }

           
            $type_rooms =  DB::table('type_room')->where('hotel_id', '=', $hotels->hotel_id)->get();

            if(count($rooms) < $nroom){
                \Session::flash('messagesResult','Khách sạn không còn đủ phòng yêu cầu, xin nhập vào số phòng nhỏ hơn');
                    return  redirect()->route('subHome',['subdomain' => $subdomain]);
            }
            
                $maxpeople = 1;
                foreach ($type_rooms as $type_room) {
                    if($maxpeople < $type_room->number_people)
                        $maxpeople = $type_room->number_people;
                }
                if($maxpeople * $nroom < $people){
                    
                    \Session::flash('messagesResult',"Hiện tại khách sạn không đủ điều kiện để đáp ứng " .$people ." người trong ".$nroom .".");
                    return  redirect()->route('subHome',['subdomain' => $subdomain]);
                }

                $peopleEachRoom = ((int) ($people/$nroom));
                
                if($people%$nroom > 0)
                {
                    $peopleEachRoom++;
                }
                
                
                $resultroom = array();
                $resultcost = array();
                $resulttype_room =array();

                

                for($i = 0; $i<count($type_rooms); $i++){
                    for($j = $i; $j<count($type_rooms); $j++){
                        if($type_rooms[$i]->number_people < $type_rooms[$j]->number_people ){
                            $temp = $type_rooms[$i];
                            $type_rooms[$i] = $type_rooms[$j];
                            $type_rooms[$j] = $temp;
                        }


                    }
                }
                $roomsfortypes = null;
                foreach ($type_rooms as $type_room) {
                    // dd($type_room);
                   $roomsfortypes[] = DB::table('room')->where('room_type_id', '=', $type_room->type_room_id)->get();

                }

                for( $i = 0; $i< count($roomsfortypes); $i++){
                    if($peopleEachRoom <= $type_rooms[$i]->number_people  && count($roomsfortypes[$i]) >= $nroom) {
                        array_push($resultroom,"Có ".$nroom ." phòng loại " .$type_rooms[$i]->type_name." giá " .$type_rooms[$i]->cost*$nroom ." mỗi ngày");
                        
                        array_push($resulttype_room,$type_rooms[$i]->type_room_id);
                    
                    }
                }

                if(count($resultroom) < 1){
                    \Session::flash('messagesResult','không có kết quả nào phù hợp');
                    return  redirect()->route('subHome',['subdomain' => $subdomain]);
                }
                
                // dd($resultroom);
                // // dd($type_rooms);
                // $temppeople = $people;
                // $peoplefortyperoom = null;
                // for($i = 0; $i<count($type_rooms); $i++){
                //     $peoplefortyperoom[$i] = round($temppeople/$type_rooms[$i]->number_people);
                //     if($peoplefortyperoom[$i] == 0){
                //         $peoplefortyperoom[$i] = $temppeople;
                //         $temppeople  = 0;
                //         break;
                //     }
                //     $temppeople = $temppeople - round($temppeople/$type_rooms[$i]->number_people)*$type_rooms[$i]->number_people;

                //     $peoplefortyperoom[$i] = $peoplefortyperoom[$i]*$type_rooms[$i]->number_people;
                // }

                // // foreach ($type_rooms as $type_room) {
                // //     $peoplefortyperoom[] = round($temppeople/$type_room->number_people);
                // //     if($peoplefortyperoom[] == 0){
                // //         $peoplefortyperoom[] = $temppeople;
                // //         $temppeople  = 0;
                // //         break;
                // //     }
                // //     $temppeople = $temppeople - round($temppeople/$type_room->number_people)*$type_room->number_people;

                // //     $peoplefortyperoom[] = $peoplefortyperoom[]*$type_room->number_people;
                    
                // // }
                // dd($peoplefortyperoom);
                \Session::put("nroom",$nroom);
                \Session::put("checkin",$checkin);
                \Session::put("checkout",$checkout);
                \Session::put("people",$people);
                // \Session::put("first_name",$first_name);
                // \Session::put("last_name",$last_name);
                // \Session::put("country",$country);
                \Session::put("subdomain",$subdomain);
                \Session::put("numberDays",$numberDays);
               
                \Session::put("resultroom",collect($resultroom)) ;
                \Session::put("resulttype_room",collect($resulttype_room)) ;

                return  redirect()->route('roomResult',['subdomain' => $subdomain]);

                
            



          }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function roomResult($subdomain){

    $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
     $users = Auth::guard('account')->user();
      if($hotels != null){
             


            $info = array(
            "name" => $hotels->hotel_name,
            "subdomain" => $subdomain, 
            );
            return view('sub.roomresult')->with('users',$users)->with('info',$info);
            
         }
       return view('sub.404');

}

public function editRoomResult(Request $request, $subdomain){
    $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
    if($hotels != null){
            $users = Auth::guard('account')->user();
            $id = $request['id'];
            $nroom = \Session::get("nroom");
           $resultroom = \Session::get('resultroom');
           $numberDays = \Session::get('numberDays');

           $resulttype_room = \Session::get("resulttype_room") ;
           \Session::put("resulttype_room", $resulttype_room[$id]) ;
           $type_room = DB::table('type_room')->where('type_room_id', '=', $resulttype_room[$id])->first();


            
            \Session::put("namepay","Thanh toán phòng khách sạn" );
            \Session::put("amount",$nroom *$type_room->cost * $numberDays);
            
           
             return redirect()->route('subpaypal',['subdomain' => $subdomain]);
        
         }
       return view('sub.404');
   
}


public function payment($subdomain){

}

public function historyBook($subdomain){

    $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
     $users = Auth::guard('account')->user();

     $books = DB::table('booking')->where('account_id',"=",$users->id)->get();
    
      if($hotels != null){
             


            $info = array(
            "name" => $hotels->hotel_name,
            "subdomain" => $subdomain, 
            );
            return view('sub.historyBook')->with('users',$users)->with('info',$info)->with('books',$books);
            
         }
       return view('sub.404');
}

public function historyBookSubmit(Request $request, $subdomain){


}


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
   
        // $imageName = Auth::guard('account')->user()->username.'/avatar2.'.$request->image->getClientOriginalExtension();
        
        // $request->image->move(public_path('img/User/'.Auth::guard('account')->user()->username), $imageName);
          $ten = \Cloudinary\Uploader::upload($request->image, array("use_filename" => TRUE, "width" => 250, "height" => 250));
         DB::table('account')
            ->where('id', Auth::guard('account')->user()->id)
            ->update( ['image_link' =>  $ten['url']]);

         return redirect()->route('subProfile',['subdomain' => $subdomain] );
  }
  
   if($request['typePost'] == "updatePassword"){
            $messages = [];
            $validator = Validator::make($request->all(),[],$messages);
            
           

       if (Hash::check($request['current_pass'],Auth::guard('account')->user()->password))
        {

          if($request['now_pass'] != $request['now_pass_confirmation']){
              $validator->errors()->add('typePost', 'updatePassword');
                $validator->errors()->add('now_pass', 'Mật khấu nhập lại không giống');
                return redirect()->route('subProfile',['subdomain' => $subdomain])->withErrors($validator)->withInput();
          }
           DB::table('account')
             ->where('id', Auth::guard('account')->user()->id)
            ->update( ['password' =>  bcrypt($request['now_pass'])]);
            \Session::flash('messagesResult',"Thay đổi mật khẩu thành công");
            return redirect()->route('subProfile',['subdomain' => $subdomain] );
        }
        $validator->errors()->add('typePost', 'updatePassword');
                $validator->errors()->add('current_pass', 'Mật khấu củ không giống');
                return redirect()->route('subProfile',['subdomain' => $subdomain])->withErrors($validator)->withInput();
        
        
         // DB::table('account')
         //    ->where('id', Auth::guard('account')->user()->id)
         //    ->update( ['image_link' => $imageName]);

         
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
   
    DB::table('account')->insertGetId([
             'first_name' => $request['first_name'],
             'last_name' => $request['last_name'],
             'email' => $request['email'],
             'username' => $request['username'],
             'password' => bcrypt($request['password']),
             'type' => 4,
             'hotel_id' => $hotels->hotel_id,
             'salary' => $request['salary'],
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

    $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
    $config = DB::table('web_config')->where('config_id', $hotels->config_id)->first();
    $imageName = null;
    if($request->image == null)
    {
      $imageName = $config->background;
    }else{

        // $imageName = 'background.'.$request->image->getClientOriginalExtension();
        // $request->image->move(public_path('img/Hotel/'.$hotels->hotel_name), $imageName);
        // $imageName = 'img/Hotel/'.$hotels->hotel_name."/".$imageName;
        $ten = \Cloudinary\Uploader::upload($request->image, array("use_filename" => TRUE, "width" => 1382, "height" => 778));
        $imageName = $ten['url'];
    }
    
     
        
        
         DB::table('web_config')
            ->where('config_id', $hotels->config_id)
            ->update( ['background' => $imageName,
                        'intro' => $request['intro'],
                        'color1' => $request['color1'],
                        'color2' => $request['color2']
                        ]);

            return redirect()->route('subConfig',['subdomain' => $subdomain]);

}

public function bookManage($subdomain){
        $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
        $checkins = DB::table('booking')->leftJoin('account','account.id','=','booking.account_id')->where('booking.hotel_id','=',$hotels->hotel_id)->select('booking.*', 'account.username')->orderBy('booking_id', 'desc')->get();
        // $checkouts = DB::table('checkout')->orderBy('checkout_id', 'desc')->get();
        $rooms = $rooms = DB::table('room')->where('room.hotel_id', '=', $hotels->hotel_id)->orderBy('room_number', 'asc')->get();
        $type_rooms =  DB::table('type_room')->where('hotel_id', '=', $hotels->hotel_id)->get();
        $services =  DB::table('service')->where('hotel_id', '=', $hotels->hotel_id)->get();
        $bookings = DB::table('booking')->where('hotel_id','=',$hotels->hotel_id)->where('date_checkout',"=" , null)->get();
        
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
            if(Auth::guard('account')->user()->type != 4){
                return view('sub.404');
            }

            $info = array(
            "name" => $hotels->hotel_name,
            "subdomain" => $subdomain, 
            );
            return view('sub.bookManage')->with('checkins',$checkins)->with('info',$info)->with('type_rooms', $type_rooms)->with('rooms',$rooms)->with('services',$services)->with('bookings',$bookings);
            // if(Auth::guard('account')->user()->type == 4 || Auth::guard('account')->user()->type == 3){
            //     return view('sub.mainManageProlife')->with('users',$users)->with('info',$info);
            // }
            
            
         }
       return view('sub.404');
}

public function bookManageSubmit(Request $request,  $subdomain){
    // dd($request);

    $messages = [];
    $validator = Validator::make($request->all(),[],$messages);
     $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
     
    if($request['typePost'] == "addbooking"){
        if($request['room'] == null || $request['room'] == ""){
          $validator->errors()->add('typePost', 'addbooking');
            $validator->errors()->add('room', 'Phòng không thể trống');
             return redirect()->route('subBookManage',['subdomain' => $subdomain])->withErrors($validator)->withInput();
     }
        if(strtotime($request['date_checkin']) > strtotime($request['date_checkout'])){ 
            $validator->errors()->add('typePost', 'addbooking');
            $validator->errors()->add('date_checkin', 'Ngày checkin không thể lớn hơn ngày checkout');
             return redirect()->route('subBookManage',['subdomain' => $subdomain])->withErrors($validator)->withInput();
        }
        $totalcost = 0;
       $addrooms =  explode(' ', $request['room']);

       foreach ($addrooms as $key => $addroom) {
          $room = DB::table('room')->where('hotel_id',"=", $hotels->hotel_id)->where("room_number","=", $addroom)->first();
          $typeroom = DB::table('type_room')->where('type_room_id',"=", $room->room_type_id)->first();
          $totalcost = $totalcost + $typeroom->cost;
       }

$startTimeStamp = strtotime($request['date_checkin']);
$endTimeStamp = strtotime($request['date_checkout']);

$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day

// and you might want to convert to integer
$numberDays = intval($numberDays);
        

        DB::table('booking')->insertGetId([
             'first_name' => $request['first_name'],
             'last_name' => $request['last_name'],
             'date_from' => $request['date_checkin'],
             'date_to' => $request['date_checkout'],
             'number_people' => $request['number_people'],
             'contry' => $request['country'],
             'room_id' => $request['room'],
             'account_id' =>Auth::guard('account')->user()->id,
             'hotel_id' => $hotels->hotel_id,
             'total_cost_room' =>$totalcost * $numberDays,
         ]);
        $bookings = DB::table('booking')->where('hotel_id', '=', $hotels->hotel_id)->latest()->first();
        \Session::flash('showPrepay',"ShowPrePay");
        \Session::flash('id_book',$bookings->booking_id);
        \Session::flash('total_cost_room', $totalcost * $numberDays);

        
        foreach ($addrooms as $addroom) {
            
            DB::table('room')->where('room_number', '=', $addroom)->update(['is_booked' => 1,'booked_id' => $bookings->booking_id]);

        }
        
        return redirect()->route('subBookManage',['subdomain' => $subdomain]);
    }
     if($request['typePost'] == "updateBooking"){
        $addrooms =  explode(' ', $request['room']);
        
        $findrooms =  explode(' ', DB::table('booking')->where('booking_id', $request['id'])->first()->room_id);
       if($request['room'] == null || $request['room'] == ""){
          $validator->errors()->add('typePost', 'addbooking');
            $validator->errors()->add('room', 'Phòng không thể trống');
             return redirect()->route('subBookManage',['subdomain' => $subdomain])->withErrors($validator)->withInput();
     }
         if(strtotime($request['date_checkin']) > strtotime($request['date_checkout'])){ 
            $validator->errors()->add('typePost', 'updateBooking');
            $validator->errors()->add('date_checkin', 'Ngày checkin không thể lớn hơn ngày checkout');
             return redirect()->route('subBookManage',['subdomain' => $subdomain])->withErrors($validator)->withInput();
        }
        // if(DB::table('booking')->where('booking_id', $request['id'])->first()->room_id == $request['room'])

            
        

            // if(DB::table('booking')->where('booking_id', $request['id'])->first()->room_id != $request['room']){
            //     $booked =  DB::table('booking')->where('booking_id', '=', $request['id'])-> first();
            //     DB::table('room')->where('room_id', '=', $booked->room_id)->update(['is_booked' => 0]);
            //     DB::table('room')->where('room_id', '=', $request['room'])->update(['is_booked' => 1]);
            // }
        if($request['room'] == "" || $request['room'] == null){
            DB::table('booking')
            ->where('booking_id', $request['id'])
            ->update(['first_name' => $request['first_name'], 'last_name' => $request['last_name'], 'date_from' => $request['date_checkin'],'date_to' => $request['date_checkout'], 'number_people' => $request['number_people'], 'contry' => $request['country'],'account_id' =>Auth::guard('account')->user()->id]);
        }else{
            foreach ($findrooms as $findroom) {
            DB::table('room')->where('room_number', '=', $findroom)->update(['is_booked' => 0]);
            }
            foreach ($addrooms as $addroom) {
                DB::table('room')->where('room_number', '=', $addroom)->update(['is_booked' => 1]);
            }

            DB::table('booking')
            ->where('booking_id', $request['id'])
            ->update(['first_name' => $request['first_name'], 'last_name' => $request['last_name'], 'date_from' => $request['date_checkin'],'date_to' => $request['date_checkout'], 'number_people' => $request['number_people'], 'contry' => $request['country'], 'room_id' => $request['room'],'account_id' =>Auth::guard('account')->user()->id]);
        }
        
            
            return redirect()->route('subBookManage',['subdomain' => $subdomain]);
        
     }
     if($request['typePost'] == "deleteBooking"){
        $booked =  DB::table('booking')->where('booking_id', '=', $request['id'])-> first();
        $findrooms =explode(" ", $booked->room_id);
        DB::table('booking')->where('booking_id', '=', $request['id'])->delete();
        foreach ($findrooms as $findroom) {
            DB::table('room')->where('room_number', '=', $findroom)->update(['is_booked' => 0]);
        }
       
         return redirect()->route('subBookManage',['subdomain' => $subdomain]);
     }
     if($request['typePost'] == "checkinBook"){



        DB::table('booking')
            ->where('booking_id', $request['id'])
            ->update([ 'date_checkin' => date("Y/m/d"),
                'passport' => $request['cmnd']]);
            return redirect()->route('subBookManage',['subdomain' => $subdomain]);
     }

     if($request['typePost'] == "checkoutBook"){

        $services =DB::table('book_service')->where('booking_id','=', $request['id'])->get();
        $total = 0;
        if(count($services) == 0){
            $total = 0;
        }else{
            foreach ($services as $key => $service) {
                $total = $total  + $service->total;
            }
        }
        DB::table('invoice')->insertGetId([
            'booking_id' => $request['id'],
            'hotel_id' => $hotels->hotel_id,
            'cost' => $total,
            'date' => date('Y-m-d'),
            'name' => "Cash",
            'type' => "service"
            ]);
        DB::table('booking')
            ->where('booking_id', $request['id'])
            ->update([  'date_checkout' => date("Y/m/d"),
                        'total_cost_service' => $total]);
            $booked =  DB::table('booking')->where('booking_id', '=', $request['id'])-> first();
             $findrooms =explode(" ", $booked->room_id);
        
            foreach ($findrooms as $findroom) {
                DB::table('room')->where('room_number', '=', $findroom)->update(['is_booked' => 0,'is_clean' => 1]);
            }
            return redirect()->route('subBookManage',['subdomain' => $subdomain]);

     }
      if($request['typePost'] == "addService"){

        $service = DB::table('service')->where('service_id', '=', $request['service_id'])->first();
        $cost = $service->cost * $request['quantity'];
        $total = $cost * (100 - $request['discount'])/100;

        

         DB::table('book_service')->insertGetId([
             'booking_id' => $request['id'],
             'cost' => $cost,
             'quantity' => $request['quantity'],
             'service_id' => $request['service_id'],
             'discount' => $request['discount'],
             'account_id' =>Auth::guard('account')->user()->id,
             'hotel_id' => $hotels->hotel_id,
             'total' => $total,
         ]);

         return redirect()->route('subBookManage',['subdomain' => $subdomain]);




      }

       if($request['typePost'] == "addPrepay"){
        $messages = [];


        $validator = Validator::make($request->all(),[],$messages);
     $book = DB::table('booking')->where('booking_id', $request['id'])->first();
    if($request['prepay'] > $book->total_cost_room){
       
            $validator->errors()->add('typePost', 'addPrepay');
            $validator->errors()->add('prepay', 'Tiền đặt cọc không thể lớn hơn tiền phòng');
             return redirect()->route('subBookManage',['subdomain' => $subdomain])->withErrors($validator)->withInput();
         
       }
        DB::table('booking')
            ->where('booking_id', $request['id'])
            ->update([  'deposit' => $request['prepay']]);

            DB::table('invoice')->insertGetId([
            'booking_id' =>  $request['id'],
            'hotel_id' => $hotels->hotel_id,
            'cost' =>  $request['prepay'],
            'date' => date('Y-m-d'),
            'name' => "Cash",
            'type' => "room"
            ]);

         return redirect()->route('subBookManage',['subdomain' => $subdomain]);
      }
    
    

}

public function roomManage($subdomain){
        $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
        $rooms = DB::table('room')->where('room.hotel_id', '=', $hotels->hotel_id)->join('type_room', 'room.room_type_id', '=', 'type_room.type_room_id')->select('room.*', 'type_room.type_name')->orderBy('room_number', 'asc')->get();
        $type_rooms =  DB::table('type_room')->where('hotel_id', '=', $hotels->hotel_id)->get();
       
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
            if(Auth::guard('account')->user()->type != 3){
                return view('sub.404');
            }

            $info = array(
            "name" => $hotels->hotel_name,
            "subdomain" => $subdomain, 
            );
            return view('sub.roomManage')->with('rooms',$rooms)->with('info',$info)->with('type_rooms', $type_rooms);
            // if(Auth::guard('account')->user()->type == 4 || Auth::guard('account')->user()->type == 3){
            //     return view('sub.mainManageProlife')->with('users',$users)->with('info',$info);
            // }
            
            
         }
       return view('sub.404');
}

public function roomManageSubmit(Request $request,  $subdomain){
    $messages = [];


    $validator = Validator::make($request->all(),[],$messages);
     $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
    if($request['typePost'] == "addTypeRoom"){
       $type_rooms =  DB::table('type_room')->where('hotel_id', '=', $hotels->hotel_id)->get();
       foreach ($type_rooms as $type_room ) {
           if($type_room->type_name == $request['type_name'])
           {
            $validator->errors()->add('typePost', 'addTypeRoom');
            $validator->errors()->add('type_name', 'Tên loại phòng đã tồn tại');
             return redirect()->route('subRoomManage',['subdomain' => $subdomain])->withErrors($validator)->withInput();
           }

       }

    if($request->image == null)
    {
        
      $imageName = "img/roomhotel.png";
    }else{

        // $imageName = preg_replace('/\s+/', '', $request['type_name']).'.'.$request->image->getClientOriginalExtension();

        // $request->image->move(public_path('img/Hotel/'.$hotels->hotel_name."/room"), $imageName);
        // $imageName = 'img/Hotel/'.$hotels->hotel_name."/room/".$imageName;
      $ten = \Cloudinary\Uploader::upload($request->image, array("use_filename" => TRUE, "width" => 360, "height" => 230));
      $imageName = $ten['url'];
    }
     DB::table('type_room')->insertGetId([
             'type_name' => $request['type_name'],
             'cost' => $request['cost'],
             'description' => $request['description'],
             'hotel_id' => $hotels->hotel_id,
             'number_people' => $request['number_people'],
             'image' => $imageName,
         ]);
     return redirect()->route('subRoomManage',['subdomain' => $subdomain]);
    }

    if($request['typePost'] == "updateTypeRoom"){
        $imageName = "";
        $type_rooms =  DB::table('type_room')->where('hotel_id', '=', $hotels->hotel_id)->get();
       foreach ($type_rooms as $type_room ) {
           if($type_room->type_name == $request['type_name'] && $type_room->type_room_id != $request['id'])
           {
            $validator->errors()->add('typePost', 'updateTypeRoom');
            $validator->errors()->add('type_name', 'Tên loại phòng đã tồn tại');
             return redirect()->route('subRoomManage',['subdomain' => $subdomain])->withErrors($validator)->withInput();
           }
           if($type_room->type_room_id == $request['id']){
                $imageName = $type_room->image;
           }
       }

        if($request->image != null)
        {
          

            // $imageName = preg_replace('/\s+/', '', $request['type_name']).'.'.$request->image->getClientOriginalExtension();
            // $request->image->move(public_path('img/Hotel/'.$hotels->hotel_name."/room"), $imageName);
            // $imageName = 'img/Hotel/'.$hotels->hotel_name."/room/".$imageName;

          $ten = \Cloudinary\Uploader::upload($request->image, array("use_filename" => TRUE, "width" => 360, "height" => 230));
          $imageName = $ten['url'];
        }

       DB::table('type_room')->where('type_room_id', $request['id'])
        ->update(['type_name' => $request['type_name'], 'cost' => $request['cost'], 'description' => $request['description'],'number_people' => $request['number_people'],'image' => $imageName]);
        return redirect()->route('subRoomManage',['subdomain' => $subdomain]);
    }
    if($request['typePost'] == "deleteTypeRoom"){
    DB::table('type_room')->where('type_room_id', $request['id'])->delete();
     return redirect()->route('subRoomManage',['subdomain' => $subdomain]);
    }



    /* roôm */
    if($request['typePost'] == "add1Room"){
       
        $rooms = DB::table('room')->where('room.hotel_id', '=', $hotels->hotel_id)->join('type_room', 'room.room_type_id', '=', 'type_room.type_room_id')->select('room.*', 'type_room.type_name')->get();
        foreach ($rooms as $room ) {
           if( $room->room_number == $request['room_number'])
           {
            $validator->errors()->add('typePost', 'add1Room');
            $validator->errors()->add('room_number', 'Đã tồn tại phòng '.$request['room_number'] );
             return redirect()->route('subRoomManage',['subdomain' => $subdomain])->withErrors($validator)->withInput();
           }
       }
       DB::table('room')->insertGetId([
             'room_floor' => $request['room_floor'],
             'room_number' => $request['room_number'],
             'room_type_id' => $request['type_room'],
             'hotel_id' => $hotels->hotel_id,
         ]);
     return redirect()->route('subRoomManage',['subdomain' => $subdomain]);

    }


    if($request['typePost'] == "addnRoom"){
        $rooms = DB::table('room')->where('room.hotel_id', '=', $hotels->hotel_id)->join('type_room', 'room.room_type_id', '=', 'type_room.type_room_id')->select('room.*', 'type_room.type_name')->get();
        if( $request['room_from'] >= $request['room_to'])
        {
            $validator->errors()->add('typePost', 'addnRoom');
            $validator->errors()->add('room_from', 'Số phòng bắt đầu không được lớn hơn hoặc bằng số phòng cuối!' );
            return redirect()->route('subRoomManage',['subdomain' => $subdomain])->withErrors($validator)->withInput();
        }
        for($i = $request['room_from']; $i <= $request['room_to']; $i++)
        {
            foreach ($rooms as $room ) {
               if($room->room_number == $i)
               {
                $validator->errors()->add('typePost', 'addnRoom');
                $validator->errors()->add('room_from', 'Đã tồn tại phòng '.$request['room_number'] );
                 return redirect()->route('subRoomManage',['subdomain' => $subdomain])->withErrors($validator)->withInput();
               }
            }    
        }
        for($i = $request['room_from']; $i <= $request['room_to']; $i++)
        {
            DB::table('room')->insertGetId([
             'room_floor' => $request['room_floor'],
             'room_number' => $i,
             'room_type_id' => $request['type_room'],
             'hotel_id' => $hotels->hotel_id,
         ]);
        }
         return redirect()->route('subRoomManage',['subdomain' => $subdomain]);
        
        
    }


    if($request['typePost'] == "updateRoom"){
        // dd($request);
        $is_clean = 1;
        if(empty($request['is_clean'])){
            $is_clean = 0;
        }
        $rooms = DB::table('room')->where('room.hotel_id', '=', $hotels->hotel_id)->join('type_room', 'room.room_type_id', '=', 'type_room.type_room_id')->select('room.*', 'type_room.type_name')->get();
        foreach ($rooms as $room ) {
           if($room->room_floor == $request['room_floor'] && $room->room_number == $request['room_number'] && $room->room_id != $request['id'])
           {
            $validator->errors()->add('typePost', 'add1Room');
            $validator->errors()->add('room_number', 'Đã tồn tại phòng '.$request['room_number'] .'tại tầng '.$request['room_floor'] );
             return redirect()->route('subRoomManage',['subdomain' => $subdomain])->withErrors($validator)->withInput();
           }
       }
        DB::table('room')->where('room_id', $request['id'])
        ->update(['room_floor' => $request['room_floor'], 'room_number' => $request['room_number'], 'room_type_id' => $request['type_room'],'is_clean' => $is_clean]);
        return redirect()->route('subRoomManage',['subdomain' => $subdomain]);
    }


    if($request['typePost'] == "deleteRoom"){
        $rooms = DB::table('room')->where('room.hotel_id', '=', $hotels->hotel_id)->join('type_room', 'room.room_type_id', '=', 'type_room.type_room_id')->select('room.*', 'type_room.type_name')->get();
        DB::table('room')->where('room_id', $request['id'])->delete();
         return redirect()->route('subRoomManage',['subdomain' => $subdomain]);
        
    }
}

public function serviceManage($subdomain){
        $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
        $services = DB::table('service')->where('hotel_id', '=', $hotels->hotel_id)->get();
       
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
            if(Auth::guard('account')->user()->type != 3){
                return view('sub.404');
            }

            $info = array(
            "name" => $hotels->hotel_name,
            "subdomain" => $subdomain, 
            );
            return view('sub.servicemanage')->with('services',$services)->with('info',$info);
            // if(Auth::guard('account')->user()->type == 4 || Auth::guard('account')->user()->type == 3){
            //     return view('sub.mainManageProlife')->with('users',$users)->with('info',$info);
            // }
            
            
         }
       return view('sub.404');
}

public function serviceManageSubmit(Request $request, $subdomain){
    $messages = [];


    $validator = Validator::make($request->all(),[],$messages);
     $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
    if($request['typePost'] == "addService"){
        $services =  DB::table('service')->where('hotel_id', '=', $hotels->hotel_id)->get();
       foreach ($services as $service ) {

           if($service->service_name == $request['service_name'])
           {
            $validator->errors()->add('typePost', 'addService');
            $validator->errors()->add('type_name', 'Tên Dịch vụ đã tồn tại');
             return redirect()->route('subServiceManage',['subdomain' => $subdomain])->withErrors($validator)->withInput();
           }

       }

        if($request->image == null)
        {
            
          $imageName = "img/servicehotel.png";
        }else{
            // $imageName = preg_replace('/\s+/', '', $request['service_name']).'.'.$request->image->getClientOriginalExtension();
            // $request->image->move(public_path('img/Hotel/'.$hotels->hotel_name."/service"), $imageName);
            // $imageName = 'img/Hotel/'.$hotels->hotel_name."/service/".$imageName;
          $ten = \Cloudinary\Uploader::upload($request->image, array("use_filename" => TRUE, "width" => 360, "height" => 230));
          $imageName = $ten['url'];
        }
         DB::table('service')->insertGetId([
                 'service_name' => $request['service_name'],
                 'cost' => $request['cost'],
                 'description' => $request['description'],
                 'hotel_id' => $hotels->hotel_id,
                 'image' => $imageName,
             ]);
         return redirect()->route('subServiceManage',['subdomain' => $subdomain]);
    }

    if($request['typePost'] == "updateService"){
        $imageName = "";
        $services =  DB::table('service')->where('hotel_id', '=', $hotels->hotel_id)->get();
       foreach ($services as $service ) {
           if($service->service_name == $request['service_name'] && $service->service_id != $request['id'])
           {
            $validator->errors()->add('typePost', 'updateService');
            $validator->errors()->add('service_name', 'Tên dịch vụ đã tồn tại');
             return redirect()->route('subServiceManage',['subdomain' => $subdomain])->withErrors($validator)->withInput();
           }
           if($service->service_id == $request['id']){
                $imageName = $service->image;
           }
       }

        if($request->image != null)
        {
          

        //     $imageName = preg_replace('/\s+/', '', $request['service_name']).'.'.$request->image->getClientOriginalExtension();
        // $request->image->move(public_path('img/Hotel/'.$hotels->hotel_name."/service"), $imageName);
        // $imageName = 'img/Hotel/'.$hotels->hotel_name."/service/".$imageName;

          $ten = \Cloudinary\Uploader::upload($request->image, array("use_filename" => TRUE, "width" => 360, "height" => 230));
          $imageName = $ten['url'];
        }

       DB::table('service')->where('service_id', $request['id'])
        ->update(['service_name' => $request['service_name'], 'cost' => $request['cost'], 'description' => $request['description'],'image' => $imageName]);
        return redirect()->route('subServiceManage',['subdomain' => $subdomain]);
    }
    if($request['typePost'] == "deleteService"){
    DB::table('service')->where('service_id', $request['id'])->delete();
     return redirect()->route('subServiceManage',['subdomain' => $subdomain]);
    }


}

public function spendManage($subdomain){
    
    $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
    $spends = DB::table('spends')->join('account', 'spends.account_id', '=', 'account.id')->select('spends.*', 'account.first_name','account.last_name')->where('spends.hotel_id',"=", $hotels->hotel_id)->get();


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
            return view('sub.spendManage')->with('spends',$spends)->with('info',$info);
            // if(Auth::guard('account')->user()->type == 4 || Auth::guard('account')->user()->type == 3){
            //     return view('sub.mainManageProlife')->with('users',$users)->with('info',$info);
            // }
            
            
         }
       return view('sub.404');
}

public function spendManageSubmit(Request $request, $subdomain){
    $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
    if($request['typePost'] == "addSpend"){
        DB::table('spends')->insertGetId([
                'name' => $request['name'],
                'cost' => $request['cost'],
                'detail' => $request['detail'],
                'date' => $request['date'],
                'hotel_id' => $hotels->hotel_id,
                'account_id' => Auth::guard('account')->user()->id,
            ]);

        return redirect()->route('subSpendManage',['subdomain' => $subdomain]);
    }

    if($request['typePost'] == "updateSpend"){

        DB::table('spends')->where('id',"=", $request['id'])->update([
            'name' => $request['name'],
             'cost' => $request['cost'],
                'detail' => $request['detail'],
                'date' => $request['date'],
                'hotel_id' => $hotels->hotel_id,
                'account_id' => Auth::guard('account')->user()->id,
            ]);

        return redirect()->route('subSpendManage',['subdomain' => $subdomain]);
    }

     if($request['typePost'] == "updateSpend"){
            DB::table('spends')->where('id',"=", $request['id'])->delete();
     }

}

public function reportManage( $subdomain){

        $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
        $rooms = DB::table('room')->where('room.hotel_id', '=', $hotels->hotel_id)->join('type_room', 'room.room_type_id', '=', 'type_room.type_room_id')->select('room.*', 'type_room.type_name')->orderBy('room_number', 'asc')->get();
        
       
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
            if(Auth::guard('account')->user()->type != 3){
                return view('sub.404');
            }

            $i = 1;
        $first_day_this_month = date('Y-m-01'); // hard-coded '01' for first day date("Y/m/d")
        
        $last_day_this_month  = date('Y-m-t');
        $info = array(
            "name" => $hotels->hotel_name,
            "subdomain" => $subdomain, 
            "first_day" => $first_day_this_month,
            "last_day" => $last_day_this_month,
            );
        for($i = 1; $i <=  date('t'); $i++)
        {
            // add the date to the dates array
            $listDay[] = date('Y') . "-" . date('m') . "-" . str_pad($i, 2, '0', STR_PAD_LEFT);
        }

        $listCostRoom = null;
        for($i = 1; $i <=  date('t'); $i++)
        {
            $invoicesrooms = DB::table('invoice')->where('hotel_id','=',$hotels->hotel_id)->where('date','=',$listDay[$i - 1])->where('type','=','room')->get();
            $totalroom = 0;
            foreach ($invoicesrooms as $invoicesroom) {
                 $totalroom += $invoicesroom->cost;
            }

            $listCostRoom[] =   $totalroom;
        }

        $listCostService = null;
        for($i = 1; $i <=  date('t'); $i++)
        {
            $invoicesservices = DB::table('invoice')->where('hotel_id','=',$hotels->hotel_id)->where('date','=',$listDay[$i - 1])->where('type','=','service')->get();
            $totalservice = 0;
            foreach ($invoicesservices as $invoicesservices) {
                 $totalservice += $invoicesservices->cost;
            }

            $listCostService[] =   $totalservice;
        }

        $listCostSpend = null;
        for($i = 1; $i <=  date('t'); $i++)
        {
            $spends = DB::table('spends')->where('hotel_id','=',$hotels->hotel_id)->where('date','=',$listDay[$i - 1])->get();
            $totalspend = 0;
            foreach ($spends as $spend) {
                 $totalspend += $spend->cost;
            }

            $listCostSpend[] =   $totalspend;
        }
        //return $listCostSpend;
        // retủn list cost room, service, date, spend
        $totalEmpBook = null;
        $totalEmpService = null;
        $totalLuong = null;
        $employees = DB::table('account')->where('hotel_id','=',$hotels->hotel_id)->where('type','=', 4)->get();
        foreach ($employees as $employee) {
                
                 $totalEmpBook[] =count(DB::table('booking')->where('account_id','=',$employee->id)->get());
                 $totalEmpService[] =count(DB::table('book_service')->where('account_id','=',$employee->id)->get());
                 $totalLuong[] = $employee->Salary;
            }
       // return $totalEmpService;



       
        //return $first_day_this_month ." +" .$last_day_this_month;
        $invoices = DB::table('invoice')->whereBetween('date',[$first_day_this_month, $last_day_this_month] )->get();
        $invoicespayal = null;
        $invoicescard = null;
        $invoicesroom = null;
        $invoicesservice = null;
        foreach ($listDay as $key => $Day) {
            $invoicespayal[] = count(DB::table('invoice')->where('date','=',$Day)->where('name','=', 'Paypal')->get());
            $invoicescard[] = count(DB::table('invoice')->where('date','=',$Day)->where('name','=', 'Credit card')->get());
            $invoicescash[] = count(DB::table('invoice')->where('date','=',$Day)->where('name','=', 'Cash')->get());
            $invoicesroom[] = count(DB::table('invoice')->where('date','=',$Day)->where('type','=', 'room')->get());
            $invoicesservice[] = count(DB::table('invoice')->where('date','=',$Day)->where('type','=', 'service')->get());
        }
        $type_rooms =  DB::table('type_room')->where('hotel_id', '=', $hotels->hotel_id)->get();
        $tong = null;
        foreach ($listCostRoom as $key => $room) {
            $tong[] = $room + $listCostService[$key] - $listCostSpend[$key];
        }
        $tongEmp = null;
        $employeesname = null;
        foreach ($employees as $key => $employee) {
            $tongEmp[] = $totalEmpBook[$key] + $totalEmpService[$key];
            $employeesname[] = $employee->first_name.$employee->last_name;
        }

            
            return view('sub.report')->with('info',$info)->with('listDay', $listDay)->with('listCostRoom', $listCostRoom)->with('listCostService', $listCostService)->with('listCostSpend',$listCostSpend)->with('employees',$employees)->with('employeesname',$employeesname)->with('totalEmpBook',$totalEmpBook)->with('totalEmpService',$totalEmpService)->with('tong',$tong)->with('tongEmp',$tongEmp)->with('invoicespayal',$invoicespayal)->with('invoicescard',$invoicescard)->with('invoicesroom',$invoicesroom)->with('invoicesservice',$invoicesservice)->with('totalLuong',$totalLuong)->with('invoicescash',$invoicescash);
            // if(Auth::guard('account')->user()->type == 4 || Auth::guard('account')->user()->type == 3){
            //     return view('sub.mainManageProlife')->with('users',$users)->with('info',$info);
            // }
            
            
         }
       return view('sub.404');

}


public function reportManageSubmit(Request $request,  $subdomain){
            
            
            if(strtotime($request['date_from']) >= strtotime($request['date_to'])){ 
                    \Session::flash('errorsday',"Ngày bắt đâu phải nhỏ hơn ngày kết thúc");
                 return redirect()->route('subReportManage',['subdomain' => $subdomain]);
            }
 $hotels = DB::table('hotel')->where('hotel_url', '=', $subdomain)->first();
        $rooms = DB::table('room')->where('room.hotel_id', '=', $hotels->hotel_id)->join('type_room', 'room.room_type_id', '=', 'type_room.type_room_id')->select('room.*', 'type_room.type_name')->orderBy('room_number', 'asc')->get();

    $period = new DatePeriod(
     new DateTime($request['date_from']),
     new DateInterval('P1D'),
     new DateTime($request['date_to'])
);
    $listDay = null;
    foreach($period as $dt){
       $listDay[] = $dt->format("Y-m-d");
    }
   
       
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
            if(Auth::guard('account')->user()->type != 3){
                return view('sub.404');
            }

            $i = 1;
        $first_day_this_month = $request['date_from']; // hard-coded '01' for first day date("Y/m/d")
        
        $last_day_this_month  = $request['date_to'];
        $info = array(
            "name" => $hotels->hotel_name,
            "subdomain" => $subdomain, 
            "first_day" => $first_day_this_month,
            "last_day" => $last_day_this_month,
            );
       
        $listCostRoom = null;
        foreach ($listDay as $key => $day) {
             $invoicesrooms = DB::table('invoice')->where('hotel_id','=',$hotels->hotel_id)->where('date','=',$day)->where('type','=','room')->get();
            $totalroom = 0;
            foreach ($invoicesrooms as $invoicesroom) {
                 $totalroom += $invoicesroom->cost;
            }

            $listCostRoom[] =   $totalroom;
        }

        $listCostService = null;
        foreach ($listDay as $key => $day)
        {
            $invoicesservices = DB::table('invoice')->where('hotel_id','=',$hotels->hotel_id)->where('date','=',$day)->where('type','=','service')->get();
            $totalservice = 0;
            foreach ($invoicesservices as $invoicesservices) {
                 $totalservice += $invoicesservices->cost;
            }

            $listCostService[] =   $totalservice;
        }

        $listCostSpend = null;
        foreach ($listDay as $key => $day)
        {
            $spends = DB::table('spends')->where('hotel_id','=',$hotels->hotel_id)->where('date','=',$day)->get();
            $totalspend = 0;
            foreach ($spends as $spend) {
                 $totalspend += $spend->cost;
            }

            $listCostSpend[] =   $totalspend;
        }
        //return $listCostSpend;
        // retủn list cost room, service, date, spend
        $totalEmpBook = null;
        $totalEmpService = null;
        $employees = DB::table('account')->where('hotel_id','=',$hotels->hotel_id)->where('type','=', 4)->get();
        foreach ($employees as $employee) {
                
                 $totalEmpBook[] =count(DB::table('booking')->where('account_id','=',$employee->id)->get());
                 $totalEmpService[] =count(DB::table('book_service')->where('account_id','=',$employee->id)->get());

            }
       // return $totalEmpService;



       
        //return $first_day_this_month ." +" .$last_day_this_month;
        $invoices = DB::table('invoice')->whereBetween('date',[$first_day_this_month, $last_day_this_month] )->get();
        $invoicespayal = null;
        $invoicescard = null;
        $invoicesroom = null;
        $invoicesservice = null;
        foreach ($listDay as $key => $Day) {
            $invoicespayal[] = count(DB::table('invoice')->where('date','=',$Day)->where('name','=', 'Paypal')->get());
            $invoicescard[] = count(DB::table('invoice')->where('date','=',$Day)->where('name','=', 'Credit card')->get());
            $invoicesroom[] = count(DB::table('invoice')->where('date','=',$Day)->where('type','=', 'service')->get());
            $invoicesservice[] = count(DB::table('invoice')->where('date','=',$Day)->where('name','=', 'room')->get());
        }
        $type_rooms =  DB::table('type_room')->where('hotel_id', '=', $hotels->hotel_id)->get();
        $tong = null;
        foreach ($listCostRoom as $key => $room) {
            $tong[] = $room + $listCostService[$key] - $listCostSpend[$key];
        }
        $tongEmp = null;
        $employeesname = null;
        foreach ($employees as $key => $employee) {
            $tongEmp[] = $totalEmpBook[$key] + $totalEmpService[$key];
            $employeesname[] = $employee->first_name.$employee->last_name;
        }

            
            return view('sub.report')->with('info',$info)->with('listDay', $listDay)->with('listCostRoom', $listCostRoom)->with('listCostService', $listCostService)->with('listCostSpend',$listCostSpend)->with('employees',$employees)->with('employeesname',$employeesname)->with('totalEmpBook',$totalEmpBook)->with('totalEmpService',$totalEmpService)->with('tong',$tong)->with('tongEmp',$tongEmp)->with('invoicespayal',$invoicespayal)->with('invoicescard',$invoicescard)->with('invoicesroom',$invoicesroom)->with('invoicesservice',$invoicesservice);
            // if(Auth::guard('account')->user()->type == 4 || Auth::guard('account')->user()->type == 3){
            //     return view('sub.mainManageProlife')->with('users',$users)->with('info',$info);
            // }
            
            
         }
       return view('sub.404');
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

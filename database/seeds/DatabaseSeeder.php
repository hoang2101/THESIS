<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/////////////////////////////////////// ADD USERS //////////////////////////////////////////
    	$numberDB = 100000;
    	// DB::table('users')->delete();
        // $this->call(UsersTableSeeder::class);

        for($i = 0; $i < $numberDB ; $i++){
        	$f = str_random(5);
        	$l = str_random(5);
        	DB::table('users')->insert([
            'username' => $f.$l,
            'email' => $f.$l.'@gmail.com',
	    'accountpaypal' => 'thanhluand01@gmail.com'
            'last_name' => $l,
            'first_name' => $f,
            'phone_number' => '0123456789',
            'country' => 'Viet Nam',
            'dob' => date("Y-m-d"),
            'gender' => 'Nam',
            'password' => '$2y$10$aI1XXxYWm41W/iJWxVH3C.RaGYZkYo.RMOclS90QSrPNY8SyoOxLa',
            'type' => 2,
        ]);
        }
        echo("Chu ks: ");
       // $users = DB::table('users')->where('type','=' , 2)->get();
        //echo(count($users)."zxc");
 ////////////////////////////////////// ADD CONFIG /////////////////////////////////////////////
		$intro = "Chào mừng bạn đến với khách sạn của chúng tôi, khách sạn chúng tôi .
		Khách sạn được chia thành 5 hạng phòng khác nhau, được du khách yêu thích bởi sự sạch sẽ và dịch vụ phòng hoàn hảo. Ngoài ra, khách sạn Đệ Nhất còn trang bị phòng tập thể hình, hồ bơi, 3 sân tennis, CLB trò chơi có thưởng (chỉ dành cho khách nước ngoài) & khu mát-xa – xông hơi để phục vụ khách lưu trú.
		Ẩm thực cũng là một thế mạnh bởi sự đa dạng phong cách và tinh tế trong từng món ăn. Nhà hàng Phố Nướng Đệ Nhất, Korea House và Hanasushi mang đến những món ăn cũng như không gian đặc trưng đậm chất Việt Nam, Hàn Quốc & Nhật Bản. Với nhà hàng Buffet Đệ Nhất là sự tổng hợp hài hòa các món ăn đến từ Việt – Á – Âu, là một bữa tiệc hoành tráng thật sự cho khách lưu trú tại khách sạn nói riêng và thực khách Sài Gòn nói chung.";

	// 	  DB::table('web_config')->delete();
		for($i = 0; $i < $numberDB ; $i++){
			$nuser = rand(1, 100000);
		DB::table('web_config')->insertGetId([
		                 'background' => "img/bg1.jpg",
		                 'color1' => "#ffffff",
		                 'color2' => "#f6f6f6",
		                 'author' =>  $nuser,
		                 'intro' => $intro
		             ]);

		}
    echo('config: ');

	// 	// $configs = DB::table('web_config')->get();
 // ////////////////////////////////////// ADD HOTEL /////////////////////////////////////////////
	// 	// DB::table('hotel')->delete();
		for($i = 0; $i < $numberDB ; $i++){
			$nconfig = rand(1, $numberDB);
			$nuser = rand(1, $numberDB);
		DB::table('hotel')->insertGetId([
                 'hotel_name' => str_random(5),
                 'account_id' => str_random(5),
                 'hotel_url' => str_random(5),
                 'expire_date' => $date = Carbon::now()->addMonths(12),
                 'total_room' => 100,
                 'config_id' =>$nconfig,
             ]);
		}
    echo('hotel: ');
		//$hotels = DB::table('hotel')->get();

//  /////////////////////////////////////// ADD QUANG TRI /////////////////////////////////////////
// 		// DB::table('account')->where('type','=',3)->delete();
        

        
        for($i = 0; $i < 10000 ; $i++){
        	$nuser = rand(1, $numberDB);
        	$nhotel = rand(1, $numberDB);
        	$type = rand(3, 5);

        	$f = str_random(5);
        	$l = str_random(5);
        	DB::table('account')->insert([
            'username' => $f.$l,
            'email' => $f.$l.'@gmail.com',
            'last_name' => $l,
            'first_name' => $f,
            'phone_number' => '0123456789',
            'country' => 'Viet Nam',
            'dob' => date("Y-m-d"),
            'gender' => 'Nam',
            'password' => '$2y$10$aI1XXxYWm41W/iJWxVH3C.RaGYZkYo.RMOclS90QSrPNY8SyoOxLa',
            'type' => 3,
            'mn_user' => $nuser,
            'hotel_id' => $nhotel,
        ]);
        }
        echo('quan tri: ');

//         $quantris = DB::table('account')->where('type','=',3)->get();
//  //////////////////////////////////// ADD NHAN VIEN ///////////////////////////////////////////////
//       //  DB::table('account')->where('type','=',4)->delete();
        
        
        for($i = 0; $i < 20000 ; $i++){
        	$nuser = rand(1, $numberDB);
        	$nhotel = rand(1, $numberDB);
        	$type = rand(3, 5);

        	$f = str_random(5);
        	$l = str_random(5);
        	DB::table('account')->insert([
            'username' => $f.$l,
            'email' => $f.$l.'@gmail.com',
            'last_name' => $l,
            'first_name' => $f,
            'phone_number' => '0123456789',
            'country' => 'Viet Nam',
            'dob' => date("Y-m-d"),
            'gender' => 'Nam',
            'password' => '$2y$10$aI1XXxYWm41W/iJWxVH3C.RaGYZkYo.RMOclS90QSrPNY8SyoOxLa',
            'type' => 4,
            'salary' => 10000000,
            'hotel_id' => $nhotel,
        ]);
        }
        echo('nhan vien: ');
//         $nhanviens = DB::table('account')->where('type','=',4)->get();
//  //////////////////////////////////// ADD KHACH HANG ///////////////////////////////////////////
//       //   DB::table('account')->where('type','=',5)->delete();
        
        
        for($i = 0; $i < 80000 ; $i++){
        	$nuser = rand(1, $numberDB);
        	$nhotel = rand(1,  $numberDB);
        	$type = rand(3, 5);

        	$f = str_random(5);
        	$l = str_random(5);
        	DB::table('account')->insert([
            'username' => $f.$l,
            'email' => $f.$l.'@gmail.com',
            'last_name' => $l,
            'first_name' => $f,
            'phone_number' => '0123456789',
            'country' => 'Viet Nam',
            'dob' => date("Y-m-d"),
            'gender' => 'Nam',
            'password' => '$2y$10$aI1XXxYWm41W/iJWxVH3C.RaGYZkYo.RMOclS90QSrPNY8SyoOxLa',
            'type' => 5,
            'hotel_id' => $nhotel,
        ]);
        }
        echo('khach hang: ');
//         $khachhangs = DB::table('account')->where('type','=',5)->get();
//  /////////////////////////////////// ADD  type room /////////////////////////////////////////
     //   DB::table('type_room')->delete();

        for($i = 0; $i < $numberDB ; $i++){
        	//$nhotel = rand(0, count($hotels)-1);
	        DB::table('type_room')->insertGetId([
	             'type_name' => str_random(10),
	             'cost' => rand(1, 5)*100000,
	             'description' => str_random(100),
	             'hotel_id' => $i,
	             'number_people' => rand(1, 5),
	             'image' => 'img/roomhotel.png',
	         ]);
   		}
      echo('type room: ');
//    		$type_rooms = DB::table('type_room')->get();


// /////////////////////////////////// ADD  room /////////////////////////////////////////
   	//	DB::table('room')->delete();
   		for($i = 0; $i < $numberDB ; $i++){
   			$ntyperoom = rand(1, $numberDB);
	   		 DB::table('room')->insertGetId([
	             'room_floor' => $i,
	             'room_number' => $i,
	             'room_type_id' => $ntyperoom,
	             'hotel_id' => $ntyperoom,
	         ]);
   		}
      echo('room: ');
//    		$rooms = DB::table('room')->get();

// /////////////////////////////////// ADD  service /////////////////////////////////////////

//    	//	DB::table('service')->delete();
   		for($i = 0; $i < $numberDB ; $i++){
   			$nhotel = rand(1, $numberDB);
   		DB::table('service')->insertGetId([
   				
                 'service_name' => str_random(10),
                 'cost' => rand(1, 5)*100000,
                 'description' => str_random(100),
                 'hotel_id' => $nhotel,
                 'image' => 'img/servicehotel.png',
             ]);
   		}
      echo('service: ');
//    		$services = DB::table('service')->get();
// ////////////////////////////////// ADD  book /////////////////////////////////////////

//    	//	DB::table('booking')->delete();
   		for($i = 0; $i < $numberDB ; $i++){
   			$nroom = rand(1, $numberDB);
   			 DB::table('booking')->insertGetId([
             'first_name' => str_random(5),
             'last_name' => str_random(5),
             'date_from' => Carbon::now(),
             'date_to' => Carbon::now()->addDays(10),
             'number_people' => rand(1,3),
             'contry' => 'Viet nam',
             'room_id' => $nroom,
             'hotel_id' => $nroom,
             'total_cost_room' => 1000000,
         ]);

   		}

      echo('book: ');
//    		$books = DB::table('booking')->get();
// ////////////////////////////////// ADD  book_service /////////////////////////////////////////

   	//	DB::table('book_service')->delete();
   		for($i = 0; $i < $numberDB ; $i++){
   			$nbook = rand(1, $numberDB);
   			 DB::table('book_service')->insertGetId([
             'booking_id' => $nbook,
             'cost' => rand(1,5)*100000,
             'quantity' => rand(1,5),
             'discount' => 0,
             'hotel_id' => $nbook,
             'total' => rand(1,5)*100000,
         ]);

   		}
      echo('pay book: ');
//    		$book_services = DB::table('book_service')->get();

// ////////////////////////////////// ADD  invoice /////////////////////////////////////////
   	//	DB::table('spends')->delete();
   		for($i = 0; $i < $numberDB ; $i++){
   			$nhotel = rand(0, $numberDB);
   		DB::table('spends')->insertGetId([
                'name' => str_random(5),
                'cost' => rand(1,5)*100000,
                'detail' => str_random(100),
                'date' => Carbon::now(),
                'hotel_id' => $nhotel,
            ]);
   		}
echo('spends: ');
// ////////////////////////////////// ADD spends  /////////////////////////////////////////////
	//	DB::table('invoice')->delete();
   		for($i = 0; $i < $numberDB ; $i++){
   			$nbook = rand(0, $numberDB);
   		DB::table('invoice')->insertGetId([
         'booking_id' => $nbook,
         'cost' => rand(1,5)*100000,
         'type' => "room",
         'date' => date('Y-m-d'),
         'name' => 'Cash',
         'hotel_id' => $nbook,
         ]);
   		}
      echo('invoice');

        
    }
}


            

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Khách sạn {{$info['name']}}</title>
<link rel="shortcut icon" type="image/icon" href="img/wpf-favicon.png"/>
<!-- Bootstrap CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Fontawesome CSS -->
<link href="css/font-awesome.min.css" rel="stylesheet">

<!-- Google Font -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto' rel='stylesheet' type='text/css'>

<!-- Bootsnav CSS -->
<link href="css/bootsnav.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- Main css -->
<link rel="stylesheet" href="css/style2.css">

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="82">
  <!-- Hero Section -->
  <nav class="navbar navbar-default navbar-fixed-top">

    <div class="container">      
        <!-- Start Header Navigation -->
        <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <!-- LOGO -->
              <!-- TEXT BASED LOGO -->
              <a class="navbar-brand" href="#">{{strtoupper($info['name'])}}</a>        
        </div>
        <!-- End Header Navigation -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">                  
              <li class="active"><a href="#home">Tìm phòng</a></li>
              <li><a href="#about">Giới thiệu</a></li>
              <li><a href="#room">Phòng</a></li>
              <li><a href="#service">Dịch vụ</a></li>
              <li><a href="#footer">liên hệ</a></li>
              @if (!Auth::guard('account')->check())
                <li><a href="#login" data-toggle="modal" data-backdrop="static" id="auth" data-target="#login-modal">Đăng nhập</a></li>
                 <li><a href="#login" data-toggle="modal" data-backdrop="static" data-target="#register-modal">Đăng kí</a></li>
               @else
                  <li class="dropdown">
                   <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                @if(Auth::guard('account')->user()->image_link != null)
                                <img src="img/User/{{Auth::guard('account')->user()->image_link}}" alt="">{{ Auth::guard('account')->user()->first_name }} {{Auth::guard('account')->user()->last_name }}
                                @else
                                <img src="img/avatar_null.png" alt="">{{ Auth::guard('account')->user()->first_name }} {{ Auth::guard('account')->user()->last_name }}
                                @endif
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                  

                      <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="#"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('subHomesubmit',['subdomain' =>$info['subdomain']]) }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            <input hidden id="typePosts"" name="typePost" value="logout">
                                        </form>
                                    </li>
                                    <li>
                                    @if(Auth::guard('account')->user()->type == 3 || Auth::guard('account')->user()->type == 4 )
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('manage').submit();">
                                  
                                            <i class="fa fa-list" aria-hidden="true"></i>
                                            Quản lý
                                        </a>
                                    @endif
                                    @if(Auth::guard('account')->user()->type == 5 )
                                        <a href="#"
                                            onclick="event.preventDefault();
                                                     document.getElementById('manage').submit();">
                                            <i class="fa fa-list" aria-hidden="true"></i>
                                            Thông tin cá nhân
                                        </a>
                                    @endif
                                        <form id="manage" action="@if(Auth::guard('account')->user()->type == 3){{{ route('subManage',['subdomain' =>$info['subdomain']]) }}}@endif @if(Auth::guard('account')->user()->type == 4){{{ route('subManage',['subdomain' =>$info['subdomain']]) }}}@endif @if(Auth::guard('account')->user()->type == 5){{{ route('subProfile',['subdomain' =>$info['subdomain']]) }}}@endif" method="get" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>   
  </nav>
  <!-- Search Section -->
  <section id="home" class="hero hero_full_screen hero_parallax parallax-window" data-stellar-background-ratio="0.5">
    <div class="bg-overlay opacity-6">
    </div>
    <div class="hero_parallax_inner">
      <div class="container col-xs-10 col-sm-6 col-md-6 col-lg-5 pull-right bg1">
        <form  role="form" method="POST" action="{{ route('subHomesubmit',['subdomain' =>$info['subdomain']]) }}">
        {{ csrf_field() }}
              <input hidden id="typePosts"" name="typePost" value="searchRoom">
            <div class="row">    
            <div class="col-md-6 form-group {{ $errors->has('check_in') ? ' has-error' : '' }}" >
              <label >Ngày đến</label>
              
              <div class='input-group' >
                  <span class="input-group-addon"><i class="fa fa fa-calendar fa-fw" aria-hidden="true"></i></span>
                  <input id='datepickern' type="date"  class="form-control" placeholder="Check-in" value="{{ old('check_in') }}" name="check_in" required>

              </div>
            </div>
         

          
            <div class=" col-md-6 form-group{{ $errors->has('check_out') ? ' has-error' : '' }}">
              <label>Ngày đi</label>
              <div class='input-group' >
                  <span class="input-group-addon"><i class="fa fa fa-calendar fa-fw" aria-hidden="true"></i></span>
                  <input id='datepicker2n' type="date" class="form-control" placeholder="Check-out" name="check_out" value="{{ old('check_out') }}" required>
              </div>
            </div>
            <div class=" col-md-12 form-group{{ $errors->has('check_in') ? ' has-error' : '' }}">
                      @if ($errors->has('check_in'))
                              <span class="help-block has-error">
                                    <strong class="messageError">{{ $errors->first('check_in') }}</strong>
                                </span>
                                  @endif
                                  </div>
             <div class="col-sm-6 col-md-6 form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
              <div>
                  <label>Số người</label>
                  <input type="number" class="form-control" name="people" min="1" value="{{ old('people') }}" required>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
              <div>
                  <label>Số phòng</label>
                  <input type="number" class="form-control" name="room" min="1" value="{{ old('room') }}" required>
              </div>
            </div>

           <!--  <div class="col-sm-4 col-md-4 form-group {{ $errors->has('people') ? ' has-error' : '' }}">
              <div>
                  <label>Số người</label>
                  <input type="number" class="form-control" name="people" min="1" value="{{ old('people') }}" required>
              </div>
            </div> -->
            <!-- <div class="col-sm-4 col-md-4 form-group{{ $errors->has('room') ? ' has-error' : '' }}">
              <div>
                  <label>Số phòng</label>
                  <input type="number" class="form-control" name="room" min="1" value="{{ old('room') }}" required>
              </div>
            </div>
           
            <div class="col-sm-4 col-md-4 form-group{{ $errors->has('Country') ? ' has-error' : '' }}">
              <div>
                  <label>Quốc gia</label>
              
                                <select id="country"  name="country" class="form-control mySelectCountry" placeholder="Country" required>
                                    <option value="" disabled selected>Chọn  Quốc gia</option>
                                    
                                </select>
              </div>
            </div> -->
             <div class=" col-md-12 form-group{{ $errors->has('check_in') ? ' has-error' : '' }}">
                      @if ($errors->has('people'))
                              <span class="help-block has-error">
                                    <strong class="messageError">{{ $errors->first('people') }}</strong>
                                </span>
                                  @endif
                                  </div>
            </div>
            <div class="row">
            <div class="col-md-6 pull-right">
            <input type="submit" name="Search" class="btn btn-lg btn-primary pull-right" value="Tìm phòng">
            </div>
            </div>
        </form>
  
      </div>
    </div>
  </section> 
  

  <!-- About Section -->
  <section id="about" class="pb80 pt80">
    <div class="container">
      <div class="col-md-12">
        <div class="descriptive-title">
          <h2>GIỚI THIỆU KHÁCH SẠN</h2>
          <p>Chào mừng bạn đến với khách sạn của chúng tôi, khách sạn chúng tôi .</p>
          <p>Khách sạn được chia thành 5 hạng phòng khác nhau, được du khách yêu thích bởi sự sạch sẽ và dịch vụ phòng hoàn hảo. Ngoài ra, khách sạn Đệ Nhất còn trang bị phòng tập thể hình, hồ bơi, 3 sân tennis, CLB trò chơi có thưởng (chỉ dành cho khách nước ngoài) & khu mát-xa – xông hơi để phục vụ khách lưu trú.</p>
          <p>Ẩm thực cũng là một thế mạnh bởi sự đa dạng phong cách và tinh tế trong từng món ăn. Nhà hàng Phố Nướng Đệ Nhất, Korea House và Hanasushi mang đến những món ăn cũng như không gian đặc trưng đậm chất Việt Nam, Hàn Quốc & Nhật Bản. Với nhà hàng Buffet Đệ Nhất là sự tổng hợp hài hòa các món ăn đến từ Việt – Á – Âu, là một bữa tiệc hoành tráng thật sự cho khách lưu trú tại khách sạn nói riêng và thực khách Sài Gòn nói chung.</p>

        </div>
      
      </div>
    </div>
  </section>

  <!-- Service Section -->
  <section id="room" class="pb80 pt80 bg-grey">
    <div class="container">
      <div class="row">
        <div class="header-section text-center mb40">
          <h2 class="meta-title-2">Thông tin phòng</h2>
        </div>
      </div>
     <div class="row">
        <div class="col-lg-4 col-sm-6 m-bottom4">
          <div class="post-cols">
            <div class="post-thumb">
              <div class="imgbox"><a href="#"><img src="img/troom1.jpg" alt="" class="img-responsive"></a></div>
            </div>
            <div class="post-dis m-top2">
              <h4 class="m-bottom1 m-top1 font18"><a href="#">Phòng đơn</a></h4>
              <p class="m-top1">Đây là phòng có 1 giường. </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 m-bottom4">
          <div class="post-cols">
            <div class="post-thumb">
              <div class="imgbox"><a href="#"><img src="img/troom2.jpg" alt="" class="img-responsive"></a></div>
            </div>
            <div class="post-dis m-top2">
              <h4 class="m-bottom1 m-top1 font18"><a href="#">Phòng đôi</a></h4>
              <p class="m-top1">Đây là phòng có 2 giường </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 m-bottom4">
          <div class="post-cols">
            <div class="post-thumb">
              <div class="imgbox"><a href="#"><img src="img/troom3.jpg" alt="" class="img-responsive"></a></div>
            </div>
            <div class="post-dis m-top2">
              <h4 class="m-bottom1 m-top1 font18"><a href="#">Phòng vip</a></h4>
              <p class="m-top1">Đây là phòng đặt biệt, đẹp, có nhiều dịch vụ đạt biệt </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- Project Section -->
  <section id="service" class="pt80 pb80">
    <div class="container">
      <div class="row">
        <div class="com-sm-12">
          <div class="header-section text-center mb40">
            <h2 class="meta-title-2">Dịch vụ</h2>
          </div>
        </div>
      </div>
 <div class="row">
        <div class="col-lg-4 col-sm-6 m-bottom4">
          <div class="post-cols">
            <div class="post-thumb">
              <div class="imgbox"><a href="#"><img src="img/dv1.jpg" alt="" class="img-responsive"></a></div>
            </div>
            <div class="post-dis m-top2">
              <h4 class="m-bottom1 m-top1 font18"><a href="#">Ăn uống</a></h4>
              <p class="m-top1">Khách sạn chúng tôi có nhà ăn 5* với những món ngon nổi tiếng Việt Nam. </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 m-bottom4">
          <div class="post-cols">
            <div class="post-thumb">
              <div class="imgbox"><a href="#"><img src="img/dv2.jpg" alt="" class="img-responsive"></a></div>
            </div>
            <div class="post-dis m-top2">
              <h4 class="m-bottom1 m-top1 font18"><a href="#">Tắm xông hỏi</a></h4>
              <p class="m-top1">Khách sạn chúng tôi có dịch vụ tắm à xông hỏi giúp khách dàng thư giản </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 m-bottom4">
          <div class="post-cols">
            <div class="post-thumb">
              <div class="imgbox"><a href="#"><img src="img/dv3.jpg" alt="" class="img-responsive"></a></div>
            </div>
            <div class="post-dis m-top2">
              <h4 class="m-bottom1 m-top1 font18"><a href="#">buffet</a></h4>
              <p class="m-top1">Khách sạn chúng tôi có dịch vụ buffet trong những buổi tiệc</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="loginmodal-container">
        <button type="button" class="close" data-dismiss="modal" onclick="removeMessage()" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          <h1>Đăng nhập</h1><br>
          <form role="form" method="POST" action="{{ route('subHomesubmit',['subdomain' =>$info['subdomain']]) }}">
          {{csrf_field()}}
          <input hidden id="typePosts"" name="typePost" value="login">
           <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                <input id="username" type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}" required autofocus>
              </div>
              @if ($errors->has('username') )
              @if($errors->first('username') == "Tài khoản hoặc mật khẩu không đúng")
                            <span class="help-block">
                            <strong class="messageError">{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                  @endif
           </div>
           <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
              </div>
          </div>
          <div class="form-group">
                          
              <div class="checkbox">
                      <label>
                          <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                      </label>
                  </div>
              </div>
                       
          
          <input type="submit" name="login" class="btn btn-primary btn-lg" value="Login">
          </form>
                   <a hhref="#login" data-toggle="modal" data-backdrop="static" data-target="#register-modal">Register</a> - <a href="#">Forgot Password</a>
          </div>
    </div>
  </div>

  <div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
      <div class="Registermodal-content">
        <button type="button" class="close" data-dismiss="modal" onclick="removeMessage()" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          <h1>Đăng kí</h1><br>
          <form role="form" method="POST" action="{{ route('subHomesubmit',['subdomain' =>$info['subdomain']]) }}">
              {{ csrf_field() }}
              <input hidden id="typePosts"" name="typePost" value="register">
              <div class="row">
                <div class="col-xs-6 form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                    <div >
                        <input id="first_name" type="text" class="form-control" placeholder="Họ" name="first_name" value="{{ old('first_name') }}" required autofocus>
                    </div>
                </div>
                <div class="col-xs-6 form-group {{ ($errors->has('last_name') && $errors->first('username') != 'These credentials do not match our records.') ? ' has-error' : '' }}">
                    <div >
                        <input id="last_name" type="text" class="form-control" placeholder="Tên" name="last_name" value="{{ old('last_name') }}" required autofocus>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                        <input id="username" type="text" class="form-control" placeholder="Username" name="username" required autofocus> 
                    </div>           
                    @if ($errors->has('username'))
                    <!-- day la text tieng viet -->
                      
                        <span class="help-block">
                            <strong class="messageError">{{ $errors->first('username') }}</strong>
                        </span>
                    
                    @endif
                </div>
              </div>
              <div class="row"> 
                <div class="col-xs-12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                        <input id="email" type="email" class="form-control" placeholder="E-Mail" name="email" required>
                    </div>
                     @if ($errors->has('email'))
                            <span class="help-block">
                                <strong class="messageError">{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                </div>
              </div>
              <div class="row"> 
                <div class="col-xs-6 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div >
                        <input id="password" type="password" class="form-control" placeholder="Mật khẩu" name="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong class="messageError">{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-xs-6 form-group">
                    <div >
                        <input id="password-confirm" type="password" placeholder="Nhập lại mật khẩu" class="form-control" name="password_confirmation" required>
                    </div>
                </div>
              
                <div class="col-xs-6 pull-right"> 
                    <input type="submit" name="Register" class="btn btn-primary btn-lg pull-right" value="Đăng kí">
                </div>
              </div>
          </form>
      </div>
    </div>
  </div>
  <!-- Footer Section -->
  <footer id="footer" class="footer">
    <div class="container inner">
      <p class="pull-left white"> <a href="#">Khách sạn {{$info['name']}}</a>.</p>
      <ul class="social pull-right">
        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
      </ul>
    </div>
    <!-- .container --> 
  </footer>

  <!-- SCRIPTS -->
  <script  src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootsnav.js"></script>
  <script src="{!! asset('js/getlistCountry.js') !!}"></script>
  
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- <script src="js/owl.carousel.js"></script>
  <script  src="js/counterup.min.js"></script> -->
  <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
  @if ($errors->has('username') )
  @if($errors->first('username') == "Tài khoản hoặc mật khẩu không đúng")

    <script type="text/javascript">  
    $(document).ready(function () {
      $('#login-modal').modal('show');

}); </script>
 @endif
 @if($errors->first('username') != "Tài khoản hoặc mật khẩu không đúng")

    <script type="text/javascript">  
    $(document).ready(function () {
      $('#register-modal').modal('show');

}); </script>
 @endif
  @endif  @if ($errors->has('password'))
      <script>   function myFunction() { 
    document.getElementById("register-modal").showModal(); </script>
  @endif @if ($errors->has('email'))
      <script>   function myFunction() { 
    document.getElementById("register-modal").showModal(); </script>
  @endif
<script type="text/javascript">
   
    function removeMessage() {
        $("div").removeClass("has-error");
        $("span").removeClass("help-block");

        var x = document.getElementsByClassName("messageError");
        for (i = 0; i < x.length; i++) { 
            x[i].innerHTML = "";
        }
        $("strong").removeClass("messageError");
        // var element = document.getElementsByClassName("help-block");
        
}
</script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
      format: 'yyyy/mm/dd'
    });

  } );
</script>
<script>
  $( function() {
    $( "#datepicker2" ).datepicker({
      format: 'yyyy/mm/dd'
    });
  } );
</script>
@if (session('messagesResult'))
   <script type="text/javascript">  
      alert(" {{ session('messagesResult') }}");
    </script>
   
    @endif

   
</body>
</html>
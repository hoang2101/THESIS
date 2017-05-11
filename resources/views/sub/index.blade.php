
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Hotel {{$info['name']}}</title>

<!-- Bootstrap CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Fontawesome CSS -->
<link href="css/font-awesome.min.css" rel="stylesheet">

<!-- Google Font -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto' rel='stylesheet' type='text/css'>

<!-- Bootsnav CSS -->
<link href="css/bootsnav.css" rel="stylesheet">

<!-- Owl stylesheet -->
<!-- <link rel="stylesheet" href="css/owl.carousel.css">
<link rel="stylesheet" href="css/owl.theme.css"> -->

<!-- Lightbox Theme -->
<!-- <link href="css/lightbox.css" rel="stylesheet"> -->

<!-- Main css -->
<link rel="stylesheet" href="css/style2.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>

  <div class="page-loader" style="display: none;">
    <div class="loader" style="display: none;"> 
      <span class="dot dot_1"></span> 
      <span class="dot dot_2"></span> 
      <span class="dot dot_3"></span> 
      <span class="dot dot_4"></span> 
    </div>
  </div>

  <!-- Hero Section -->
  <nav class="navbar navbar-default navbar-fixed white bootsnav on no-full navbar-transparent">

    <div class="container">      
        <!-- Start Header Navigation -->
        <div class="navbar-header">
        <ul class="nav navbar-nav " data-in="fadeInDown" data-out="fadeOutUp">     

              <li> <a  class="nav navbar-nav " data-in="fadeInDown" data-out="fadeOutUp" href="#">{{strtoupper($info['name'])}} <span></span></a> </li>
              
            </ul>
            <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#brand">
              <img src="img/logo/logo-white.png" class="logo logo-display" alt="">
              <img src="img/logo/logo-black.png" class="logo logo-scrolled" alt="">
            </a> -->
        </div>
        <!-- End Header Navigation -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">                  
              <li><a href="#">Home</a></li>
              <li><a href="#about">Giới thiệu</a></li>
              <li><a href="#service">Phòng</a></li>
              <li><a href="#project">Dịch vụ</a></li>
              <li><a href="#pricing">liên hệ</a></li>
               @if (Auth::guest())
                            <li><a href="#login" data-toggle="modal" data-backdrop="static" id="auth" data-target="#login-modal">Đăng nhập</a></li>
                            <li><a href="#login" data-toggle="modal" data-backdrop="static" data-target="#register-modal">Đăng kí</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->last_name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('manage').submit();">
                                            Manage
                                        </a>

                                        <form id="manage" action="@if(Auth::user()->type == 1){{{ route('mainManage') }}}@endif @if(Auth::user()->type == 2){{{ route('mainManageHoteler') }}}@endif" method="get" style="display: none;">
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

  
  <!-- Hero Section -->
   <section id="home"   class="hero hero_full_screen hero_parallax parallax-window" data-stellar-background-ratio="0.5">
    <div class="bg-overlay opacity-6">
    </div>
    <div class="hero_parallax_inner">
      <div class="container">
        <!--  <div class="search-row">
          <form class="search-form horizontal container " action="#">
            <div class="search-fields col-sx-6 col-md-3">
              <input placeholder="Check-in" class="datepicker-fields check-in" type="text">
              <i class="fa fa-calendar form-control-feedback"></i>
            </div>
            
          </form>
        </div>
        <h1 class="big-slider-title" data-ix="slide-big-title" style="opacity: 1; transform: translateX(0px) translateY(0px); transition: opacity 500ms ease 0s, transform 500ms ease 0s;">Think creative</h1>
        <h3 class="slider-sub-txt white" data-ix="slide-sub-title" style="opacity: 1; transform: translateX(0px) translateY(0px); transition: opacity 500ms ease 0s, transform 500ms ease 0s;">we are always working hard</h3>
        <div class="slider-spc" data-ix="slide-spc" style="opacity: 1; transform: translateX(0px) translateY(200px); transition: opacity 500ms ease 0s, transform 500ms ease 0s;"> -->
        <div class="search-row">
          <form class="search-form horizontal container " action="#">
         <div>
          <div class="col-md-3">
            <div class=" col-md-11 form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
              <div>
                  <input id="check_in" type="text" onclick="(this.type='date')"  class="form-control" placeholder="Check-in" name="check_in" value="{{ old('check_in') }}" required autofocus>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class=" col-md-11 form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
              <div>
                  <input id="check_out" type="text" onfocus="(this.type='date')" class="form-control" placeholder="Check-out" name="check_out" value="{{ old('check_out') }}" required autofocus>
              </div>
            </div>
          </div>
           <div class="col-md-3">
            <div class=" col-md-11 form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
              <div>
                  <select class="form-control">
                            <option>Loại phòng</option>
                            <option>Phòng đơn</option>
                            <option>Phòng đôi</option>
                            <option>Phòng vip</option>
                          </select>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class=" col-md-11 form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
              <div>
                  <input id="e_phone_number" type="number" class="form-control" placeholder="Số người" name="phone_number" value="{{ old('phone_number') }}" >
              </div>
            </div>
          </div>

        </div>
        <div style="text-align: center;">
          <input type="submit" name="Register" class="btn btn-sm btn-default "  style="width:auto;  margin:0 auto; text-align:center" value="Đặt phòng">
          
        </div>

          
            
          </form>
        </div>
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
  <section id="service" class="pb80 pt80 bg-grey">
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
  <section id="project" class="pt80 pb80">
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


  <!-- Footer Section -->
  <footer class="footer">
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
  <!-- <script src="js/owl.carousel.js"></script>
  <script  src="js/counterup.min.js"></script> -->
  <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
 
 
  
  
</body>
</html>
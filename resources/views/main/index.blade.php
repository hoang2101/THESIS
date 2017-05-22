<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <title>HOMN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/icon" href="img/wpf-favicon.png"/>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome css file-->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Superslide css file-->
    <link rel="stylesheet" href="css/superslides.css">
    <!-- Slick slider css file -->
    <link href="css/slick.css" rel="stylesheet"> 
    <!-- Circle counter cdn css file -->
    <link rel='stylesheet prefetch' href='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/css/jquery.circliful.css'>  
    <!-- smooth animate css file -->
    <link rel="stylesheet" href="css/animate.css"> 
    <!-- preloader -->
    <!--<link rel="stylesheet" href="css/queryLoader.css" type="text/css" /> -->
    <!-- gallery slider css -->
    <link type="text/css" media="all" rel="stylesheet" href="css/jquery.tosrus.all.css" />    
    <!-- Default Theme css file -->
    <link id="switcher" href="css/themes/default-theme.css" rel="stylesheet">
    <!-- Main structure css file -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>   
    <link href='http://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
  </head>
  <body >   
    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"></a>
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
    <header id="header">
      <!-- BEGIN MENU -->
      <div class="menu_area">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">  <div class="container">
            <div class="navbar-header">
              <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <!-- LOGO -->
              <!-- TEXT BASED LOGO -->
              <a class="navbar-brand" href="#">HOMN <span></span></a>              
              <!-- IMG BASED LOGO  -->
               <!-- <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="logo"></a>  -->                
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
                <li class="active"><a href="#">Trang chủ</a></li>
                <li><a href="#aboutUs">Về chúng tôi</a></li>
                <li><a href="#whyUs">Lý do</a></li>
                <li><a href="#pricing">Bảng giá</a></li>
                <li><a href="#footer">Liên hệ</a></li> 
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
                                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                                            Đăng xuất
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('manage').submit();">
                                            <i class="fa fa-list" aria-hidden="true"></i>
                                            Quản lý
                                        </a>

                                        <form id="manage" action="@if(Auth::user()->type == 1){{{ route('mainManage') }}}@endif @if(Auth::user()->type == 2){{{ route('mainManageHoteler') }}}@endif" method="get" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
              </ul>
                 
                

              <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                <div class="modal-dialog">
                <div class="loginmodal-container">
                <button type="button" class="close" data-dismiss="modal" onclick="removeMessage()" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                  <h1>Đăng nhập</h1><br>
                  <form role="form" method="POST" action="{{ route('login') }}">
                  {{csrf_field()}}
                   <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                          <input id="username" type="text" class="form-control" name="username" placeholder="Tên đăng nhập" value="{{ old('username') }}" required autofocus>
                        </div>
                         @if ($errors->has('username') )
                                  @if($errors->first('username') == "These credentials do not match our records.")
                                                <span class="help-block">
                                                <strong class="messageError">{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                      @endif
                   </div>
                   <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
                      </div>                              
                  </div>
                  <div class="form-group">
                                  
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ghi nhớ
                                            </label>
                                        </div>
                                    </div>
                               
                  
                  <input type="submit" name="login" class="btn btn-primary btn-lg" value="Đăng nhập">
                  </form>
                           <a href="#login" data-toggle="modal" data-backdrop="static" data-target="#register-modal">Đăng kí</a> - <a href="#">Quên mật khẩu</a>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                  <div class="modal-dialog">
                  <div class="Registermodal-content">
                  <button type="button" class="close" data-dismiss="modal" onclick="removeMessage()" aria-label="Close"><span aria-hidden="true">&times;</span>
                          </button>
                    <h1>Đăng kí</h1><br>
                    <form role="form" method="POST" action="{{ route('register') }}">
                                  {{ csrf_field() }}
                    <div class="row">                
                          <div class="col-xs-6 form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                              
                                  <input id="first_name" type="text" class="form-control" placeholder="Họ" name="first_name" value="{{ old('first_name') }}" required autofocus>
                              
                          </div>
                          <div class="col-xs-6 form-group {{ ($errors->has('last_name') && $errors->first('username') != 'These credentials do not match our records.') ? ' has-error' : '' }}">
                             
                                  <input id="last_name" type="text" class="form-control" placeholder="Tên" name="last_name" value="{{ old('last_name') }}" required autofocus>
                              
                          </div>
                    </div>
                    <div class="row">   
                          <div class="col-xs-12 form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                             <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                  <input id="username" type="text" class="form-control" placeholder="Tên đăng nhập" name="username" value="{{ old('username') }}" required autofocus>
                            </div>
                            @if ($errors->has('username'))
                                  <!-- day la text tieng viet -->
                                    @if($errors->first('username') != "These credentials do not match our records.")
                                      <span class="help-block">
                                          <strong class="messageError">{{ $errors->first('username') }}</strong>
                                      </span>
                                  @endif
                            @endif
                          </div>
                   </div>
                   <div class="row">             
                          <div class="col-xs-12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                                  <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>
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
              </div>                    
            </nav>  
          </div>
      <!-- END MENU --> 
    </header>
    <!--=========== END HEADER SECTION ================--> 
<!-- login -->

    <!--=========== BEGIN SLIDER SECTION ================-->
   
    <section id="slider">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="slider_area">
            <!-- Start super slider -->
            <div id="slides">
              <ul class="slides-container">                          
                <li>
                  <img src="img/slider/2.jpg" alt="img">
                 
                   <div class="slider_caption">
                     <h2>HOMN</h2>
                  <p>PHẦN MỀM QUẢN LÝ KHÁCH SẠN CUNG CẤP DẠNG DỊCH VỤ</p>
                  </div>
                  </li>
                <!-- Start single slider-->
                <li>
                  <img src="img/slider/3.jpg" alt="img">
                   <div class="slider_caption slider_right_caption">
                    
                  </div>
                </li>
                <!-- Start single slider-->
                <li>
                  <img src="img/slider/4.jpg" alt="img">
                   <div class="slider_caption">
                    
          
                  </div>
                </li>
              </ul>
              <nav class="slides-navigation">
                <a href="#" class="next"></a>
                <a href="#" class="prev"></a>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--=========== END SLIDER SECTION ================-->

    <!--=========== BEGIN ABOUT US SECTION ================-->
    <section id="aboutUs">
      <div class="container">
      <div class="row">
                <div class="col-lg-12 col-md-12"> 
                  <div class="title_area">
                    <h2 class="title_two">Về chúng tôi</h2>
                    <span></span> 
                  </div>
                </div>
      </div>
        <div class="row">
        <!-- Start about us area -->
        <div class="col-lg-12 col-md-12">
            
          <div class="descriptive-title">
              <p>Chúng tôi cung cấp giải pháp quản lý khách sạn đầy đủ, đẹp, để dàng sử dụng trên mọi hệ điều hành có thể truy cập web. phần mềm chúng tôi được thiết kế để đáp ứng đầy đủ tính năng cho các khách sạn </p>
          </div>
          </div>
          <div class="awards">
          <div class="row">
            <div class="col-sm-3 col-xs-6">
                <!--counter box-->

                <div class="counter_box text-center fadeInDown  wow animated" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInDown;">
                    <div class="counter_number counter">276</div>
                    <h4 class="counter_name">Nhà đầu tư</h4>
                </div>
                <!--counter box end-->
            </div>
            <div class="col-sm-3 col-xs-6">
                <!--counter box-->
                <div class="counter_box text-center fadeInDown  wow animated" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInDown;">
                    <div class="counter_number counter">153</div>
                    <h4 class="counter_name">Khách sạn</h4>
                </div>
                <!--counter box end-->
            </div>
            <div class="col-sm-3 col-xs-6">
                <!--counter box-->
                <div class="counter_box text-center fadeInDown  wow animated" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInDown;">
                    <div class="counter_number counter">780</div>
                    <h4 class="counter_name">Phòng</h4>
                </div>
                <!--counter box end-->
            </div>
            <div class="col-sm-3 col-xs-6">
                <!--counter box-->
                <div class="counter_box text-center fadeInDown  wow animated" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInDown;">
                    <div class="counter_number counter">1276</div>
                    <h4 class="counter_name">Tài khoản</h4>
                </div>
                <!--counter box end-->
            </div>
          </div>
        </div><!-- Awards -->
        </div>
        
      </div>
      </div>
    </section>
    <!--=========== END ABOUT US SECTION ================--> 

    <!--=========== BEGIN WHY US SECTION ================-->
    <section id="whyUs">
      <!-- Start why us top -->
      <div class="row">        
        <div class="col-lg-12 col-sm-12">
          <div class="whyus_top">
            <div class="container">
              <!-- Why us top titile -->
              <div class="row">
                <div class="col-lg-12 col-md-12"> 
                  <div class="title_area">
                    <h2 class="title_two">Lý do chọn chúng tôi</h2>
                    <span></span> 
                  </div>
                </div>
              </div>
              <!-- End Why us top titile -->
              <!-- Start Why us top content  -->
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="single_whyus_top wow fadeInUp">
                    <div class="whyus_icon">
                      <span class="fa fa-desktop"></span>
                    </div>
                    <h3>RESPONSIVE GRID</h3>
                    <p>Phần mềm được thiết kế để có thể hiển thị tương thích trên mọi kích thước hiển thị của trình duyệt</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="single_whyus_top wow fadeInUp">
                    <div class="whyus_icon">
                      <span class="fa fa-users"></span>
                    </div>
                    <h3>Quản lý khách sạn từ xa</h3>
                    <p>Với công nghệ hiện đại cho phép quản lý, chủ khách sạn có thể truy cập vào phần mềm từ bất kỳ đâu chỉ bằng trình duyệt Web. Các nhà quản lý khách sạn có thể kiểm tra, theo dõi, báo cáo </p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="single_whyus_top wow fadeInUp">
                    <div class="whyus_icon">
                      <span class="fa fa-flask"></span>
                    </div>
                    <h3>Đa thiết bị và điều hành</h3>
                    <p>Với nền tảng phần mềm dạng dịch vụ có thể chạy trên nhiều thiết bị với các hệ điều hành khác nhau như Windows, Mac OS, Linux… chỉ với trình duyệt Web mà không cần cài đăt.</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="single_whyus_top wow fadeInUp">
                    <div class="whyus_icon">
                      <span class="fa fa-support"></span>
                    </div>
                    <h3>Hổ trợ online</h3>
                    <p>Hệ thống hổ trợ online 24/7, khi bạn gặp vấn vần bất cứ vấn đề gì có thể liên hệ với chúng tôi để được tư vấn thông qua điện thoại, email, chức năng hổ trợ khách hàng của hệ thống</p>
                  </div>
                </div>
              </div>
              <!-- End Why us top content  -->
            </div>
          </div>
        </div>        
      </div>
      <!-- End why us top -->

    </section>
    <!--=========== END WHY US SECTION ================-->

    <!--=========== BEGIN pricing ================-->
   <!-- Pricing Section -->
    <section id="pricing">
      
        <div class="row">

          <div class="col-lg-12 col-sm-12">
           <div class="container text-center bg3">
          <h2 class="meta-title-2 white">Bảng giá</h2>
          </div>
          </div>

          <div class="col-lg-12 col-sm-12">
          <div class="container">
          <div class="row">
          <!-- Pricing Table One -->
          <div class="col-sm-3 col-md-3">
            <div class="pricing-table-column">
              <h3>BASIC</h3>
              
                <h2>$100</h2>
                <p>1 tháng</p>
          
               <div class="info text-left">
                <p>Miển phí 1 khách sạn</p>
                <p>Công cụ quản lý đầy đủ</p>
                <p>Miển phí hổ trợ</p>
              </div>
              <div class="button-style-1"><a href="">Đăng kí ngay</a></div>
            </div>
          </div>

          <!-- Pricing Table Two -->
          <div class="col-sm-3 col-md-3">
            <div class="pricing-table-column">
              <h3>SILVER</h3>
              
                <h2>$150</h2>
                <p>2 tháng</p>
             
              <div class="info text-left">
                <p>Miển phí 3 khách sạn</p>
                <p>Công cụ quản lý đầy đủ</p>
                <p>Miển phí hổ trợ</p>
              </div>
              <div class="button-style-1"><a href="">Đăng kí ngay</a></div>
            </div>  
          </div>

          <!-- Pricing Table Three -->
          <div class="col-sm-3 col-md-3">
            <div class="pricing-table-column">
              <h3>GOLD</h3>
              
                <h2>$250</h2>
                <p>4 tháng</p>
             
              <div class="info text-left">
                <p>Miển phí 6 khách sạn</p>
                <p>Công cụ quản lý đầy đủ</p>
                <p>Miển phí hổ trợ</p>
              </div>
              <div class="button-style-1"><a href="">Đăng kí ngay</a></div>
            </div>  
          </div>

          <!-- Pricing Table Four -->
          <div class="col-sm-3 col-md-3">
            <div class="pricing-table-column">
              <h3>VIP</h3>
              
                <h2>$400</h2>
                <p>6 tháng</p>
             
              <div class="info text-left">
                <p>Miển phí 10 khách sạn</p>
                <p>Công cụ quản lý đầy đủ</p>
                <p>Miển phí hổ trợ</p>
              </div>
              <div class="button-style-1"><a href="">Đăng kí ngay</a></div>
            </div>
          </div>
        </div>    
      </div>
      </div>
      </div>
    </section>
   
   
    <!--=========== BEGIN FOOTER SECTION ================-->
    <footer id="footer">
      <!-- Start footer top area -->
      <div class="footer_top">
        <div class="container">
          <div class="row">
            <div class="col-lg-6  col-md-6 col-sm-12">
              <div class="single_footer_widget">
                <h3>Liên Hệ</h3>
                <div><strong>Email</strong>: thesis@gmail.com</div>
                <div><strong>Điện thoại:</strong>: (+84) 163 846 0544</div>
                <div><strong>Địa chỉ</strong>: 227 Nguyễn Văn Cừ, Phường 4, Quận 5, Hồ Chí Minh</div>
              </div>
            </div>
         
            <div class="col-lg-6  col-md-6 col-sm-12">
              <div class="single_footer_widget">
                <h3>Mạng xã hội</h3>
                <ul class="footer_social">
                  <li><a data-toggle="tooltip" data-placement="top" title="Facebook" class="soc_tooltip" href="https://www.facebook.com/Money3x/"><i class="fa fa-facebook"></i></a></li>
                  <li><a data-toggle="tooltip" data-placement="top" title="Twitter" class="soc_tooltip"  href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a data-toggle="tooltip" data-placement="top" title="Google+" class="soc_tooltip"  href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li><a data-toggle="tooltip" data-placement="top" title="Linkedin" class="soc_tooltip"  href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a data-toggle="tooltip" data-placement="top" title="Youtube" class="soc_tooltip"  href="#"><i class="fa fa-youtube"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End footer top area -->

      <!-- Start footer bottom area -->

      <!-- End footer bottom area -->
    </footer>
    <!--=========== END FOOTER SECTION ================-->

    <!-- Javascript Files
    ================================================== -->

    <!-- initialize jQuery Library -->
     
    <!-- Preloader js file -->
   <!-- <script src="js/queryloader2.min.js" type="text/javascript"></script> -->
    <!-- For smooth animatin  -->
    <script src="js/jquery.min.js"></script>
    <script src="js/wow.min.js"></script>  
    <script src="//cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- slick slider -->
    <script src="js/slick.min.js"></script>
    <!-- superslides slider -->
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.animate-enhanced.min.js"></script>
    <script src="js/jquery.superslides.min.js" type="text/javascript" charset="utf-8"></script>   
    <!-- for circle counter -->
    <script src='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/js/jquery.circliful.min.js'></script>
    <!-- Gallery slider -->
    <script type="text/javascript" language="javascript" src="js/jquery.tosrus.min.all.js"></script>   


    <!-- angular -->
    <!-- <script src="js/angular.min.js"></script>
    <script src="js/angular-app.js"></script>
    
    <script src="js/angular-animate.min.js"></script>
    <script src="js/angular-aria.min.js"></script>
    <script src="js/angular-messages.min.js"></script>
    <script src="js/angular-route.min.js"></script>
    <script src="js/angular-index.js"></script>
    <script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/t-114/svg-assets-cache.js'></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script> -->

    <!-- Custom js-->
    <script src="js/custom.js"></script>
    
  

    <!--=============================================== 
    Template Design By WpFreeware Team.
    Author URI : http://www.wpfreeware.com/
    ====================================================-->
@if ($errors->has('username') )
  @if($errors->first('username') == "These credentials do not match our records.")

    <script type="text/javascript">  
    $(document).ready(function () {
      $('#login-modal').modal('show');

}); </script>
 @endif
 @if($errors->first('username') != "These credentials do not match our records.")

    <script type="text/javascript">  
    $(document).ready(function () {
      $('#register-modal').modal('show');

}); </script>
 @endif
  @endif  @if ($errors->has('password'))
      <script>  <script>  function myFunction() { 
    document.getElementById("register-modal").showModal(); </script>
  @endif @if ($errors->has('email'))
      <script>  <script>  function myFunction() { 
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
  </body>
</html>
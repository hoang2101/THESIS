
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Khách sạn {{$info['name']}}</title>
<link rel="shortcut icon" type="image/icon" href="{!!asset('img/wpf-favicon.png') !!}"/>
<!-- Bootstrap CSS -->
<link href="{!!asset('css/bootstrap.min.css') !!}" rel="stylesheet">

<!-- Fontawesome CSS -->
<link href="{!!asset('css/font-awesome.min.css') !!}" rel="stylesheet">

<!-- Google Font -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto' rel='stylesheet' type='text/css'>

<!-- Bootsnav CSS -->
<link href="{!!asset('css/bootsnav.css') !!}" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- Main css -->
<link rel="stylesheet" href="{!!asset('css/style2.css') !!}">


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
                                @if(Auth::guard('account')->user()->image_link == null)
                                <img src="{!! asset('img/avatar_null.png') !!}" alt="">{{ Auth::guard('account')->user()->first_name }} {{Auth::guard('account')->user()->last_name }}
                                @else
                                <img src="{!! asset('img/User/' .$users->image_link) !!}" alt="">{{ Auth::guard('account')->user()->first_name }} {{ Auth::guard('account')->user()->last_name }}
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
                                        <form id="manage" action="@if(Auth::guard('account')->user()->type == 3){{{ route('mainManage') }}}@endif @if(Auth::guard('account')->user()->type == 4){{{ route('mainManageHoteler') }}}@endif" method="get" style="display: none;">
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
  <div class="container" style=" margin-top:100px;max-width:1200px;">
    <section id="about" class="" style=" margin-bottom:20px;">
   <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
      <div class="profile_img">
        <div id="crop-avatar">
          <!-- Current avatar -->
          @if ($users->image_link==null)
          <img class="img-responsive avatar-view" src="{!! asset('img/avatar_null.png') !!}" alt="Avatar">
          @else
          <!-- {{$img  = $users->image_link}} -->
        
          <img class="img-responsive avatar-view" src="{!! asset('img/User/' .$users->image_link) !!}" alt="Avatar">
          @endif

        </div>
      </div>
      <h3>{{ Auth::guard('account')->user()->first_name }} {{ Auth::guard('account')->user()->last_name }}</h3>
      <form action="{{ route('subProfilesubmit',['subdomain' =>$info['subdomain']]) }}" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        <input hidden id="typePost"" name="typePost" value="updateAvatar">
        <div class="row">
          <div class="col-md-12">
            <input type="file" name="image" accept="image/*"/>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-success">Thay đổi Avatar</button>
          </div>
        </div>
      </form>

                                       <!--  <form role="form" method="POST" action="{{ route('mainProfileSubmit') }}">
                                            <input hidden id="typePost"" name="typePost" value="updateAvatar">
                                            <input hidden id="idUser" name="id" value="{{$users->id}}">
                                           
                                        </form>

                                        <label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">
                                          <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">
                                          <span class="docs-tooltip" data-toggle="tooltip" title="Import image with Blob URLs">
                                            <span class="fa fa-upload">thay đôi Avatar</span>
                                          </span>
                                        </label> -->

      </div>
      <div class="col-md-9 col-sm-9 col-xs-12">
        <div id="profile_info">
          <div class="profile_title">
            <div class="col-md-12">
             @if ($users->type==1)
             <h2><i class="fa fa-certificate"></i>   SYSTEM ADMIN</h2>
             @elseif ($users->type==2)
             <h2><i class="fa fa-certificate"></i>   CHỦ KHÁCH SẠN</h2>
             @elseif ($users->type==3)
             <h2><i class="fa fa-certificate"></i>   QUẢN LÝ KHÁCH SẠN</h2>
             @elseif ($users->type==4)
             <h2><i class="fa fa-certificate"></i>   NHÂN VIÊN</h2>
             @elseif ($users->type==5)
             <h2><i class="fa fa-certificate"></i>   NGƯỜI DÙNG</h2>
             @endif

           </div>
         </div>

         <div class="profile_details">
          <br />
          <form role="form" method="POST" action="{{ route('subProfilesubmit',['subdomain' =>$info['subdomain']]) }}">
           {{ csrf_field() }}
           <input hidden id="typePost"" name="typePost" value="updateUser">
           <input hidden id="idUser" name="id" value="{{$users->id}}">
           <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

              <input type="text" class="form-control has-feedback-left" readonly id="username" name="username" placeholder="Tên tài khoản" value="{{$users->username}}"> 

              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

              <input type="text" class="form-control has-feedback-left"  id="first_name" name="first_name" placeholder="Họ" value="{{$users->first_name}}">

              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

              <input type="text" class="form-control has-feedback-left"  id="last_name" name="last_name" placeholder="Tên" value="{{$users->last_name}}">

              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

              <input type="text" class="form-control has-feedback-left"  id="email" name="email" placeholder="Email" value="{{$users->email}}">

              <span class="fa fa-user form-control-feedback left" aria-hidden="true" ></span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

              <input type="text" class="form-control has-feedback-left"  id="phone_number" name="phone_number" placeholder="Số điện thoại" value="{{$users->phone_number}}">

              <!-- <input type="text" class="form-control has-feedback-left"  id="phone_number" name="phone_number" placeholder="{{$users->phone_number}}"> -->

              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

              <input type="text" class="form-control has-feedback-left"  id="country" name="country" placeholder="Quốc gia" value="{{$users->country}}">

              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

              <input type="text" onfocus="(this.type='date')" class="form-control has-feedback-left"   id="dob" name="dob" placeholder="Ngày sinh" value="{{$users->dob}}">

              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

              <input type="text"  class="form-control has-feedback-left"  id="gender" name="gender" placeholder="Giới tính" value="{{$users->gender}}">

              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>

          <div class="row">

            <div class="col-md-6 col-sm-6 col-xs-12">
              <button id="btn_reset_pwd" type="submit" class="btn btn-primary"><i class="fa fa-edit m-right-xs"></i>&nbsp;Thay đổi thông tin</button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>
  </section> 
  
  </div>
  


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
  <script  src="{!! asset('js/jquery.min.js') !!}"></script>
  <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
  <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
  
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
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
</script>
<script>
  $( function() {
    $( "#datepicker2" ).datepicker();
  } );
</script>
  
</body>
</html>



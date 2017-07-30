<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quản lý tài khoản</title>

    <!-- Bootstrap Core CSS -->
    <link href="{!! asset('vendors/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('vendors/font-awesome/css/font-awesome.min.css')!!}" rel="stylesheet" type="text/css">

    <!-- MetisMenu CSS -->
    <link href="{!! asset(' vendor/metisMenu/metisMenu.min.css')!!}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{!! asset('css/sb-admin-2.css')!!}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{!! asset('vendor/morrisjs/morris.css')!!}" rel="stylesheet">

    <!-- Custom Fonts -->

    
   

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   <style type='text/css'>
.fa.form-control-feedback {<!-- w  ww.jav a2  s .co m-->
  line-height: 34px;
  padding-left: 25px;
  padding-top: 10px;
}
.input-lg ~ .fa.form-control-feedback {
  line-height: 46px; 
}
.has-feedback-left input.form-control {
  padding-left: 34px; 
  padding-right: 12px; 
}
.has-feedback-left .form-control-feedback {
  left: 0;
}

.form-horizontal .has-feedback-left .form-control-feedback {
  left: 12px;

}
</style>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <a href="#" class="navbar-brand site_title"><i class="fa fa-modx"></i> <span>QUẢN LÝ Tài Khoản</span></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <!-- <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li> -->
                       <!--  <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li> -->
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                       @if(Auth::guard('account')->user()->image_link == null)
                                <img style="width: 29px; height: 29px;border-radius: 50%; margin-right: 10px;" src="{!! asset('img/avatar_null.png') !!}" alt="">{{ Auth::guard('account')->user()->first_name }} {{Auth::guard('account')->user()->last_name }}
                                @else
                                <img  style="width: 29px; height: 29px;border-radius: 50%; margin-right: 10px;" src="{{Auth::guard('account')->user()->image_link}}" alt="">{{ Auth::guard('account')->user()->first_name }} {{ Auth::guard('account')->user()->last_name }}
                                @endif
                                    <span class=" fa fa-angle-down"></span> 
                    </a>
                    <ul class="dropdown-menu">

                        <li><a href="{{ route('subConfig',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        
                        <!-- <li class="divider"></li>  dung de gach ngang--> 

                        <li><a href="#"
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
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                <div class="profile clearfix">
                       
                    <ul class="nav" >

                        <li>
                            <a href="{{ route('subHome',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="{{ route('subProfile',['subdomain' =>$info['subdomain']]) }}" class="active"><i class="fa fa-dashboard fa-fw"></i> Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('subHistoryBook',['subdomain' =>$info['subdomain']]) }}" ><i class="fa fa-history fa-fw"></i> Lịch sử đặt phòng</a>
                        </li>
                   
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý tài khoản</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                        <div class="profile_img">
                                            <div id="crop-avatar">
                                                <!-- Current avatar -->
                                                 @if ($users->image_link==null)
                                                      <img class="img-responsive avatar-view" src="{!! asset('img/avatar_null.png') !!}" alt="Avatar">
                                                      @else
                                                      <!-- {{$img  = $users->image_link}} -->
                                                    
                                                      <img class="img-responsive avatar-view" src="{{Auth::guard('account')->user()->image_link}}" alt="Avatar">
                                                      @endif

                                                
                                            </div>
                                        </div>
                                        <h3>{{Auth::guard('account')->user()->first_name }} {{ Auth::guard('account')->user()->last_name }}</h3>
                                        <form action="{{ route('subProfilesubmit',['subdomain' =>$info['subdomain']]) }}" enctype="multipart/form-data" method="POST">
                                            {{ csrf_field() }}
                                            <input hidden id="typePost"" name="typePost" value="updateAvatar">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="file" name="image" accept="image/*" required />
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
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback has-feedback-left">
                                                            
                                                            <input type="text" class="form-control" readonly id="username" name="username" placeholder="Tên tài khoản" value="{{$users->username}}"> 
                                                            
                                                            <i class="fa fa-user form-control-feedback"></i>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback has-feedback-left">
                                                            
                                                            <input type="text" class="form-control has-feedback-left"  id="first_name" name="first_name" placeholder="Họ" value="{{$users->first_name}}" required>
                                                           
                                                            <span class="fa fa-user form-control-feedback " aria-hidden="true"></span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback has-feedback-left">
                                                           
                                                            <input type="text" class="form-control has-feedback-left"  id="last_name" name="last_name" placeholder="Tên" value="{{$users->last_name}}" required>
                                                           
                                                            <span class="fa fa-user form-control-feedback " aria-hidden="true"></span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback has-feedback-left">
                                                            
                                                            <input type="text" class="form-control has-feedback-left"  id="email" name="email" placeholder="Email" value="{{$users->email}}" required>
                                                           
                                                            <span class="fa fa-envelope form-control-feedback " aria-hidden="true" ></span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback has-feedback-left">
                                                            
                                                            <input type="number" class="form-control has-feedback-left"  id="phone_number" name="phone_number" placeholder="Số điện thoại" value="{{$users->phone_number}}">
                                                            
                                                           
                                                            <span class="fa fa-phone form-control-feedback " aria-hidden="true"></span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback has-feedback-left">
                                                           
                                                            <input type="text" class="form-control has-feedback-left"  id="country" name="country" placeholder="Quốc gia" value="{{$users->country}}">
                                                           
                                                            <span class="fa fa-globe form-control-feedback " aria-hidden="true"></span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback has-feedback-left">
                                                           
                                                            <input type="text" onfocus="(this.type='date')" class="form-control has-feedback-left"   id="dob" name="dob" placeholder="Ngày sinh" value="{{$users->dob}}">
                                                           
                                                            <span class="fa fa-calendar form-control-feedback " aria-hidden="true"></span>
                                                        </div>
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback has-feedback-left">
                                                            
                                                            <input type="text"  class="form-control has-feedback-left"  id="gender" name="gender" placeholder="Giới tính" value="{{$users->gender}}">
                                                           
                                                            <span class="fa fa-transgender form-control-feedback " aria-hidden="true"></span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <button id="btn_reset_pwd" type="submit" class="btn btn-primary"><i class="fa fa-edit m-right-xs"></i>&nbsp;Thay đổi thông tin</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <br />
                                                <div class="ln_solid"></div>
                                               
                                                     <h2><i class="fa fa-certificate"></i> Quản lý mật khẩu</h2>
                                                   
                                                     <div>
                                                         <form role="form" method="POST" action="{{ route('subProfilesubmit',['subdomain' =>$info['subdomain']]) }}">
                                                        {{ csrf_field() }}
                                                    <input hidden id="typePost"" name="typePost" value="updatePassword">
                                                    <input hidden id="idUser" name="id" value="{{$users->id}}">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback has-feedback-left {{ $errors->has('current_pass') ? ' has-error' : '' }}">
                                                            <label>Nhập mật khẩu củ</label>
                                                            <input type="password" class="form-control" id="current_pass" name="current_pass"  value="" required> 
                                                            
                                                            <i class="fa fa-key form-control-feedback"></i>
                                                             @if ($errors->has('current_pass'))
                                                          <span class="help-block has-error">
                                                                <strong class="messageError">{{ $errors->first('current_pass') }}</strong>
                                                            </span>
                                                              @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback has-feedback-left {{ $errors->has('now_pass') ? ' has-error' : '' }}">
                                                            <label>Nhập mật khẩu mới</label>
                                                            <input type="password" class="form-control has-feedback-left"  id="now_pass" name="now_pass"  value="" required>
                                                           
                                                            <span class="fa fa-key form-control-feedback " aria-hidden="true"></span>
                                                             @if ($errors->has('now_pass'))
                                                              <span class="help-block has-error">
                                                                    <strong class="messageError">{{ $errors->first('now_pass') }}</strong>
                                                                </span>
                                                                  @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback has-feedback-left">
                                                           <label>Nhập lại mật khẩu</label>
                                                            <input type="password" class="form-control has-feedback-left"  id="last_name" name="now_pass_confirmation"  value="" required>
                                                           
                                                            <span class="fa fa-key form-control-feedback " aria-hidden="true"></span>
                                                        </div>
                                                    </div>
                                                   
                                                    
                                                    <div class="row">
                                                        
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <button id="btn_reset_pwd" type="submit" class="btn btn-primary"><i class="fa fa-edit m-right-xs"></i>&nbsp;Thay đổi Password</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                     </div>
                                            </div>
                                        </div>
                                        
                                    </div>
            </div>
            <!-- /.row -->
            <div class="row">
               
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->

<script src="{!! asset('vendors/jquery/dist/jquery.min.js') !!}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{!! asset('vendors/bootstrap/dist/js/bootstrap.min.js') !!}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{!! asset('vendor/metisMenu/metisMenu.min.js') !!}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{!! asset('vendor/raphael/raphael.min.js') !!}"></script>
    <script src="{!! asset('vendor/morrisjs/morris.min.js') !!}"></script>
    <script src="{!! asset('js/getlistCountry.js') !!}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{!! asset('js/sb-admin-2.js')!!}"></script>
    
    <!-- Bootstrap Core JavaScript -->
 
    <!-- Metis Menu Plugin JavaScript -->
    

    <!-- Custom Theme JavaScript -->

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
@if (session('messagesResult'))
   <script type="text/javascript">  
      alert(" {{ session('messagesResult') }}");
    </script>
   
    @endif

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quản lý tài khoản</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/custommanage.css">

    <!-- Custom Theme Style -->
    <link rel="stylesheet" type="text/css" href="css/style_namage.css"></link>
    <link href="css/custom.min.css" rel="stylesheet">

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="#" class="site_title"><i class="fa fa-modx"></i> <span>QUẢN LÝ HỆ THỐNG</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            @if(Auth::user()->image_link)
                            <img src="img/User/{{Auth::user()->image_link}}" alt="..." class="img-circle profile_img">
                           
                            @else
                            <img src="img/avatar_null.png" alt="..." class="img-circle profile_img">
                            @endif
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>System Admin</h3>
                            <ul class="nav side-menu">
                                @if(Auth::user()->type == 1)
                                <li><a href="{{ route('mainHome') }}"><i class="fa fa-home"></i> Home </a>
                                </li>
                                <li><a href="{{ route('mainManage') }}"><i class="fa fa-edit"></i> Quản lý khách hàng</a>
                                    
                                </li>
                                <li><a href="{{ route('mainManageHotel') }}"><i class="fa fa-desktop"></i> Quản lý hệ thống khách sạn</a></li>
                                <li><a  class="active" href="{{ route('mainProfile') }}"><i class="fa fa-user"></i> Quản lý tài khoản</a></li>
                                @endif
                                @if(Auth::user()->type == 2)
                                <li><a href="{{ route('mainHome') }}"><i class="fa fa-home"></i> Home </a>
                                </li>
                                
                                <li><a href="{{ route('mainManageHoteler') }}"><i class="fa fa-desktop"></i> Quản lý khách sạn</a>
                               <li><a href="{{ route('mainManageGovermHoteler') }}"><i class="fa fa-user" "></i> Quản lý Quản trị khách sạn</a></li>
                                    
                                </li>
                                <li><a class="active" href="{{ route('mainProfile') }}"><i class="fa fa-user"></i> Quản lý tài khoản</a></li>
                                @endif
                           
                            </ul>
                        </div>
                        

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen" onclick="toggleFull()">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                        <a data-toggle="tooltip" data-placement="top" title="Sign out" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    @if(Auth::user()->image_link)
                                <img src="img/User/{{Auth::user()->image_link}}" alt="">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                @else
                                <img src="img/avatar_null.png" alt="">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                @endif
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="{{ route('mainProfile') }}"> Hồ sơ</a></li>
                                    <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Đăng xuất</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
           <!--  <div class="right_col" role="main">

                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Quản lý tài khoản<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-backdrop="static" data-target="#addUserMainmodal"><i class="fa fa-folder"></i> Thêm khách hàng </a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    
                  
                    
                    
                  </div>
                </div>
              </div>

            </div> -->
             <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Quản lý tài khoản</h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">
                                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                        <div class="profile_img">
                                            <div id="crop-avatar">
                                                <!-- Current avatar -->
                                                @if ($users->image_link==null)
                                                <img class="img-responsive avatar-view" src="img/avatar_null.png" alt="Avatar">
                                                @else
                                                <img class="img-responsive avatar-view" src="img/User/{{$users->image_link}}" alt="Avatar">
                                                 @endif
                                                
                                            </div>
                                        </div>
                                        <h3>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
                                        <form action="{{ route('mainProfileSubmit') }}" enctype="multipart/form-data" method="POST">
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
                                                     @elseif ($users->type==4)
                                                     <h2><i class="fa fa-certificate"></i>   NGƯỜI DÙNG</h2>
                                                     @endif

                                                </div>
                                            </div>

                                            <div class="profile_details">
                                                <br />
                                                <form role="form" method="POST" action="{{ route('mainProfileSubmit') }}">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->
<!-- modal dialog add user -->
<!-- <div class="modal fade" id="addUserMainmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
        <div class="loginmodal-container">
        <button type="button" class="close" id="closeDialog" onclick="removeMessage()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          <h1>Thêm khách hàng</h1><br>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('addUserMainSubmit') }}">
                        {{ csrf_field() }}
                        <input hidden id="addtypePost"" name="typePost" value="addUser">
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <div >
                                <input id="first_name" type="text" class="form-control" placeholder="First Name" name="first_name" value="{{old('first_name') }}" required autofocus >

                                
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <div >
                                <input id="last_name" type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                            <div >
                                <input id="username" type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div >
                                <input id="email" type="email" class="form-control" placeholder="E-Mail Address" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div >
                                <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div >
                                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <input type="submit" name="Register" class="loginmodal-submit " value="Thêm khách hàng">
                       
                    </form>
          </div>
        </div>
      </div>

      <!-- modal dialog view  edit user -->
      <div class="modal fade" id="viewUserMainmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
        <div class="Registermodal-content">
        <button type="button" class="close" id="closeDialog" onclick="removeMessage()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          <h1>Xem chi tiết khách hàng</h1><br>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('addUserMainSubmit') }}">
                        {{ csrf_field() }}
                
                        <input hidden id="typePost"" name="typePost" value="updateUser">
                        <input hidden id="idUser" name="id" value="">
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <div >
                                <input id="e_first_name" type="text" class="form-control" placeholder="Họ" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <div >
                                <input id="e_last_name" type="text" class="form-control" placeholder="Tên" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div >
                                <input id="e_email" type="email" class="form-control" placeholder="E-Mail" name="email" value="{{ old('email') }}" required autofocus>
                          
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12  form-group">
                        
                            <div >
                                <input id="e_phone_number" type="number" class="form-control" placeholder="Số điện thoại" name="phone_number" value="{{ old('phone_number') }}" >

                               
                                @if ($errors->has('email'))
                                     <span class="help-block">
                                      <br>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12  form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                            <div >
                                <input id="e_username" type="text" class="form-control" placeholder="Tên tài khoản" name="username" value="{{ old('username') }}" required>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group">
                            <div >
                                <input id="e_country" type="text" class="form-control" placeholder="Quốc qia" name="country" value="{{ old('country') }}" >

                                @if ($errors->has('username'))
                                 <span class="help-block">
                                      <br>
                                    </span>
                                    
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                            <div >
                                <input id="e_dob" type="text" onfocus="(this.type='date')" class="form-control" placeholder="Ngày sinh" name="dob" value="{{ old('dob') }}" >

                                @if ($errors->has('dob'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group">
                            <div >
                                <input id="e_gender" type="text" class="form-control" placeholder="Giới tính" name="gender" >

                                 @if ($errors->has('dob'))
                                     <span class="help-block">
                                      <br>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="e_submit" type="submit" name="Register" class="loginmodal-submit" value="Chỉnh sửa khách hàng">
                        </div>
                         <div class="col-md-6 col-sm-6 col-xs-12  form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <!-- <a data-toggle="tooltip" data-placement="top"  class="pull-right btn btn-primary btn-xs" href="{{ route('addUserMainSubmit') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('edit-form').submit();"><i class="fa fa-folder"></i> View  </a> -->
                            <a   class="btn btn-danger btn-xs pull-right" onclick="deleteusers()"><i class="fa fa-trash-o"></i> Xóa </a>

                            
                            <a href="#" id="typeEditView" class="btn btn-info btn-xs pull-right" onclick="addReadonly()"><i class="fa fa-pencil"></i>Sửa</a>
                                   
                        </div>
                        
                        
                    </form>
                    <!-- <a href="{{ route('editUserMainSubmit') }}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-backdrop="static" data-target="#viewUserMainmodal""><i class="fa fa-folder"></i> View </a> -->
                    
          </div>
        </div>
      </div>
      <!-- form post--> 
      
                        
      
      </form>
            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    ©2017 All Rights Reserved. Privacy and Terms
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div> -->
    </div>

   <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="js/custom.min.js"></script>
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- My Cutom Scripts -->
    <script src="js/custom-scripts.js"></script>
    @if($errors->first('typePost')=="addUser")
      @if ($errors->has('username') )
    <script type="text/javascript">  
    $(document).ready(function () {
      $('#addUserMainmodal').modal('show');
    }); </script>
    @endif  @if ($errors->has('password'))
      <<script type="text/javascript">  
    $(document).ready(function () {
      $('#addUserMainmodal').modal('show');
    }); </script>
    @endif @if ($errors->has('email'))
      <script type="text/javascript">  
    $(document).ready(function () {
      $('#addUserMainmodal').modal('show');
    }); </script>
    @endif
    @endif
    @if($errors->first('typePost') =="updateUser"))
      @if ($errors->has('username') )
    <script type="text/javascript">  
    $(document).ready(function () {
      $('#viewUserMainmodal').modal('show');
    }); </script>
    @endif  @if ($errors->has('password'))
     <script type="text/javascript">  
    $(document).ready(function () {
      $('#viewUserMainmodal').modal('show');
    }); </script>
    @endif @if ($errors->has('email'))
      <script type="text/javascript">  
    $(document).ready(function () {
      $('#viewUserMainmodal').modal('show');
    }); </script>
    @endif
    @endif


@if( ! empty($messagesResult))
    @if ($messagesResult=="fails")
      <script type="text/javascript">  
      window.alert("Thất bại");
    </script>
    @endif @if ($messagesResult=="successful")
     <script type="text/javascript">  
      alert("thành công");
    </script>
    @endif
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

function openViewdialog(){

}
function openEditdialog(){

}
function deleteusers(){
    document.getElementById("typePost").setAttribute("value", "deleteUser");
    var l = document.getElementById('e_submit');
    l.click();

}
function addReadonly(){

    if(document.getElementById("typeEditView").innerHTML == "Sửa")
    {
    document.getElementById("e_submit").setAttribute("type", "submit");
    document.getElementById("typeEditView").innerHTML = "Xem";
    document.getElementById("e_first_name").removeAttribute("readonly");
    document.getElementById("e_last_name").removeAttribute("readonly");
    document.getElementById("e_email").removeAttribute("readonly");
    document.getElementById("e_phone_number").removeAttribute("readonly");
    document.getElementById("e_username").removeAttribute("readonly");
    document.getElementById("e_country").removeAttribute("readonly");
    document.getElementById("e_dob").removeAttribute("readonly");
    document.getElementById("e_gender").removeAttribute("readonly");

    // document.getElementById("e_submit").setAttribute("type", "submit");
    // document.getElementById("e_first_name").removeAttribute("readonly");
    // document.getElementById("e_last_name").removeAttribute("readonly");
    // document.getElementById("e_email").removeAttribute("readonly");
    // document.getElementById("e_phone_number").removeAttribute("readonly");
    // document.getElementById("e_username").removeAttribute("readonly");
    // document.getElementById("e_country").removeAttribute("readonly");
    // document.getElementById("e_dob").removeAttribute("readonly");
    // document.getElementById("e_gender").removeAttribute("readonly");
    return;    
}
else(document.getElementById("typeEditView").innerHTML == "Xem")
{
    document.getElementById("typeEditView").innerHTML = "Sửa";
    document.getElementById("e_submit").setAttribute("type", "hidden");

    document.getElementById("e_first_name").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_last_name").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_email").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_phone_number").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_username").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_country").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_dob").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_gender").setAttributeNode(document.createAttribute("readonly"));
}
   

}

function removeReadonly(){
    


    document.getElementById("e_submit").setAttribute("type", "submit");
    document.getElementById("typeEditView").innerHTML = "Xem";
    document.getElementById("e_first_name").removeAttribute("readonly");
    document.getElementById("e_last_name").removeAttribute("readonly");
    document.getElementById("e_email").removeAttribute("readonly");
    document.getElementById("e_phone_number").removeAttribute("readonly");
    document.getElementById("e_username").removeAttribute("readonly");
    document.getElementById("e_country").removeAttribute("readonly");
    document.getElementById("e_dob").removeAttribute("readonly");
    document.getElementById("e_gender").removeAttribute("readonly");
     // document.getElementById("typeEditView").setAttribute("onclick", "addReadonly())");
    

}
function showDataView(idUser, first_name, last_name,email,phone_number,username,country,dob,gender){
      
   
    document.getElementById("typeEditView").innerHTML = "Sửa";
    document.getElementById("e_submit").setAttribute("type", "hidden");
    document.getElementById("e_first_name").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_last_name").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_email").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_phone_number").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_username").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_country").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_dob").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_gender").setAttributeNode(document.createAttribute("readonly")); 

    document.getElementById("idUser").setAttribute("value", idUser);
    document.getElementById("e_first_name").setAttribute("value", first_name);
    document.getElementById("e_last_name").setAttribute("value", last_name); 
    document.getElementById("e_email").setAttribute("value", email); 
    document.getElementById("e_phone_number").setAttribute("value", phone_number); 
    document.getElementById("e_username").setAttribute("value", username);
    document.getElementById("e_country").setAttribute("value", country); 
    document.getElementById("e_dob").setAttribute("value",dob); 
    document.getElementById("e_gender").setAttribute("value", gender);

}

function showDataEdit(idUser, first_name, last_name,email,phone_number,username,country,dob,gender){
   
    document.getElementById("e_submit").setAttribute("type", "submit");
    document.getElementById("typeEditView").innerHTML = "Xem";
    document.getElementById("e_first_name").removeAttribute("readonly");
    document.getElementById("e_last_name").removeAttribute("readonly");
    document.getElementById("e_email").removeAttribute("readonly");
    document.getElementById("e_phone_number").removeAttribute("readonly");
    document.getElementById("e_username").removeAttribute("readonly");
    document.getElementById("e_country").removeAttribute("readonly");
    document.getElementById("e_dob").removeAttribute("readonly");
    document.getElementById("e_gender").removeAttribute("readonly");

    document.getElementById("idUser").setAttribute("value", idUser);
    document.getElementById("e_first_name").setAttribute("value", first_name);
    document.getElementById("e_last_name").setAttribute("value", last_name); 
    document.getElementById("e_email").setAttribute("value", email); 
    document.getElementById("e_phone_number").setAttribute("value", phone_number); 
    document.getElementById("e_username").setAttribute("value", username);
    document.getElementById("e_country").setAttribute("value", country); 
    document.getElementById("e_dob").setAttribute("value",dob); 
    document.getElementById("e_gender").setAttribute("value", gender);

}
</script>
</body>

</html>
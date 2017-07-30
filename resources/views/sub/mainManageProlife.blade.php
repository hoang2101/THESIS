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
    <link href="{!! asset('vendors/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('vendors/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('vendors/nprogress/nprogress.css') !!}" rel="stylesheet">
    <link href="{!! asset('vendors/iCheck/skins/flat/green.css') !!}" rel="stylesheet">

    <link href="{!! asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('vendors/jqvmap/dist/jqvmap.min.css') !!}" rel="stylesheet" />
    <link href="{!! asset('vendors/bootstrap-daterangepicker/daterangepicker.css') !!}" rel="stylesheet">
    <link href="{!! asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') !!}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/custommanage.css') !!}"> 
    <!-- Font Awesome -->
   

    <!-- Custom Theme Style -->
    <link rel="stylesheet" type="text/css" href="{!! asset('css/style_namage.css') !!}"></link>
    <link href="{!! asset('css/custom.min.css') !!}" rel="stylesheet">

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
                        <div  class="profile_pic">
                            @if(Auth::guard('account')->user()->image_link == null)
                            <img  src="{!! asset('img/avatar_null.png') !!}" alt="..." class="img-circle profile_img">
                           
                            @else
                            <img  src="{{Auth::guard('account')->user()->image_link}}" alt="..." class="img-circle profile_img">
                            @endif
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{ Auth::guard('account')->user()->first_name }} {{ Auth::guard('account')->user()->last_name }} </h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                             @if(Auth::guard('account')->user()->type == 3)
                            <h3>Quản trị</h3>
                            <ul class="nav side-menu">
                                <li><a href="{{ route('subHome',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-home"></i> Home </a>
                                </li>
                                
                                <li><a  href="{{ route('subManage',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-user"></i> Quản lý khách hàng</a>
                                 <li><a  href="{{ route('subStaffManage',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-user"></i> Quản lý Nhân viên</a>
                                 <li><a  href="{{ route('subRoomManage',['subConfig' =>$info['subdomain']]) }}"><i class="fa fa-university"></i> Quản lý phòng</a>
                                 <li><a href="{{ route('subServiceManage',['subConfig' =>$info['subdomain']]) }}"><i class="fa fa-server"></i> Quản lý dịch vụ</a>
                                 <li><a  class="active" href="{{ route('subProfile',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-user"></i> Quản lý Tài khoản</a></li>
                                <li><a  href="{{ route('subConfig',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-cogs"></i> Cài Đặt Web</a>
                                <li><a  href="{{ route('subReportManage',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-cog"></i>Thống kê</a>
                                <!-- <li><a class="active"><i class="fa fa-user" "></i> Quản lý Quản trị khách sạn</a>
                                    
                                </li>
                                <li><a href="{{ route('mainProfile') }}"><i class="fa fa-desktop"></i> Quản lý tài khoản</a></li> -->
                               <!--  <li><a><i class="fa fa-table"></i>zxczxc  </a>
                                    
                                </li>
                                <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="chartjs.html">Chart JS</a></li>
                                        <li><a href="chartjs2.html">Chart JS2</a></li>
                                        <li><a href="morisjs.html">Moris JS</a></li>
                                        <li><a href="echarts.html">ECharts</a></li>
                                        <li><a href="other_charts.html">Other Charts</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                                        <li><a href="fixed_footer.html">Fixed Footer</a></li>
                                    </ul>
                                </li> -->
                            </ul>
                        @elseif(Auth::guard('account')->user()->type == 4)
                            <h3>Nhân viên</h3>
                            <ul class="nav side-menu">
                               <li><a href="{{ route('subHome',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-home"></i> Home </a>
                                </li>
                                
                                <li><a  href="{{ route('subManage',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-desktop"></i> Quản lý khách hàng</a>
                                <li><a   href="{{ route('subBookManage',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-desktop"></i> Quản lý đặt phòng</a>
                                <li><a   href="{{ route('subSpendManage',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-usd"></i> Quản lý chi</a>
                                <li><a class="active" href="{{ route('subProfile',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-user"></i> Quản lý Tài khoản</a>


                               
                            </ul>
                        @endif
                           
                        </div>
                        

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen" onclick="toggleFull()">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        
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
                                <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                @if(Auth::guard('account')->user()->image_link == null)
                                <img src="{!! asset('img/avatar_null.png') !!}" alt="">{{ Auth::guard('account')->user()->first_name }} {{Auth::guard('account')->user()->last_name }}
                                @else
                                <img src="{{Auth::guard('account')->user()->image_link}}" alt="">{{ Auth::guard('account')->user()->first_name }} {{ Auth::guard('account')->user()->last_name }}
                                @endif
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="{{ route('subProfile',['subdomain' =>$info['subdomain']]) }}"> Hồ sơ</a></li>
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
                                                            
                                                            <input type="text" class="form-control has-feedback-left"  id="first_name" name="first_name" placeholder="Họ" value="{{$users->first_name}}" required>
                                                           
                                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                           
                                                            <input type="text" class="form-control has-feedback-left"  id="last_name" name="last_name" placeholder="Tên" value="{{$users->last_name}}" required>
                                                           
                                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                            
                                                            <input type="text" class="form-control has-feedback-left"  id="email" name="email" placeholder="Email" value="{{$users->email}}" required>
                                                           
                                                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true" ></span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                            
                                                            <input type="number" class="form-control has-feedback-left"  id="phone_number" name="phone_number" placeholder="Số điện thoại" value="{{$users->phone_number}}">
                                                            
                                                          
                                                            <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                           
                                                            <input type="text" class="form-control has-feedback-left"  id="country" name="country" placeholder="Quốc gia" value="{{$users->country}}">
                                                           
                                                            <span class="fa fa-globe form-control-feedback left" aria-hidden="true"></span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                           
                                                            <input type="text" onfocus="(this.type='date')" class="form-control has-feedback-left"   id="dob" name="dob" placeholder="Ngày sinh" value="{{$users->dob}}">
                                                           
                                                            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                                        </div>
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                            
                                                            <input type="text"  class="form-control has-feedback-left"  id="gender" name="gender" placeholder="Giới tính" value="{{$users->gender}}">
                                                           
                                                            <span class="fa fa-transgender form-control-feedback left" aria-hidden="true"></span>
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
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('current_pass') ? ' has-error' : '' }}">
                                                            <label>Nhập mật khẩu củ</label>
                                                            <input type="password" class="form-control has-feedback-left" id="current_pass" name="current_pass"  value="" required> 
                                                            
                                                             <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                                                             @if ($errors->has('current_pass'))
                                                          <span class="help-block has-error">
                                                                <strong class="messageError">{{ $errors->first('current_pass') }}</strong>
                                                            </span>
                                                              @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback  {{ $errors->has('now_pass') ? ' has-error' : '' }}">
                                                            <label>Nhập mật khẩu mới</label>
                                                            <input type="password" class="form-control has-feedback-left"  id="now_pass" name="now_pass"  value="" required>
                                                           
                                                            <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                                                             @if ($errors->has('now_pass'))
                                                              <span class="help-block has-error">
                                                                    <strong class="messageError">{{ $errors->first('now_pass') }}</strong>
                                                                </span>
                                                                  @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback ">
                                                           <label>Nhập lại mật khẩu</label>
                                                            <input type="password" class="form-control has-feedback-left"  id="last_name" name="now_pass_confirmation"  value="" required>
                                                           
                                                             <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>

      
                        
      
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
    <script src="{!! asset('vendors/jquery/dist/jquery.min.js') !!}"></script>
    <!-- Bootstrap -->
    <script src="{!! asset('vendors/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
    <!-- FastClick -->
    <script src="{!! asset('vendors/fastclick/lib/fastclick.js') !!}"></script>
    <!-- NProgress -->
    <script src="{!! asset('vendors/nprogress/nprogress.js') !!}"></script>
    <!-- Chart.js -->
    <script src="{!! asset('vendors/Chart.js/dist/Chart.min.js') !!}"></script>
    <!-- gauge.js -->
    <script src="{!! asset('vendors/gauge.js/dist/gauge.min.js') !!}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{!! asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') !!}"></script>
    <!-- iCheck -->
    <script src="{!! asset('vendors/iCheck/icheck.min.js') !!}"></script>
    <!-- Skycons -->
    <script src="{!! asset('vendors/skycons/skycons.js') !!}"></script>
    <!-- Flot -->
    <script src="{!! asset('vendors/Flot/jquery.flot.js') !!}"></script>
    <script src="{!! asset('vendors/Flot/jquery.flot.pie.js') !!}"></script>
    <script src="{!! asset('vendors/Flot/jquery.flot.time.js') !!}"></script>
    <script src="{!! asset('vendors/Flot/jquery.flot.stack.js') !!}"></script>
    <script src="{!! asset('vendors/Flot/jquery.flot.resize.js') !!}"></script>
    <!-- Flot plugins -->
    <script src="{!! asset('vendors/flot.orderbars/js/jquery.flot.orderBars.js') !!}"></script>
    <script src="{!! asset('vendors/flot-spline/js/jquery.flot.spline.min.js') !!}"></script>
    <script src="{!! asset('vendors/flot.curvedlines/curvedLines.js') !!}"></script>
    <!-- DateJS -->
    <script src="{!! asset('vendors/DateJS/build/date.js') !!}"></script>
    <!-- JQVMap -->
    <script src="{!! asset('vendors/jqvmap/dist/jquery.vmap.js') !!}"></script>
    <script src="{!! asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js') !!}"></script>
    <script src="{!! asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') !!}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{!! asset('vendors/moment/min/moment.min.js') !!}"></script>
    <script src="{!! asset('vendors/bootstrap-daterangepicker/daterangepicker.js') !!}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{!! asset('js/custom.min.js') !!}"></script>
    <!-- Datatables -->
    <script src="{!! asset('vendors/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}"></script>
    <script src="{!! asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') !!}"></script>
    <script src="{!! asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') !!}"></script>
    <script src="{!! asset('vendors/datatables.net-buttons/js/buttons.flash.min.js') !!}"></script>
    <script src="{!! asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') !!}"></script>
    <script src="{!! asset('vendors/datatables.net-buttons/js/buttons.print.min.js') !!}"></script>
    <script src="{!! asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') !!}"></script>
    <script src="{!! asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') !!}"></script>
    <script src="{!! asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js') !!}"></script>
    <script src="{!! asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') !!}"></script>
    <script src="{!! asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js') !!}"></script>
    <script src="{!! asset('vendors/jszip/dist/jszip.min.js') !!}"></script>
    <script src="{!! asset('vendors/pdfmake/build/pdfmake.min.js') !!}"></script>
    <script src="{!! asset('vendors/pdfmake/build/vfs_fonts.js') !!}"></script>
    <!-- My Cutom Scripts -->
    <script src="{!! asset('js/custom-scripts.js') !!}"></script>

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


@if (session('messagesResult'))
   <script type="text/javascript">  
      alert(" {{ session('messagesResult') }}");
    </script>
   
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
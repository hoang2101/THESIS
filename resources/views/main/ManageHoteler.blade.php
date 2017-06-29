<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quản lý hệ thống khách sạn</title>

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
                            <img src="{{Auth::user()->image_link}}" alt="..." class="img-circle profile_img">
                           
                            @else
                            <img src="img/avatar_null.png" alt="..." class="img-circle profile_img">
                            @endif
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>System Admin</h3>
                            <ul class="nav side-menu">
                                <li><a href="{{ route('mainHome') }}"><i class="fa fa-home"></i> Home </a>
                                </li>
                                
                                <li><a class="active"><i class="fa fa-desktop"></i> Quản lý khách sạn</a>
                                <li><a href="{{ route('mainManageGovermHoteler') }}"><i class="fa fa-user" "></i> Quản lý Quản trị khách sạn</a></li>
                                 <li><a href="{{ route('mainProfile') }}"><i class="fa fa-user" "></i> Quản lý tài khoản</a></li>
                                <li><a href="{{ route('mainReport') }}"><i class="fa fa-cog"></i> Thống kê </a></li>
                                

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
                        </div>
                        <!-- <div class="menu_section">
                            <h3>Live On</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="e_commerce.html">E-commerce</a></li>
                                        <li><a href="projects.html">Projects</a></li>
                                        <li><a href="project_detail.html">Project Detail</a></li>
                                        <li><a href="contacts.html">Contacts</a></li>
                                        <li><a href="profile.html">Profile</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="page_403.html">403 Error</a></li>
                                        <li><a href="page_404.html">404 Error</a></li>
                                        <li><a href="page_500.html">500 Error</a></li>
                                        <li><a href="plain_page.html">Plain Page</a></li>
                                        <li><a href="login.html">Login Page</a></li>
                                        <li><a href="pricing_tables.html">Pricing Tables</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="#level1_1">Level One</a>
                                            <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                                                <ul class="nav child_menu">
                                                    <li class="sub_menu"><a href="level2.html">Level Two</a>
                                                    </li>
                                                    <li><a href="#level2_1">Level Two</a>
                                                    </li>
                                                    <li><a href="#level2_2">Level Two</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="#level1_2">Level One</a>
                                            </li>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                            </ul>
                        </div>
 -->
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
                                <img src="{{Auth::user()->image_link}}" alt="">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
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
            <div class="right_col" role="main">

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Danh sách khách sạn<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-backdrop="static" data-target="#addHotelMainmodal"><i class="fa fa-folder"></i> Thêm khách sạn</a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   

                    
                    <table id="responsiveHotel" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th id="cel1">ID</th>
                          <th white-space:pre-line" id="cel5">Tên khách sạn</th>
                          <th id="cel10">Tên miền</th>
                          <th id="cel10">Ngày hết hạn</th>
                          <th id="cel5">Tổng số phòng</th>
                          <th id="cel5">Tổng booking</th>
                          <th class="nosort"  id="cel5">Manage</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($hotels as $key => $hotel)
                      
                            <tr>
                                <td>{{$hotel->hotel_id}}</td>
                                <td>{{$hotel->hotel_name}}</td>
                                <td>{{$hotel->hotel_url}}</td>
                                <td>{{$hotel->expire_date}}</td>
                                <td>{{$hotel->total_room}}</td>
                                <td>{{$totalbook[$key]}}</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-xs" onclick="showHotelView('{{$hotel->hotel_id}}','{{$hotel->hotel_name}}', '{{$hotel->hotel_url}}', '{{$hotel->expire_date}}', '{{$hotel->total_room}}') " data-toggle="modal" data-backdrop="static" data-target="#viewHotelMainmodal "  ><i class="fa fa-folder"></i> View </a>
                                    <a href="#" class="btn btn-info btn-xs"  onclick="showHotelEdit('{{$hotel->hotel_id}}','{{$hotel->hotel_name}}', '{{$hotel->hotel_url}}', '{{$hotel->expire_date}}' , '{{$hotel->total_room}}') ;" data-toggle="modal" data-backdrop="static" data-target="#viewHotelMainmodal"><i class="fa fa-pencil"></i> Edit </a>

                                    <a data-toggle="tooltip" data-placement="top"  class="btn btn-danger btn-xs"
                                            onclick="event.preventDefault();
                                                     document.getElementById('deleteHotel{{$hotel->hotel_id}}').submit();"><i class="fa fa-trash-o"></i> Delete </a>

                                    <form id="deleteHotel{{$hotel->hotel_id}}" action="{{ route('addHotelHotelerSubmit') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            <input hidden id="typePosts"" name="typePost" value="deleteHotel">
                                            <input hidden id="id" name="id" value="{{$hotel->hotel_id}}">
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                       

                        
                      
                        
                       
                      </tbody>
                    </table>
                    
                    
                  </div>
                </div>
              </div>

            </div>
            <!-- /page content -->
<!-- modal dialog  -->
<div class="modal fade" id="addHotelMainmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
        <div class="loginmodal-container">
        <button type="button" class="close" data-dismiss="modal" onclick="removeMessage()" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          <h1>Thêm khách sạn</h1><br>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('addHotelHotelerSubmit') }}">
                        {{ csrf_field() }}
                        <input hidden id="addtypePost"" name="typePost" value="addHotel">
                        <div class="form-group{{ $errors->has('hotel_name') ? ' has-error' : '' }}">
                            <div >
                                <input id="hotel_name" type="text" class="form-control" placeholder="Tên khách sạn" name="hotel_name" value="{{ old('hotel_name') }}" required autofocus>

                                @if ($errors->has('hotel_name'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('hotel_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('hotel_url') ? ' has-error' : '' }}">
                            <div >
                                <input id="hotel_url" type="text" class="form-control" placeholder="Tên miền" name="hotel_url" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('hotel_url'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('hotel_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <div >
                                <input id="expire_date" type="text" onfocus="(this.type='date')" class="form-control" placeholder="Gói" name="expire_date" value="{{ old('email') }}" required>

                                @if ($errors->has('expire_date'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('expire_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->
                        <div class="form-group">
                            <div >
                            <select id="expire_date" name="expire_date" placeholder="Gói" required>
                                    <option value="" disabled selected>Chọn gói khách sạn</option>
                                    <option value="1">BASIC - 1 tháng</option>
                                    <option value="2">SILVER - 2 tháng</option>
                                    <option value="3">GOLD - 4 tháng</option>
                                    <option value="4">VIP - 6 tháng</option>
                            </select>
                               
                            </div>
                        </div>

                        
                        
                         <div class="form-group{{ $errors->has('total_room') ? ' has-error' : '' }}">
                            <div >
                                
                                 <select id="total_room" name="total_room" placeholder="Gói" required>
                                    <option value="" disabled selected>Chọn Số phòng</option>
                                    <option value="10">10 phòng</option>
                                    <option value="20">20 phòng</option>
                                    <option value="50">50 phòng</option>
                                    <option value="100">100 phòng</option>
                                    <option value="200">200 phòng</option>
                                    <option value="500">500 phòng</option>
                                </select>
                            </div>
                        </div>

                        
                        <input type="submit" name="Register" id="addhotelsubmit" class=" loginmodal-submit" value="Thêm khách sạn">
                       
                    </form>
          </div>
        </div>
      </div>
       <div class="modal fade" id="viewHotelMainmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
        <div class="loginmodal-container">
        <button type="button" class="close" id="closeDialog" onclick="removeMessage()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          <h1>Xem chi tiết khách sạn</h1><br>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('addHotelHotelerSubmit') }}">
                        {{ csrf_field() }}
                
                        <input hidden id="typePost"" name="typePost" value="updateHotel">
                        <input hidden id="idHotel" name="id" value="">
                        <div class="form-group{{ $errors->has('hotel_name') ? ' has-error' : '' }}">
                            <div >
                                <input id="e_hotel_name" type="text" class="form-control" placeholder="Tên khách sạn" name="hotel_name" value="{{ old('hotel_name') }}" required autofocus>

                                @if ($errors->has('hotel_name'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('hotel_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('hotel_url') ? ' has-error' : '' }}">
                            <div >
                                <input id="e_hotel_url" type="text" class="form-control" placeholder="Tên miền" name="hotel_url" value="{{ old('hotel_url') }}" required autofocus>

                                @if ($errors->has('hotel_url'))
                                    <span class="help-block">
                                        <strong class="messageError"> {{ $errors->first('hotel_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div >
                            <input readonly id="e_expire_date1" type="date" class="" placeholder="Ngày hết hạn" name="expire_date2" value="{{ old('expire_date') }}" >
                            <select  id="e_expire_date2" name="expire_date" placeholder="Gói">

                                    <option value="0"  selected>Mua thêm</option>
                                    <option value="1">BASIC - 1 tháng</option>
                                    <option value="2">SILVER - 2 tháng</option>
                                    <option value="3">GOLD - 4 tháng</option>
                                    <option value="4">VIP - 6 tháng</option>
                            </select>
                               
                            </div>
                        </div>
                        <!-- <div class=" disable form-group{{ $errors->has('expire_date') ? ' has-error' : '' }}">
                            <div >
                                

                                @if ($errors->has('expire_date'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('expire_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  -->

                        
                        
                        <div class="form-group{{ $errors->has('total_room') ? ' has-error' : '' }}">
                            <div >
                                <input readonly  id="e_total_room1" type="text" class="" placeholder="Tổng số phòng" name="total_room" value="{{ old('total_room') }}" >
                                 <select id="e_total_room2" name="total_room" placeholder="Gói" required>
                                    <option value="" disabled selected>Chọn Số phòng</option>
                                    <option value="10">10 phòng</option>
                                    <option value="20">20 phòng</option>
                                    <option value="50">50 phòng</option>
                                    <option value="100">100 phòng</option>
                                    <option value="200">200 phòng</option>
                                    <option value="500">500 phòng</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12  form-group>">
                            <input id="e_submit" type="submit" name="Register" class="btn btn-info btn-xs pull-left" value="OK">
                        </div>
                         <div class="col-md-6 col-sm-6 col-xs-12  form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <a   class="btn btn-danger btn-xs pull-right" onclick="deleteHotel()"><i class="fa fa-trash-o"></i> Delete </a>

                            
                            <a href="#" id="typeEditView" class="btn btn-info btn-xs pull-right" onclick="addReadHotelonly()"><i class="fa fa-pencil"></i>Edit</a>
                                   
                        </div>
                        
                        
                    </form>
                    
          </div>
        </div>
      </div>

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    ©2017 All Rights Reserved. Privacy and Terms
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
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
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <!-- My Cutom Scripts -->
    <script src="js/custom-scripts.js"></script>
<script>
        paypal.Button.render({

            env: 'production', // Or 'sandbox',

            commit: true, // Show a 'Pay Now' button

            payment: function() {
                // Set up the payment here
            },

            onAuthorize: function(data, actions) {
                // Execute the payment here
           }

        }, '#addhotelsubmit');
    </script>
   
    <!-- //gets table -->
<script src="js/custom-scripts.js"></script>
    @if($errors->first('typePost')=="addHotel")
      @if ($errors->has('hotel_url') )
    <script type="text/javascript">  
    $(document).ready(function () {
      $('#addHotelMainmodal').modal('show');
    }); </script>
    @endif  
    @endif
    @if($errors->first('typePost') =="updateHotel"))
      @if ($errors->has('hotel_url') )
    <script type="text/javascript">  
    $(document).ready(function () {
      $('#viewHotelMainmodal').modal('show');
    }); </script>
    @endif 
    @endif


@if(!empty($messagesResult))
   
     <script type="text/javascript">  
     alert("abc");
      alert("{{$messagesResult}}");
    </script>
    
@endif





<script type="text/javascript">
    $('#responsiveHotel').DataTable( {
    responsive: true
} );
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
function deleteHotel(){
    document.getElementById("typePost").setAttribute("value", "deleteHotel");
    var l = document.getElementById('e_submit');
    l.click();

}
function addReadHotelonly(){

    if(document.getElementById("typeEditView").innerHTML == "Sửa")
    {
    document.getElementById("e_submit").setAttribute("type", "submit");
    document.getElementById("typeEditView").innerHTML = "Xem";
    document.getElementById("e_hotel_name").removeAttribute("readonly");
    document.getElementById("e_hotel_url").removeAttribute("readonly");
    document.getElementById("e_expire_date1").setAttributeNode(document.createAttribute("hidden"));
    document.getElementById("e_expire_date2").removeAttribute("hidden");
    document.getElementById("e_total_room1").setAttributeNode(document.createAttribute("hidden"));
    document.getElementById("e_total_room2").removeAttribute("hidden");

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
    document.getElementById("e_hotel_name").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_hotel_url").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_expire_date1").removeAttribute("hidden");
    document.getElementById("e_expire_date2").setAttributeNode(document.createAttribute("hidden"));
    document.getElementById("e_total_room1").removeAttribute("hidden");
    document.getElementById("e_total_room2").setAttributeNode(document.createAttribute("hidden"));
}
   

}

function removeReadHotelonly(){
    


    document.getElementById("e_submit").setAttribute("type", "submit");
    document.getElementById("typeEditView").innerHTML = "Xem";
    document.getElementById("e_hotel_name").removeAttribute("readonly");
    document.getElementById("e_hotel_url").removeAttribute("readonly");
    document.getElementById("e_expire_date").removeAttribute("readonly");
    document.getElementById("e_total_room").removeAttribute("readonly");
     // document.getElementById("typeEditView").setAttribute("onclick", "addReadonly())");
    

}
function showHotelView(idHotel, hotel_name,hotel_url,expire_date,total_room){
      
   
    document.getElementById("typeEditView").innerHTML = "Sửa";
    document.getElementById("e_submit").setAttribute("type", "hidden");
    document.getElementById("e_hotel_name").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_hotel_url").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_expire_date1").removeAttribute("hidden");
    document.getElementById("e_expire_date2").setAttributeNode(document.createAttribute("hidden"));
    document.getElementById("e_total_room1").removeAttribute("hidden");
    document.getElementById("e_total_room2").setAttributeNode(document.createAttribute("hidden"));


    document.getElementById("idHotel").setAttribute("value", idHotel);
    document.getElementById("e_hotel_name").setAttribute("value", hotel_name); 
    document.getElementById("e_hotel_url").setAttribute("value", hotel_url); 
    document.getElementById("e_expire_date1").setAttribute("value", expire_date); 
    document.getElementById("e_total_room1").setAttribute("value", total_room);

}

function showHotelEdit(idHotel, hotel_name,hotel_url,expire_date,total_room){
   
    document.getElementById("e_submit").setAttribute("type", "submit");
    document.getElementById("typeEditView").innerHTML = "Xem";
    document.getElementById("e_hotel_name").removeAttribute("readonly");
    document.getElementById("e_hotel_url").removeAttribute("readonly");
    document.getElementById("e_expire_date1").setAttributeNode(document.createAttribute("hidden"));
    document.getElementById("e_expire_date2").removeAttribute("hidden");
    document.getElementById("e_total_room1").setAttributeNode(document.createAttribute("hidden"));
    document.getElementById("e_total_room2").removeAttribute("hidden");

    document.getElementById("idHotel").setAttribute("value", idHotel);
    document.getElementById("e_hotel_name").setAttribute("value", hotel_name); 
    document.getElementById("e_hotel_url").setAttribute("value", hotel_url); 
    document.getElementById("e_expire_date1").setAttribute("value", expire_date); 
    document.getElementById("e_total_room1").setAttribute("value", total_room); 

}
</script>
    

   @if (session('messagesResult'))
   <script type="text/javascript">  
      alert(" {{ session('messagesResult') }}");
    </script>
   
    @endif
    

</body>

</html>
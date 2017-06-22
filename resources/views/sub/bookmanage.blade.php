<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quản lý khách hàng</title>

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
    <link rel="stylesheet" type="text/css" href="{!! asset('css/custommanage.css') !!}"> 

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-modx"></i> <span>QUẢN LÝ KHÁCH SẠN</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            @if(Auth::guard('account')->user()->image_link == null)
                            <img src="{!! asset('img/avatar_null.png') !!}" alt="..." class="img-circle profile_img">
                           
                            @else
                            <img src="{!! asset('img/User/' .Auth::guard('account')->user()->image_link) !!}" alt="..." class="img-circle profile_img">
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
                                
                                <li><a class="active" href="{{ route('subManage',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-user"></i> Quản lý khách hàng</a>
                                 <li><a  href="{{ route('subStaffManage',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-user"></i> Quản lý Nhân viên</a>
                                 <li><a  href="{{ route('subRoomManage',['subConfig' =>$info['subdomain']]) }}"><i class="fa fa-university"></i> Quản lý phòng</a>
                                 <li><a href="{{ route('subServiceManage',['subConfig' =>$info['subdomain']]) }}"><i class="fa fa-server"></i> Quản lý dịch vụ</a>
                                 <li><a  href="{{ route('subProfile',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-user"></i> Quản lý Tài khoản</a>
                                 <li><a  href="{{ route('subProfile',['subConfig' =>$info['subdomain']]) }}"><i class="fa fa-cogs"></i> Cài Đặt Web</a>
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
                                
                                <li><a href="{{ route('subManage',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-desktop"></i> Quản lý khách hàng</a>
                                <li><a   class="active"  href="{{ route('subBookManage',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-desktop"></i> Quản lý đặt phòng</a>
                              
                                <li><a  href="{{ route('subProfile',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-user"></i> Quản lý Tài khoản</a>

                               
                            </ul>
                        @endif
                           
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
                        </div> -->

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen" onclick="toggleFull()">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
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
                               <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                @if(Auth::guard('account')->user()->image_link == null)
                                <img src="{!! asset('img/avatar_null.png') !!}" alt="">{{ Auth::guard('account')->user()->first_name }} {{Auth::guard('account')->user()->last_name }}
                                @else
                                <img src="{!! asset('img/User/' .Auth::guard('account')->user()->image_link) !!}" alt="">{{ Auth::guard('account')->user()->first_name }} {{ Auth::guard('account')->user()->last_name }}
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
            <div class="right_col" role="main">
<!-- <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Danh sách Khách hàng<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <a href="#" class="btn btn-primary btn-xs" data-target="#addCheckinMainmodal" data-toggle="modal" data-backdrop="static" ><i class="fa fa-folder"></i> Đặt phòng </a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <form id="demo-form2" method="POST" action="{{ route('subReportManageSubmit',['subdomain' =>$info['subdomain']])}}" data-parsley-validate class="form-inline form-label-left">
                    {{ csrf_field() }}
                    
                                <div class="col-md-2 col-sm-2 col-xs-12  form-group{{ $errors->has('date_checkin') ? ' has-error' : '' }}">
                                <div >
                                
                               <label>Hiẻn thì từ</label>

                                </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12  form-group{{ $errors->has('date_checkin') ? ' has-error' : '' }}">
                                <div >
                                
                                <input id="date_checkin" type="date"  class="" placeholder="Ngày checkin" name="date_checkin" value="{{ old('date_checkin') }}" required >

                                
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-12" style="!important"  form-group{{ $errors->has('date_checkin') ? ' has-error' : '' }}">
                                <div >
                                
                               <label>  Đến</label>

                                </div>
                                </div>
                              
                                <div class="col-md-3 col-sm-3 col-xs-12  form-group{{ $errors->has('date_checkin') ? ' has-error' : '' }}">
                                <div >
                                
                                <input id="date_checkin" type="date"  class="" placeholder="Ngày checkin" name="date_checkin" value="{{ old('date_checkin') }}" required >

                                
                                </div>
                            </div>
                                <div class="form-group">
                                        
                                
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="submit" class="btn"  name="submit"  value="Hiển thị">
                                </div>
                                </div>
                       

                    </form>
                    <table id="responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th id="cel5"></th>
                            <th id="cel5">1</th>
                          <th id="cel10">2</th>
                          <th id="cel10">3</th>
                          <th id="cel10">4</th>
                          <th id="cel10">5</th>
                          <th id="cel10">4</th>
                          <th id="cel10">7</th>
                          <th id="cel10">8</th>
                          <th id="cel10">9</th>
                          <th id="cel10">10</th>
                          <th id="cel10">11</th>
                          <th id="cel10">12</th>
                          <th id="cel10">13</th>
                          <th id="cel10">14</th>
                          <th id="cel10">15</th>
                          <th id="cel10">5</th>
                          <th id="cel10">5</th>
                          <th id="cel10">5</th>
                          <th id="cel10">5</th>
                          <th id="cel10">5</th>
                          <th id="cel10">5</th>
                          <th id="cel10">5</th>
                          <th id="cel10">5</th>
                          <th id="cel10">5</th>
                          <th id="cel10">5</th>
                          <th id="cel10">5</th>
                          <th id="cel10">5</th>
                          <th id="cel10">5</th>
                          <th id="cel10">5</th>
                          <th id="cel10">5</th>
                        </tr>
                      </thead>
                      <tbody>
                    
                      @foreach ($checkins as $checkin)
                    
                            <tr>
                                <td>{{$checkin->booking_id}}</td>
                                <td>{{$checkin->first_name.' '.$checkin->last_name}}</td>
                                <td>{{$checkin->room_id}}</td>
                                <td>{{$checkin->date_from}}</td>
                                <td>{{$checkin->date_to}}</td>
                                <td>{{$checkin->number_people}}</td>
                                <td>{{$checkin->contry}}</td>
                                <td>
                                   
                                </td>
                            </tr>
                        @endforeach
                       

                        
                      
                        
                       
                      </tbody>
                    </table>
                    
                    
                  </div>
                </div>
              </div>
 -->

              <!-- rooômmnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn-->
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Danh sách Khách hàng<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <a href="#" class="btn btn-primary btn-xs" data-target="#addCheckinMainmodal" data-toggle="modal" data-backdrop="static" ><i class="fa fa-folder"></i> Đặt phòng </a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    
                    <table id="responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th id="cel1">ID</th>
                          <th white-space:pre-line" id="cel5">Họ Tên</th>
                          <th id="cel5">phòng</th>
                          <th id="cel10">Ngày đến</th>
                          <th id="cel10">Ngày đi</th>
                          <th id="cel10">Số người</th>
                          <th id="cel10">Quốc gia</th>
                          <th class="nosort"  id="cel5">Quản lý</th>
                        </tr>
                      </thead>
                      <tbody>
                    
                      @foreach ($checkins as $checkin)
                    
                            <tr>
                                <td>{{$checkin->booking_id}}</td>
                                <td>{{$checkin->first_name.' '.$checkin->last_name}}</td>
                                <td>{{$checkin->room_id}}</td>
                                <td>{{$checkin->date_from}}</td>
                                <td>{{$checkin->date_to}}</td>
                                <td>{{$checkin->number_people}}</td>
                                <td>{{$checkin->contry}}</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-xs" onclick="showDataView('{{$checkin->booking_id}}','{{$checkin->room_id}}', '{{$checkin->date_from}}', '{{$checkin->date_to}}', '{{$checkin->first_name}}', '{{$checkin->last_name}}', '{{$checkin->number_people}}', '{{$checkin->contry}}', '{{$checkin->username}}') " data-toggle="modal" data-backdrop="static" data-target="#viewCheckinMainmodal "  ><i class="fa fa-folder"></i>Xem</a>
                                    <a href="#" class="btn btn-info btn-xs"  onclick="showDataEdit('{{$checkin->booking_id}}','{{$checkin->room_id}}', '{{$checkin->date_from}}', '{{$checkin->date_to}}', '{{$checkin->first_name}}', '{{$checkin->last_name}}', '{{$checkin->number_people}}', '{{$checkin->contry}}', '{{$checkin->username}}') ;" data-toggle="modal" data-backdrop="static" data-target="#editCheckinMainmodal"><i class="fa fa-pencil"></i>Sửa</a>

                            <a data-toggle="tooltip" data-placement="top"  class="btn btn-danger btn-xs"
                                            onclick="event.preventDefault();
                                                     document.getElementById('deleteBook{{$checkin->booking_id}}').submit();"><i class="fa fa-trash-o"></i> Xóa </a>

                            <form id="deleteBook{{$checkin->booking_id}}" action="{{ route('subBookManage',['subdomain' =>$info['subdomain']]) }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            <input hidden id="typePosts"" name="typePost" value="deleteBooking">
                                            <input hidden id="id" name="id" value="{{$checkin->booking_id}}">
                                        </form>
                            @if($checkin->date_checkin == null)
                            <a data-toggle="tooltip" data-placement="top"  class="btn btn-info btn-xs"
                                            onclick="event.preventDefault();
                                                     document.getElementById('checkinBook{{$checkin->booking_id}}').submit();"><i class="fa-check-square"></i> Checkin </a>

                            <form id="checkinBook{{$checkin->booking_id}}" action="{{ route('subBookManage',['subdomain' =>$info['subdomain']]) }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            <input hidden id="typePosts"" name="typePost" value="checkinBook">
                                            <input hidden id="id" name="id" value="{{$checkin->booking_id}}">
                                        </form>
                            @endif
                            @if($checkin->date_checkin != null && $checkin->date_checkout == null)
                            <a data-toggle="tooltip" data-placement="top"  class="btn btn-info btn-xs"
                                            onclick="event.preventDefault();
                                                     document.getElementById('checkoutBook{{$checkin->booking_id}}').submit();"><i class="fa-check-square"></i> Checkout </a>

                            <form id="checkoutBook{{$checkin->booking_id}}" action="{{ route('subBookManage',['subdomain' =>$info['subdomain']]) }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            <input hidden id="typePosts"" name="typePost" value="checkoutBook">
                                            <input hidden id="id" name="id" value="{{$checkin->booking_id}}">
                                        </form>
                            @endif
                             @if($checkin->date_checkout != null)
                                <a data-toggle="tooltip" data-placement="top"  class="btn btn-info btn-xs"><i class="fa-check-square"></i> Đã checkout </a>
                             @endif
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
<!-- modal dialog add user -->
<div class="modal fade" id="addCheckinMainmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
        <div class="Registermodal-content">
        <button type="button" class="close" id="closeDialog" onclick="removeMessage()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          <h1>Booking</h1><br>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('subBookManageSubmit', ['subdomain' =>$info['subdomain']]) }}">
                        {{ csrf_field() }}
                
                        <input hidden id="typePost"" name="typePost" value="addbooking">
                         <div class="col-md-6 col-sm-6 col-xs-12  form-group">
                        
                            <div >
                                <input id="first_name" type="text" class="form-control" placeholder="Họ" name="first_name" value="{{ old('first_name') }}" >
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12  form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                            <div >
                                <input id="last_name" type="text" class="form-control" placeholder="Tên" name="last_name" value="{{ old('last_name') }}" required>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12  form-group">
                            <div>
                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @elseif ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group{{ $errors->has('date_checkin') ? ' has-error' : '' }}">
                            <div >
                                <input id="date_checkin" type="text" onfocus="(this.type='date')" class="" placeholder="Ngày checkin" name="date_checkin" value="{{ old('date_checkin') }}" required >

                                
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group{{ $errors->has('date_checkout') ? ' has-error' : '' }}">
                            <div >
                                <input id="date_checkout" type="text"  onfocus="(this.type='date')" class="" placeholder="Ngày checkout" name="date_checkout" value="{{ old('date_checkout') }}" required >
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12  form-group {{ $errors->has('date_checkin') ? ' has-error' : '' }} {{ $errors->has('date_checkout') ? ' has-error' : '' }}">
                            <div>
                                @if ($errors->has('date_checkin'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('date_checkin') }}</strong>
                                    </span>
                                @elseif ($errors->has('date_checkout'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('date_checkout') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class=" col-md-6 col-sm-6 col-xs-12 form-group">
                            <div >
                            <select id="add_type_room" onchange="changetyperoom()" name="type_room" placeholder="Loại phòng" required>
                                    <option value="" disabled selected>Chọn loại phòng</option>
                                   @foreach ($type_rooms as $type_room)
                                   <option value="{{$type_room->type_room_id}}"  >{{$type_room->type_name}}</option>
                                   @endforeach
                            </select>
                               
                            </div>
                        </div>
                        <div class=" col-md-3 col-sm-3 col-xs-6 form-group ">
                            <div >
                            <input id="addroom" type="text" readonly  placeholder="Phòng" name="room" value="" required>
                               
                            </div>
                        </div>
                        
                        <div class=" col-md-3 col-sm-3 col-xs-6 form-group">
                            <div >
                            <select id="add_room_input"  name="froom" onchange="changeaddroom(this)" placeholder="Số Phòng" required>
                                    <option value="-1" disabled selected>Chọn  phòng</option>
                                    <option value="" >clear</option>
                                    
                            </select>
                               
                            </div>
                        </div>
                         <div class="col-md-12 col-sm-12 col-xs-12  form-group {{ $errors->has('room') ? ' has-error' : '' }} {{ $errors->has('date_checkout') ? ' has-error' : '' }}">
                            <div>
                                @if ($errors->has('room'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('room') }}</strong>
                                    </span>
                               
                                @endif
                            </div>
                        </div>

                        
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group {{ $errors->has('number_people') ? ' has-error' : '' }}">
                            <div >
                                <input id="number_people" type="number" min="1" class="form-control" placeholder="Số người" name="number_people" value="{{ old('number_people') }}" required>

                               
                            </div>
                        </div>
                        
                       
                        
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group">
                            <div >
                               
                                <select id="country"  name="country" class="mySelectCountry" placeholder="Country" required>
                                    <option value="" disabled selected>Chọn  Quốc gia</option>
                                    
                                </select>

                                
                            </div>
                        </div>
                        
                        
                        <div class="col-md-12 col-sm-12 col-xs-12  form-group">
                            <div>
                                @if ($errors->has('number_people'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('number_people') }}</strong>
                                    </span>
                                @elseif ($errors->has('country'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                       
                        <div col-xs-6 pull-right>
                             <input id="e_submit" type="submit" name="Register" class="btn btn-primary btn-lg pull-right" value="BOOKING">
                        </div>
                           
                        
                         
                        
                    </form>
                    <!-- <a href="{{ route('editUserMainSubmit') }}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-backdrop="static" data-target="#viewUserMainmodal""><i class="fa fa-folder"></i> View </a> -->
                    
          </div>
        </div>
      </div>

      <div class="modal fade" id="viewCheckinMainmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
        <div class="Registermodal-content">
        <button type="button" class="close" id="closeDialog" onclick="removeMessage()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          <h1>Booking</h1><br>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('subBookManageSubmit', ['subdomain' =>$info['subdomain']]) }}">
                        {{ csrf_field() }}
                
                        <input hidden id="typePost"" name="typePost" value="deleteBooking">
                        <input hidden id="v_idPost"" name="id" value="">

                         <div class="col-md-6 col-sm-6 col-xs-12  form-group">
                        
                            <div >

                                <input id="v_first_name" type="text" class="form-control" placeholder="Họ" name="first_name" value="{{ old('first_name') }}" >

                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12  form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                            <div >
                                <input id="v_last_name" type="text" class="form-control" placeholder="Tên" name="last_name" value="{{ old('last_name') }}" required>
                            </div>
                        </div>
                        
                        
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group{{ $errors->has('date_checkin') ? ' has-error' : '' }}">
                            <div >
                                <input id="v_date_checkin" type="text" onfocus="(this.type='date')" class="" placeholder="Ngày checkin" name="date_checkin" value="{{ old('date_checkin') }}" required >

                                
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group{{ $errors->has('date_checkout') ? ' has-error' : '' }}">
                            <div >
                                <input id="v_date_checkout" type="text"  onfocus="(this.type='date')" class="" placeholder="Ngày checkout" name="date_checkout" value="{{ old('date_checkout') }}" required >
                            </div>
                        </div>
                       
                       
                        <div class=" col-md-6 col-sm-6 col-xs-12 form-group">
                            <div >
                            <input readonly id="v_room" type="text" class="" placeholder="Phòng" name="" value="{{ old('room') }}" >
                            
                               
                            </div>
                        </div>
                        <div class=" col-md-6 col-sm-6 col-xs-12 form-group">
                            <div >
                            <input readonly id="v_username" type="text" class="" placeholder="Người thực hiện" name="" value="{{ old('username') }}" >
                            
                               
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group {{ $errors->has('number_people') ? ' has-error' : '' }}">
                            <div >
                                <input id="v_number_people" type="number" min="1" class="form-control" placeholder="Số người" name="number_people" value="{{ old('number_people') }}" required>

                               
                            </div>
                        </div>
                        
                       
                        
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group">
                            <div >
                                <input id="v_country" type="text" class="form-control" placeholder="Quốc qia" name="country" value="{{ old('country') }}" >

                                
                            </div>
                        </div>
   
                         <div class="col-md-12 col-sm-12 col-xs-12  form-group " ;">
                            
                            <a   class="btn btn-danger btn-xs pull-right" onclick="deleteBooking()"><i class="fa fa-trash-o"></i> Xóa </a>

                            
                            <a href="#" id="typeEditView" class="btn btn-info btn-xs pull-right" onclick="openeditmodal()"><i class="fa fa-pencil"></i>Sửa</a>
                                   
                        </div>
                        
                        
                    </form>
                    <!-- <a href="{{ route('editUserMainSubmit') }}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-backdrop="static" data-target="#viewUserMainmodal""><i class="fa fa-folder"></i> View </a> -->
                    
          </div>
        </div>
      </div>
      <div class="modal fade" id="editCheckinMainmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
        <div class="Registermodal-content">
        <button type="button" class="close" id="closeDialog" onclick="removeMessage()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          <h1>Booking</h1><br>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('subBookManageSubmit', ['subdomain' =>$info['subdomain']]) }}">
                        {{ csrf_field() }}
                
                        <input hidden id="typePost"" name="typePost" value="updateBooking">
                        <input hidden id="e_idPost"" name="id" value="">

                         <div class="col-md-6 col-sm-6 col-xs-12  form-group">
                        
                            <div >
                                <input id="e_first_name" type="text" class="form-control" placeholder="Họ" name="first_name" value="{{ old('first_name') }}" >
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12  form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                            <div >
                                <input id="e_last_name" type="text" class="form-control" placeholder="Tên" name="last_name" value="{{ old('last_name') }}" required>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12  form-group">
                            <div>
                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @elseif ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group{{ $errors->has('date_checkin') ? ' has-error' : '' }}">
                            <div >
                                <input id="e_date_checkin" type="text" onfocus="(this.type='date')" class="" placeholder="Ngày checkin" name="date_checkin" value="{{ old('date_checkin') }}" required >

                                
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group{{ $errors->has('date_checkout') ? ' has-error' : '' }}">
                            <div >
                                <input id="e_date_checkout" type="text"  onfocus="(this.type='date')" class="" placeholder="Ngày checkout" name="date_checkout" value="{{ old('date_checkout') }}" required >
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12  form-group {{ $errors->has('date_checkin') ? ' has-error' : '' }} {{ $errors->has('date_checkout') ? ' has-error' : '' }}">
                            <div>
                                @if ($errors->has('date_checkin'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('date_checkin') }}</strong>
                                    </span>
                                @elseif ($errors->has('date_checkout'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('date_checkout') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class=" col-md-6 col-sm-6 col-xs-12 form-group">
                            <div >
                           
                            <select id="e_add_type_room" onchange="changetyperoom2()" name="type_room" placeholder="Loại phòng" >
                                    <option value="" disabled selected>Chọn loại phòng</option>
                                   @foreach ($type_rooms as $type_room)
                                   <option value="{{$type_room->type_room_id}}"  >{{$type_room->type_name}}</option>
                                   @endforeach
                            </select>
                               
                            </div>
                        </div>
                        <div class=" col-md-3 col-sm-3 col-xs-6 form-group">
                            <div >
                            <input id="e_addroom" type="text" readonly  placeholder="Phòng" name="room" value="{{ old('room') }}" required >
                               
                            </div>
                        </div>
                     <!--    div class=" col-md-3 col-sm-3 col-xs-6 form-group">
                            <div >
                            <select id="add_room_input"  name="froom" onchange="changeaddroom(this)" placeholder="Số Phòng" >
                                    <option value="-1" disabled selected>Chọn  phòng</option>
                                    <option value="" >clear</option>
                                    
                            </select>
                               
                            </div>
                        </div> -->
                        <div class=" col-md-3 col-sm-3 col-xs-6 form-group">
                            <div >
                           
                            <select id="e_room"  name="froom" onchange="changeaddroom2(this)" placeholder="Số Phòng" >
                                    <option value="" disabled selected>Chọn  phòng</option>
                                    <option value="" >clear</option>
                            </select>
                               
                            </div>
                        </div>

                        
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group {{ $errors->has('number_people') ? ' has-error' : '' }}">
                            <div >
                                <input id="e_number_people" type="number" min="1" class="form-control" placeholder="Số người" name="number_people" value="{{ old('number_people') }}" required>

                               
                            </div>
                        </div>
                        
                       
                        
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group">
                            <div >
                                <input id="e_country" type="text" class="form-control" placeholder="Quốc qia" name="country" value="{{ old('country') }}" >

                                
                            </div>
                        </div>
                        
                        
                        <div class="col-md-12 col-sm-12 col-xs-12  form-group">
                            <div>
                                @if ($errors->has('number_people'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('number_people') }}</strong>
                                    </span>
                                @elseif ($errors->has('country'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                       
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group">
                            <input id="e_submit" type="submit" name="Register" class="btn btn-info btn-xs pull-left" value="OK">
                        </div>
                         <div class="col-md-6 col-sm-6 col-xs-12  form-group">
                            
                            <a   class="btn btn-danger btn-xs pull-right" onclick="deleteBooking()"><i class="fa fa-trash-o"></i> Xóa </a>

                            
                            <a href="#" id="typeEditView" class="btn btn-info btn-xs pull-right" onclick="openviewmodal()"><i class="fa fa-pencil"></i>Xem</a>
                                   
                        </div>
                        
                        
                    </form>
                    <!-- <a href="{{ route('editUserMainSubmit') }}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-backdrop="static" data-target="#viewUserMainmodal""><i class="fa fa-folder"></i> View </a> -->
                    
          </div>
        </div>
      </div>
      <!-- form post--> 
      
           
       <form id="deletedata" action="{{ route('subBookManageSubmit', ['subdomain' =>$info['subdomain']]) }}" method="POST" style="display: none;">
             {{ csrf_field() }}
            <input hidden id="typePost"" name="typePost" value="deleteBooking">
            <input hidden id="d_idPost"" name="id" value="">
        </form>             
      
     
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
    <script src="{!! asset('js/getlistCountry.js') !!}"></script>
   @if($errors->first('typePost')=="addbooking")
     
      <script type="text/javascript">  
    $(document).ready(function () {
      $('#addCheckinMainmodal').modal('show');
    }); </script>
    
    @endif
     @if($errors->first('typePost')=="updateBooking")
     
      <script type="text/javascript">  
    $(document).ready(function () {
      $('#editCheckinMainmodal').modal('show');
    }); </script>
    
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
function deleteBooking(){

    event.preventDefault();
    document.getElementById('deletedata').submit();
}
function openviewmodal(){
 $('#editCheckinMainmodal').modal('hide');
  $('#viewCheckinMainmodal').modal('show');
}

function openeditmodal(){
 $('#editCheckinMainmodal').modal('show');
  $('#viewCheckinMainmodal').modal('hide');
}
function changetyperoom(){
    var x = document.getElementById("add_type_room").value;
    // if(x != "")
    {
       
       var object = {!! json_encode($rooms->toArray()) !!};
$('.addroomclass').remove();
       for(i = 0; i < object.length ; i++)
       {
        if(object[i].room_type_id == x && object[i].is_booked != 1){
            // <option value="" disabled selected>Chọn số phòng</option>

            var para = document.createElement("option");
            para.setAttribute("value", object[i].room_id);
            para.setAttribute("class", "addroomclass");
            var node = document.createTextNode(object[i].room_number);
            para.appendChild(node);
            var element = document.getElementById("add_room_input");
            element.appendChild(para);
        }
        // alert(object[i].room_number);
       }
        
    }

}

function changetyperoom2(){
    var x = document.getElementById("e_add_type_room").value;
    // if(x != "")
    {

       var object = {!! json_encode($rooms->toArray()) !!};

       $('.addroomclass').remove();
       for(i = 0; i < object.length ; i++)
       {
        if(object[i].room_type_id == x && object[i].is_booked != 1){
            // <option value="" disabled selected>Chọn số phòng</option>

            var para = document.createElement("option");
            para.setAttribute("value", object[i].room_id);
            para.setAttribute("class", "addroomclass");
            var node = document.createTextNode(object[i].room_number);
            para.appendChild(node);
            var element = document.getElementById("e_room");
            element.appendChild(para);
        }
        // alert(object[i].room_number);
       }
        
    }

}
function changeaddroom2(sel){
 var x = sel.options[sel.selectedIndex].text;
 
 if(x =="clear"){
    document.getElementById("e_addroom").value = "";
    changetyperoom2();
    return null;
 }
  var y = document.getElementById("e_addroom").value;

  var z = x+ " " + y;
  document.getElementById("e_addroom").value = z;
  sel.remove(sel.selectedIndex);
  document.getElementById("e_room").selectedIndex = "0";
}
function changeaddroom(sel){
 var x = sel.options[sel.selectedIndex].text;
 
 if(x =="clear"){
    document.getElementById("addroom").value = "";
    changetyperoom();
    return null;
 }
  var y = document.getElementById("addroom").value;

  var z = x+ " " + y;
  document.getElementById("addroom").value = z;
  sel.remove(sel.selectedIndex);
  document.getElementById("add_room_input").selectedIndex = "0";
}
function changeroom(){
    var x = document.getElementById("add_room_input").value;

     for(i = 0; i < x ; i++)
    {
            var para = document.createElement("option");
            para.setAttribute("value", object[i].room_number);
            
            var node = document.createTextNode(object[i].room_number);
            para.appendChild(node);
            var element = document.getElementById("add_room_input");
            element.appendChild(para);

    }
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
// function addReadonly(){

//     if(document.getElementById("typeEditView").innerHTML == "Sửa")
//     {
//     document.getElementById("e_submit").setAttribute("type", "submit");
//     document.getElementById("typeEditView").innerHTML = "Xem";
//     document.getElementById("e_first_name").setAttribute("value", first_name);
//     document.getElementById("e_last_name").setAttribute("value", last_name); 
//     document.getElementById("e_room1").setAttributeNode(document.createAttribute("hidden"));
//     document.getElementById("e_room2").removeAttribute("hidden");
//     document.getElementById("e_date_checkin").setAttribute("value", date_checkin); 
//     document.getElementById("e_date_checkout").setAttribute("value", date_checkout);
//     document.getElementById("e_country").setAttribute("value", contry); 
//     document.getElementById("e_number_people").setAttribute("value",number_people); 

//     // document.getElementById("e_submit").setAttribute("type", "submit");
//     // document.getElementById("e_first_name").removeAttribute("readonly");
//     // document.getElementById("e_last_name").removeAttribute("readonly");
//     // document.getElementById("e_email").removeAttribute("readonly");
//     // document.getElementById("e_phone_number").removeAttribute("readonly");
//     // document.getElementById("e_username").removeAttribute("readonly");
//     // document.getElementById("e_country").removeAttribute("readonly");
//     // document.getElementById("e_dob").removeAttribute("readonly");
//     // document.getElementById("e_gender").removeAttribute("readonly");
//     return;    
// }
// else(document.getElementById("typeEditView").innerHTML == "Xem")
// {
//     document.getElementById("typeEditView").innerHTML = "Sửa";
//     document.getElementById("e_submit").setAttribute("type", "hidden");

//     document.getElementById("e_first_name").setAttributeNode(document.createAttribute("readonly"));
//     document.getElementById("e_last_name").setAttributeNode(document.createAttribute("readonly"));
//     document.getElementById("e_room1").removeAttribute("hidden");
//     document.getElementById("e_room2").setAttributeNode(document.createAttribute("hidden"));
//     document.getElementById("e_date_checkin").setAttributeNode(document.createAttribute("readonly"));
//     document.getElementById("e_date_checkout").setAttributeNode(document.createAttribute("readonly"));
//     document.getElementById("e_country").setAttributeNode(document.createAttribute("readonly"));
//     document.getElementById("e_number_people").setAttributeNode(document.createAttribute("readonly"));
// }
   

// }

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

function showDataView(booking_id, room_number, date_checkin,date_checkout,first_name,last_name,number_people,contry,username){
      
   
    // document.getElementById("typeEditView").innerHTML = "Sửa";
    // document.getElementById("e_submit").setAttribute("type", "hidden");
    // document.getElementById("e_first_name").setAttributeNode(document.createAttribute("readonly"));
    // document.getElementById("e_last_name").setAttributeNode(document.createAttribute("readonly"));
    // document.getElementById("e_room1").removeAttribute("hidden");
    // document.getElementById("e_room2").setAttributeNode(document.createAttribute("hidden"));
    // document.getElementById("e_add_type_room").setAttributeNode(document.createAttribute("hidden"));

    
    // document.getElementById("e_date_checkin").setAttributeNode(document.createAttribute("readonly"));
    // document.getElementById("e_date_checkout").setAttributeNode(document.createAttribute("readonly"));
    // document.getElementById("e_country").setAttributeNode(document.createAttribute("readonly"));
    // document.getElementById("e_number_people").setAttributeNode(document.createAttribute("readonly"));

    document.getElementById("v_idPost").setAttribute("value", booking_id);
    document.getElementById("v_first_name").setAttribute("value", first_name);
    document.getElementById("v_last_name").setAttribute("value", last_name); 
    document.getElementById("v_room").setAttribute("value", room_number); 
    document.getElementById("v_date_checkin").setAttribute("value", date_checkin); 
    document.getElementById("v_date_checkout").setAttribute("value", date_checkout);
    document.getElementById("v_country").setAttribute("value", contry); 
    document.getElementById("v_number_people").setAttribute("value",number_people); 
    document.getElementById("v_username").setAttribute("value",username); 

    

     document.getElementById("e_idPost").setAttribute("value", booking_id);
    document.getElementById("e_first_name").setAttribute("value", first_name);
    document.getElementById("e_last_name").setAttribute("value", last_name); 
    document.getElementById("e_room").setAttribute("value", room_number); 
    document.getElementById("e_add_type_room").setAttribute("value", room_number); 

    
    document.getElementById("e_date_checkin").setAttribute("value", date_checkin); 
    document.getElementById("e_date_checkout").setAttribute("value", date_checkout);
    document.getElementById("e_country").setAttribute("value", contry); 
    document.getElementById("e_number_people").setAttribute("value",number_people); 
    document.getElementById("d_idPost").setAttribute("value", booking_id);


}

function showDataEdit(booking_id, room_number, date_checkin,date_checkout,first_name,last_name,number_people,contry,username){
   
     document.getElementById("v_idPost").setAttribute("value", booking_id);
    document.getElementById("v_first_name").setAttribute("value", first_name);
    document.getElementById("v_last_name").setAttribute("value", last_name); 
    document.getElementById("v_room").setAttribute("value", room_number); 
    document.getElementById("v_date_checkin").setAttribute("value", date_checkin); 
    document.getElementById("v_date_checkout").setAttribute("value", date_checkout);
    document.getElementById("v_country").setAttribute("value", contry); 
    document.getElementById("v_number_people").setAttribute("value",number_people); 
    document.getElementById("v_username").setAttribute("value",username); 
   


    document.getElementById("e_idPost").setAttribute("value", booking_id);
    document.getElementById("e_first_name").setAttribute("value", first_name);
    document.getElementById("e_last_name").setAttribute("value", last_name); 
    document.getElementById("e_room").setAttribute("value", room_number); 
    document.getElementById("e_add_type_room").setAttribute("value", room_number); 

    
    document.getElementById("e_date_checkin").setAttribute("value", date_checkin); 
    document.getElementById("e_date_checkout").setAttribute("value", date_checkout);
    document.getElementById("e_country").setAttribute("value", contry); 
    document.getElementById("e_number_people").setAttribute("value",number_people); 
    document.getElementById("d_idPost").setAttribute("value", booking_id);


}
</script>
</body>

</html>
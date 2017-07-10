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
                            <img src="{{Auth::guard('account')->user()->image_link }}" alt="..." class="img-circle profile_img">
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
                                 <li><a  href="{{ route('subConfig',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-cogs"></i> Cài Đặt Web</a>
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
                               <li><a  href="{{ route('subSpendManage',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-usd"></i> Quản lý chi</a>
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
            <div class="right_col" role="main">

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
                          <th width="5%">ID</th>
                          <th width="15%">Họ Tên</th>
                          <th width="10%" >phòng</th>
                          <th width="5%">Số người</th>
                          <th width="5%">Tiền phòng</th>
                          <th width="5%">Trả Trước</th>
                          <th width="5%">Tiền dịch vụ</th>
                          <th class="nosort" >Quản lý</th>
                        </tr>
                      </thead>
                      <tbody>
                    
                      @foreach ($checkins as $checkin)
                    
                            <tr>
                                <td>{{$checkin->booking_id}}</td>
                                <td>{{$checkin->first_name.' '.$checkin->last_name}}</td>
                                <td>{{$checkin->room_id}}</td>
                                <td>{{$checkin->number_people}}</td>
                                <td>{{$checkin->total_cost_room}}</td>
                                <td>{{$checkin->deposit}}</td>
                                <td>{{$checkin->total_cost_service}}</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-xs" onclick="showDataView('{{$checkin->booking_id}}','{{$checkin->room_id}}', '{{$checkin->date_from}}', '{{$checkin->date_to}}', '{{$checkin->first_name}}', '{{$checkin->last_name}}', '{{$checkin->number_people}}', '{{$checkin->contry}}', '{{$checkin->username}}', '{{$checkin->deposit}}', '{{$checkin->passport}}') " data-toggle="modal" data-backdrop="static" data-target="#viewCheckinMainmodal "  ><i class="fa fa-folder"></i>Xem</a>
                                    <a href="#" class="btn btn-info btn-xs"  onclick="showDataEdit('{{$checkin->booking_id}}','{{$checkin->room_id}}', '{{$checkin->date_from}}', '{{$checkin->date_to}}', '{{$checkin->first_name}}', '{{$checkin->last_name}}', '{{$checkin->number_people}}', '{{$checkin->contry}}', '{{$checkin->username}}', '{{$checkin->deposit}}', '{{$checkin->passport}}') ;" data-toggle="modal" data-backdrop="static" data-target="#editCheckinMainmodal"><i class="fa fa-pencil"></i>Sửa</a>

                            <a data-toggle="tooltip" data-placement="top"  class="btn btn-danger btn-xs"
                                            onclick="event.preventDefault();
                                                     document.getElementById('deleteBook{{$checkin->booking_id}}').submit();"><i class="fa fa-trash-o"></i> Xóa </a>

                            <form id="deleteBook{{$checkin->booking_id}}" action="{{ route('subBookManage',['subdomain' =>$info['subdomain']]) }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            <input hidden id="typePosts"" name="typePost" value="deleteBooking">
                                            <input hidden id="id" name="id" value="{{$checkin->booking_id}}">
                                        </form>
                            @if($checkin->date_checkin == null)
                            <a href="#" class="btn btn-primary btn-xs" onclick="addService('{{$checkin->booking_id}}')" data-target="#addServiceMainmodal" data-toggle="modal" data-backdrop="static" ><i class="fa fa-folder"></i> Thêm dịch vụ </a>
                            <a href="#" class="btn btn-primary btn-xs" onclick="addCheck('{{$checkin->booking_id}}')" data-target="#addCheckMainmodal" data-toggle="modal" data-backdrop="static" ><i class="fa fa-folder"></i> Checkin</a>

                            
                            @endif
                            @if($checkin->date_checkin != null && $checkin->date_checkout == null)
                            <a href="#" class="btn btn-primary btn-xs" onclick="addService('{{$checkin->booking_id}}')" data-target="#addServiceMainmodal" data-toggle="modal" data-backdrop="static" ><i class="fa fa-folder"></i> Thêm dịch vụ </a>
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
                                <input id="date_checkin" type="text" onfocus="(this.type='date')" class="" onchange="resetselecttyperoom()" placeholder="Ngày checkin" name="date_checkin" value="{{ old('date_checkin') }}" required >

                                
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group{{ $errors->has('date_checkout') ? ' has-error' : '' }}">
                            <div >
                                <input id="date_checkout" type="text"  onfocus="(this.type='date')" class="" onchange="resetselecttyperoom()" placeholder="Ngày checkout" name="date_checkout" value="{{ old('date_checkout') }}" required >
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

                        <div class=" col-md-3 col-sm-3 col-xs-6 form-group">
                            <div >
                            <select id="add_room_input"  name="froom" onchange="changeaddroom(this)" placeholder="Số Phòng" required>
                                    <option value="-1" disabled selected>Chọn  phòng</option>
                                    <option value="" >Xóa danh sách</option>
                                    
                            </select>
                               
                            </div>
                        </div>

                        <div class=" col-md-3 col-sm-3 col-xs-6 form-group ">
                            <div >
                            <input id="addroom" type="text" readonly  placeholder="Phòng" name="room" value="" required>
                               
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
                                <input readonly id="v_number_people" type="number" min="1" class="form-control" placeholder="Số người" name="number_people" value="{{ old('number_people') }}" required>

                               
                            </div>
                        </div>
                        
                       
                        
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group">
                            <div >
                                <input readonly id="v_country" type="text" class="form-control" placeholder="Quốc qia" name="country" value="{{ old('country') }}" >

                                
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group {{ $errors->has('number_people') ? ' has-error' : '' }}">
                            <div >
                                <input readonly id="v_prepay" type="number" min="1" class="form-control" placeholder="Trả trước" name="number_people" value="{{ old('number_people') }}" required>

                               
                            </div>
                        </div>
                        <div class=" col-md-6 col-sm-6 col-xs-12 form-group">
                            <div >
                            <input readonly id="v_passport" type="text" class="" placeholder="CMND/PASSPORT" name="" value="{{ old('username') }}" >
                            
                               
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
                                <input id="e_date_checkin" type="text" onfocus="(this.type='date')" onchange="resetselecttyperoom()" class="" placeholder="Ngày checkin" name="date_checkin" value="{{ old('date_checkin') }}" required >

                                
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group{{ $errors->has('date_checkout') ? ' has-error' : '' }}">
                            <div >
                                <input id="e_date_checkout" type="text"  onfocus="(this.type='date')" onchange="resetselecttyperoom()" class="" placeholder="Ngày checkout" name="date_checkout" value="{{ old('date_checkout') }}" required >
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
                           
                            <select id="e_room"  name="froom" onchange="changeaddroom2(this)" placeholder="Số Phòng" >
                                    <option value="" disabled selected>Chọn  phòng</option>
                                    <option value="" >Xóa danh sách</option>
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

                        <div class="col-md-6 col-sm-6 col-xs-12  form-group {{ $errors->has('prepay') ? ' has-error' : '' }}">
                            <div >
                                <input readonly id="e_prepay" type="number" min="1" class="form-control" placeholder="Trả trước" name="prepay" value="{{ old('prepay') }}" required>

                               
                            </div>
                        </div>
                        <div class=" col-md-6 col-sm-6 col-xs-12 form-group">
                            <div >
                            <input readonly id="e_passport" type="text" class="" placeholder="CMND/PASSPORT" name="cmnd" value="{{ old('cmnd') }}" >
                            
                               
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
      
      <div class="modal fade" id="addCheckMainmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
        <div class="loginmodal-container">
        <button type="button" class="close" id="closeDialog" onclick="removeMessage()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          <h1>Checkin</h1><br>
          <form class="form-horizontal"  role="form" method="POST" action="{{ route('subBookManageSubmit',['subdomain' =>$info['subdomain']]) }}">
                        {{ csrf_field() }}
                        <input hidden id="addtypePost"" name="typePost" value="checkinBook">
                        <input hidden id="Check_book_id"" name="id" value="">

                        

                       
                        <div class="form-group{{ $errors->has('cmnd') ? ' has-error' : '' }}">
                            <div >
                                <input id="cmnd" type="number" class="form-control" min="0" placeholder="CMND/PASSPORT" name="cmnd" value="{{old('cmnd')}}" required >
                                 @if ($errors->has('cmnd'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('cmnd') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>
                      
                        
                        
                        <input type="submit" name="Register" class="loginmodal-submit " value="OK">
                       
                    </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="addCheckOutMainmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
        <div class="loginmodal-container">
        <button type="button" class="close" id="closeDialog" onclick="removeMessage()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          <h1>Thanh toán</h1><br>
                    <h2>Tiền phòng</h2>
                        @if ($booked = session('booked'))
                        <div class="form-group">
                                <p><span><strong>Tiền phòng: </strong></span>{{$booked['total_cost_room']}}</p>
                                <p><span><strong>Trả trước: </strong></span>{{$booked['deposit']}}</p>
                       
                                <p class="text-right"><span><strong>Còn lại: </strong></span>{{$booked['total_cost_room'] - $booked['deposit']}}</p>
                        </div>
                        
                        <div class="ln_solid"></div>
                        <h2>Tiền Dịch vụ</h2>
                        @if($sericename = session('sericename'))
                        <?php
                         $sericecode = session('sericecode');
                         $servicequanti = session('servicequanti');

                         ?>
                        <div class="form-group">
                            @foreach($sericename as $key => $name)
                                <p><span><strong>{{$name}}: </strong></span>{{$sericecode[$key]}}*{{$servicequanti[$key]}}= {{$sericecode[$key]*$servicequanti[$key]}}</p>
                            @endforeach
                        </div>
                      
                        <div class="ln_solid"></div>
                        <p class="text-right"><span><strong>Tổng: </strong></span>{{$booked['total_cost_room'] - $booked['deposit']+ session('total')}}</p>
                        

                       @endif
                       @endif
                       
                    
          </div>
        </div>
      </div>

<div class="modal fade" id="addPrepayMainmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
        <div class="loginmodal-container">
        <button type="button" class="close" id="closeDialog" onclick="removeMessage()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          <h1>Trả trước</h1><br>
          <form class="form-horizontal"  role="form" method="POST" action="{{ route('subBookManageSubmit',['subdomain' =>$info['subdomain']]) }}">
                        {{ csrf_field() }}
                        <input hidden id="addtypePost"" name="typePost" value="addPrepay">
                        <input hidden id="Prepay_book_id"" name="id" value="">

                        
                         <div class="form-group{{ $errors->has('prepay') ? ' has-error' : '' }}">
                            <div >
                            <label>Tổng tiền</label>
                                <input readonly id="tr_total_cost_room" type="number" class="form-control" min="0" name="prepay" value=""  >
                                
                                
                            </div>
                        </div>
                       
                        <div class="form-group{{ $errors->has('prepay') ? ' has-error' : '' }}">
                            <div >
                            <label>Trả trước</label>
                                <input id="tr_pay_cost" type="number" class="form-control" min="0" placeholder="Trả trước" name="prepay" value="{{old('prepay')}}" required >
                                 @if ($errors->has('prepay'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('prepay') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>
                      
                        
                        
                        <input type="submit" name="Register" class="loginmodal-submit " value="OK">
                       
                    </form>
          </div>
        </div>
      </div>
      <div class="modal fade" id="addServiceMainmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
        <div class="loginmodal-container">
        <button type="button" class="close" id="closeDialog" onclick="removeMessage()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          <h1>Thêm Dịch vụ</h1><br>
          <form class="form-horizontal"  role="form" method="POST" action="{{ route('subBookManageSubmit',['subdomain' =>$info['subdomain']]) }}">
                        {{ csrf_field() }}
                        <input hidden id="addtypePost"" name="typePost" value="addService">
                        <input hidden id="service_book_id"" name="id" value="">

                        <div class=" form-group">
                            <div >
                            <select id="service_id"  name="service_id" placeholder="loại dịch vụ" required>
                                    <option value="" disabled selected>Chọn Dịch vụ</option>
                                   @foreach ($services as $service)
                                   <option value="{{$service->service_id}}"  >{{$service->service_name}}</option>
                                   @endforeach
                            </select>
                               
                            </div>
                        </div>

                       
                        <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <div >
                                <input id="tr_cost" type="number" class="form-control" min="1" placeholder="Số lượng" name="quantity" value="{{old('quantity') }}" required >
                                 @if ($errors->has('quantity'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>
                      
                        
                        <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
                            <div >
                                <input id="discount" type="number" class="form-control" min="0" placeholder="Giảm giá" name="discount" value="{{old('discount') }}" required >
                                 @if ($errors->has('discount'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('discount') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>
                       
                        <input type="submit" name="Register" class="loginmodal-submit " value="Thêm dịch vụ">
                       
                    </form>
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
    @if($errors->first('typePost')=="addPrepay")
     
      <script type="text/javascript">  
    $(document).ready(function () {
      $('#addPrepayMainmodal').modal('show');
    }); </script>
    
    @endif
     @if($errors->first('typePost')=="updateBooking")
     
      <script type="text/javascript">  
    $(document).ready(function () {
      $('#editCheckinMainmodal').modal('show');
    }); </script>
    
    @endif

@if (session('showPrepay'))
   <script type="text/javascript"> 
   document.getElementById("Prepay_book_id").setAttribute("value", {{ session('id_book') }});
     document.getElementById("tr_total_cost_room").setAttribute("value", {{ session('total_cost_room') }}); 
      $(document).ready(function () {
      $('#addPrepayMainmodal').modal('show');
    }); 
    </script>
   
    @endif
@if(session('booked'))
     <script type="text/javascript"> 
        $(document).ready(function () {
        $('#addCheckOutMainmodal').modal('show');
        });
    </script>
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

function resetselecttyperoom() {
    var element = document.getElementById("add_type_room");
    var element2 = document.getElementById("e_add_type_room");
    element.selectedIndex = "0";
    element2.selectedIndex = "0";
    document.getElementById("addroom").value = "";
    document.getElementById("e_addroom").value = "";
}
function dateCheck(from,to,check1,check2) {

    var fDate,lDate,cDate;
    fDate = Date.parse(from);
    lDate = Date.parse(to);
    cDate = Date.parse(check1);
    cDate2 = Date.parse(check2);

    if((cDate <= lDate && cDate >= fDate)) {
        return true;
    }
    if((cDate2 <= lDate && cDate2 >= fDate)) {
        return true;
    }
    if((cDate2 <= fDate && cDate2 >= lDate)) {
        return true;
    }
    return false;
}
function checkroomhasbook(room, listroom) {
    // console.log("list phong k cho dat" + listroom);
    // console.log(" phong cần check" + room);
    for(ii = 0; ii <= listroom.length; ii++){
        if(listroom[ii] == room)
            return false;
    }
    return true;
    
}
function changetyperoom(){
    var x = document.getElementById("add_type_room").value;
    // if(x != "")
    {
       
       var object = {!! json_encode($rooms->toArray()) !!};
       var object2 = {!! json_encode($bookings->toArray()) !!};
       var arrival = document.getElementById('date_checkin').value;
       var departure = document.getElementById('date_checkout').value;

        // console.log("đến:" + arrival); 
        // console.log("đi:" + departure);
        // console.log("số booking:" + object2.length);
       var listRoombook = [];
       for(i = 0; i < object2.length ; i++){
        // console.log("ngày dến:" + object2[i].date_from);
        // console.log("ngày đi:" + object2[i].date_to);

            if(dateCheck(arrival,departure,object2[i].date_from, object2[i].date_to)){
                 // console.log("phong:" + object2[i].room_id);
                 var rooms = object2[i].room_id.split(" ");
                 // alert(rooms.length);
                 for(i = 0; i < rooms.length ; i++)
                    listRoombook.push(rooms[i]);

            }
       }

       // alert(listRoombook + " " + listRoombook.length);
$('.addroomclass').remove();
       for(i = 0; i < object.length ; i++)
       {
        // console.log(object[i].room_number + ":" +checkroomhasbook(object[i].room_number,listRoombook));
        if((object[i].room_type_id == x && object[i].is_booked != 1) || (object[i].room_type_id == x && object[i].is_booked == 1 && checkroomhasbook(object[i].room_number,listRoombook)) ){
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
       var object2 = {!! json_encode($bookings->toArray()) !!};
       var arrival = document.getElementById('e_date_checkin').value;
       var departure = document.getElementById('e_date_checkout').value;

        // console.log("đến:" + arrival); 
        // console.log("đi:" + departure);
        // console.log("số booking:" + object2.length);
       var listRoombook = [];
       for(i = 0; i < object2.length ; i++){
        // console.log("ngày dến:" + object2[i].date_from);
        // console.log("ngày đi:" + object2[i].date_to);

            if(dateCheck(arrival,departure,object2[i].date_from, object2[i].date_to)){
                 // console.log("phong:" + object2[i].room_id);
                 var rooms = object2[i].room_id.split(" ");
                 // alert(rooms.length);
                 for(i = 0; i < rooms.length ; i++)
                    listRoombook.push(rooms[i]);

            }
       }

   
       for(i = 0; i < object.length ; i++)
       {
        if((object[i].room_type_id == x && object[i].is_booked != 1) || (object[i].room_type_id == x && object[i].is_booked == 1 && checkroomhasbook(object[i].room_number,listRoombook))){
            // <option value="" disabled selected>Chọn số phòng</option>

            var para = document.createElement("option");
            para.setAttribute("value", object[i].room_id);
            para.setAttribute("class", "addroomclass");
            var node = document.createTextNode(object[i].room_number);
            para.appendChild(node);
            var element = document.getElementById("e_room");
            element.appendChild(para);
        }
       }
        
    }

}
function changeaddroom2(sel){
 var x = sel.options[sel.selectedIndex].text;
 
 if(x =="Xóa danh sách"){
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
 
 if(x =="Xóa danh sách"){
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


function addService(id){

     document.getElementById("service_book_id").setAttribute("value", id);

}



function addPrepay(id, cost,total_cost_room){

     document.getElementById("Prepay_book_id").setAttribute("value", id);
     document.getElementById("tr_pay_cost").setAttribute("value", cost);
     document.getElementById("tr_total_cost_room").setAttribute("value", total_cost_room);


}

function addCheck(id) {
    document.getElementById("Check_book_id").setAttribute("value", id);

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

function showDataView(booking_id, room_number, date_checkin,date_checkout,first_name,last_name,number_people,contry,username,Prepay,passport){
      
   
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
    document.getElementById("e_prepay").setAttribute("value", Prepay);
    document.getElementById("e_passport").setAttribute("value", passport);
    document.getElementById("v_prepay").setAttribute("value", Prepay);
    document.getElementById("v_passport").setAttribute("value", passport);



}

function showDataEdit(booking_id, room_number, date_checkin,date_checkout,first_name,last_name,number_people,contry,username,Prepay,passport){
   
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
    document.getElementById("v_prepay").setAttribute("value", Prepay);
    document.getElementById("v_passport").setAttribute("value", passport);
    document.getElementById("e_prepay").setAttribute("value", Prepay);
    document.getElementById("e_passport").setAttribute("value", passport);


}
</script>
</body>

</html>
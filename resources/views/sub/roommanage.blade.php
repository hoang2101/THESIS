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
                                 <li><a  href="{{ route('subProfile',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-user"></i> Quản lý Tài khoản</a>
                                 <li><a  href="{{ route('subProfile',['subConfig' =>$info['subdomain']]) }}"><i class="fa fa-user"></i> Cài ĐẶt Web</a>
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
                                
                                <li><a  class="active" href="{{ route('subManage',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-desktop"></i> Quản lý khách hàng</a>
                                <li><a   href="{{ route('subRoomManage',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-desktop"></i> Quản lý đặt phòng</a>
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
                    <h2>Danh sách phòng<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <a href="#" class="btn btn-primary btn-xs" onclick="checkHasTypeRoom1()" data-toggle="modal" data-backdrop="static" ><i class="fa fa-folder"></i> Thêm 1 phòng </a>
                      <a href="#" class="btn btn-primary btn-xs" onclick="checkHasTypeRoom2()" data-toggle="modal" data-backdrop="static" ><i class="fa fa-folder"></i> Thêm nhiều phòng </a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    
                    <table id="responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th id="cel1">ID</th>
                          <th white-space:pre-line" id="cel5">Tầng</th>
                          <th id="cel5">Số phòng</th>
                          <th id="cel10">Loại phòng</th>
                          <th id="cel10">Đã đặt phòng</th>
                          <th class="nosort"  id="cel5">Quản lý</th>
                        </tr>
                      </thead>
                      <tbody>
                    
                      @foreach ($rooms as $room)
                    
                            <tr>
                                <td style="width:5%">{{$room->room_id}}</td>
                                <td>{{$room->room_floor}}</td>
                                <td>{{$room->room_number}}</td>
                                <td>{{$room->type_name}}</td>
                                <td style="width:10%"><input disabled type="checkbox" name="vehicle" value="Car" @if($room->is_booked == 1)checked @endif></td>
                                <td style="width:10%">
                                    <a href="#" class="btn btn-primary btn-xs" onclick="showDataView('{{$room->room_id}}','{{$room->room_floor}}', '{{$room->room_number}}', '{{$room->type_name}}') " data-toggle="modal" data-backdrop="static" data-target="#viewRoomMainmodal "  ><i class="fa fa-folder"></i>Xem</a>
                                    <a href="#" class="btn btn-info btn-xs"  onclick="showDataEdit('{{$room->room_id}}','{{$room->room_floor}}', '{{$room->room_number}}', '{{$room->type_name}}') ;" data-toggle="modal" data-backdrop="static" data-target="#viewRoomMainmodal"><i class="fa fa-pencil"></i>Sửa</a>
                            @if($room->is_booked == 0 )
                            <a  data-toggle="tooltip" data-placement="top"  class="btn btn-danger btn-xs"
                                            onclick="event.preventDefault();
                                                     document.getElementById('deleteroom{{$room->room_id}}').submit();"><i class="fa fa-trash-o"></i> Xóa </a>

                            <form id="deleteroom{{$room->room_id}}" action="{{ route('subRoomManageSubmit',['subdomain' =>$info['subdomain']]) }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            <input hidden id="typePosts"" name="typePost" value="deleteRoom">
                                            <input hidden id="id" name="id" value="{{$room->room_id}}">
                                        </form>
                            @endif
                                </td>
                            </tr>
                        @endforeach
                       

                        
                      
                        
                       
                      </tbody>
                    </table>
                    
                    
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Danh sách loại phòng<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <a href="#" class="btn btn-primary btn-xs" data-target="#addTypeRoomMainmodal" data-toggle="modal" data-backdrop="static" ><i class="fa fa-folder"></i> Thêm loại phòng </a>
                     
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    
                    <table id="responsive2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th id="cel1">ID</th>
                          <th white-space:pre-line" id="cel5">Tên</th>
                          <th id="cel5">Giá</th>
                          <th id="cel10">mô tả</th>
                          <th class="nosort"  id="cel5">Quản lý</th>
                        </tr>
                      </thead>
                      <tbody>
                    
                      @foreach ($type_rooms as $type_room)
                    
                            <tr>
                                <td style="width:5%">{{$type_room->type_room_id}}</td>
                                <td style="width:15%">{{$type_room->type_name}}</td>
                                <td style="width:10%">{{$type_room->cost}}</td>
                                <td>{{$type_room->description}}</td>
                                <td style="width:10%">
                                    <a href="#" class="btn btn-primary btn-xs" onclick="showDataTypeRoomView('{{$type_room->type_room_id}}','{{$type_room->type_name}}', '{{$type_room->cost}}', '{{$type_room->description}}') " data-toggle="modal" data-backdrop="static" data-target="#viewTypeRoomMainmodal "  ><i class="fa fa-folder"></i>Xem</a>
                                    <a href="#" class="btn btn-info btn-xs"  onclick="showDataTypeRoomEdit('{{$type_room->type_room_id}}','{{$type_room->type_name}}', '{{$type_room->cost}}', '{{$type_room->description}}') ;" data-toggle="modal" data-backdrop="static" data-target="#viewTypeRoomMainmodal"><i class="fa fa-pencil"></i>Sửa</a>

                            <a data-toggle="tooltip" data-placement="top"  class="btn btn-danger btn-xs"
                                            onclick="event.preventDefault();
                                                     document.getElementById('deletetyperoom{{$type_room->type_room_id}}').submit();"><i class="fa fa-trash-o"></i> Xóa </a>

                            <form id="deletetyperoom{{$type_room->type_room_id}}" action="{{ route('subRoomManageSubmit',['subdomain' =>$info['subdomain']]) }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            <input hidden id="typePosts"" name="typePost" value="deleteTypeRoom">
                                            <input hidden id="id" name="id" value="{{$type_room->type_room_id}}">
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
<!-- modal dialog add user -->
<div class="modal fade" id="add1RoomMainmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
        <div class="loginmodal-container">
        <button type="button" class="close" id="closeDialog" onclick="removeMessage()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          <h1>Thêm 1 Phòng</h1><br>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('subRoomManageSubmit',['subdomain' =>$info['subdomain']]) }}">
                        {{ csrf_field() }}
                        <input hidden id="addtypePost"" name="typePost" value="add1Room">
                        <div class="form-group{{ $errors->has('room_number') ? ' has-error' : '' }}">
                            <div >
                                @if ($errors->has('room_number'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('room_number') }}</strong>
                                    </span>
                                @endif
                                <input id="r_room_floor" type="number" class="form-control" placeholder="Tầng" name="room_floor" value="{{old('room_floor') }}" required autofocus >

                                
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('room_number') ? ' has-error' : '' }}">
                            <div >
                                <input id="r_room_number" type="number" class="form-control" placeholder="Số phòng" name="room_number" value="{{ old('room_number') }}" required autofocus>

                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div >
                            <select id="r_type_room" name="type_room" placeholder="khách sạn" required>
                            <option value="" disabled selected>Chọn loại phòng</option>
                                @foreach($type_rooms as $type_room)
                                    <option value="{{$type_room->type_room_id}}">{{$type_room->type_name}}</option>
                                @endforeach
    
   
                            </select>
                               
                            </div>
                        </div>

                        

                       
                        <input type="submit" name="Register" class="loginmodal-submit " value="Thêm Phòng">
                       
                    </form>
          </div>
        </div>
      </div>

    <div class="modal fade" id="addnRoomMainmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
        <div class="loginmodal-container">
        <button type="button" class="close" id="closeDialog" onclick="removeMessage()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          <h1>Thêm nhiều Phòng</h1><br>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('subRoomManageSubmit',['subdomain' =>$info['subdomain']]) }}">
                        {{ csrf_field() }}
                        <input hidden id="addtypePost"" name="typePost" value="addnRoom">
                        <div class="form-group{{ $errors->has('room_from') ? ' has-error' : '' }}">
                            <div >
                                @if ($errors->has('room_from'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('room_from') }}</strong>
                                    </span>
                                @endif
                                <input id="r_room_from2" type="number" class="form-control" placeholder="Từ số phòng" name="room_from" value="{{old('room_from') }}" required autofocus >
                               
                                
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('room_from') ? ' has-error' : '' }}">
                            <div >
                                <input id="r_room_to2" type="number" class="form-control" placeholder="đến số phòng" name="room_to" value="{{old('room_to') }}" required autofocus >
                                 
                                
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <div >
                                <input id="r_room_floor2" type="number" class="form-control" placeholder="Tầng" name="room_floor" value="{{old('room_floor') }}" required autofocus >
                                 @if ($errors->has('room_floor'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('room_floor') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>
                       
                       <div class="form-group">
                            <div >
                            <select id="r_type_room2" name="type_room" placeholder="khách sạn" required>
                            <option value="" disabled selected>Chọn loại phòng</option>
                                @foreach($type_rooms as $type_room)
                                    <option value="{{$type_room->type_room_id}}">{{$type_room->type_name}}</option>
                                @endforeach
                            </select>
                               
                            </div>
                        </div>

                        

                       
                        <input type="submit" name="Register" class="loginmodal-submit " value="Thêm Phòng">
                       
                    </form>
          </div>
        </div>
      </div>

      <!-- modal dialog view  edit user -->
      <div class="modal fade" id="viewRoomMainmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
        <div class="loginmodal-container">
        <button type="button" class="close" id="closeDialog" onclick="removeMessage()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          <h1>Xem chi tiết phòng</h1><br>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('subRoomManageSubmit', ['subdomain' =>$info['subdomain']]) }}">
                        {{ csrf_field() }}
                
                        <input hidden id="typePost"" name="typePost" value="updateRoom">
                        <input hidden id="idRoom" name="id" value="">
                        <div class="form-group{{ $errors->has('room_number') ? ' has-error' : '' }}">
                            <div >
                                @if ($errors->has('room_number'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('room_number') }}</strong>
                                    </span>
                                @endif
                                <input id="e_r_room_floor" type="text" class="form-control" placeholder="Tầng" name="room_floor" value="{{old('room_floor') }}" required autofocus >

                                
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('room_number') ? ' has-error' : '' }}">
                            <div >
                                <input id="e_r_room_number" type="text" class="form-control" placeholder="Số phòng" name="room_number" value="{{ old('room_number') }}" required autofocus>

                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div >
                            <input readonly hidden id="e_r_type_room1" type="text" class="" placeholder="Loại phòng" name="type_room" value="{{ old('type_room') }}" >
                            <select id="e_r_type_room2" name="type_room" placeholder="Chọn loại phòng" required>
                                <option value="" disabled selected>Chọn Loại phòng</option>
                                @foreach($type_rooms as $type_room)
                                    <option value="{{$type_room->type_room_id}}">{{$type_room->type_name}}</option>
                                @endforeach
    
   
                            </select>
                               
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="e_submit" type="submit" name="Register" class="btn btn-info btn-xs pull-left" value="OK">
                        </div>
                         <div class="col-md-6 col-sm-6 col-xs-12  form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <!-- <a data-toggle="tooltip" data-placement="top"  class="pull-right btn btn-primary btn-xs" href="{{ route('addUserMainSubmit') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('edit-form').submit();"><i class="fa fa-folder"></i> View  </a> -->
                            <a   class="btn btn-danger btn-xs pull-right" onclick="event.preventDefault();
                                                     document.getElementById('deleteroom').submit();"><i class="fa fa-trash-o"></i> Xóa </a>

                            
                            <a href="#" id="typeEditView" class="btn btn-info btn-xs pull-right" onclick="addReadonly()"><i class="fa fa-pencil"></i>Sửa</a>
                                   
                        </div>
                        
                        
                    </form>
                    <!-- <a href="{{ route('editUserMainSubmit') }}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-backdrop="static" data-target="#viewUserMainmodal""><i class="fa fa-folder"></i> View </a> -->
                    
          </div>
        </div>
      </div>


      <!-- Type room -->
      <div class="modal fade" id="addTypeRoomMainmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
        <div class="loginmodal-container">
        <button type="button" class="close" id="closeDialog" onclick="removeMessage()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          <h1>Thêm loại Phòng</h1><br>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('subRoomManageSubmit',['subdomain' =>$info['subdomain']]) }}">
                        {{ csrf_field() }}
                        <input hidden id="addtypePost"" name="typePost" value="addTypeRoom">
                        <div class="form-group{{ $errors->has('room_from') ? ' has-error' : '' }}">
                            <div >
                                <input id="tr_type_name" type="text" class="form-control" placeholder="Tên loại phòng" name="type_name" value="{{old('type_name') }}" required autofocus >
                                @if ($errors->has('type_name'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('type_name') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('room_from') ? ' has-error' : '' }}">
                            <div >
                                <input id="tr_cost" type="number" class="form-control" placeholder="Giá phòng" name="cost" value="{{old('cost') }}" required autofocus >
                                 @if ($errors->has('cost'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('cost') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <div >
                                <input id="tr_description" type="text" class="form-control" placeholder="Mô tả" name="description" value="{{old('description') }}" required autofocus >
                                 @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>
                        <input type="submit" name="Register" class="loginmodal-submit " value="Thêm Phòng">
                       
                    </form>
          </div>
        </div>
      </div>

      <!-- modal dialog view  edit user -->
      <div class="modal fade" id="viewTypeRoomMainmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
        <div class="loginmodal-container">
        <button type="button" class="close" id="closeDialog" onclick="removeMessage()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          <h1>Xem chi tiết loại phòng</h1><br>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('subRoomManageSubmit', ['subdomain' =>$info['subdomain']]) }}">
                        {{ csrf_field() }}
                
                        <input hidden id="tr_typePost"" name="typePost" value="updateTypeRoom">
                        <input hidden id="idTypeRoom" name="id" value="">
                        <div class="form-group{{ $errors->has('room_from') ? ' has-error' : '' }}">
                            <div >
                                <input id="e_tr_type_name" type="text" class="form-control" placeholder="Tên loại phòng" name="type_name" value="{{old('type_name') }}" required autofocus >
                                @if ($errors->has('type_name'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('type_name') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('room_from') ? ' has-error' : '' }}">
                            <div >
                                <input id="e_tr_cost" type="number" class="form-control" placeholder="Giá phòng" name="cost" value="{{old('cost') }}" required autofocus >
                                 @if ($errors->has('cost'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('cost') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <div >
                                <input id="e_tr_description" type="Text " class="form-control" placeholder="Mô tả" name="description" value="{{old('description') }}" required autofocus >
                                 @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong class="messageError">{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="e_tr_submit" type="submit" name="Register" class="btn btn-info btn-xs pull-left" value="OK">
                        </div>
                         <div class="col-md-6 col-sm-6 col-xs-12  form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <!-- <a data-toggle="tooltip" data-placement="top"  class="pull-right btn btn-primary btn-xs" href="{{ route('addUserMainSubmit') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('edit-form').submit();"><i class="fa fa-folder"></i> View  </a> -->
                            <a   class="btn btn-danger btn-xs pull-right" onclick="deleteTypeRoom()"><i class="fa fa-trash-o"></i> Xóa </a>

                            
                            <a href="#" id="typeroomEditView" class="btn btn-info btn-xs pull-right" onclick="addReadonly2()"><i class="fa fa-pencil"></i>Sửa</a>
                                   
                        </div>
                        
                        
                    </form>
                    <!-- <a href="{{ route('editUserMainSubmit') }}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-backdrop="static" data-target="#viewUserMainmodal""><i class="fa fa-folder"></i> View </a> -->
                    
          </div>
        </div>
      </div>


      <!-- forrm delete -->
      <form id="deleteroom" action="{{ route('subRoomManageSubmit',['subdomain' =>$info['subdomain']]) }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            <input hidden id="typePosts"" name="typePost" value="deleteRoom">
                                            <input hidden id="iddeleteRoom" name="id" value="">
                                        </form>
      <!-- end form delete -->
      <!-- end type room -->
      <!-- form post--> 
      
                      
      
    
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
    @if($errors->first('typePost')=="add1Room")
     
      <script type="text/javascript">  
    $(document).ready(function () {
      $('#add1RoomMainmodal').modal('show');
    }); </script>
    
    @endif
    @if($errors->first('typePost')=="addnRoom")
     
      <script type="text/javascript">  
    $(document).ready(function () {
      $('#addnRoomMainmodal').modal('show');
    }); </script>
    
    @endif
     @if($errors->first('typePost')=="updateRoom")
     
      <script type="text/javascript">  
    $(document).ready(function () {
      $('#viewRoomMainmodal').modal('show');
    }); </script>
    
    @endif
     @if($errors->first('typePost')=="addTypeRoom")
     
      <script type="text/javascript">  
    $(document).ready(function () {
      $('#addTypeRoomMainmodal').modal('show');
    }); </script>
    
    @endif
     @if($errors->first('typePost')=="updateTypeRoom")
     
      <script type="text/javascript">  
    $(document).ready(function () {
      $('#viewTypeRoomMainmodal').modal('show');
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

@if( !count($type_rooms))
<script type="text/javascript">
   function checkHasTypeRoom1(){
  
    alert("Hệ thống chưa có loại phòng khách sạn, Vui lòng thêm loại phòng khách sạn!");
    }
 
</script>
@else
<script type="text/javascript">
   function checkHasTypeRoom1(){
 $('#add1RoomMainmodal').modal('show'); 
}
 </script>
@endif

@if( !count($type_rooms))
<script type="text/javascript">
   function checkHasTypeRoom2(){
  
    alert("Hệ thống chưa có loại phòng khách sạn, Vui lòng thêm loại phòng khách sạn!");
    }
 
</script>
@else
<script type="text/javascript">
   function checkHasTypeRoom2(){
 $('#addnRoomMainmodal').modal('show'); 

    
}
 </script>
@endif
<script type="text/javascript">

$('#responsive2').DataTable( {
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

function deleteroom(){
    document.getElementById("typePost").setAttribute("value", "deleteRoom");
    var l = document.getElementById('e_submit');
    l.click();

}

function deleteTypeRoom(){
    document.getElementById("tr_typePost").setAttribute("value", "deleteTypeRoom");
    var l = document.getElementById('e_tr_submit');
    l.click();

}

function addReadonly(){

    if(document.getElementById("typeEditView").innerHTML == "Sửa")
    {
    document.getElementById("e_submit").setAttribute("type", "submit");
    document.getElementById("typeEditView").innerHTML = "Xem";
    document.getElementById("e_r_room_floor").removeAttribute("readonly");
    document.getElementById("e_r_room_number").removeAttribute("readonly");
    document.getElementById("e_r_type_room1").setAttributeNode(document.createAttribute("hidden"));
    document.getElementById("e_r_type_room2").removeAttribute("hidden");


    return;    
}
else(document.getElementById("typeEditView").innerHTML == "Xem")
{
    document.getElementById("typeEditView").innerHTML = "Sửa";
    document.getElementById("e_submit").setAttribute("type", "hidden");

    document.getElementById("e_r_room_floor").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_r_room_number").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_r_type_room1").removeAttribute("hidden");
    document.getElementById("e_r_type_room2").setAttributeNode(document.createAttribute("hidden"));
   

}
}

function addReadonly2(){

    if(document.getElementById("typeroomEditView").innerHTML == "Sửa")
    {
    document.getElementById("e_tr_submit").setAttribute("type", "submit");
    document.getElementById("typeroomEditView").innerHTML = "Xem";
    document.getElementById("e_tr_type_name").removeAttribute("readonly");
    document.getElementById("e_tr_cost").removeAttribute("readonly");
    document.getElementById("e_tr_description").removeAttribute("readonly");

    return;    
}
else(document.getElementById("typeroomEditView").innerHTML == "Xem")
{
    document.getElementById("typeroomEditView").innerHTML = "Sửa";
    document.getElementById("e_tr_submit").setAttribute("type", "hidden");

    document.getElementById("e_tr_type_name").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_tr_cost").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_tr_description").setAttributeNode(document.createAttribute("readonly"));
   

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
function showDataView(idRoom, room_floor, room_number,type_room){
      
   
    document.getElementById("typeEditView").innerHTML = "Sửa";
    document.getElementById("e_submit").setAttribute("type", "hidden");
    document.getElementById("e_r_room_floor").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_r_room_number").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_r_type_room1").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_r_type_room1").removeAttribute("hidden");
    document.getElementById("e_r_type_room2").setAttributeNode(document.createAttribute("hidden"));

    document.getElementById("idRoom").setAttribute("value", idRoom);
    document.getElementById("e_r_room_floor").setAttribute("value", room_floor);
    document.getElementById("e_r_room_number").setAttribute("value", room_number); 
    document.getElementById("e_r_type_room1").setAttribute("value", type_room); 
    document.getElementById("iddeleteRoom").setAttribute("value", idRoom); 


}

function showDataEdit(idRoom, room_floor, room_number,type_room){
   
    document.getElementById("e_submit").setAttribute("type", "submit");
    document.getElementById("typeEditView").innerHTML = "Xem";
    document.getElementById("e_r_room_floor").removeAttribute("readonly");
    document.getElementById("e_r_room_number").removeAttribute("readonly");
    document.getElementById("e_r_type_room1").setAttributeNode(document.createAttribute("hidden"));
    document.getElementById("e_r_type_room2").removeAttribute("hidden");

    document.getElementById("idRoom").setAttribute("value", idRoom);
    document.getElementById("e_r_room_floor").setAttribute("value", room_floor);
    document.getElementById("e_r_room_number").setAttribute("value", room_number); 
    document.getElementById("e_r_type_room1").setAttribute("value", type_room);
    document.getElementById("iddeleteRoom").setAttribute("value", idRoom); 


}
function showDataTypeRoomView(idTypeRoom, type_name, cost,description){
    document.getElementById("typeroomEditView").innerHTML = "Sửa";
    document.getElementById("e_tr_submit").setAttribute("type", "hidden");
    document.getElementById("e_tr_type_name").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_tr_cost").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_tr_description").setAttributeNode(document.createAttribute("readonly"));

    document.getElementById("idTypeRoom").setAttribute("value", idTypeRoom);
    document.getElementById("e_tr_type_name").setAttribute("value", type_name);
   document.getElementById("e_tr_cost").setAttribute("value", cost); 
    document.getElementById("e_tr_description").setAttribute("value", description);

}

function showDataTypeRoomEdit(idTypeRoom, type_name, cost,description){
   
    document.getElementById("e_tr_submit").setAttribute("type", "submit");
    document.getElementById("typeroomEditView").innerHTML = "Xem";
    document.getElementById("e_tr_type_name").removeAttribute("readonly");
    document.getElementById("e_tr_cost").removeAttribute("readonly");
    document.getElementById("e_tr_description").removeAttribute("readonly");

    document.getElementById("idTypeRoom").setAttribute("value", idTypeRoom);
    document.getElementById("e_tr_type_name").setAttribute("value", type_name);
    document.getElementById("e_tr_cost").setAttribute("value", cost); 
    document.getElementById("e_tr_description").setAttribute("value", description); 
}
</script>
</body>

</html>
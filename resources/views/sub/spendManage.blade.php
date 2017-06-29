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
                            <img src="{{Auth::guard('account')->user()->image_link}}" alt="..." class="img-circle profile_img">
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
                                
                                <li><a   href="{{ route('subManage',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-desktop"></i> Quản lý khách hàng</a>
                                <li><a   href="{{ route('subBookManage',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-desktop"></i> Quản lý đặt phòng</a>
                                <li><a  class="active" href="{{ route('subSpendManage',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-usd"></i> Quản lý chi</a>
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
                                <img src="{{Auth::guard('account')->user()->image_link)}}" alt="">{{ Auth::guard('account')->user()->first_name }} {{ Auth::guard('account')->user()->last_name }}
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
                    <h2>Danh sách Chi tiêu<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <a href="#" class="btn btn-primary btn-xs" data-target="#addSpendMainmodal" data-toggle="modal" data-backdrop="static" ><i class="fa fa-folder"></i> Thêm Chi tiêu </a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    
                    <table id="responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th id="cel1">ID</th>
                          <th white-space:pre-line" id="cel5">Tên</th>
                          <th id="cel5">Chi phí</th>
                          <th id="cel10">Chú thích</th>
                          <th id="cel10">ngày</th>
                          <th id="cel10">người nhập</th>
                          <th class="nosort"  id="cel5">Quản lý</th>
                        </tr>
                      </thead>
                      <tbody>
                    
                      @foreach ($spends as $spend)
                    
                            <tr>
                                <td>{{$spend->id}}</td>
                                <td>{{$spend->name}}</td>
                                <td>{{$spend->cost}}</td>
                                <td>{{$spend->detail}}</td>
                                <td>{{$spend->date}}</td>
                                <td>{{$spend->first_name}} {{$spend->last_name}}</td>
                                
                                <td>
                                    <a href="#" class="btn btn-primary btn-xs" onclick="showDataView('{{$spend->id}}','{{$spend->name}}', '{{$spend->cost}}', '{{$spend->detail}}', '{{$spend->date}}') " data-toggle="modal" data-backdrop="static" data-target="#viewUserMainmodal "  ><i class="fa fa-folder"></i>Xem</a>
                                    <a href="#" class="btn btn-info btn-xs"  onclick="showDataEdit('{{$spend->id}}','{{$spend->name}}', '{{$spend->cost}}', '{{$spend->detail}}', '{{$spend->date}}') ;" data-toggle="modal" data-backdrop="static" data-target="#viewUserMainmodal"><i class="fa fa-pencil"></i>Sửa</a>

                            <a data-toggle="tooltip" data-placement="top"  class="btn btn-danger btn-xs"
                                            onclick="event.preventDefault();
                                                     document.getElementById('deleteUser{{$spend->id}}').submit();"><i class="fa fa-trash-o"></i> Xóa </a>

                            <form id="deleteUser{{$spend->id}}" action="{{ route('subSpendManage',['subdomain' =>$info['subdomain']]) }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            <input hidden id="typePosts"" name="typePost" value="deleteSpend">
                                            <input hidden id="id" name="id" value="{{$spend->id}}">
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
<div class="modal fade" id="addSpendMainmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
        <div class="loginmodal-container">
        <button type="button" class="close" id="closeDialog" onclick="removeMessage()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          <h1>Thêm Chi tiêu</h1><br>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('subSpendManageSubmit',['subdomain' =>$info['subdomain']]) }}">
                        {{ csrf_field() }}
                        <input hidden id="addtypePost"" name="typePost" value="addSpend">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div >
                                <input id="first_name" type="text" class="form-control" placeholder="Tên" name="name" value="{{old('name') }}" required  >

                                
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('cost') ? ' has-error' : '' }}">
                            <div >
                                <input id="last_name" type="number" min="0" class="form-control" placeholder="Chi phí" name="cost" value="{{ old('cost') }}" required >

                                
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('detail') ? ' has-error' : '' }}">
                            <div >
                                <input id="username" type="text" class="form-control" placeholder="Chú thích" name="detail" value="{{ old('detail') }}" required >

                               
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div >
                                <input id="date" type="date" class="form-control" placeholder="Ngày chi" name="date" value="{{ old('date') }}" required >
                            </div>
                        </div>

                       
                        
                        
                        <input type="submit" name="Register" class="loginmodal-submit " value="Thêm Chi tiêu">
                       
                    </form>
          </div>
        </div>
      </div>

      <!-- modal dialog view  edit user -->
      <div class="modal fade" id="viewUserMainmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
        <div class="loginmodal-container">
        <button type="button" class="close" id="closeDialog" onclick="removeMessage()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          <h1>Xem chi tiết Chi tiêu</h1><br>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('subManageSubmit', ['subdomain' =>$info['subdomain']]) }}">
                        {{ csrf_field() }}
                
                        <input hidden id="typePost"" name="typePost" value="updateSpend">
                        <input hidden id="idUser" name="id" value="">
                         <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div >
                                <input id="e_name" type="text" class="form-control" placeholder="Tên" name="name" value="{{old('name') }}" required  >

                                
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('cost') ? ' has-error' : '' }}">
                            <div >
                                <input id="e_cost" type="number" min="0" class="form-control" placeholder="Chi phí" name="cost" value="{{ old('cost') }}" required >

                                
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('detail') ? ' has-error' : '' }}">
                            <div >
                                <input id="e_detail" type="text" class="form-control" placeholder="Chú thích" name="detail" value="{{ old('detail') }}" required >

                               
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div >
                                <input id="e_date" type="date" class="form-control" placeholder="Ngày chi" name="date" value="{{ old('date') }}" required >
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="e_submit" type="submit" name="Register" class="btn btn-info btn-xs pull-left" value="OK">
                        </div>
                         <div class="col-md-6 col-sm-6 col-xs-12  form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <!-- <a data-toggle="tooltip" data-placement="top"  class="pull-right btn btn-primary btn-xs" href="{{ route('addUserMainSubmit') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('edit-form').submit();"><i class="fa fa-folder"></i> View  </a> -->
                            <a   class="btn btn-danger btn-xs pull-right" onclick="deletespend()"><i class="fa fa-trash-o"></i> Xóa </a>

                            
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
function deletespend(){
    document.getElementById("typePost").setAttribute("value", "deleteSpend");
    var l = document.getElementById('e_submit');
    l.click();

}
function addReadonly(){

    if(document.getElementById("typeEditView").innerHTML == "Sửa")
    {
    document.getElementById("e_submit").setAttribute("type", "submit");
    document.getElementById("typeEditView").innerHTML = "Xem";
    document.getElementById("e_name").removeAttribute("readonly");
    document.getElementById("e_cost").removeAttribute("readonly");
    document.getElementById("e_detail").removeAttribute("readonly");
    document.getElementById("e_date").removeAttribute("readonly");

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

    document.getElementById("e_name").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_cost").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_detail").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_date").setAttributeNode(document.createAttribute("readonly"));
}
   

}

function removeReadonly(){
    


    document.getElementById("e_submit").setAttribute("type", "submit");
    document.getElementById("typeEditView").innerHTML = "Xem";
   document.getElementById("e_name").removeAttribute("readonly");
    document.getElementById("e_cost").removeAttribute("readonly");
    document.getElementById("e_detail").removeAttribute("readonly");
    document.getElementById("e_date").removeAttribute("readonly");
     // document.getElementById("typeEditView").setAttribute("onclick", "addReadonly())");
    

}
function showDataView(id, name, cost,detail,date){
      
   
    document.getElementById("typeEditView").innerHTML = "Sửa";
    document.getElementById("e_submit").setAttribute("type", "hidden");
    document.getElementById("e_name").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_cost").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_detail").setAttributeNode(document.createAttribute("readonly"));
    document.getElementById("e_date").setAttributeNode(document.createAttribute("readonly"));

    document.getElementById("idUser").setAttribute("value", id);
    document.getElementById("e_name").setAttribute("value", name);
    document.getElementById("e_cost").setAttribute("value", cost); 
    document.getElementById("e_detail").setAttribute("value", detail); 
    document.getElementById("e_date").setAttribute("value", date); 

}

function showDataEdit(id, name, cost,detail,date){
   
    document.getElementById("e_submit").setAttribute("type", "submit");
    document.getElementById("typeEditView").innerHTML = "Xem";
    document.getElementById("e_name").removeAttribute("readonly");
    document.getElementById("e_cost").removeAttribute("readonly");
    document.getElementById("e_detail").removeAttribute("readonly");
    document.getElementById("e_date").removeAttribute("readonly");

    document.getElementById("idUser").setAttribute("value", id);
    document.getElementById("e_name").setAttribute("value", name);
    document.getElementById("e_cost").setAttribute("value", cost); 
    document.getElementById("e_detail").setAttribute("value", detail); 
    document.getElementById("e_date").setAttribute("value", date); 

}
</script>
</body>

</html>
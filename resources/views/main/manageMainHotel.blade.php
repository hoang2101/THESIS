<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Virtual Library Management System</title>

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
    <link href="css/custom.min.css" rel="stylesheet">

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-modx"></i> <span>Virtual Library</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="img/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>Le Viet Toan</h2>
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
                                <li><a href="{{ route('mainHome') }}"><i class="fa fa-edit"></i> Quản lý khách hàng</a>
                                    
                                </li>
                                <li><a class="active"><i class="fa fa-desktop"></i> Quản lý hệ thống khách sạn</a>
                                    
                                </li>
                                <li><a><i class="fa fa-table"></i>zxczxc  </a>
                                    
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
                                </li>
                            </ul>
                        </div>
                        <div class="menu_section">
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
                                    <img src="img/img.jpg" alt="">Le Viet Toan
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="profile.html"> Profile</a></li>
                                    <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Sign Out</a></li>
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
                    <h2>Responsive example<small>Users</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-backdrop="static" data-target="#addUserMainmodal"><i class="fa fa-folder"></i> Thêm khách hàng </a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
                    </p>
                    <p id="asd">zxczxczzcxzzxc</p>
                    <table id="responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th id="cel1">ID</th>
                          <th white-space:pre-line" id="cel5">Hotel name</th>
                          <th id="cel5">User</th>
                          <th id="cel10">Domain</th>
                          <th id="cel10">Expire Date</th>
                          <th id="cel5">tổng booking</th>
                          <th class="nosort"  id="cel5">Manage</th>
                        </tr>
                      </thead>
                      <tbody>
                      {{$i = 1}}
                      	 @foreach ($hotels as $hotel)
                      	 {{$i ++}}
                            <tr>
                                <td>{{$hotel->hotel_id}}</td>
                                <td>{{$hotel->hotel_name}}</td>
                                <td>{{$hotel->hotel_account}}</td>
                                <td>{{$i}}</td>
                                <td>{{$hotel->hotel_account}}</td>
                                <td>{{$hotel->hotel_account}}</td>
                                <td>
                                    <a href="#" onclick="showdata({{$i}})" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                    <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
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
<div class="modal fade" id="addUserMainmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
        <div class="loginmodal-container">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          <h1>Login to Your Account</h1><br>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('addUserMainSubmit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <div >
                                <input id="first_name" type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <div >
                                <input id="last_name" type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('usermane') ? ' has-error' : '' }}">
                            <div >
                                <input id="username" type="text" class="form-control" placeholder="Username" name="username" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div >
                                <input id="email" type="email" class="form-control" placeholder="E-Mail Address" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div >
                                <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div >
                                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <input type="submit" name="Register" class="login loginmodal-submit" value="Register">
                       
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
    <!-- My Cutom Scripts -->
    <script src="js/custom-scripts.js"></script>

    <script>
    //gets table

function showdata($id) {
		// document.getElementById("asd").innerHTML = "{!! $hotels[$id]->hotel_name !!}";
	
    
}
    
</script>
</body>

</html>
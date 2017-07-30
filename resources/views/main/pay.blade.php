<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thanh Toán</title>

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
    <!-- ?<link rel="stylesheet" type="text/css" href="css/style_namage.css"></link> -->
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
                            <h2>{{ Auth::user()->first_name }} {{ Auth::user()->last_name}}</h2>
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
                                <li><a  href="{{ route('mainManage') }}"><i class="fa fa-edit"></i> Quản lý khách hàng</a>
                                    
                                </li>
                                <li><a href="{{ route('mainManageHotel') }}"><i class="fa fa-desktop"></i> Quản lý hệ thống khách sạn</a></li>
                                <li><a href="{{ route('mainProfile') }}"><i class="fa fa-user"></i> Quản lý tài khoản</a></li>
                                <li><a href="{{ route('mainProfile') }}"><i class="fa fa-cog"></i> Thống kê </a></li>

                                <li><a class="active" href="{{ route('mainProfile') }}"><i class="fa fa-user"></i> Thanh Toán</a></li>
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
                    <h2>Thanh toán<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                      <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Thông tin </label>
                      <div class="form-horizontal form-label-left">
                          <div class="form-group">
                                        
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input disabled type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12" value="{{$info['name']}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input disabled type="text" id="last-name" name="amount" required="required" class="form-control col-md-7 col-xs-12" value="{{$info['amount']}} VND">
                                            </div>
                                        </div>
                      </div>
                                        
                                        <br>
                                         <div class="ln_solid"></div>
                                         <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Thanh toán qua paypal
                                            </label>
                                         <form role="form" method="POST" action="{{ route('paypalSubmit')}}" >
                                         {{ csrf_field() }}
                                            <input hidden type="text" name="typePost" value="paypal">
                                            <input hidden type="text" id="name" name="name"   value="{{$info['name']}}">
                                          <input hidden type="text" id="last-name" name="amount" value="{{$info['amount']}}">
                                            
                                            
                                             <center> <button type="submit" >
                                                 <img src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/gold-pill-paypal-44px.png" alt="PayPal">
                                             </button> 
                                           </center>
                                         </form>
                                        
                                        <div class="ln_solid"></div>
                     <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Thanh toán qua Thẻ 
                                            </label>
                    <form id="demo-form2" method="POST" action="{{ route('paypalSubmit')}}" data-parsley-validate class="form-horizontal form-label-left">
                    {{ csrf_field() }}
                                     <input hidden type="text" name="typePost" value="payment">
                                            <input hidden type="text" id="name" name="name" required="required"  value="{{$info['name']}}">
                                          <input hidden type="text" id="last-name" name="amount" required="required"  value="{{$info['amount']}}">
                                            
                                        <div class="form-group">
                                        
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Họ<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="first-name" name="first_name" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tên<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="last-name" name="last_name" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Loại thẻ<span class="required">*</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="typeCredit" name="typecredit" class="form-control col-md-7 col-xs-12" type="text" name="typeCredit" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="middle-name"  class="control-label col-md-3 col-sm-3 col-xs-12">Mã thẻ<span class="required">*</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="typecredit" name="numberCredit" class="form-control col-md-7 col-xs-12" type="text" name="typeCredit" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ngày hết hạn<span class="required">*</label>
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <input id="expiredcredit"  name="month" class="form-control col-md-7 col-xs-12" type="number" placeholder="Tháng" min="1" max = "12" required>
                                            </div>

                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <input id="expiredcredit" placeholder="năm" name="year" class="form-control col-md-7 col-xs-12" type="number" min="2000" required>
                                            </div>
                                        
                                            <label for="middle-name" class="control-label col-md-1 col-sm-1 col-xs-12">CCV/CVV<span class="required">*</label>
                                            <div class="col-md-1 col-sm-1 col-xs-12">
                                                <input id="typeCredit" class="form-control col-md-7 col-xs-12" type="text" name="ccv" required>
                                            </div>
                                        </div>
                                        
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                
                                                <button type="submit" class="btn btn-success">Thanh toán</button>
                                            </div>
                                        </div>

                                    </form>
                    
                    
                    
                  </div>
                </div>
              </div>

            </div>
            <!-- /page content -->

      
     
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
@if (session('messagesResult'))
   <script type="text/javascript">  
      alert(" {{ session('messagesResult') }}");
    </script>
   
    @endif
</body>

</html>
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
                       
                            <h3>Quản trị</h3>
                            <ul class="nav side-menu">
                                <li><a href="{{ route('subHome',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-home"></i> Home </a>
                                </li>
                                
                                <li><a href="{{ route('subManage',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-desktop"></i> Quản lý khách hàng</a>
                                <li><a  href="{{ route('subStaffManage',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-desktop"></i> Quản lý Nhân viên</a>
                                <li><a  href="{{ route('subRoomManage',['subConfig' =>$info['subdomain']]) }}"><i class="fa fa-university"></i> Quản lý phòng</a>
                                <li><a href="{{ route('subServiceManage',['subConfig' =>$info['subdomain']]) }}"><i class="fa fa-server"></i> Quản lý dịch vụ</a>
                                <li><a  href="{{ route('subProfile',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-user"></i> Quản lý Tài khoản</a>
                                 <li><a class="active" href="{{ route('subConfig',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-cogs"></i> Cài Đặt Web</a>
                                 <li><a  href="{{ route('subReportManage',['subReportManage' =>$info['subdomain']]) }}"><i class="fa fa-cog"></i> Thống kê</a>
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

             <div class="col-md-12 col-sm-12 col-xs-12" >
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Cài đặt web<small></small></h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                        <form  id="config_form" enctype="multipart/form-data" role="form" method="POST" action="{{ route('subConfigSubmit',['subdomain' =>$info['subdomain']]) }}">
                       {{ csrf_field() }}
                       <input hidden id="typePost"" name="typePost" value="updateUser">
                       <input hidden id="idUser" name="id" value="{{Auth::guard('account')->user()->id}}">
                       <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                          <input type="text" class="form-control has-feedback-left" readonly id="username" name="username" placeholder="Tên Khách sạn" value="{{$info['name']}}"> 

                          <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                            <label>Chọn màu nền 1</label>
                          <input type="color" class="form-control has-feedback-left"  id="color1" name="color1"  value="{{$config->color1}}">

                          <span class="fa fa-yelp form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                            <label>Chọn màu nền 2</label>
                          <input type="color" class="form-control has-feedback-left"  id="color2" name="color2"  value="{{$config->color2}}">

                          <span class="fa fa-yelp form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>

              
           

                        <div class="row">
                            <div class="col-md-12">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <div class="col-md-3">
                                    <label>Chọn ảnh nền</label>
                                        <img class="img-responsive avatar-view" src="{!! asset($config->background) !!}" id="blah" alt="Avatar">
                                        <input type="file" id="imgInp" name="image" accept="image/*" value="{{$config->background}}" />
                                    </div>
                                    

                                </div>
                            </div>
                               
                        </div>
                    
                        </div>
                         <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                            <label>Chỉnh sửa nội dung miêu tả khách sạn</label>
                          <textarea form ="config_form" class="form-control has-feedback-left"  id="intro" name="intro" rows="4" cols="35" wrap="soft">{{$config->intro}}</textarea>

                         
                        </div>
                      </div>

                
                      

                      <div class="row">

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <button id="btn_reset_pwd" type="submit" class="btn btn-primary"><i class="fa fa-edit m-right-xs"></i>&nbsp;Thay đổi Cài đặt</button>
                        </div>
                      </div>
                    </form>
                    
                            

                    <!-- end conten -->
                  </div>
                </div>
              </div>

          <!--     <div class="col-md-12 col-sm-12 col-xs-12" >
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Nội dung<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle btn btn-xs" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-folder">Thêm Nội dung</i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#"  data-target="#addTextMainmodal" data-toggle="modal" data-backdrop="static" ><i class="fa fa-folder"></i> Thêm Đoạn text </a>
                          </li>
                          <li><a href="#"  data-target="#addTypeRoomMainmodal" data-toggle="modal" data-backdrop="static" ><i class="fa fa-folder"></i> Thêm Thêm blog </a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      
                        
                            
                              

                            

                    <!-- end conten -->
                  </div>
                </div>
              </div> -->

               

            </div>
            <!-- /page content -->
<!-- modal dialog add user -->
<div class="modal fade" id="addTextMainmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
        <div class="loginmodal-container">
        <button type="button" class="close" id="closeDialog" onclick="removeMessage()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
          <h1>Thêm đoạn text</h1><br>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('subRoomManageSubmit',['subdomain' =>$info['subdomain']]) }}">
                        {{ csrf_field() }}
                        <input hidden id="addtypePost"" name="typePost" value="addText">
                         <div class="row">
                            <div class=" form-group has-feedback">

                                <label>Tiêu đề</label>
                                <input type="text" class="form-control has-feedback-left"  id="color1" name="tieude" placeholder="Tiêu đề"  value="">

                                </div>
                            </div>
                            <div class="row">
                                <div class=" form-group has-feedback">

                                <label>Nội dung</label>
                                <textarea form ="content_form" class="form-control has-feedback-left"  id="intro" name="intro" rows="4" cols="35" wrap="soft"></textarea>

                                  
                            </div>
                        </div>

                        

                       
                        <input type="submit" name="Register" class="loginmodal-submit " value="Thêm Phòng">
                       
                    </form>
          </div>
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
<script type="text/javascript">  
    function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});

</script>


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
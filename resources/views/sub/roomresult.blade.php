<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quản lý tài khoản</title>

    <!-- Bootstrap Core CSS -->
    <link href="{!! asset('vendors/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{!! asset(' vendor/metisMenu/metisMenu.min.css')!!}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{!! asset('css/sb-admin-2.css')!!}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{!! asset('vendor/morrisjs/morris.css')!!}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{!! asset('vendors/font-awesome/css/font-awesome.min.css')!!}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css"></style>
    <style type="text/css">
        .ln_solid {
    border-top: 1px solid #e5e5e5;
    color: #fff;
    background-color: #fff;
    height: 1px;
    margin: 20px 0;

    }
     .nopadding
    {
    padding-right: 0 !important;
    padding-left: 0 !important;
    
    }
    .shadow
    {
        margin-bottom: 20px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .cover {

      
        width: 100%;
        
       padding: 10px;
    }
    </style>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <a href="#" class="navbar-brand site_title"><i class="fa fa-modx"></i> <span>QUẢN LÝ Tài Khoản</span></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <!-- <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li> -->
                       <!--  <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li> -->
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        @if(!Auth::guard('account')->check()) 
                        <img style="width: 29px; height: 29px;border-radius: 50%; margin-right: 10px;" src="{!! asset('img/avatar_null.png') !!}" alt="">KHÁCH
                          
                        
                       @elseif(Auth::guard('account')->user()->image_link == null)
                                <img style="width: 29px; height: 29px;border-radius: 50%; margin-right: 10px;" src="{!! asset('img/avatar_null.png') !!}" alt="">{{ Auth::guard('account')->user()->first_name }} {{Auth::guard('account')->user()->last_name }}
                                @else
                                <img  style="width: 29px; height: 29px;border-radius: 50%; margin-right: 10px;" src="{{Auth::guard('account')->user()->image_link}}" alt="">{{ Auth::guard('account')->user()->first_name }} {{ Auth::guard('account')->user()->last_name }}
                         @endif

                      
                                    <span class=" fa fa-angle-down"></span> 
                    </a>
                    @if(Auth::guard('account')->check()) 
                    <ul class="dropdown-menu dropdown-user">
                       
                        <li><a href="{{ route('subProfile',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        
                        <!-- <li class="divider"></li>  dung de gach ngang--> 

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
                      @endif
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                <div class="profile clearfix">
                       
                    <ul class="nav" id="side-menu">
                        @if(Auth::guard('account')->check()) 
                        <li>
                            <a href="{{ route('subHome',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="{{ route('subProfile',['subdomain' =>$info['subdomain']]) }}" class="active"><i class="fa fa-dashboard fa-fw"></i> Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('subHistoryBook',['subdomain' =>$info['subdomain']]) }}" ><i class="fa fa-history fa-fw"></i> Lịch sử đặt phòng</a>
                        </li>
                        <li>
                            <a class="active" href="{{ route('roomResult',['subdomain' =>$info['subdomain']]) }}" class="active"><i class="fa fa-dashboard fa-fw"></i> Kết quả tìm phòng</a>
                        </li>
                        @else
                        <li>
                            <a href="{{ route('subHome',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a class="active" href="{{ route('roomResult',['subdomain' =>$info['subdomain']]) }}" class="active"><i class="fa fa-dashboard fa-fw"></i>Kết quả tìm phòng</a>
                        </li>
                        @endif
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Kết quả tìm phòng</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                @if ($resulttype_room = session('resulttype_room'))
                <?php 
                $rsimage = \Session::get('rsimage');
                $rsnameroom = \Session::get('rsnameroom');
                $resultcost = \Session::get('resultcost');
                $nroom = \Session::get('nroom');
                ?>
                @foreach ($resulttype_room as $key => $type_room)
                <div class="row shadow">
                 <div class="col-md-3 col-sm-3 col-xs-12 profile_left nopadding">
                    <div class="profile_img">
                        <div id="crop-avatar">
                        @if($rsimage[$key] == "img/roomhotel.png")
                            <img class="img-responsive avatar-view cover" src="../../{{$rsimage[$key]}}" alt="Avatar">
                        @else
                            <img class="img-responsive avatar-view cover" src="{{$rsimage[$key]}}" alt="Avatar">
                        @endif
                        </div>
                    </div>
                 </div>

                 <div class="col-md-9 col-sm-9 col-xs-12 nopadding">
                    <div id="profile_info">
                        <div class="profile_title">
                            <div class="form-group">
                                <div class="col-md-10 col-sm-10 col-xs-6">
                                    <p><span><strong>Loại phòng: </strong></span>{{$rsnameroom[$key]}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10 col-sm-10 col-xs-6">
                                    <p><span><strong>Số phòng: </strong></span>{{$nroom}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10 col-sm-10 col-xs-6">
                                    <p><span><strong>Giá: </strong></span>{{$resultcost[$key]}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10 col-sm-10 col-xs-6">
                                   <form role="form" method="POST" action="{{ route('subRoomResultsubmit',['subdomain' =>$info['subdomain']]) }}">
                                  {{ csrf_field() }}
                                    <input hidden type="id" name="id" value="{{$key}}">
                                    <input type="submit" class="btn btn-primary btn-xs" name="datphong" value="Đặt phòng">
                                  </form>
                                </div>
                            </div>
                            

                        </div>
                    </div>
                </div>
                </div>

              
    
                 @endforeach
               @endif
            </div>
            <!-- /.row -->
            <div class="row">
               
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{!! asset('vendors/jquery/dist/jquery.min.js') !!}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{!! asset('vendors/bootstrap/dist/js/bootstrap.min.js') !!}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{!! asset('vendor/metisMenu/metisMenu.min.js') !!}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{!! asset('vendor/raphael/raphael.min.js') !!}"></script>
    <script src="{!! asset('vendor/morrisjs/morris.min.js') !!}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{!! asset('js/sb-admin-2.js')!!}"></script>
    

</html>

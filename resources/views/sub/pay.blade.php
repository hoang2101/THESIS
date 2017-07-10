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
    <style type="text/css">
        .ln_solid {
    border-top: 1px solid #e5e5e5;
    color: #fff;
    background-color: #fff;
    height: 1px;
    margin: 20px 0;
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
                    <ul class="dropdown-menu dropdown-user">
                       @if(Auth::guard('account')->check())
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
                        @endif
                    </ul>
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
                            <a class="active" href="{{ route('subpaypal',['subdomain' =>$info['subdomain']]) }}" class="active"><i class="fa fa-dashboard fa-fw"></i>Thanh toán</a>
                        </li>
                        @else
                        <li>
                            <a href="{{ route('subHome',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a class="active" href="{{ route('subpaypal',['subdomain' =>$info['subdomain']]) }}" class="active"><i class="fa fa-dashboard fa-fw"></i>Thanh toán</a>
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
                    <h1 class="page-header">Thanh Toán</h1>
                </div>
                <div class="x_content">
                    
                      <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Thông tin </label>
                      <div class="form-horizontal form-label-left">
                          <div class="form-group">
                                        
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input disabled type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12" value="{{$infopay['name']}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input disabled type="text" id="last-name" name="amount" required="required" class="form-control col-md-7 col-xs-12" value="{{$infopay['amount']}} VND">
                                            </div>
                                        </div>
                                        <div class="form-group {{ $errors->has('ho') ? ' has-error' : '' }}">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input  type="text" id="ho" onchange="addFirstName();" name="ho" required="required" placeholder="Họ" class="form-control col-md-7 col-xs-12" value="@if(Auth::guard('account')->check()){{$users->first_name}}  @endif">
                                            </div>
                                            @if ($errors->has('ho'))
                                              <span class="help-block has-error">
                                                    <strong class="messageError">{{ $errors->first('ho') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group {{ $errors->has('ten') ? ' has-error' : '' }}">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input  type="text" id="ten" onchange="addlastName();" name="ten" required="required" placeholder="Tên" class="form-control col-md-7 col-xs-12" value="@if(Auth::guard('account')->check()){{$users->last_name}}  @endif">
                                            </div>
                                            @if ($errors->has('ten'))
                                              <span class="help-block has-error">
                                                    <strong class="messageError">{{ $errors->first('ten') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input  type="email" id="email" onchange="addemail();" name="email" required="required" placeholder="Email" class="form-control col-md-7 col-xs-12" value="@if(Auth::guard('account')->check()){{$users->email}}  @endif">
                                            </div>
                                            @if ($errors->has('email'))
                                              <span class="help-block has-error">
                                                    <strong class="messageError">{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group {{ $errors->has('quocgia') ? ' has-error' : '' }}">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                 <select id="quocgia" onchange="addCountry()"  name="quocgia" class="form-control mySelectCountry" placeholder="Country" required>
                                                    <option value="" disabled selected>Chọn  Quốc gia</option>
                                    
                                </select>
                                            </div>

                                            @if ($errors->has('quocgia'))
                                              <span class="help-block has-error">
                                                    <strong class="messageError">{{ $errors->first('quocgia1') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                      </div>
                                        
                                        <br>
                                         <div class="ln_solid"></div>
                                         <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Thanh toán qua paypal
                                            </label>
                                         <form role="form" method="POST" action="{{ route('subpaypalSubmit',['subdomain' =>$info['subdomain']])}}" >
                                         {{ csrf_field() }}
                                            <input hidden type="text" name="typePost" value="paypal">
                                            <input hidden type="text" id="name" name="name"   value="{{$infopay['name']}}">
                                          <input hidden type="text" id="last-name" name="amount" value="{{$infopay['amount']}}">
                                          <input hidden type="text" id="ho1" name="ho" value="@if(Auth::guard('account')->check()){{$users->first_name}}  @endif">
                                          <input hidden type="text" id="ten1" name="ten" value="@if(Auth::guard('account')->check()){{$users->last_name}}  @endif">
                                          <input hidden type="text" id="email1" name="email" value="@if(Auth::guard('account')->check()){{$users->email}}  @endif">
                                          <input hidden type="text" id="quocgia1" name="quocgia" value="@if(Auth::guard('account')->check()){{$users->country}}@endif">
                                            
                                            
                                             <center> <button type="submit" >
                                                 <img src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/gold-pill-paypal-44px.png" alt="PayPal">
                                             </button> 
                                           </center>
                                         </form>
                                        
                                        <div class="ln_solid"></div>
                     <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Thanh toán qua Thẻ 
                                            </label>
                    <form id="demo-form2" method="POST" action="{{ route('subpaypalSubmit',['subdomain' =>$info['subdomain']])}}" data-parsley-validate class="form-horizontal form-label-left">
                    {{ csrf_field() }}
                                     <input hidden type="text" name="typePost" value="payment">
                                            <input hidden type="text" id="name" name="name" required="required"  value="{{$infopay['name']}}">
                                          <input hidden type="text" id="last-name" name="amount" required="required"  value="{{$infopay['amount']}}">
                                          <input hidden type="text" id="ho2" name="ho" value="@if(Auth::guard('account')->check()){{$users->first_name}}  @endif">
                                          <input hidden type="text" id="ten2" name="ten" value="@if(Auth::guard('account')->check()){{$users->last_name}}  @endif">
                                          <input hidden type="text" id="email2" name="email" value="@if(Auth::guard('account')->check()){{$users->email}}  @endif">
                                          <input hidden type="text" id="quocgia2" name="quocgia" value="@if(Auth::guard('account')->check()){{$users->country}}@endif">
                                            
                                        <div class="form-group">
                                        
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Họ<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="first-name" name="first_name" required="required" class="form-control col-md-7 col-xs-12" value="@if(Auth::guard('account')->check()){{$users->first_name}}  @endif">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tên<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="last-name" name="last_name" required="required" class="form-control col-md-7 col-xs-12" value="@if(Auth::guard('account')->check()){{$users->last_name}}  @endif">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Loại thẻ<span class="required">*</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="typeCredit" name="typecredit" class="form-control col-md-7 col-xs-12" type="text" name="typeCredit">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="middle-name"  class="control-label col-md-3 col-sm-3 col-xs-12">Mã thẻ<span class="required">*</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="typecredit" name="numberCredit" class="form-control col-md-7 col-xs-12" type="text" name="typeCredit">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ngày hết hạn<span class="required">*</label>
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <input id="expiredcredit"  name="month" class="form-control col-md-7 col-xs-12" type="number" placeholder="Tháng" min="1" max = "12">
                                            </div>

                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <input id="expiredcredit" placeholder="năm" name="year" class="form-control col-md-7 col-xs-12" type="number" min="2000">
                                            </div>
                                        
                                            <label for="middle-name" class="control-label col-md-1 col-sm-1 col-xs-12">CCV/CVV<span class="required">*</label>
                                            <div class="col-md-1 col-sm-1 col-xs-12">
                                                <input id="typeCredit" class="form-control col-md-7 col-xs-12" type="text" name="ccv">
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
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                
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
    <script src="{!! asset('js/getlistCountry.js') !!}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{!! asset('js/sb-admin-2.js')!!}"></script>
    @if (session('messagesResult'))
   <script type="text/javascript">  
      alert(" {{ session('messagesResult') }}");
    </script>
   
    @endif
    <script type="text/javascript">
            var x1 = document.getElementById("ho1");
            var x2 = document.getElementById("ho2");
            var x = document.getElementById("ho");
            x1.value = x.value;
            x2.value = x.value;
            var x1 = document.getElementById("ten1");
            var x2 = document.getElementById("ten2");
            var x = document.getElementById("ten");
            x1.value = x.value;
            x2.value = x.value;
            var x1 = document.getElementById("quocgia1");
            var x2 = document.getElementById("quocgia2");
            var x = document.getElementById("quocgia");
            x1.value = x.value;
            x2.value = x.value;

        function addFirstName(){
            var x1 = document.getElementById("ho1");
            var x2 = document.getElementById("ho2");
            var x = document.getElementById("ho");
            x1.value = x.value;
            x2.value = x.value;
        }
         function addlastName(){
            var x1 = document.getElementById("ten1");
            var x2 = document.getElementById("ten2");
            var x = document.getElementById("ten");
            x1.value = x.value;
            x2.value = x.value;
        }
         function addCountry(){
            var x1 = document.getElementById("quocgia1");
            var x2 = document.getElementById("quocgia2");
            var x = document.getElementById("quocgia");
            x1.value = x.value;
            x2.value = x.value;
        }
        function addemail(){
            var x1 = document.getElementById("email1");
            var x2 = document.getElementById("email2");
            var x = document.getElementById("email");
            x1.value = x.value;
            x2.value = x.value;
        }
        
    </script>

    
</body>

</html>

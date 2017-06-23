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
     <script src="{!! asset('vendors/jquery/dist/jquery.min.js') !!}"></script>

    <!-- MetisMenu CSS -->
    

    <!-- Custom CSS -->
    <link href="{!! asset('css/sb-admin-2.css')!!}" rel="stylesheet">

    <!-- Morris Charts CSS -->
   

    <!-- Custom Fonts -->
    <link href="{!! asset('vendors/font-awesome/css/font-awesome.min.css')!!}" rel="stylesheet" type="text/css">
   

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   <style type='text/css'>
.fa.form-control-feedback {<!-- w  ww.jav a2  s .co m-->
  line-height: 34px;
  padding-left: 25px;
  padding-top: 10px;
}
.input-lg ~ .fa.form-control-feedback {
  line-height: 46px; 
}
.has-feedback-left input.form-control {
  padding-left: 34px; 
  padding-right: 12px; 
}
.has-feedback-left .form-control-feedback {
  left: 0;
}

.form-horizontal .has-feedback-left .form-control-feedback {
  left: 12px;

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

                       @if(Auth::guard('account')->user()->image_link == null)
                                <img style="width: 29px; height: 29px;border-radius: 50%; margin-right: 10px;" src="{!! asset('img/avatar_null.png') !!}" alt="">{{ Auth::guard('account')->user()->first_name }} {{Auth::guard('account')->user()->last_name }}
                                @else
                                <img  style="width: 29px; height: 29px;border-radius: 50%; margin-right: 10px;" src="{!! asset('img/User/' .Auth::guard('account')->user()->image_link) !!}" alt="">{{ Auth::guard('account')->user()->first_name }} {{ Auth::guard('account')->user()->last_name }}
                                @endif
                                    <span class=" fa fa-angle-down"></span> 
                    </a>
                    <ul class="dropdown-menu dropdown-user">

                        <li><a href="{{ route('subConfig',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
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
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                <div class="profile clearfix">
                       
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="{{ route('subHome',['subdomain' =>$info['subdomain']]) }}"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="{{ route('subProfile',['subdomain' =>$info['subdomain']]) }}" ><i class="fa fa-dashboard fa-fw"></i> Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('subHistoryBook',['subdomain' =>$info['subdomain']]) }}" class="active"><i class="fa fa-history fa-fw"></i> Lịch sử đặt phòng</a>
                        </li>
                   
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Lịch sử đặt phòng</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                  <table class="table table-striped projects">
                      <thead>
                        <tr>
                          
                          <th style="width: 20%">Mã đặt phòng</th>
                          <th style="width: 20%">Số phòng</th>
                          <th style="width: 20%">Ngày đến</th>
                          <th style="width: 20%">Ngày đi</th>
                          <th style="width: 20%">Phí</th>
                        </tr>
                      </thead>

                        @foreach($books as $key=>$book)
                           <tbody>
                              <tr>
                                <td>
                                  <p>{{$book->booking_id}}</p>
                                </td>
                                <td>
                                <p>{{$book->room_id}}</p>
                                </td>
                                <td>
                                 <p>{{$book->date_from}}</p>
                                </td>
                                <td>
                                 <p>{{$book->date_to}}</p>
                                </td>
                                <td>
                                    <p>{{$book->total_cost_room}}</p>
                                </td>
                               
                             
                            </tbody>


                         @endforeach
                    
                      
                    </table>

               
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

    <script  src="{!! asset('js/jquery.min.js') !!}"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Bootstrap Core JavaScript -->
 
    <!-- Metis Menu Plugin JavaScript -->
    

    <!-- Custom Theme JavaScript -->
    <script src="{!! asset('js/sb-admin-2.js')!!}"></script>
    @if ($errors->has('username') )
  @if($errors->first('username') == "Tài khoản hoặc mật khẩu không đúng")

    <script type="text/javascript">  
    $(document).ready(function () {
      $('#login-modal').modal('show');

}); </script>
 @endif
 @if($errors->first('username') != "Tài khoản hoặc mật khẩu không đúng")

    <script type="text/javascript">  
    $(document).ready(function () {
      $('#register-modal').modal('show');

}); </script>
 @endif
  @endif  @if ($errors->has('password'))
      <script>  <script>  function myFunction() { 
    document.getElementById("register-modal").showModal(); </script>
  @endif @if ($errors->has('email'))
      <script>  <script>  function myFunction() { 
    document.getElementById("register-modal").showModal(); </script>
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
</script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
</script>
<script>
  $( function() {
    $( "#datepicker2" ).datepicker();
  } );
</script>
@if (session('messagesResult'))
   <script type="text/javascript">  
      alert(" {{ session('messagesResult') }}");
    </script>
   
    @endif

</body>

</html>

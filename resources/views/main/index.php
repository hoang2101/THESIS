<!DOCTYPE html>
<html ng-app="MyApp">
  <head>
    <!--=============================================== 
    Template Design By WpFreeware Team.
    Author URI : http://www.wpfreeware.com/
    ====================================================-->

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>THESIS : Home</title>

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="img/wpf-favicon.png"/>

    <!-- CSS
    ================================================== -->       
    <!-- Bootstrap css file-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome css file-->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Superslide css file-->
    <link rel="stylesheet" href="css/superslides.css">
    <!-- Slick slider css file -->
    <link href="css/slick.css" rel="stylesheet"> 
    <!-- Circle counter cdn css file -->
    <link rel='stylesheet prefetch' href='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/css/jquery.circliful.css'>  
    <!-- smooth animate css file -->
    <link rel="stylesheet" href="css/animate.css"> 
    <!-- preloader -->
    <!--<link rel="stylesheet" href="css/queryLoader.css" type="text/css" /> -->
    <!-- gallery slider css -->
    <link type="text/css" media="all" rel="stylesheet" href="css/jquery.tosrus.all.css" />    
    <!-- Default Theme css file -->
    <link id="switcher" href="css/themes/default-theme.css" rel="stylesheet">
    <!-- Main structure css file -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
    <link rel='stylesheet prefetch' href='https://material.angularjs.org/1.1.3/docs.css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>   
    <link href='http://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 
  </head>
  <body ng-controller="AccountCtrl">   
  

    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"></a>
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
    <header id="header">
      <!-- BEGIN MENU -->
      <div class="menu_area">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">  <div class="container">
            <div class="navbar-header">
              <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <!-- LOGO -->
              <!-- TEXT BASED LOGO -->
              <a class="navbar-brand" href="/">THESIS <span></span></a>              
              <!-- IMG BASED LOGO  -->
               <!-- <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="logo"></a>  -->            
                     
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#aboutUs">About Us</a></li>
                <li><a href="#whyUs">Why Us</a></li>
                <li><a href="#pricing">Pricing</a></li>
                <li><a href="#footer">Contact</a></li>
                <li><a id="btn-login" class="btn" ng-click="showLogin($event)">Login</a></li>   
                <li><a id="btn-reg" class="btn" ng-click="showRegister($event)">Register</a></li> 
              </ul>           
            </div><!--/.nav-collapse -->
          </div>     
        </nav>  
      </div>
      <!-- END MENU --> 

    </header>
    <!--=========== END HEADER SECTION ================--> 
<!-- login -->
<div ng-if="status" id="status">
    <b layout="row" layout-align="center center" class="md-padding">
      {{status}}
    </b>
  </div>
    <!--=========== BEGIN SLIDER SECTION ================-->
   
    <section id="slider">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="slider_area">
            <!-- Start super slider -->
            <div id="slides">
              <ul class="slides-container">                          
                <li>
                  <img src="img/slider/2.jpg" alt="img">
                   <div class="slider_caption">
                    <h2>Largest & Beautiful University</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                  </div>
                  </li>
                <!-- Start single slider-->
                <li>
                  <img src="img/slider/3.jpg" alt="img">
                   <div class="slider_caption slider_right_caption">
                    <h2>Better Education Environment</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search</p>
                  </div>
                </li>
                <!-- Start single slider-->
                <li>
                  <img src="img/slider/4.jpg" alt="img">
                   <div class="slider_caption">
                    <h2>Find out you in better way</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search</p>
                  </div>
                </li>
              </ul>
              <nav class="slides-navigation">
                <a href="#" class="next"></a>
                <a href="#" class="prev"></a>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--=========== END SLIDER SECTION ================-->

    <!--=========== BEGIN ABOUT US SECTION ================-->
    <section id="aboutUs">
      <div class="container">
      <div class="row">
                <div class="col-lg-12 col-md-12"> 
                  <div class="title_area">
                    <h2 class="title_two">About Us</h2>
                    <span></span> 
                  </div>
                </div>
      </div>
        <div class="row">
        <!-- Start about us area -->
        <div class="col-lg-12 col-md-12">
            
          <div class="descriptive-title">
              <p>Vestibulum nisl tortor, consectetur quis imperdiet bibendum, laoreet sed arcu. Sed condimentum iaculis ex, in faucibus lorem accumsan non. Donec mattis tincidunt metus. Morbi sed tortor a risus luctus dignissim.</p>
          </div>
          </div>
          <div class="awards">
          <div class="row">
            <div class="col-sm-3 col-xs-6">
                <!--counter box-->

                <div class="counter_box text-center fadeInDown  wow animated" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInDown;">
                    <div class="counter_number counter">276</div>
                    <h4 class="counter_name">Projects Completed</h4>
                </div>
                <!--counter box end-->
            </div>
            <div class="col-sm-3 col-xs-6">
                <!--counter box-->
                <div class="counter_box text-center fadeInDown  wow animated" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInDown;">
                    <div class="counter_number counter">153</div>
                    <h4 class="counter_name">Happy Customer</h4>
                </div>
                <!--counter box end-->
            </div>
            <div class="col-sm-3 col-xs-6">
                <!--counter box-->
                <div class="counter_box text-center fadeInDown  wow animated" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInDown;">
                    <div class="counter_number counter">780</div>
                    <h4 class="counter_name">Positive Feedbacks</h4>
                </div>
                <!--counter box end-->
            </div>
            <div class="col-sm-3 col-xs-6">
                <!--counter box-->
                <div class="counter_box text-center fadeInDown  wow animated" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInDown;">
                    <div class="counter_number counter">1276</div>
                    <h4 class="counter_name">Working Hours</h4>
                </div>
                <!--counter box end-->
            </div>
          </div>
        </div><!-- Awards -->
        </div>
        
      </div>
      </div>
    </section>
    <!--=========== END ABOUT US SECTION ================--> 

    <!--=========== BEGIN WHY US SECTION ================-->
    <section id="whyUs">
      <!-- Start why us top -->
      <div class="row">        
        <div class="col-lg-12 col-sm-12">
          <div class="whyus_top">
            <div class="container">
              <!-- Why us top titile -->
              <div class="row">
                <div class="col-lg-12 col-md-12"> 
                  <div class="title_area">
                    <h2 class="title_two">Why Us</h2>
                    <span></span> 
                  </div>
                </div>
              </div>
              <!-- End Why us top titile -->
              <!-- Start Why us top content  -->
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="single_whyus_top wow fadeInUp">
                    <div class="whyus_icon">
                      <span class="fa fa-desktop"></span>
                    </div>
                    <h3>RESPONSIVE GRID</h3>
                    <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="single_whyus_top wow fadeInUp">
                    <div class="whyus_icon">
                      <span class="fa fa-users"></span>
                    </div>
                    <h3>Quản lý khách sạn từ xa</h3>
                    <p>Với công nghệ hiện đại cho phép quản lý, chủ khách sạn có thể truy cập vào phần mềm từ bất kỳ đâu chỉ bằng trình duyệt Web. Các nhà quản lý khách sạn có thể kiểm tra, theo dõi, báo cáo </p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="single_whyus_top wow fadeInUp">
                    <div class="whyus_icon">
                      <span class="fa fa-flask"></span>
                    </div>
                    <h3>Đa thiết bị và điều hành</h3>
                    <p>Với nền tảng phần mềm dạng dịch vụ có thể chạy trên nhiều thiết bị với các hệ điều hành khác nhau như Windows, Mac OS, Linux… chỉ với trình duyệt Web mà không cần cài đăt.</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="single_whyus_top wow fadeInUp">
                    <div class="whyus_icon">
                      <span class="fa fa-support"></span>
                    </div>
                    <h3>Hổ trợ online</h3>
                    <p>Hệ thống hổ trợ online 24/7, khi bạn gặp vấn vần bất cứ vấn đề gì có thể liên hệ với chúng tôi để được tư vấn thông qua điện thoại, email, chức năng hổ trợ khách hàng của hệ thống</p>
                  </div>
                </div>
              </div>
              <!-- End Why us top content  -->
            </div>
          </div>
        </div>        
      </div>
      <!-- End why us top -->

    </section>
    <!--=========== END WHY US SECTION ================-->

    <!--=========== BEGIN pricing ================-->
   <!-- Pricing Section -->
  <section id="pricing" class="pb80 pt80">
    <div class="container">
      <div class="row">
        <div class="header-section text-center mb40 white">
          <span class="meta-title-top white">what we offers</span>
          <h2 class="meta-title-2 white">Our Pricing</h2>
        </div>
      </div>
      <div class="row">

        <!-- Pricing Table One -->
        <div class="col-sm-3 col-md-3">
          <div class="pricing-table-column pricing1">
            <h5>standard</h5>
            <div class="price-band">
              <h2>$150</h2>
              <p>month</p>
            </div>
            <ul>
              <li>creative design</li>
              <li>awsome photography</li>
              <li>free support</li>
            </ul>
            <div class="button-style-1"><a href="">buy it now</a></div>
          </div>
        </div>

        <!-- Pricing Table Two -->
        <div class="col-sm-3 col-md-3">
          <div class="pricing-table-column">
            <h5>creative</h5>
            <div class="price-band">
              <h2>$350</h2>
              <p>month</p>
            </div>
            <ul>
              <li>creative design</li>
              <li>awsome photography</li>
              <li>free support</li>
            </ul>
            <div class="button-style-1"><a href="">buy it now</a></div>
          </div>  
        </div>

        <!-- Pricing Table Three -->
        <div class="col-sm-3 col-md-3">
          <div class="pricing-table-column">
            <h5>delux</h5>
            <div class="price-band">
              <h2>$750</h2>
              <p>month</p>
            </div>
            <ul>
              <li>creative design</li>
              <li>awsome photography</li>
              <li>free support</li>
            </ul>
            <div class="button-style-1"><a href="">buy it now</a></div>
          </div>  
        </div>

        <!-- Pricing Table Four -->
        <div class="col-sm-3 col-md-3">
          <div class="pricing-table-column">
            <h5>vip</h5>
            <div class="price-band">
              <h2>$990</h2>
              <p>month</p>
            </div>
            <ul>
              <li>creative design</li>
              <li>awsome photography</li>
              <li>free support</li>
            </ul>
            <div class="button-style-1"><a href="">buy it now</a></div>
          </div>
        </div>    
      </div>
    </div>
  </section>
   
   
    <!--=========== BEGIN FOOTER SECTION ================-->
    <footer id="footer">
      <!-- Start footer top area -->
      <div class="footer_top">
        <div class="container">
          <div class="row">
            <div class="col-ld-3  col-md-3 col-sm-3">
              <div class="single_footer_widget">
                <h3>Liên Hệ</h3>
                <div><strong>Email</strong>: thesis@gmail.com</div>
                <div><strong>điện thoại:</strong>: (+84) 163 846 0544</div>
                <div><strong>Địa chỉ</strong>: 227 Nguyễn Văn Cừ, Phường 4, Quận 5, Hồ Chí Minh</div>
              </div>
            </div>
            <div class="col-ld-6 col-md-6 col-sm-6">
              <div class="single_footer_widget">
                <h3>Community</h3>
                <ul class="footer_widget_nav">
                  <li><a href="#">Our Tutors</a></li>
                  <li><a href="#">Our Students</a></li>
                  <li><a href="#">Our Team</a></li>
                  <li><a href="#">Forum</a></li>
                  <li><a href="#">News &amp; Media</a></li>
                </ul>
              </div>
            </div>
         
            <div class="col-ld-3  col-md-3 col-sm-3">
              <div class="single_footer_widget">
                <h3>Social Links</h3>
                <ul class="footer_social">
                  <li><a data-toggle="tooltip" data-placement="top" title="Facebook" class="soc_tooltip" href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a data-toggle="tooltip" data-placement="top" title="Twitter" class="soc_tooltip"  href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a data-toggle="tooltip" data-placement="top" title="Google+" class="soc_tooltip"  href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li><a data-toggle="tooltip" data-placement="top" title="Linkedin" class="soc_tooltip"  href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a data-toggle="tooltip" data-placement="top" title="Youtube" class="soc_tooltip"  href="#"><i class="fa fa-youtube"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End footer top area -->

      <!-- Start footer bottom area -->

      <!-- End footer bottom area -->
    </footer>
    <!--=========== END FOOTER SECTION ================--> 


<!-- dialog -->

<script type="text/ng-template" "  id="dialog.login.html">
  <md-dialog id="login-dialog" aria-label="Login" ng-cloak>
      <form name="loginForm" ng-submit="answer('zxc')">
        <md-toolbar>
          <div class="md-toolbar-tools">
            <h2>Log In</h2>
            <span flex></span>
            <md-button class="md-icon-button" ng-click="cancel()">
              <md-icon  aria-label="Close dialog" ><i class="material-icons">close</i></md-icon>
            </md-button>
          </div>
        </md-toolbar>

        <md-dialog-content>
          <div class="md-dialog-content">
            <md-input-container class="md-block">
              <label>Username</label>
              <input name="username" ng-model="username" md-autofocus required />
            </md-input-container>
            <md-input-container class="md-block">
              <label>Password</label>
              <input type="password" name="password" ng-model="password" required />
            </md-input-container>
          </div>
        </md-dialog-content>

        <md-dialog-actions layout="row">
          <a href="" class="md-primary">Forgot Password?</a>
          <span flex></span>
          <md-button type="submit" ng-disabled="loginForm.$invalid" class="md-raised md-primary">Login</md-button>
        </md-dialog-actions>
      </form>
    </md-dialog>
</script>
  

    <!-- Javascript Files
    ================================================== -->

    <!-- initialize jQuery Library -->
     
    <!-- Preloader js file -->
   <!-- <script src="js/queryloader2.min.js" type="text/javascript"></script> -->
    <!-- For smooth animatin  -->
    <script src="js/jquery.min.js"></script>
    <script src="js/wow.min.js"></script>  
    <script src="//cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- slick slider -->
    <script src="js/slick.min.js"></script>
    <!-- superslides slider -->
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.animate-enhanced.min.js"></script>
    <script src="js/jquery.superslides.min.js" type="text/javascript" charset="utf-8"></script>   
    <!-- for circle counter -->
    <script src='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/js/jquery.circliful.min.js'></script>
    <!-- Gallery slider -->
    <script type="text/javascript" language="javascript" src="js/jquery.tosrus.min.all.js"></script>   


    <!-- angular -->
    <script src="js/angular.min.js"></script>
    <script src="js/angular-app.js"></script>
    
    <script src="js/angular-animate.min.js"></script>
    <script src="js/angular-aria.min.js"></script>
    <script src="js/angular-messages.min.js"></script>
    <script src="js/angular-route.min.js"></script>
    <script src="js/angular-index.js"></script>
    <script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/t-114/svg-assets-cache.js'></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>

    <!-- Custom js-->
    <script src="js/custom.js"></script>
    
    <!--=============================================== 
    Template Design By WpFreeware Team.
    Author URI : http://www.wpfreeware.com/
    ====================================================-->


  </body>
</html>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>กวศ. | @yield('title')</title>
    <meta name="keywords" content="กวศ.,ระบบกวศ,จองห้อง,จองพัสดุ" />
    <meta name="description" content="" />
    <meta name="Author" content="Clique : Faculty of Engineerng, Chulalongkorn University" />
    <link rel="shortcut icon" type="image/x-icon" href="{{url('assets/images/favicon.ico')}}" />
    <link rel="icon" type="image/png" href="{{url('assets/images/favicon.ico')}}" />
    <link rel="apple-touch-icon" href="{{url('assets/images/favicon.ico')}}" />
    <!-- mobile settings -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <!-- CORE CSS -->
    <link href="{{url('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- THEME CSS -->
    <link href="{{url('assets/css/essentials.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/css/layout.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/css/_layout-font-rewrite.css')}}" rel="stylesheet" type="text/css" />

    <!-- PAGE LEVEL SCRIPTS -->
    <link href="{{url('assets/css/header-1.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/css/color_scheme/red.css')}}" rel="stylesheet" type="text/css" id="color_scheme" />
    @yield('css')
    <!-- JAVASCRIPT FILES -->
    <script type="text/javascript">var plugin_path = '{{url('assets/plugins/')}}/';</script>
    <script type="text/javascript" src="{{url('assets/plugins/jquery/jquery-2.1.4.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/scripts.js')}}"></script>
    @yield('js-top')
</head>

<body class="smoothscroll enable-animation" @yield('body-attribute')>

<!-- wrapper -->
<div id="wrapper">
    <div id="header" class="sticky clearfix">

        <!-- TOP NAV -->
        <header id="topNav">
            <div class="container">

                <!-- Mobile Menu Button -->
                <button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- BUTTONS -->
                <ul  class="pull-right nav nav-pills nav-second-main">
                    <!-- LOGGED IN -->
                    @if(isset($user) && $user)
                    <li id="loggedIN" class="dropdown">
                        <div class="dropdown">
                        <button class = "dropdown-toggle" type="button" href="#" data-toggle="dropdown">
                            <i class="fa fa-user"></i>
                            สวัสดี {{$user['nickname']}} <span class="fa fa-angle-down" style="opacity: 0.3;font-size: 12px"></span>
                        </button>
                        <ul class="dropdown-menu">
                            @if(isset($user['admin']) && $user['admin'])
                            <li><a href="{{url().'/setting'}}">ตั้งค่าระบบ</a></li>
                            @endif
                            <li><a href="{{url().'/profile'}}">ข้อมูลส่วนตัว</a></li>
                            <li><a href="{{url().'/logout'}}">ออกจากระบบ</a></li>
                        </ul>
                        </div>
                    </li>

                    <!-- /LOGGED IN -->

                    <!-- LOGIN -->
                    @else
                    <li id="login-nav" class="quick-cart text-center">
                        <a id="loginButton" class="dropdown-toggle" href="#">
                            เข้าสู่ระบบ
                        </a>
                        <div class="quick-cart-box">
                            <h4><i class="fa fa-users"></i> เข้าสู่ระบบ</h4>
                            <div class="quick-cart-wrapper padding-20">
                                    <!-- ALERT -->
                                @if(isset($hasError) && $hasError)
                                    <div class="alert alert-mini alert-danger margin-bottom-30">
                                    <strong>ขออภัย!</strong> ข้อมูลผิดพลาด
                                    </div><!-- /ALERT -->
                                @endif
                                    <!-- login form -->
                                    <form action="{{url().'/login'}}" method="post">
                                        {{csrf_field()}}
                                        <div class="clearfix">

                                            <!-- Student ID -->
                                            <div class="form-group">
                                                <input id="studentID" name="studentID" class="form-control" placeholder="รหัสนิสิต 10 หลัก" required="" type="text">
                                            </div>

                                            <!-- Password -->
                                            <div class="form-group">
                                                <input name="password" class="form-control" placeholder="รหัสผ่าน" required="" type="password">
                                            </div>

                                        </div>
                                        <label class="checkbox margin-bottom-10">
                                            <input name="checkbox-inline" type="checkbox">
                                            <i></i> จำฉันไว้ในระบบ
                                        </label>
                                        <footer class="clearfix">
                                            <button type="submit" class="btn btn-primary "><i class="fa fa-check"></i> เข้าสู่ระบบ</button>
                                        </footer>
                                    </form>
                                    <!-- /login form -->
                                </div>

                        </div>
                    </li>
                    @endif
                    <!-- /LOGIN -->
                </ul>
                <!-- /BUTTONS -->


                <!-- Logo -->
                <a class="logo pull-left" href="{{ URL::to('/')}}">
                    <img src="{{url('assets/images/logo_dark.png')}}" alt="" >
                    <img src="{{url('assets/images/logo_dark_text.png')}}" alt="" >
                </a>

                <div class="navbar-collapse pull-right nav-main-collapse collapse submenu-dark">
                    <nav class="nav-main">
                        <ul id="topMain" class="nav nav-pills nav-main">
                            <li class="@yield('newsNavToggle')"><!-- NEWS -->
                                <a href="{{ URL::to('/')}}">
                                    ข่าวสาร
                                </a>
                            </li>
                            <li class="dropdown @yield('conferenceNavToggle')"><!-- CONFERENCE ROOM -->
                                <a class="dropdown-toggle" href="#">
                                    ห้องประชุม
                                </a>
                                <ul class="dropdown-menu">
                                            <li><a href="{{ URL::to('room/result') }}">ผลการจอง</a></li>
                                            <li><a href="{{ URL::to('room/reserve') }}">จองห้อง</a></li>
                                            <li><a href="">ประวัติการจอง</a></li>
                                            <li><a href="">อนุมัติการจอง</a></li>
                                            <li><a href="">ตั้งค่าห้องประชุม</a></li>
                                            <li><a href="">ออกรายงาน</a></li>
                                </ul>
                            </li>
                            <li class="dropdown @yield('suppliesNavToggle')"><!-- SUPPLIES -->
                                <a class="dropdown-toggle" href="{{ URL::to('/supplies') }}">
                                    พัสดุ
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ URL::to('/supplies') }}">ค้นหา/ยืมพัสดุ</a></li>
                                    <li><a href="">อนุมัติการยืม</a></li>
                                    <li><a href="">ประวัติการจอง</a></li>
                                    <li><a href="">แก้ไขข้อมูลพัสดุ</a></li>
                                    <li><a href="">ออกรายงาน</a></li>
                                </ul>
                            </li>
                            @if(isset($user) && $user)
                            <li class="dropdown @yield('activitiesNavToggle')"><!-- ACTIVITIES -->
                                <a class="dropdown-toggle" href="#">
                                    กิจกรรม
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ URL::to('/activity/create') }}">เพิ่มกิจกรรม</a></li>
                                    <li><a href="">จัดการกิจกรรม</a></li>
                                    <li><a href="">ออกรายงาน</a></li>
                                </ul>
                            </li>
                            @endif
                            @if(isset($user) && $user)
                            <li class="@yield('studentsNavToggle')"><!-- STUDENTS' INFO -->
                                <a href="{{URL::to('/students')}}">
                                    ข้อมูลนิสิต
                                </a>
                            </li>
                            @endif
                            <li class="@yield('helpNavToggle')"><!-- HELP -->
                                <a href="#">
                                    ช่วยเหลือ
                                </a>
                            </li>
                            <li class="@yield('contactNavToggle')"><!-- CONTACT US -->
                                <a href="{{URL::to('/contact')}}">
                                    ติดต่อเรา
                                </a>
                            </li>
                        </ul>

                    </nav>
                </div>

            </div>
        </header>
        <!-- /Top Nav -->
    </div>
    <section class="page-header page-header-xs title-head">
        <div class="container">
            <h1 @yield('bodyTitle-attribute') >@yield('bodyTitle')</h1>
        </div>
    </section>


    @yield('content')

    <!-- FOOTER -->
    <footer id="footer">
        <div class="container text-center">
                    <!-- Footer Logo -->
                    <img class="footer-logo" src="{{url('assets/images/logo-footer.png')}}" alt="" />
                    <!-- Small Description -->
                    <p>กรรมการนิสิตคณะวิศวกรรมศาสตร์ จุฬาลงกรณ์มหาวิทยาลัย</p>
                    <!-- Social Icons -->
                    <div class="margin-top-20">
                        <a href="https://www.facebook.com/esc.kws" class="social-icon social-icon-border social-facebook" data-toggle="tooltip" data-placement="top" title="Facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>

                        <a href="#" class="social-icon social-icon-border social-twitter" data-toggle="tooltip" data-placement="top" title="Twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>
                    <!-- /Social Icons -->
                    </div>

        </div>

        <div class="copyright">
            <div class="container text-center">
                <div style="margin-bottom: 10px;">
                    <img src="{{url('assets/images/chula-engineering.png')}}" height="30px" style="margin-right: 30px;">
                    <a href="//www.facebook.com/clique.chula"><img src="{{url('assets/images/clique_logo_all_final.png')}}" height="30px" ></a>made © 2015
                </div>
                &copy; สงวนลิขสิทธิ์, กรรมการนิสิตคณะวิศวกรรมศาสตร์ จุฬาลงกรณ์มหาวิทยาลัย
            </div>
        </div>
    </footer>
    <!-- /FOOTER -->
</div>
<!-- /wrapper -->

<!-- SCROLL TO TOP -->
<a href="#" id="toTop"></a>
@if(!(isset($user) && $user))
<script>
  $(function () {
    $('#loginButton').click(function () {
        setTimeout(function(){$('#studentID').focus();},0);
    });
  });
</script>
@endif
@yield('js')

</body>
</html>

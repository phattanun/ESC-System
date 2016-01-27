<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>กวศ. | @yield('title')</title>
    <meta name="keywords" content="HTML5,CSS3,Template" />
    <meta name="description" content="" />
    <meta name="Author" content="Dorin Grigoras [www.stepofweb.com]" />

    <!-- mobile settings -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <!-- WEB FONTS : use %7C instead of | (pipe) -->
    {{--<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />--}}

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
                <ul class="pull-right nav nav-pills nav-second-main">

                    <!-- SEARCH -->
                    {{--<li class="search">--}}
                        {{--<a href="javascript:;">--}}
                            {{--<i class="fa fa-search"></i>--}}
                        {{--</a>--}}
                        {{--<div class="search-box">--}}
                            {{--<form action="page-search-result-1.html" method="get">--}}
                                {{--<div class="input-group">--}}
                                    {{--<input type="text" name="src" placeholder="Search" class="form-control" />--}}
											{{--<span class="input-group-btn">--}}
												{{--<button class="btn btn-primary" type="submit">Search</button>--}}
											{{--</span>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    <!-- /SEARCH -->
                    <!-- LOGIN -->
                    <li id="login-nav" class="quick-cart text-center">
                        <a class="dropdown-toggle" href="#">
                            เข้าสู่ระบบ
                        </a>
                        <div class="quick-cart-box">
                            <h4><i class="fa fa-users"></i> เข้าสู่ระบบ</h4>
                            <div class="quick-cart-wrapper padding-20">
                                    {{--<!-- ALERT -->--}}
                                    {{--<div class="alert alert-mini alert-danger margin-bottom-30">--}}
                                    {{--<strong>Oh snap!</strong> Login Incorrect!--}}
                                    {{--</div><!-- /ALERT -->--}}

                                    <!-- login form -->
                                    <form action="index.html" method="post">
                                        <div class="clearfix">

                                            <!-- Student ID -->
                                            <div class="form-group">
                                                <input name="studentID" class="form-control" placeholder="รหัสนิสิต 10 หลัก" required="" type="text">
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
                                        <footer class="celarfix">
                                            <button type="submit" class="btn btn-primary "><i class="fa fa-check"></i> เข้าสู่ระบบ</button>
                                        </footer>
                                    </form>
                                    <!-- /login form -->
                                </div>

                        </div>
                    </li>


                    <!-- /LOGIN -->
                </ul>
                <!-- /BUTTONS -->


                <!-- Logo -->
                <a class="logo pull-left" href="/">
                    <img src="assets/images/logo_dark.png" alt="" >
                    <img src="assets/images/logo_dark_text.png" alt="" >
                </a>

                <div class="navbar-collapse pull-right nav-main-collapse collapse submenu-dark">
                    <nav class="nav-main">
                        <ul id="topMain" class="nav nav-pills nav-main">
                            <li class="@yield('newsNavToggle')"><!-- NEWS -->
                                <a href="/">
                                    ข่าวสาร
                                </a>
                            </li>
                            <li class="dropdown @yield('conferenceNavToggle')"><!-- CONFERENCE ROOM -->
                                <a class="dropdown-toggle" href="#">
                                    ห้องประชุม
                                </a>
                                <ul class="dropdown-menu">
                                            <li><a href="">ผลการจอง</a></li>
                                            <li><a href="">จองห้อง</a></li>
                                            <li><a href="">ประวัติการจอง</a></li>
                                            <li><a href="">อนุมัติการจอง</a></li>
                                            <li><a href="">ตั้งค่าห้องประชุม</a></li>
                                            <li><a href="">ออกรายงาน</a></li>
                                </ul>
                            </li>
                            <li class="dropdown @yield('suppliesNavToggle')"><!-- SUPPLIES -->
                                <a class="dropdown-toggle" href="#">
                                    พัสดุ
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="">ค้นหา/ยืมพัสดุ</a></li>
                                    <li><a href="">อนุมัติการยืม</a></li>
                                    <li><a href="">ประวัติการจอง</a></li>
                                    <li><a href="">แก้ไขข้อมูลพัสดุ</a></li>
                                    <li><a href="">ออกรายงาน</a></li>
                                </ul>
                            </li>
                            <li class="dropdown @yield('activitiesNavToggle')"><!-- ACTIVITIES -->
                                <a class="dropdown-toggle" href="#">
                                    กิจกรรม
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="">จัดการกิจกรรม</a></li>
                                    <li><a href="">ออกรายงาน</a></li>
                                </ul>
                            </li>
                            <li class="@yield('studentsNavToggle')"><!-- STUDENTS' INFO -->
                                <a href="#">
                                    ข้อมูลนิสิต
                                </a>
                            </li>
                            <li class="@yield('helpNavToggle')"><!-- HELP -->
                                <a href="#">
                                    ช่วยเหลือ
                                </a>
                            </li>
                            <li class="@yield('helpNavToggle')"><!-- CONTACT US -->
                                <a href="#">
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
    @yield('content')

    <!-- FOOTER -->
    <footer id="footer">
        <div class="container text-center">
                    <!-- Footer Logo -->
                    <img class="footer-logo" src="assets/images/logo-footer.png" alt="" />
                    <!-- Small Description -->
                    <p>กรรมการนิสิตคณะวิศวกรรมศาสตร์ จุฬาลงกรณ์มหาวิทยาลัย</p>
                    <!-- Social Icons -->
                    <div class="margin-top-20">
                        <a href="https://www.facebook.com/esc.kws" class="social-icon social-icon-border social-facebook" data-toggle="tooltip" data-placement="top" title="Facebook">
                            <i class="icon-facebook"></i>
                        </a>

                        <a href="#" class="social-icon social-icon-border social-twitter" data-toggle="tooltip" data-placement="top" title="Twitter">
                            <i class="icon-twitter"></i>
                        </a>

                        <a href="#" class="social-icon social-icon-border social-gplus" data-toggle="tooltip" data-placement="top" title="Google plus">
                            <i class="icon-gplus"></i>
                        </a>

                        <a href="#" class="social-icon social-icon-border social-linkedin" data-toggle="tooltip" data-placement="top" title="Linkedin">
                            <i class="icon-linkedin"></i>
                        </a>

                        <a href="#" class="social-icon social-icon-border social-rss" data-toggle="tooltip" data-placement="top" title="Rss">
                            <i class="icon-rss"></i>
                        </a>
                    <!-- /Social Icons -->
                    </div>

        </div>

        <div class="copyright">
            <div class="container text-center">
                <div style="margin-bottom: 10px;">
                    <img src="{{asset('assets/images/chula-engineering.png')}}" height="30px" style="margin-right: 30px;">
                    <a href="//www.facebook.com/clique.chula"><img src="{{asset('assets/images/clique_logo_all_final.png')}}" height="30px" ></a>made © 2015
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

<!-- JAVASCRIPT FILES -->
<script type="text/javascript">var plugin_path = '{{url('assets/plugins/')}}';</script>
<script type="text/javascript" src="{{url('assets/plugins/jquery/jquery-2.1.4.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/scripts.js')}}"></script>
@yield('js')

</body>
</html>
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />

    <!-- CORE CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- THEME CSS -->
    <link href="assets/css/essentials.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/layout.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/_layout-font-rewrite.css" rel="stylesheet" type="text/css" />

    <!-- PAGE LEVEL SCRIPTS -->
    <link href="assets/css/header-1.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/color_scheme/green.css" rel="stylesheet" type="text/css" id="color_scheme" />
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
                    <li class="search">
                        <a href="javascript:;">
                            <i class="fa fa-search"></i>
                        </a>
                        <div class="search-box">
                            <form action="page-search-result-1.html" method="get">
                                <div class="input-group">
                                    <input type="text" name="src" placeholder="Search" class="form-control" />
											<span class="input-group-btn">
												<button class="btn btn-primary" type="submit">Search</button>
											</span>
                                </div>
                            </form>
                        </div>
                    </li>
                    <!-- /SEARCH -->
                    <!-- LOGIN -->
                    <li class="login">
                        <a href="javascript:;">
                            <i class="fa fa-user"></i>
                        </a>
                        {{--<div class="form-group">--}}
                            {{--<label>Email</label>--}}
                            {{--<label class="input margin-bottom-10">--}}
                                {{--<i class="ico-append fa fa-envelope"></i>--}}
                                {{--<input required="" type="email">--}}
                                {{--<b class="tooltip tooltip-bottom-right">Needed to verify your account</b>--}}
                            {{--</label>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label>Password</label>--}}
                            {{--<label class="input margin-bottom-10">--}}
                                {{--<i class="ico-append fa fa-lock"></i>--}}
                                {{--<input required="" type="password">--}}
                                {{--<b class="tooltip tooltip-bottom-right">Type your account password</b>--}}
                            {{--</label>--}}
                        {{--</div>--}}
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
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--HOME CORPORATE--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="index-corporate-1.html">CORPORATE LAYOUT 1</a></li>--}}
                                            {{--<li><a href="index-corporate-2.html">CORPORATE LAYOUT 2</a></li>--}}
                                            {{--<li><a href="index-corporate-3.html">CORPORATE LAYOUT 3</a></li>--}}
                                            {{--<li><a href="index-corporate-4.html">CORPORATE LAYOUT 4</a></li>--}}
                                            {{--<li><a href="index-corporate-5.html">CORPORATE LAYOUT 5</a></li>--}}
                                            {{--<li><a href="index-corporate-6.html">CORPORATE LAYOUT 6</a></li>--}}
                                            {{--<li><a href="index-corporate-7.html">CORPORATE LAYOUT 7</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--HOME PORTFOLIO--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="index-portfolio-1.html">PORTFOLIO LAYOUT 1</a></li>--}}
                                            {{--<li><a href="index-portfolio-2.html">PORTFOLIO LAYOUT 2</a></li>--}}
                                            {{--<li><a href="index-portfolio-masonry.html">PORTFOLIO MASONRY</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--HOME BLOG--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="index-blog-1.html">BLOG LAYOUT 1</a></li>--}}
                                            {{--<li><a href="index-blog-2.html">BLOG LAYOUT 2</a></li>--}}
                                            {{--<li><a href="index-blog-3.html">BLOG LAYOUT 3</a></li>--}}
                                            {{--<li><a href="index-blog-4.html">BLOG LAYOUT 4</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--HOME SHOP--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="index-shop-1.html">SHOP LAYOUT 1</a></li>--}}
                                            {{--<li><a href="index-shop-2.html">SHOP LAYOUT 2</a></li>--}}
                                            {{--<li><a href="index-shop-3.html">SHOP LAYOUT 3</a></li>--}}
                                            {{--<li><a href="index-shop-4.html">SHOP LAYOUT 4</a></li>--}}
                                            {{--<li><a href="index-shop-5.html">SHOP LAYOUT 5</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--HOME MAGAZINE--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="index-magazine-1.html">MAGAZINE LAYOUT 1</a></li>--}}
                                            {{--<li><a href="index-magazine-2.html">MAGAZINE LAYOUT 2</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--HOME LANDING PAGE--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="index-landing-1.html">LANDING PAGE LAYOUT 1</a></li>--}}
                                            {{--<li><a href="index-landing-2.html">LANDING PAGE LAYOUT 2</a></li>--}}
                                            {{--<li><a href="index-landing-3.html">LANDING PAGE LAYOUT 3</a></li>--}}
                                            {{--<li><a href="index-landing-4.html">LANDING PAGE LAYOUT 4</a></li>--}}
                                            {{--<li><a href="index-landing-5.html">LANDING PAGE LAYOUT 5</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--HOME FULLSCREEN--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="index-fullscreen-revolution.html">FULLSCREEN - REVOLUTION</a></li>--}}
                                            {{--<li><a href="index-fullscreen-youtube.html">FULLSCREEN - YOUTUBE</a></li>--}}
                                            {{--<li><a href="index-fullscreen-local-video.html">FULLSCREEN - LOCAL VIDEO</a></li>--}}
                                            {{--<li><a href="index-fullscreen-image.html">FULLSCREEN - IMAGE</a></li>--}}
                                            {{--<li><a href="index-fullscreen-txt-rotator.html">FULLSCREEN - TEXT ROTATOR</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--HOME ONE PAGE--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="index-onepage-default.html">ONE PAGE - DEFAULT</a></li>--}}
                                            {{--<li><a href="index-onepage-revolution.html">ONE PAGE - REVOLUTION</a></li>--}}
                                            {{--<li><a href="index-onepage-image.html">ONE PAGE - IMAGE</a></li>--}}
                                            {{--<li><a href="index-onepage-parallax.html">ONE PAGE - PARALLAX</a></li>--}}
                                            {{--<li><a href="index-onepage-youtube.html">ONE PAGE - YOUTUBE</a></li>--}}
                                            {{--<li><a href="index-onepage-text-rotator.html">ONE PAGE - TEXT ROTATOR</a></li>--}}
                                            {{--<li><a href="start.html#onepage"><span class="label label-success pull-right">new</span> MORE LAYOUTS</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="divider"></li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--HOME - THEMATICS <i class="fa fa-heart margin-left-10"></i>--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="index-thematics-restaurant.html">HOME - RESTAURANT</a></li>--}}
                                            {{--<li><a href="index-thematics-education.html">HOME - EDUCATION</a></li>--}}
                                            {{--<li><a href="index-thematics-construction.html">HOME - CONSTRUCTION</a></li>--}}
                                            {{--<li><a href="index-thematics-medical.html">HOME - MEDICAL</a></li>--}}
                                            {{--<li><a href="index-thematics-church.html">HOME - CHURCH</a></li>--}}
                                            {{--<li><a href="index-thematics-fashion.html">HOME - FASHION</a></li>--}}
                                            {{--<li><a href="index-thematics-wedding.html">HOME - WEDDING</a></li>--}}
                                            {{--<li><a href="index-thematics-events.html">HOME - EVENTS</a></li>--}}
                                            {{--<li><a href="http://www.stepofweb.com/propose-design.html" data-toggle="tooltip" data-placement="top" title="Do you need a specific home design? We can include it in the next update!" target="_blank"><span class="label label-danger pull-right">hot</span> PROPOSE THEMATIC</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="divider"></li>--}}
                                    {{--<li><a href="start.html#newrevslider" data-toggle="tooltip" data-placement="top" title="32 More Revolution Slider V5"><span class="label label-danger pull-right">new</span> 32 MORE LAYOUTS</a></li>--}}
                                    {{--<li class="divider"></li>--}}
                                    {{--<li><a href="index-simple-revolution.html">HOME SIMPLE - REVOLUTION</a></li>--}}
                                    {{--<li><a href="index-simple-layerslider.html">HOME SIMPLE - LAYERSLIDER</a></li>--}}
                                    {{--<li><a href="index-simple-parallax.html">HOME SIMPLE - PARALLAX</a></li>--}}
                                    {{--<li><a href="index-simple-youtube.html">HOME SIMPLE - YOUTUBE</a></li>--}}
                                {{--</ul>--}}
                            </li>
                            <li class="dropdown @yield('suppliesNavToggle')"><!-- SUPPLIES -->
                                <a class="dropdown-toggle" href="#">
                                    พัสดุ
                                </a>
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--ABOUT--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="page-about-us-1.html">ABOUT US - LAYOUT 1</a></li>--}}
                                            {{--<li><a href="page-about-us-2.html">ABOUT US - LAYOUT 2</a></li>--}}
                                            {{--<li><a href="page-about-us-3.html">ABOUT US - LAYOUT 3</a></li>--}}
                                            {{--<li><a href="page-about-us-4.html">ABOUT US - LAYOUT 4</a></li>--}}
                                            {{--<li><a href="page-about-us-5.html">ABOUT US - LAYOUT 5</a></li>--}}
                                            {{--<li><a href="page-about-me-1.html">ABOUT ME - LAYOUT 1</a></li>--}}
                                            {{--<li><a href="page-about-me-2.html">ABOUT ME - LAYOUT 2</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--TEAM--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="page-team-1.html">TEAM - LAYOUT 1</a></li>--}}
                                            {{--<li><a href="page-team-2.html">TEAM - LAYOUT 2</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--SERVICES--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="page-services-1.html">SERVICES - LAYOUT 1</a></li>--}}
                                            {{--<li><a href="page-services-2.html">SERVICES - LAYOUT 2</a></li>--}}
                                            {{--<li><a href="page-services-3.html">SERVICES - LAYOUT 3</a></li>--}}
                                            {{--<li><a href="page-services-4.html">SERVICES - LAYOUT 4</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--FAQ--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="page-faq-1.html">FAQ - LAYOUT 1</a></li>--}}
                                            {{--<li><a href="page-faq-2.html">FAQ - LAYOUT 2</a></li>--}}
                                            {{--<li><a href="page-faq-3.html">FAQ - LAYOUT 3</a></li>--}}
                                            {{--<li><a href="page-faq-4.html">FAQ - LAYOUT 4</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--CONTACT--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="page-contact-1.html">CONTACT - LAYOUT 1</a></li>--}}
                                            {{--<li><a href="page-contact-2.html">CONTACT - LAYOUT 2</a></li>--}}
                                            {{--<li><a href="page-contact-3.html">CONTACT - LAYOUT 3</a></li>--}}
                                            {{--<li><a href="page-contact-4.html">CONTACT - LAYOUT 4</a></li>--}}
                                            {{--<li><a href="page-contact-5.html">CONTACT - LAYOUT 5</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--ERROR--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="page-404-1.html">ERROR 404 - LAYOUT 1</a></li>--}}
                                            {{--<li><a href="page-404-2.html">ERROR 404 - LAYOUT 2</a></li>--}}
                                            {{--<li><a href="page-404-3.html">ERROR 404 - LAYOUT 3</a></li>--}}
                                            {{--<li><a href="page-404-4.html">ERROR 404 - LAYOUT 4</a></li>--}}
                                            {{--<li><a href="page-404-5.html">ERROR 404 - LAYOUT 5</a></li>--}}
                                            {{--<li><a href="page-404-6.html">ERROR 404 - LAYOUT 6</a></li>--}}
                                            {{--<li><a href="page-404-7.html">ERROR 404 - LAYOUT 7</a></li>--}}
                                            {{--<li><a href="page-404-8.html">ERROR 404 - LAYOUT 8</a></li>--}}
                                            {{--<li class="divider"></li>--}}
                                            {{--<li><a href="page-500-1.html">ERROR 500 - LAYOUT 1</a></li>--}}
                                            {{--<li><a href="page-500-2.html">ERROR 500 - LAYOUT 2</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--SIDEBAR--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="page-sidebar-left.html">SIDEBAR LEFT</a></li>--}}
                                            {{--<li><a href="page-sidebar-right.html">SIDEBAR RIGHT</a></li>--}}
                                            {{--<li><a href="page-sidebar-both.html">SIDEBAR BOTH</a></li>--}}
                                            {{--<li><a href="page-sidebar-no.html">NO SIDEBAR</a></li>--}}
                                            {{--<li class="divider"></li>--}}
                                            {{--<li><a href="page-sidebar-dark-left.html">SIDEBAR LEFT - DARK</a></li>--}}
                                            {{--<li><a href="page-sidebar-dark-right.html">SIDEBAR RIGHT - DARK</a></li>--}}
                                            {{--<li><a href="page-sidebar-dark-both.html">SIDEBAR BOTH - DARK</a></li>--}}
                                            {{--<li><a href="page-sidebar-dark-no.html">NO SIDEBAR - DARK</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--LOGIN/REGISTER--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="page-login-1.html">LOGIN - LAYOUT 1</a></li>--}}
                                            {{--<li><a href="page-login-2.html">LOGIN - LAYOUT 2</a></li>--}}
                                            {{--<li><a href="page-login-3.html">LOGIN - LAYOUT 3</a></li>--}}
                                            {{--<li><a href="page-login-4.html">LOGIN - LAYOUT 4</a></li>--}}
                                            {{--<li><a href="page-login-5.html">LOGIN - LAYOUT 5</a></li>--}}
                                            {{--<li><a href="page-login-register-1.html">LOGIN + REGISTER 1</a></li>--}}
                                            {{--<li><a href="page-login-register-2.html">LOGIN + REGISTER 2</a></li>--}}
                                            {{--<li><a href="page-login-register-3.html">LOGIN + REGISTER 3</a></li>--}}
                                            {{--<li><a href="page-register-1.html">REGISTER - LAYOUT 1</a></li>--}}
                                            {{--<li><a href="page-register-2.html">REGISTER - LAYOUT 2</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--CLIENTS--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="page-clients-1.html">CLIENTS 1 - SIDEBAR RIGHT</a></li>--}}
                                            {{--<li><a href="page-clients-2.html">CLIENTS 1 - SIDEBAR LEFT</a></li>--}}
                                            {{--<li><a href="page-clients-3.html">CLIENTS 1 - FULLWIDTH</a></li>--}}
                                            {{--<li class="divider"></li>--}}
                                            {{--<li><a href="page-clients-4.html">CLIENTS 2 - SIDEBAR RIGHT</a></li>--}}
                                            {{--<li><a href="page-clients-5.html">CLIENTS 2 - SIDEBAR LEFT</a></li>--}}
                                            {{--<li><a href="page-clients-6.html">CLIENTS 2 - FULLWIDTH</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--SEARCH RESULT--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="page-search-result-1.html">LAYOUT 1 - LEFT SIDEBAR</a></li>--}}
                                            {{--<li><a href="page-search-result-2.html">LAYOUT 1 - RIGHT SIDEBAR</a></li>--}}
                                            {{--<li><a href="page-search-result-3.html">LAYOUT 1 - FULLWIDTH</a></li>--}}
                                            {{--<li class="divider"></li>--}}
                                            {{--<li><a href="page-search-result-4.html">LAYOUT 2 - LEFT SIDEBAR</a></li>--}}
                                            {{--<li><a href="page-search-result-5.html">LAYOUT 2 - RIGHT SIDEBAR</a></li>--}}
                                            {{--<li class="divider"></li>--}}
                                            {{--<li><a href="page-search-result-6.html">LAYOUT 3 - TABLE SEARCH</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--PROFILE--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="page-profile.html">USER PROFILE</a></li>--}}
                                            {{--<li><a href="page-profile-projects.html">USER PROJECTS</a></li>--}}
                                            {{--<li><a href="page-profile-comments.html">USER COMMENTS</a></li>--}}
                                            {{--<li><a href="page-profile-history.html">USER HISTORY</a></li>--}}
                                            {{--<li><a href="page-profile-settings.html">USER SETTINGS</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--MAINTENANCE--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="page-maintenance-1.html">MAINTENANCE - LAYOUT 1</a></li>--}}
                                            {{--<li><a href="page-maintenance-2.html">MAINTENANCE - LAYOUT 2</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--COMING SOON--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="page-coming-soon-1.html">COMING SOON - LAYOUT 1</a></li>--}}
                                            {{--<li><a href="page-coming-soon-2.html">COMING SOON - LAYOUT 2</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--FORUM--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="page-forum-home.html">FORUM - HOME</a></li>--}}
                                            {{--<li><a href="page-forum-topic.html">FORUM - TOPIC</a></li>--}}
                                            {{--<li><a href="page-forum-post.html">FORUM - POST</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="page-careers.html">CAREERS</a></li>--}}
                                    {{--<li><a href="page-sitemap.html">SITEMAP</a></li>--}}
                                    {{--<li><a href="page-blank.html">BLANK PAGE</a></li>--}}
                                {{--</ul>--}}
                            </li>
                            <li class="dropdown @yield('activitiesNavToggle')"><!-- ACTIVITIES -->
                                <a class="dropdown-toggle" href="#">
                                    กิจกรรม
                                </a>
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--<i class="et-browser"></i> SLIDERS--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li>--}}
                                                {{--<a class="dropdown-toggle" href="#">REVOLUTION SLIDER 4.x</a>--}}
                                                {{--<ul class="dropdown-menu">--}}
                                                    {{--<li><a href="feature-slider-revolution-fullscreen.html">FULLSCREEN</a></li>--}}
                                                    {{--<li><a href="feature-slider-revolution-fullwidth.html">FULL WIDTH</a></li>--}}
                                                    {{--<li><a href="feature-slider-revolution-fixedwidth.html">FIXED WIDTH</a></li>--}}
                                                    {{--<li><a href="feature-slider-revolution-kenburns.html">KENBURNS EFFECT</a></li>--}}
                                                    {{--<li><a href="feature-slider-revolution-videobg.html">HTML5 VIDEO</a></li>--}}
                                                    {{--<li><a href="feature-slider-revolution-captions.html">CAPTIONS</a></li>--}}
                                                    {{--<li><a href="feature-slider-revolution-smthumb.html">THUMB SMALL</a></li>--}}
                                                    {{--<li><a href="feature-slider-revolution-lgthumb.html">THUMB LARGE</a></li>--}}
                                                    {{--<li class="divider"></li>--}}
                                                    {{--<li><a href="feature-slider-revolution-prev1.html">NAV PREVIEW 1</a></li>--}}
                                                    {{--<li><a href="feature-slider-revolution-prev2.html">NAV PREVIEW 2</a></li>--}}
                                                    {{--<li><a href="feature-slider-revolution-prev3.html">NAV PREVIEW 3</a></li>--}}
                                                    {{--<li><a href="feature-slider-revolution-prev4.html">NAV PREVIEW 4</a></li>--}}
                                                    {{--<li><a href="feature-slider-revolution-prev0.html">NAV THEME DEFAULT</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<a class="dropdown-toggle" href="#">LAYER SLIDER</a>--}}
                                                {{--<ul class="dropdown-menu">--}}
                                                    {{--<li><a href="feature-slider-layer-fullwidth.html">FULLWIDTH</a></li>--}}
                                                    {{--<li><a href="feature-slider-layer-fixed.html">FIXED WIDTH</a></li>--}}
                                                    {{--<li><a href="feature-slider-layer-captions.html">CAPTIONS</a></li>--}}
                                                    {{--<li><a href="feature-slider-layer-carousel.html">CAROUSEL</a></li>--}}
                                                    {{--<li><a href="feature-slider-layer-2d3d.html">2D &amp; 3D TRANSITIONS</a></li>--}}
                                                    {{--<li><a href="feature-slider-layer-thumb.html">THUMB NAV</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<a class="dropdown-toggle" href="#">FLEX SLIDER</a>--}}
                                                {{--<ul class="dropdown-menu">--}}
                                                    {{--<li><a href="feature-slider-flexslider-fullwidth.html">FULL WIDTH</a></li>--}}
                                                    {{--<li><a href="feature-slider-flexslider-content.html">CONTENT</a></li>--}}
                                                    {{--<li><a href="feature-slider-flexslider-thumbs.html">WITH THUMBS</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<a class="dropdown-toggle" href="#">OWL SLIDER</a>--}}
                                                {{--<ul class="dropdown-menu">--}}
                                                    {{--<li><a href="feature-slider-owl-fullwidth.html">FULL WIDTH</a></li>--}}
                                                    {{--<li><a href="feature-slider-owl-fixed.html">FIXED WIDTH</a></li>--}}
                                                    {{--<li><a href="feature-slider-owl-fixed+progress.html">FIXED + PROGRESS</a></li>--}}
                                                    {{--<li><a href="feature-slider-owl-carousel.html">BASIC CAROUSEL</a></li>--}}
                                                    {{--<li><a href="feature-slider-owl-fade.html">EFFECT - FADE</a></li>--}}
                                                    {{--<li><a href="feature-slider-owl-backslide.html">EFFECT - BACKSLIDE</a></li>--}}
                                                    {{--<li><a href="feature-slider-owl-godown.html">EFFECT - GODOWN</a></li>--}}
                                                    {{--<li><a href="feature-slider-owl-fadeup.html">EFFECT - FADE UP</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<a class="dropdown-toggle" href="#">SWIPE SLIDER</a>--}}
                                                {{--<ul class="dropdown-menu">--}}
                                                    {{--<li><a href="feature-slider-swipe-full.html">FULLSCREEN</a></li>--}}
                                                    {{--<li><a href="feature-slider-swipe-fixed-height.html">FIXED HEIGHT</a></li>--}}
                                                    {{--<li><a href="feature-slider-swipe-autoplay.html">AUTOPLAY</a></li>--}}
                                                    {{--<li><a href="feature-slider-swipe-fade.html">FADE TRANSITION</a></li>--}}
                                                    {{--<li><a href="feature-slider-swipe-slide.html">SLIDE TRANSITION</a></li>--}}
                                                    {{--<li><a href="feature-slider-swipe-coverflow.html">COVERFLOW TRANSITION</a></li>--}}
                                                    {{--<li><a href="feature-slider-swipe-html5-video.html">HTML5 VIDEO</a></li>--}}
                                                    {{--<li><a href="feature-slider-swipe-3columns.html">3 COLUMNS</a></li>--}}
                                                    {{--<li><a href="feature-slider-swipe-4columns.html">4 COLUMNS</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</li>--}}
                                            {{--<li><a href="feature-slider-nivo.html">NIVO SLIDER</a></li>--}}
                                            {{--<li><a href="feature-slider-camera.html">CAMERA SLIDER</a></li>--}}
                                            {{--<li><a href="feature-slider-elastic.html">ELASTIC SLIDER</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--<i class="et-hotairballoon"></i> HEADERS--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="feature-header-light.html">HEADER - LIGHT</a></li>--}}
                                            {{--<li><a href="feature-header-dark.html">HEADER - DARK</a></li>--}}
                                            {{--<li>--}}
                                                {{--<a class="dropdown-toggle" href="#">HEADER - HEIGHT</a>--}}
                                                {{--<ul class="dropdown-menu">--}}
                                                    {{--<li><a href="feature-header-large.html">LARGE (96px)</a></li>--}}
                                                    {{--<li><a href="feature-header-medium.html">MEDIUM (70px)</a></li>--}}
                                                    {{--<li><a href="feature-header-small.html">SMALL (60px)</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<a class="dropdown-toggle" href="#">HEADER - SHADOW</a>--}}
                                                {{--<ul class="dropdown-menu">--}}
                                                    {{--<li><a href="feature-header-shadow-after-1.html">SHADOW 1 - AFTER</a></li>--}}
                                                    {{--<li><a href="feature-header-shadow-before-1.html">SHADOW 1 - BEFORE</a></li>--}}
                                                    {{--<li class="divider"></li>--}}
                                                    {{--<li><a href="feature-header-shadow-after-2.html">SHADOW 2 - AFTER</a></li>--}}
                                                    {{--<li><a href="feature-header-shadow-before-2.html">SHADOW 2 - BEFORE</a></li>--}}
                                                    {{--<li class="divider"></li>--}}
                                                    {{--<li><a href="feature-header-shadow-after-3.html">SHADOW 3 - AFTER</a></li>--}}
                                                    {{--<li><a href="feature-header-shadow-before-3.html">SHADOW 3 - BEFORE</a></li>--}}
                                                    {{--<li class="divider"></li>--}}
                                                    {{--<li><a href="feature-header-shadow-dark-1.html">SHADOW - DARK PAGE EXAMPLE</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</li>--}}
                                            {{--<li><a href="feature-header-transparent.html">HEADER - TRANSPARENT</a></li>--}}
                                            {{--<li><a href="feature-header-transparent-line.html">HEADER - TRANSP+LINE</a></li>--}}
                                            {{--<li><a href="feature-header-translucent.html">HEADER - TRANSLUCENT</a></li>--}}
                                            {{--<li>--}}
                                                {{--<a class="dropdown-toggle" href="#">HEADER - BOTTOM</a>--}}
                                                {{--<ul class="dropdown-menu">--}}
                                                    {{--<li><a href="feature-header-bottom-light.html">BOTTOM LIGHT</a></li>--}}
                                                    {{--<li><a href="feature-header-bottom-dark.html">BOTTOM DARK</a></li>--}}
                                                    {{--<li><a href="feature-header-bottom-transp.html">BOTTOM TRANSPARENT</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<a class="dropdown-toggle" href="#">HEADER - LEFT SIDE</a>--}}
                                                {{--<ul class="dropdown-menu">--}}
                                                    {{--<li><a href="feature-header-side-left-1.html">FIXED</a></li>--}}
                                                    {{--<li><a href="feature-header-side-left-2.html">OPEN ON CLICK</a></li>--}}
                                                    {{--<li><a href="feature-header-side-left-3.html">DARK</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<a class="dropdown-toggle" href="#">HEADER - RIGHT SIDE</a>--}}
                                                {{--<ul class="dropdown-menu">--}}
                                                    {{--<li><a href="feature-header-side-right-1.html">FIXED</a></li>--}}
                                                    {{--<li><a href="feature-header-side-right-2.html">OPEN ON CLICK</a></li>--}}
                                                    {{--<li><a href="feature-header-side-right-3.html">DARK</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<a class="dropdown-toggle" href="#">HEADER - STATIC</a>--}}
                                                {{--<ul class="dropdown-menu">--}}
                                                    {{--<li><a href="feature-header-static-top-light.html">STATIC TOP - LIGHT</a></li>--}}
                                                    {{--<li><a href="feature-header-static-top-dark.html">STATIC TOP - DARK</a></li>--}}
                                                    {{--<li class="divider"></li>--}}
                                                    {{--<li><a href="feature-header-static-bottom-light.html">STATIC BOTTOM - LIGHT</a></li>--}}
                                                    {{--<li><a href="feature-header-static-bottom-dark.html">STATIC BOTTOM - DARK</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</li>--}}
                                            {{--<li><a href="feature-header-nosticky.html">HEADER - NO STICKY</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--<i class="et-anchor"></i> FOOTERS--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="feature-footer-1.html#footer">FOOTER - LAYOUT 1</a></li>--}}
                                            {{--<li><a href="feature-footer-2.html#footer">FOOTER - LAYOUT 2</a></li>--}}
                                            {{--<li><a href="feature-footer-3.html#footer">FOOTER - LAYOUT 3</a></li>--}}
                                            {{--<li><a href="feature-footer-4.html#footer">FOOTER - LAYOUT 4</a></li>--}}
                                            {{--<li><a href="feature-footer-5.html#footer">FOOTER - LAYOUT 5</a></li>--}}
                                            {{--<li><a href="feature-footer-6.html#footer">FOOTER - LAYOUT 6</a></li>--}}
                                            {{--<li><a href="feature-footer-7.html#footer">FOOTER - LAYOUT 7</a></li>--}}
                                            {{--<li><a href="feature-footer-8.html#footer">FOOTER - LAYOUT 8 (light)</a></li>--}}
                                            {{--<li><a href="feature-footer-0.html#footer">FOOTER - STICKY</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--<i class="et-circle-compass"></i> MENU STYLES--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="feature-menu-0.html">MENU - OVERLAY</a></li>--}}
                                            {{--<li><a href="feature-menu-1.html">MENU - STYLE 1</a></li>--}}
                                            {{--<li><a href="feature-menu-2.html">MENU - STYLE 2</a></li>--}}
                                            {{--<li><a href="feature-menu-3.html">MENU - STYLE 3</a></li>--}}
                                            {{--<li><a href="feature-menu-4.html">MENU - STYLE 4</a></li>--}}
                                            {{--<li><a href="feature-menu-5.html">MENU - STYLE 5</a></li>--}}
                                            {{--<li><a href="feature-menu-6.html">MENU - STYLE 6</a></li>--}}
                                            {{--<li><a href="feature-menu-7.html">MENU - STYLE 7</a></li>--}}
                                            {{--<li><a href="feature-menu-8.html">MENU - STYLE 8</a></li>--}}
                                            {{--<li><a href="feature-menu-9.html">MENU - STYLE 9</a></li>--}}
                                            {{--<li><a href="feature-menu-10.html">MENU - STYLE 10</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--<i class="et-genius"></i> MENU DROPDOWN--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="feature-menu-dd-light.html">DROPDOWN - LIGHT</a></li>--}}
                                            {{--<li><a href="feature-menu-dd-dark.html">DROPDOWN - DARK</a></li>--}}
                                            {{--<li><a href="feature-menu-dd-color.html">DROPDOWN - COLOR</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--<i class="et-beaker"></i> PAGE TITLES--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="feature-title-left.html">ALIGN LEFT</a></li>--}}
                                            {{--<li><a href="feature-title-right.html">ALIGN RIGHT</a></li>--}}
                                            {{--<li><a href="feature-title-center.html">ALIGN CENTER</a></li>--}}
                                            {{--<li><a href="feature-title-light.html">LIGHT</a></li>--}}
                                            {{--<li><a href="feature-title-dark.html">DARK</a></li>--}}
                                            {{--<li><a href="feature-title-tabs.html">WITH TABS</a></li>--}}
                                            {{--<li><a href="feature-title-breadcrumbs.html">BREADCRUMBS ONLY</a></li>--}}
                                            {{--<li>--}}
                                                {{--<a class="dropdown-toggle" href="#">PARALLAX</a>--}}
                                                {{--<ul class="dropdown-menu">--}}
                                                    {{--<li><a href="feature-title-parallax-small.html">PARALLAX SMALL</a></li>--}}
                                                    {{--<li><a href="feature-title-parallax-medium.html">PARALLAX MEDIUM</a></li>--}}
                                                    {{--<li><a href="feature-title-parallax-large.html">PARALLAX LARGE</a></li>--}}
                                                    {{--<li><a href="feature-title-parallax-2xlarge.html">PARALLAX 2x LARGE</a></li>--}}
                                                    {{--<li><a href="feature-title-parallax-transp.html">TRANSPARENT HEADER</a></li>--}}
                                                    {{--<li><a href="feature-title-parallax-transp-large.html">TRANSPARENT HEADER - LARGE</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</li>--}}
                                            {{--<li><a href="feature-title-short-height.html">SHORT HEIGHT</a></li>--}}
                                            {{--<li><a href="feature-title-rotative-text.html">ROTATIVE TEXT</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--<i class="et-layers"></i> PAGE SUBMENU--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="feature-page-submenu-light.html">PAGE SUBMENU - LIGHT</a></li>--}}
                                            {{--<li><a href="feature-page-submenu-dark.html">PAGE SUBMENU - DARK</a></li>--}}
                                            {{--<li><a href="feature-page-submenu-color.html">PAGE SUBMENU - COLOR</a></li>--}}
                                            {{--<li><a href="feature-page-submenu-transparent.html">PAGE SUBMENU - TRANSPARENT</a></li>--}}
                                            {{--<li><a href="feature-page-submenu-below-title.html">PAGE SUBMENU - BELOW PAGE TITLE</a></li>--}}
                                            {{--<li><a href="feature-page-submenu-scrollto.html">PAGE SUBMENU - SCROLLTO</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--<i class="et-trophy"></i> ICONS--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="feature-icons-fontawesome.html">FONTAWESOME</a></li>--}}
                                            {{--<li><a href="feature-icons-glyphicons.html">GLYPHICONS</a></li>--}}
                                            {{--<li><a href="feature-icons-etline.html">ET LINE</a></li>--}}
                                            {{--<li><a href="feature-icons-flags.html">FLAGS</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--<i class="et-flag"></i> BACKGROUNDS--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="feature-content-bg-grey.html">CONTENT - SIMPLE GREY</a></li>--}}
                                            {{--<li><a href="feature-content-bg-ggrey.html">CONTENT - GRAIN GREY</a></li>--}}
                                            {{--<li><a href="feature-content-bg-gblue.html">CONTENT - GRAIN BLUE</a></li>--}}
                                            {{--<li><a href="feature-content-bg-ggreen.html">CONTENT - GRAIN GREEN</a></li>--}}
                                            {{--<li><a href="feature-content-bg-gorange.html">CONTENT - GRAIN ORANGE</a></li>--}}
                                            {{--<li><a href="feature-content-bg-gyellow.html">CONTENT - GRAIN YELLOW</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--<i class="et-magnifying-glass"></i> SEARCH LAYOUTS--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="feature-search-default.html">SEARCH - DEFAULT</a></li>--}}
                                            {{--<li><a href="feature-search-fullscreen-light.html">SEARCH - FULLSCREEN LIGHT</a></li>--}}
                                            {{--<li><a href="feature-search-fullscreen-dark.html">SEARCH - FULLSCREEN DARK</a></li>--}}
                                            {{--<li><a href="feature-search-header-light.html">SEARCH - HEADER LIGHT</a></li>--}}
                                            {{--<li><a href="feature-search-header-dark.html">SEARCH - HEADER DARK</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="shortcode-animations.html"><i class="et-expand"></i> ANIMATIONS</a></li>--}}
                                    {{--<li><a href="feature-grid.html"><i class="et-grid"></i> GRID</a></li>--}}
                                    {{--<li><a href="feature-essentials.html"><i class="et-heart"></i> ESSENTIALS</a></li>--}}
                                    {{--<li><a href="page-changelog.html"><i class="et-alarmclock"></i> CHANGELOG</a></li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--<i class="et-newspaper"></i> SIDE PANEL--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="feature-sidepanel-dark-right.html">SIDE PANEL - DARK - RIGHT</a></li>--}}
                                            {{--<li><a href="feature-sidepanel-dark-left.html">SIDE PANEL - DARK - LEFT</a></li>--}}
                                            {{--<li class="divider"></li>--}}
                                            {{--<li><a href="feature-sidepanel-light-right.html">SIDE PANEL - LIGHT - RIGHT</a></li>--}}
                                            {{--<li><a href="feature-sidepanel-light-left.html">SIDE PANEL - LIGHT - LEFT</a></li>--}}
                                            {{--<li class="divider"></li>--}}
                                            {{--<li><a href="feature-sidepanel-color-right.html">SIDE PANEL - COLOR - RIGHT</a></li>--}}
                                            {{--<li><a href="feature-sidepanel-color-left.html">SIDE PANEL - COLOR - LEFT</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li><a target="_blank" href="../Admin/HTML/"><span class="label label-success pull-right">BONUS</span><i class="et-gears"></i> ADMIN PANEL</a></li>--}}
                                {{--</ul>--}}
                            </li>
                            <li class="dropdown mega-menu @yield('studentsNavToggle')"><!-- STUDENTS' INFO -->
                                <a class="dropdown-toggle" href="#">
                                    ข้อมูลนิสิต
                                </a>
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li>--}}
                                        {{--<div class="row">--}}

                                            {{--<div class="col-md-5th">--}}
                                                {{--<ul class="list-unstyled">--}}
                                                    {{--<li><span>GRID</span></li>--}}
                                                    {{--<li><a href="portfolio-grid-1-columns.html">1 COLUMN</a></li>--}}
                                                    {{--<li><a href="portfolio-grid-2-columns.html">2 COLUMNS</a></li>--}}
                                                    {{--<li><a href="portfolio-grid-3-columns.html">3 COLUMNS</a></li>--}}
                                                    {{--<li><a href="portfolio-grid-4-columns.html">4 COLUMNS</a></li>--}}
                                                    {{--<li><a href="portfolio-grid-5-columns.html">5 COLUMNS</a></li>--}}
                                                    {{--<li><a href="portfolio-grid-6-columns.html">6 COLUMNS</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}

                                            {{--<div class="col-md-5th">--}}
                                                {{--<ul class="list-unstyled">--}}
                                                    {{--<li><span>MASONRY</span></li>--}}
                                                    {{--<li><a href="portfolio-masonry-2-columns.html">2 COLUMNS</a></li>--}}
                                                    {{--<li><a href="portfolio-masonry-3-columns.html">3 COLUMNS</a></li>--}}
                                                    {{--<li><a href="portfolio-masonry-4-columns.html">4 COLUMNS</a></li>--}}
                                                    {{--<li><a href="portfolio-masonry-5-columns.html">5 COLUMNS</a></li>--}}
                                                    {{--<li><a href="portfolio-masonry-6-columns.html">6 COLUMNS</a></li>--}}

                                                {{--</ul>--}}
                                            {{--</div>--}}

                                            {{--<div class="col-md-5th">--}}
                                                {{--<ul class="list-unstyled">--}}
                                                    {{--<li><span>SINGLE</span></li>--}}
                                                    {{--<li><a href="portfolio-single-extended.html">EXTENDED ITEM</a></li>--}}
                                                    {{--<li><a href="portfolio-single-parallax.html">PARALLAX IMAGE</a></li>--}}
                                                    {{--<li><a href="portfolio-single-slider.html">SLIDER GALLERY</a></li>--}}
                                                    {{--<li><a href="portfolio-single-html5-video.html">HTML5 VIDEO</a></li>--}}
                                                    {{--<li><a href="portfolio-single-masonry-thumbs.html">MASONRY THUMBS</a></li>--}}
                                                    {{--<li><a href="portfolio-single-embed-video.html">EMBED VIDEO</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}

                                            {{--<div class="col-md-5th">--}}
                                                {{--<ul class="list-unstyled">--}}
                                                    {{--<li><span>LAYOUT</span></li>--}}
                                                    {{--<li><a href="portfolio-layout-default.html">DEFAULT</a></li>--}}
                                                    {{--<li><a href="portfolio-layout-aside-left.html">LEFT SIDEBAR</a></li>--}}
                                                    {{--<li><a href="portfolio-layout-aside-right.html">RIGHT SIDEBAR</a></li>--}}
                                                    {{--<li><a href="portfolio-layout-aside-both.html">BOTH SIDEBAR</a></li>--}}
                                                    {{--<li><a href="portfolio-layout-fullwidth.html">FULL WIDTH (100%)</a></li>--}}
                                                    {{--<li><a href="portfolio-layout-tabfilter.html">TAB FILTER &amp; PAGINATION</a></li>--}}

                                                {{--</ul>--}}
                                            {{--</div>--}}

                                            {{--<div class="col-md-5th">--}}
                                                {{--<ul class="list-unstyled">--}}
                                                    {{--<li><span>LOADING</span></li>--}}
                                                    {{--<li><a href="portfolio-loading-pagination.html">PAGINATION</a></li>--}}
                                                    {{--<li><a href="portfolio-loading-jpagination.html">JQUERY PAGINATION</a></li>--}}
                                                    {{--<li><a href="portfolio-loading-infinite-scroll.html">INFINITE SCROLL</a></li>--}}
                                                    {{--<li><a href="portfolio-loading-ajax-page.html">AJAX IN PAGE</a></li>--}}
                                                    {{--<li><a href="portfolio-loading-ajax-modal.html">AJAX IN MODAL</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}

                                        {{--</div>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            </li>
                            <li class="@yield('helpNavToggle')"><!-- HELP -->
                                <a href="#">
                                    ช่วยเหลือ
                                </a>
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--DEFAULT--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="blog-default-aside-left.html">LEFT SIDEBAR</a></li>--}}
                                            {{--<li><a href="blog-default-aside-right.html">RIGHT SIDEBAR</a></li>--}}
                                            {{--<li><a href="blog-default-aside-both.html">BOTH SIDEBAR</a></li>--}}
                                            {{--<li><a href="blog-default-fullwidth.html">FULL WIDTH</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--GRID--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="blog-column-2colums.html">2 COLUMNS</a></li>--}}
                                            {{--<li><a href="blog-column-3colums.html">3 COLUMNS</a></li>--}}
                                            {{--<li><a href="blog-column-4colums.html">4 COLUMNS</a></li>--}}
                                            {{--<li class="divider"></li>--}}
                                            {{--<li><a href="blog-column-aside-left.html">LEFT SIDEBAR</a></li>--}}
                                            {{--<li><a href="blog-column-aside-right.html">RIGHT SIDEBAR</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--MASONRY--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="blog-masonry-2colums.html">2 COLUMNS</a></li>--}}
                                            {{--<li><a href="blog-masonry-3colums.html">3 COLUMNS</a></li>--}}
                                            {{--<li><a href="blog-masonry-4colums.html">4 COLUMNS</a></li>--}}
                                            {{--<li><a href="blog-masonry-fullwidth.html">FULLWIDTH</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--TIMELINE--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="blog-timeline-aside-left.html">LEFT SIDEBAR</a></li>--}}
                                            {{--<li><a href="blog-timeline-aside-right.html">RIGHT SIDEBAR</a></li>--}}
                                            {{--<li><a href="blog-timeline-right-aside-right.html">RIGHT + TIMELINE RIGHT</a></li>--}}
                                            {{--<li><a href="blog-timeline-right-aside-left.html">LEFT + TIMELINE RIGHT</a></li>--}}
                                            {{--<li><a href="blog-timeline-fullwidth-left.html">FULL WIDTH - LEFT</a></li>--}}
                                            {{--<li><a href="blog-timeline-fullwidth-right.html">FULL WIDTH - RIGHT</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--SMALL IMAGE--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="blog-smallimg-aside-left.html">LEFT SIDEBAR</a></li>--}}
                                            {{--<li><a href="blog-smallimg-aside-right.html">RIGHT SIDEBAR</a></li>--}}
                                            {{--<li><a href="blog-smallimg-aside-both.html">BOTH SIDEBAR</a></li>--}}
                                            {{--<li><a href="blog-smallimg-fullwidth.html">FULL WIDTH</a></li>--}}
                                            {{--<li class="divider"></li>--}}
                                            {{--<li><a href="blog-smallimg-alternate-1.html">ALTERNATE 1</a></li>--}}
                                            {{--<li><a href="blog-smallimg-alternate-2.html">ALTERNATE 2</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--SINGLE--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="blog-single-default.html">DEFAULT</a></li>--}}
                                            {{--<li><a href="blog-single-aside-left.html">LEFT SIDEBAR</a></li>--}}
                                            {{--<li><a href="blog-single-aside-right.html">RIGHT SIDEBAR</a></li>--}}
                                            {{--<li><a href="blog-single-fullwidth.html">FULL WIDTH</a></li>--}}
                                            {{--<li><a href="blog-single-small-image-left.html">SMALL IMAGE - LEFT</a></li>--}}
                                            {{--<li><a href="blog-single-small-image-right.html">SMALL IMAGE - RIGHT</a></li>--}}
                                            {{--<li><a href="blog-single-big-image.html">BIG IMAGE</a></li>--}}
                                            {{--<li><a href="blog-single-fullwidth-image.html">FULLWIDTH IMAGE</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li class="dropdown">--}}
                                        {{--<a class="dropdown-toggle" href="#">--}}
                                            {{--COMMENTS--}}
                                        {{--</a>--}}
                                        {{--<ul class="dropdown-menu">--}}
                                            {{--<li><a href="blog-comments-bordered.html#comments">BORDERED COMMENTS</a></li>--}}
                                            {{--<li><a href="blog-comments-default.html#comments">DEFAULT COMMENTS</a></li>--}}
                                            {{--<li><a href="blog-comments-facebook.html#comments">FACEBOOK COMMENTS</a></li>--}}
                                            {{--<li><a href="blog-comments-disqus.html#comments">DISQUS COMMENTS</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
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
<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
<script type="text/javascript" src="assets/plugins/jquery/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="assets/js/scripts.js"></script>
@yield('js')

</body>
</html>
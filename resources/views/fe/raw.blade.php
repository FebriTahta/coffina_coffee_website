<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    {{-- <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Rescaf - Food & Restauratn Template"> --}}
    <?php
    $profile = App\Models\Profile::first();
    $about = App\Models\About::first();
    $jenis = App\Models\Jenis::all();
    $jenis_aktif = App\Models\Jenis::first();
    $product = App\Models\Product::all();
    $team = App\Models\Team::all();
    $choice = App\Models\Choice::all();
    ?>

    <meta property="og:title" content="Coffina" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://coffinashop.com" />
    {{-- <meta property="og:image" content="http://my.site.com/images/thumb.png" /> --}}
    @if ($profile !== null)
        <meta property="og:image" content="{{ asset('img/icon/' . $profile->icon) }}" />
    @endif

    @if ($about !== null)
        <meta property="og:description" content="{{ $about->deskripsi }}" />
    @endif
    <meta name="theme-color" content="#FF0000">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Include this to make the og:image larger -->
    <meta name="twitter:card" content="summary_large_image">

    <!-- ========== Page Title ========== -->
    <title>Coffinashop</title>

    <!-- ========== Favicon Icon ========== -->
    @if ($profile !== null)
        <link rel="shortcut icon" href="{{ asset('img/icon/' . $profile->icon) }}" type="image/x-icon">
    @else
        <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    @endif

    <!-- ========== Start Stylesheet ========== -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/flaticon-set.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/magnific-popup.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('assets/css/bootsnav.css') }}" rel="stylesheet" /> --}}
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5/html5shiv.min.js"></script>
      <script src="assets/js/html5/respond.min.js"></script>
    <![endif]-->

    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,500,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">

    <style>
        @media (min-width: 451px) {
            #img_about {
                max-height: 200px;
            }

            .logo {
                max-width: 150px;
            }

            #header {
                display: none;
            }
        }

        @media (max-width:450px) {
            #img_about {
                width: 100%;
            }

            .prod {
                width: 50% !important;
            }

            .jenis_name {
                display: none !important;
            }

            .jenis_desk {
                display: none !important;
            }

            .ordernow {
                font-size: 14px !important;
            }

            .logo {
                max-width: 100%;
            }
        }

        /* * Navbar Main Css * v1.0 */
        nav.bootsnav .dropdown.megamenu-fw {
            position: static;
        }

        nav.bootsnav .container {
            position: relative;
        }

        nav.bootsnav .megamenu-fw .dropdown-menu {
            left: auto;
        }

        nav.bootsnav .megamenu-content {
            padding: 15px;
            width: 100% !important;
        }

        nav.navbar.navbar-default.no-background.inc-border.bootsnav {
            border-bottom: 1px solid #e7e7e7;
        }

        nav.bootsnav .megamenu-content .title {
            color: #333333;
            font-weight: 600;
            margin-top: 0;
            text-transform: uppercase;
            margin-bottom: 10px;
            font-size: 14px;
        }

        nav.bootsnav .dropdown.megamenu-fw .dropdown-menu {
            left: 0;
            right: 0;
        }

        .navbar-collapse {
            padding: 0;
        }

        /* Navbar Brand Top */
        nav.navbar.navbar-default.bootsnav.brand-top .navbar-header {
            position: relative;
            width: 100%;
            text-align: center;
        }

        nav.navbar.navbar-default.bootsnav.brand-top .navbar-header .navbar-brand {
            display: inline-block;
            padding: 0;
            margin-top: 30px;
            float: none;
        }

        nav.navbar .quote-btn a {
            background: #e7272d none repeat scroll 0 0;
            border-radius: 5px;
            color: #ffffff;
            display: inline-block;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }

        nav.navbar .quote-btn {
            margin-top: -4px;
        }

        .bootsnav .side .widget p:last-child {
            margin-bottom: 0;
        }

        /* Navbar Default */
        nav.navbar .navbar-brand {
            height: auto !important;
        }

        nav.navbar.bootsnav.logo-less .navbar-brand {
            display: none;
        }

        nav.navbar.navbar-default.logo-less .navbar-collapse {
            margin-left: -15px;
        }

        nav.navbar.bootsnav.navbar-default.navbar-fixed.navbar-transparent.inc-topbar {
            margin-top: 55px;
            transition: all 0.35s ease-in-out 0s;
        }

        nav.navbar.bootsnav.navbar-default.navbar-fixed.inc-topbar {
            margin-top: 0;
        }

        .navbar-default.navbar.navbar-sidebar.bg-dark .social-share {
            padding: 0 30px;
        }

        nav.bootsnav.navbar-sidebar.bg-dark ul.nav li.dropdown ul.dropdown-menu li a,
        nav.bootsnav.navbar-sidebar.bg-dark ul.nav li.dropdown a,
        nav.bootsnav.navbar-sidebar.bg-dark ul.nav li.dropdown h6 {
            color: #cccccc;
        }

        nav.navbar.navbar-default.navbar-theme.navbar-sticky.bootsnav.on.no-full {
            background: #e7272d;
        }

        nav.navbar.navbar-default.navbar-theme.navbar-sticky.bootsnav.on.no-full ul.nav>li>a {
            color: #ffffff;
        }

        nav.navbar.navbar-default.navbar-theme.navbar-sticky.bootsnav.on.no-full .attr-nav i {
            color: #ffffff;
        }

        .attr-nav ul.cart-list li.total a {
            background: #e7272d none repeat scroll 0 0;
            display: inline-block;
            font-weight: 600 !important;
            padding: 12px 15px;
            color: #ffffff !important;
        }

        .attr-nav ul.cart-list li.total a:hover {
            background: #e7272d none repeat scroll 0 0 !important;
            color: #ffffff !important;
        }

        nav.navbar.bootsnav {
            background-color: <?php echo $profile->warna_bg?>;
            color : <?php echo $profile->warna_text?>;
            border-radius: 0;
            border: none;
            box-shadow: 0 8px 25px 0 rgba(0, 0, 0, 0.04);
            -moz-box-shadow: 0 8px 25px 0 rgba(0, 0, 0, 0.04);
            -webkit-box-shadow: 0 8px 25px 0 rgba(0, 0, 0, 0.04);
            -o-box-shadow: 0 8px 25px 0 rgba(0, 0, 0, 0.04);
            margin: 0;
        }

        nav.bg-dark.navbar.bootsnav {
            background-color: #1c1c1c;
            border: medium none !important;
            margin: 0;
        }

        nav.navbar.bootsnav ul.nav>li>a {
            /* color : <?php echo $profile->warna_text?>; */
            background-color: transparent !important;
            text-transform: uppercase;
            font-weight: 600;
        }

        nav.navbar.bootsnav.bg-dark ul.nav>li>a {
            color: #ffffff;
        }

        nav.navbar.bootsnav ul.nav li.megamenu-fw>a:hover,
        nav.navbar.bootsnav ul.nav li.megamenu-fw>a:focus,
        nav.navbar.bootsnav ul.nav li.active>a:hover,
        nav.navbar.bootsnav ul.nav li.active>a:focus,
        nav.navbar.bootsnav ul.nav li.active>a {
            background-color: transparent;
        }

        nav.navbar.bootsnav .navbar-toggle {
            background-color: transparent !important;
            border: none;
            padding: 0;
            font-size: 18px;
            position: relative;
            top: 5px;
        }

        nav.navbar.bootsnav ul.nav .dropdown-menu .dropdown-menu {
            top: 0;
            left: 100%;
        }

        nav.navbar.bootsnav ul.nav ul.dropdown-menu>li>a {
            white-space: normal;
        }

        ul.menu-col {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        ul.menu-col li a {
            color : <?php echo $profile->warna_text?>;
        }

        ul.menu-col li a:hover,
        ul.menu-col li a:focus {
            text-decoration: none;
        }

        #navbar-menu {
            -webkit-animation-duration: .3s;
            animation-duration: .3s;
        }

        nav.bootsnav.navbar-full {
            padding-bottom: 10px;
            padding-top: 10px;
        }

        nav.bootsnav.navbar-full .navbar-header {
            display: block;
            width: 100%;
        }

        nav.bootsnav.navbar-full .navbar-toggle {
            display: inline-block;
            margin-right: 0;
            position: relative;
            top: 20px;
            font-size: 24px;
            -webkit-transition: all 1s ease-in-out;
            -moz-transition: all 1s ease-in-out;
            -o-transition: all 1s ease-in-out;
            -ms-transition: all 1s ease-in-out;
            transition: all 1s ease-in-out;
        }

        nav.bootsnav.navbar-full .navbar-collapse {
            position: fixed;
            width: 100%;
            height: 100% !important;
            top: 0;
            left: 0;
            padding: 0;
            display: none !important;
            z-index: 9;
        }

        nav.bootsnav.navbar-full .navbar-collapse.in {
            display: block !important;
        }

        nav.bootsnav.navbar-full .navbar-collapse .nav-full {
            overflow: auto;
        }

        nav.bootsnav.navbar-full .navbar-collapse .wrap-full-menu {
            display: table-cell;
            vertical-align: middle;
            background-color: #fff;
            overflow: auto;
        }

        nav.bootsnav.navbar-full .navbar-collapse .nav-full::-webkit-scrollbar {
            width: 0;
        }

        nav.bootsnav.navbar-full .navbar-collapse .nav-full::-moz-scrollbar {
            width: 0;
        }

        nav.bootsnav.navbar-full .navbar-collapse .nav-full::-ms-scrollbar {
            width: 0;
        }

        nav.bootsnav.navbar-full .navbar-collapse .nav-full::-o-scrollbar {
            width: 0;
        }

        nav.bootsnav.navbar-full .navbar-collapse ul.nav {
            display: block;
            width: 100%;
            overflow: auto;
        }

        nav.bootsnav.navbar-full .navbar-collapse ul.nav a:hover,
        nav.bootsnav.navbar-full .navbar-collapse ul.nav a:focus,
        nav.bootsnav.navbar-full .navbar-collapse ul.nav a {
            background-color: transparent;
        }

        nav.bootsnav.navbar-full .navbar-collapse ul.nav>li {
            float: none;
            display: block;
            text-align: center;
        }

        nav.bootsnav.navbar-full .navbar-collapse ul.nav>li>a {
            display: table;
            margin: auto;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: normal;
            font-size: 14px;
            padding: 15px 15px;
        }

        nav.bootsnav.navbar-full .navbar-collapse ul.nav>li>a:hover {
            letter-spacing: 7px;
        }

        nav.bootsnav.navbar-full .navbar-collapse ul.nav>li.close-full-menu>a:hover {
            letter-spacing: normal;
        }

        li.close-full-menu>a {
            padding-top: 0px !important;
            padding-bottom: 0px !important;
        }

        li.close-full-menu>a i {
            font-size: 32px;
        }

        li.close-full-menu {
            padding-top: 30px !important;
            padding-bottom: 30px !important;
        }

        .attr-nav {
            display: inline-block;
            float: right;
            margin-left: 13px;
            margin-right: -10px;
        }

        nav.navbar.attr-border .attr-nav {
            margin-left: 15px;
            min-height: 90px;
            padding-left: 5px;
            position: relative;
            z-index: 1;
        }

        .navbar.bootsnav .attr-nav li.btn a {
            background: #e7272d none repeat scroll 0 0;
            color: #ffffff;
            display: inline-block;
            font-size: 13px;
            font-weight: 600;
            padding: 8px 20px !important;
        }

        nav.navbar.attr-border .attr-nav::before {
            background: #e7e7e7 none repeat scroll 0 0;
            content: "";
            height: 30px;
            left: 0;
            margin-top: -15px;
            position: absolute;
            top: 50%;
            width: 1px;
        }

        .bootsnav .side .widget.social li.facebook a {
            background: #3b5998 none repeat scroll 0 0;
        }

        .bootsnav .side .widget.social li.twitter a {
            background: #1da1f2 none repeat scroll 0 0;
        }

        .bootsnav .side .widget.social li.pinterest a {
            background: #bd081c none repeat scroll 0 0;
        }

        .bootsnav .side .widget.social li.g-plus a {
            background: #db4437 none repeat scroll 0 0;
        }

        .bootsnav .side .widget.social li.linkedin a {
            background: #0077b5 none repeat scroll 0 0;
        }

        .bootsnav .side .widget.social li.dribbble a {
            background: #ea4c89 none repeat scroll 0 0;
        }

        nav.navbar.attr-border.bootsnav.sticked .attr-nav {
            min-height: 80px;
        }

        .attr-nav>ul {
            padding: 0;
            margin: 0 0 -17px 0;
            list-style: none;
            display: inline-block;
        }

        .attr-nav>ul li.dropdown ul.dropdown-menu {
            margin-top: 0;
        }

        .attr-nav>ul>li {
            float: left;
            display: block;
        }

        .attr-nav>ul>li>a {
            color: #333333;
            display: block;
            padding: 32px 0 !important;
            position: relative;
        }

        .attr-nav>a {
            margin-top: 25px;
        }

        .attr-nav>ul>li>a span.badge {
            background-color: #e7272d;
            color: #ffffff;
            height: 20px;
            line-height: 20px;
            margin-top: -5px;
            padding: 0;
            position: absolute;
            right: 0;
            text-align: center;
            top: 0;
            width: 20px;
        }

        .color-yellow .attr-nav>ul>li>a span.badge {
            background-color: #ff9800;
        }

        .attr-nav>ul>li.dropdown ul.dropdown-menu {
            -moz-border-radius: 0px;
            -webkit-border-radius: 0px;
            -o-border-radius: 0px;
            border-radius: 0px;
            -moz-box-shadow: 0px 0px 0px;
            -webkit-box-shadow: 0px 0px 0px;
            -o-box-shadow: 0px 0px 0px;
            box-shadow: 0px 0px 0px;
            border: solid 1px #e0e0e0;
        }

        ul.cart-list {
            padding: 0 !important;
            width: 250px !important;
        }

        ul.cart-list>li {
            position: relative;
            border-bottom: solid 1px #efefef;
            padding: 15px 15px 23px 15px !important;
        }

        ul.cart-list>li>a.photo {
            padding: 0 !important;
            margin-right: 15px;
            float: left;
            display: block;
            width: 50px;
            height: 50px;
            left: 15px;
            top: 15px;
        }

        ul.cart-list>li img {
            border: 1px solid #e7e7e7;
            height: 50px;
            padding: 3px;
            width: 50px;
        }

        ul.cart-list>li>h6 {
            margin: 0;
            font-size: 14px;
        }

        ul.cart-list>li>h6>a.photo {
            padding: 0 !important;
            display: block;
        }

        ul.cart-list>li>p {
            margin-bottom: 0;
        }

        ul.cart-list>li.total {
            background-color: #f5f5f5;
            padding-bottom: 15px !important;
            font-family: "Poppins", sans-serif;
        }

        ul.cart-list>li.total>.btn {
            display: inline-block;
            border: none !important;
            height: auto !important;
        }

        ul.cart-list>li .price {
            font-family: "PT Sans", sans-serif;
            font-weight: bold;
        }

        ul.cart-list>li .price:hover {
            box-shadow: inherit;
        }

        ul.cart-list>li.total>span {
            padding-top: 8px;
        }

        .navbar.bg-dark .top-search {
            background: #e7272d none repeat scroll 0 0;
        }

        .top-search form {
            overflow: hidden;
            position: relative;
        }

        .top-search form button {
            background: transparent none repeat scroll 0 0;
            border: medium none;
            box-shadow: inherit;
            color: #666666;
            height: 50px;
            position: absolute;
            right: 0;
            text-align: center;
            top: 0;
            width: 50px;
            z-index: 9;
        }

        .top-search {
            background-color: #ffffff;
            border: medium none;
            border-radius: 30px;
            box-shadow: 0 10px 40px -15px rgba(0, 0, 0, 0.5);
            display: none;
            height: 50px;
            position: absolute;
            right: 10px;
            top: 90px;
            z-index: 99;
            border: 1px solid #e7e7e7;
        }

        nav.bootsnav.navbar-default.small-pad .top-search {
            top: 72px;
        }

        .top-search input.form-control {
            background-color: transparent;
            border: medium none !important;
            box-shadow: inherit;
            color: #1c1c1c;
            min-width: 300px;
            padding: 0 20px;
        }

        .top-search .input-group-addon {
            background-color: transparent;
            border: medium none;
            color: #666666;
            padding-left: 0;
            padding-right: 0;
            position: absolute;
            right: 20px;
            top: 10px;
            z-index: 9;
        }

        .top-search .input-group-addon.close-search {
            cursor: pointer;
        }

        body {
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .side {
            position: fixed;
            overflow-y: auto;
            top: 0;
            right: -400px;
            width: 400px;
            padding: 50px;
            height: 100%;
            display: block;
            background-color: #ffffff;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            z-index: 9;
            box-shadow: 0 15px 40px -5px rgba(0, 0, 0, 0.1);
        }

        .side.on {
            right: -16px;
        }

        .body-overlay {
            background: rgba(0, 0, 0, 0.65) none repeat scroll 0 0;
            bottom: 0;
            height: 0;
            left: 0;
            opacity: 0;
            position: fixed;
            right: 0;
            transition: opacity 0.4s ease 0.8s, height 0s ease 1.2s;
            z-index: 490;
        }

        body.on-side .body-overlay {
            height: 100%;
            transition: height 0s ease 0s, opacity 0.4s ease 0s;
        }

        body.on-side .body-overlay {
            opacity: 1;
            top: 0;
        }

        .side .close-side {
            border-radius: 50%;
            color: #f44336;
            float: right;
            font-size: 20px;
            font-weight: 400;
            height: 40px;
            line-height: 38px;
            position: relative;
            text-align: center;
            top: -30px;
            width: 40px;
            z-index: 2;
        }

        .color-yellow .side .close-side {
            color: #ff9800;
        }

        .side.barber .close-side {
            border-color: #bc9355;
            color: #bc9355;
        }

        .navbar .side .widget.social li {
            display: inline-block;
        }

        .navbar .side .widget li a {
            color: #666666;
        }

        .navbar .side .widget li a:hover {
            color: #e7272d;
        }

        nav.navbar.bootsnav ul.nav>li.dropdown>a.dropdown-toggle::after {
            content: "\f107";
            font-family: "Font Awesome 5 Free";
            margin-left: 5px;
            margin-top: 2px;
        }

        .navbar .side .widget.social li a {
            color: #ffffff;
            display: inline-block;
            font-weight: 500;
            height: 45px;
            line-height: 45px;
            margin-right: 5px;
            margin-top: 5px;
            padding: 0;
            text-align: center;
            width: 45px;
            border-radius: 50%;
        }

        .navbar .side .widget.social li a:hover {
            background: #e7272d none repeat scroll 0 0;
            color: #ffffff;
        }

        .navbar.color-yellow .side .widget.social li a:hover {
            background: #ff9800 none repeat scroll 0 0;
        }

        .navbar .side .widget li {
            display: block;
            font-family: "Poppins", sans-serif;
            font-size: 15px;
            margin-bottom: 15px;
        }

        .navbar .side .widget.opening-hours li {
            border-bottom: 1px solid #e7e7e7;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 10px;
            padding-bottom: 10px;
            text-transform: uppercase;
            float: left;
            width: 100%;
        }

        .navbar .side .widget.opening-hours li:last-child {
            border: medium none;
            margin: 0;
            padding: 0;
        }


        .navbar .side.barber .widget li i {
            background: #bc9355 none repeat scroll 0 0;
        }

        .bootsnav .side .widget.search input {
            border: 1px solid #e7e7e7;
            box-shadow: inherit;
            width: 100%;
        }

        .navbar .side .widget li:last-child {
            margin: 0;
        }

        .navbar .side .widget h4 {
            display: block;
            font-weight: 600;
            margin-bottom: 25px;
            position: relative;
            text-transform: uppercase;
            z-index: 1;
        }

        .navbar .widget .address {
            padding-top: 5px;
        }

        .navbar .side .address li {
            display: block;
        }

        .navbar .side .address li .icon,
        .navbar .side .address li .info {
            display: table-cell;
            vertical-align: middle;
        }

        .navbar .side .address li .icon i {
            background: #f4f4f4 none repeat scroll 0 0;
            border: 1px solid #e7e7e7;
            border-radius: 5px;
            color: #e7272d;
            font-size: 20px;
            height: 50px;
            line-height: 48px;
            text-align: center;
            width: 50px;
        }

        .navbar .side .address li .info span {
            color: #232323;
            display: block;
            float: none;
            font-weight: 600;
            text-transform: uppercase;
        }

        .navbar .side .address li .info {
            padding-left: 15px;
        }

        .navbar .side .widget .profile-thumb img {
            border: 2px solid #e7e7e7;
            height: 150px;
            margin-top: 10px;
            padding: 3px;
            width: 150px;
        }


        .side .widget {
            position: relative;
            z-index: 1;
            margin-bottom: 50px;
            overflow: hidden;
        }

        .side img {
            margin-bottom: 20px;
        }

        .side .widget .title {
            margin-bottom: 15px;
        }

        .side .widget ul.link {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .side .widget ul.link li a {
            color: #e7272d;
            display: block;
            font-weight: bold;
            letter-spacing: 1px;
            padding: 5px 0;
            text-transform: uppercase;
        }

        .color-yellow .side .widget ul.link li a {
            color: #ff9800;
        }

        .side .widget ul.link li a:focus,
        .side .widget ul.link li a:hover {
            color: #fff;
            text-decoration: none;
        }

        nav.navbar.bootsnav .share {
            padding: 0 30px;
            margin-bottom: 30px;
        }

        nav.navbar.bootsnav .share ul {
            display: inline-block;
            padding: 0;
            margin: 0 0 -7px 0;
            list-style: none;
        }

        nav.navbar.bootsnav .share ul>li {
            float: left;
            display: block;
            margin-right: 5px;
        }

        nav.navbar.bootsnav .share ul>li>a {
            border-radius: 3px;
            display: inline-block;
            margin-right: 20px;
            text-align: center;
            vertical-align: middle;
        }

        nav.navbar.bootsnav .share.dark ul>li>a {
            background-color: #e7272d;
            color: #ffffff;
        }

        nav.navbar.bootsnav.color-yellow .share.dark ul>li>a {
            background-color: #ff9800;
        }

        nav.navbar.bootsnav .share ul>li>a:hover {
            color: #e7272d;
        }

        nav.navbar.bootsnav.color-yellow .share ul>li>a:hover {
            color: #ff9800;
        }

        nav.navbar.bootsnav.navbar-fixed {
            display: block;
            position: fixed;
            width: 100%;
            z-index: 100;
            box-shadow: 0 8px 25px 0 rgba(0, 0, 0, 0.04);
            -moz-box-shadow: 0 8px 25px 0 rgba(0, 0, 0, 0.04);
            -webkit-box-shadow: 0 8px 25px 0 rgba(0, 0, 0, 0.04);
            -o-box-shadow: 0 8px 25px 0 rgba(0, 0, 0, 0.04);
            top: 0;
        }

        nav.navbar.bootsnav.navbar-fixed.nav-box.no-background {
            background: #ffffff none repeat scroll 0 0;
            top: 50px;
            width: auto;
            left: auto;
        }

        nav.navbar.bootsnav.navbar-fixed.nav-box.no-background ul.nav>li>a,
        nav.navbar.bootsnav.navbar-fixed.nav-box.no-background .attr-nav>ul>li>a {
            color: #333333;
        }

        nav.navbar.bootsnav.navbar-fixed.nav-box {
            left: 0;
            top: 0;
            width: 100%;
        }

        nav.navbar.bootsnav.navbar-fixed.no-background {
            display: block;
            position: absolute;
            width: 100%;
            z-index: 100;
            box-shadow: 0 0 0;
            -moz-box-shadow: 0 0 0;
            -webkit-box-shadow: 0 0 0;
            -o-box-shadow: 0 0 0;
        }

        nav.navbar.bootsnav.navbar-fixed.no-background.fixed-border {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        nav.navbar.bootsnav {
            z-index: 100;
        }

        .wrap-sticky {
            position: relative;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .wrap-sticky nav.navbar.bootsnav {
            position: absolute;
            width: 100%;
            left: 0;
            top: 0;
            margin: 0;
        }

        .wrap-sticky nav.navbar.bootsnav.sticked {
            position: fixed;
            -webkit-transition: all 0.2s ease-in-out;
            -moz-transition: all 0.2s ease-in-out;
            -o-transition: all 0.2s ease-in-out;
            -ms-transition: all 0.2s ease-in-out;
            transition: all 0.2s ease-in-out;
            top: 0;
        }

        @media (min-width: 1024px) and (max-width: 1400px) {
            body.wrap-nav-sidebar .wrapper .container {
                width: 100%;
                padding-left: 30px;
                padding-right: 30px;
            }
        }

        @media (min-width: 1024px) and (max-width: 1200px) {
            nav.navbar.bootsnav ul.nav>li>a {
                padding: 35px 12px !important;
            }

            nav.navbar.bootsnav.sticked ul.nav>li>a {
                padding: 30px 12px !important;
            }
        }

        @media (min-width: 1024px) {
            nav.navbar.bootsnav ul.nav .dropdown-menu .dropdown-menu {
                margin-top: -2px;
            }

            nav.navbar.bootsnav ul.nav.navbar-right .dropdown-left .dropdown-menu .dropdown-menu {
                left: -200px;
            }

            nav.navbar.bootsnav ul.nav.navbar-right .dropdown-menu {
                right: auto;
            }

            nav.navbar.bootsnav ul.nav.navbar-right .dropdown-left .dropdown-menu {
                right: 0;
                left: auto;
            }

            nav.navbar.bootsnav ul.nav>li>a {
                font-size: 13px;
                font-weight: 600;
                letter-spacing: 0.06px;
                padding: 35px 15px;
                text-transform: uppercase;
            }

            nav.navbar.bootsnav.small-pad ul.nav>li>a {
                padding: 26px 15px !important;
            }

            nav.bootsnav.small-pad .attr-nav>ul>li {
                padding: 16px 0;
            }

            nav.navbar.small-pad .attr-nav {
                min-height: inherit;
            }

            nav.navbar.bootsnav.sticked ul.nav>li>a {
                padding: 30px 15px;
            }

            nav.navbar.bootsnav.sticked .attr-nav li {
                padding: 20px 0;
            }

            nav.navbar.bootsnav.sticked .top-search {
                top: 80px;
            }

            nav.navbar.bootsnav .navbar-brand {
                padding: 20px 15px;
            }

            nav.navbar.bootsnav.sticked .navbar-brand {
                padding: 15px;
            }

            nav.navbar.bootsnav ul.nav>li.active>a {
                color: #e7272d;
            }

            nav.navbar.bootsnav.active-border ul.nav>li.active>a::before {
                position: absolute;
                left: 50%;
                bottom: -1px;
                content: "";
                height: 2px;
                background: #e7272d;
                width: 50px;
                margin-left: -25px;
            }

            nav.navbar.bootsnav.color-yellow ul.nav>li.active>a {
                color: #ff9800;
            }

            nav.navbar.bootsnav.barber ul.nav>li.active>a {
                color: #bc9355;
            }

            nav.navbar.bootsnav.active-full ul.nav>li>a.active,
            nav.navbar.bootsnav.active-full ul.nav>li>a:hover {
                background: #e7272d none repeat scroll 0 0 !important;
                color: #ffffff;
            }

            nav.navbar.bootsnav.active-full.color-yellow ul.nav>li>a.active,
            nav.navbar.bootsnav.active-full.color-yellow ul.nav>li>a:hover {
                background: #ff9800 none repeat scroll 0 0 !important;
            }

            nav.navbar.bootsnav.active-full ul.nav>li.active>a:hover {
                color: #ffffff;
            }

            nav.navbar.bootsnav ul.nav>li>a:hover {
                color: #e7272d;
            }

            nav.navbar.bootsnav.color-yellow ul.nav>li>a:hover {
                color: #ff9800;
            }

            nav.navbar.bootsnav.barber ul.nav>li>a:hover {
                color: #bc9355;
            }

            nav.op-nav.bootsnav ul.nav.navbar-nav li a {
                text-transform: uppercase;
            }

            .social-links.sl-default a {
                border: 1px solid #ffffff;
                color: #ffffff;
                display: inline-block;
                float: left;
                height: 30px;
                line-height: 30px;
                margin-bottom: 5px;
                margin-right: 5px;
                text-align: center;
                width: 30px;
            }

            nav.navbar.bootsnav li.dropdown ul.dropdown-menu {
                background: #fff none repeat scroll 0 0;
                border: 1px solid transparent;
                border-radius: 2px;
                box-shadow: 0 5px 50px 0 rgba(0, 0, 0, 0.15);
                padding: 0;
                width: 250px;
            }

            nav.navbar.bootsnav li.dropdown ul.dropdown-menu.cart-list {
                left: auto;
                min-width: 300px;
                right: 0;
                border: none !important;
                margin-top: -5px;
                box-shadow: 0 5px 50px 0 rgba(0, 0, 0, 0.15);
            }

            nav.navbar.bootsnav.navbar-sticky.sticked li.dropdown ul.dropdown-menu.cart-list {
                margin-top: -8px;
            }

            nav.navbar.bootsnav li.dropdown ul.dropdown-menu>li a:hover,
            nav.navbar.bootsnav li.dropdown ul.dropdown-menu>li a:hover {
                background-color: transparent;
            }

            nav.navbar.bootsnav li.dropdown ul.dropdown-menu>li>a {
                padding: 12px 15px;
                border-bottom: solid 1px #f5f5f5;
                color: #333333;
                font-weight: 400;
                font-size: 12px;
                text-transform: uppercase;
            }

            nav.navbar.bootsnav li.dropdown ul.dropdown-menu>li:last-child>a {
                border-bottom: none;
            }

            nav.navbar.bootsnav ul.navbar-right li.dropdown ul.dropdown-menu li a {
                color: #232323;
                display: block;
                font-size: 13px;
                font-weight: 400;
                margin-bottom: 0;
                padding: 12px 15px;
                text-align: left;
                text-transform: uppercase;
                width: 100%;
                letter-spacing: 0.06px;
            }

            nav.navbar.bootsnav ul.navbar-right li.dropdown ul.dropdown-menu li a:hover {
                color: #e7272d;
            }

            nav.navbar.bootsnav.color-yellow ul.navbar-right li.dropdown ul.dropdown-menu li a:hover {
                color: #ff9800;
            }

            nav.navbar.bootsnav ul.navbar-left li.dropdown ul.dropdown-menu li a:hover {
                color: #e7272d;
            }

            nav.navbar.bootsnav.color-yellow ul.navbar-left li.dropdown ul.dropdown-menu li a:hover {
                color: #ff9800;
            }

            nav.navbar.bootsnav ul.navbar-right li.dropdown.dropdown-left ul.dropdown-menu li a {
                text-align: right;
            }

            nav.navbar.bootsnav li.dropdown ul.dropdown-menu li.dropdown>a.dropdown-toggle:before {
                font-family: 'Font Awesome 5 Free';
                font-weight: 900;
                float: right;
                content: "\f105";
                margin-top: 0;
            }

            nav.navbar.bootsnav ul.navbar-right li.dropdown ul.dropdown-menu li.dropdown>a.dropdown-toggle:before {
                font-family: 'Font Awesome 5 Free';
                font-weight: 900;
                float: right;
                content: "\f105";
                margin-top: 0;
            }

            nav.navbar.bootsnav ul.navbar-right li.dropdown.dropdown-left ul.dropdown-menu li.dropdown>a.dropdown-toggle:before {
                font-family: 'Font Awesome 5 Free';
                font-weight: 900;
                float: left;
                content: "\f104";
                margin-top: 0;
            }

            nav.navbar.bootsnav li.dropdown ul.dropdown-menu ul.dropdown-menu {
                top: -1px;
            }

            nav.navbar.bootsnav ul.dropdown-menu.megamenu-content {
                padding: 30px 15px !important;
            }

            nav.navbar.bootsnav ul.dropdown-menu.megamenu-content>li {
                padding: 25px 0 20px;
            }

            nav.navbar.bootsnav ul.dropdown-menu.megamenu-content.tabbed {
                padding: 0;
            }

            nav.navbar.bootsnav ul.dropdown-menu.megamenu-content.tabbed>li {
                padding: 0;
            }

            nav.navbar.bootsnav ul.dropdown-menu.megamenu-content .col-menu {
                padding: 0 30px;
                margin: 0 -0.5px;
                border-left: solid 1px #f0f0f0;
                border-right: solid 1px #f0f0f0;
            }

            nav.navbar.bootsnav ul.dropdown-menu.megamenu-content .col-menu:first-child {
                border-left: none;
            }

            nav.navbar.bootsnav ul.dropdown-menu.megamenu-content .col-menu:last-child {
                border-right: none;
            }

            nav.navbar.bootsnav ul.dropdown-menu.megamenu-content .content {
                display: none;
            }

            nav.navbar.bootsnav ul.dropdown-menu.megamenu-content .content ul.menu-col li a {
                border-bottom: medium none;
                color: #232323;
                display: block;
                font-size: 13px;
                font-weight: 400;
                margin-bottom: 0;
                padding: 8px 0;
                text-align: left;
                text-transform: uppercase;
                width: 100%;
                letter-spacing: 0.06px;
            }

            nav.navbar.bootsnav ul.dropdown-menu.megamenu-content .content ul.menu-col li a:hover {
                padding-left: 10px;
            }

            nav.navbar.bootsnav ul.dropdown-menu.megamenu-content .content ul.menu-col li a:hover {
                color: #e7272d;
            }

            nav.navbar.bootsnav.color-yellow ul.dropdown-menu.megamenu-content .content ul.menu-col li a:hover {
                color: #ff9800;
            }

            nav.navbar.bootsnav.on ul.dropdown-menu.megamenu-content .content {
                display: block !important;
                height: auto !important;
            }

            nav.navbar.bootsnav.no-background {
                background-color: transparent;
                border: none;
            }

            nav.navbar.bootsnav.navbar-transparent .attr-nav {
                padding-left: 15px;
                margin-left: 30px;
            }

            nav.navbar.bootsnav.navbar-transparent.white {
                background-color: rgba(255, 255, 255, 0.3);
                border-bottom: solid 1px #bbb;
            }

            nav.navbar.navbar-inverse.bootsnav.navbar-transparent.dark,
            nav.navbar.bootsnav.navbar-transparent.dark {
                background-color: rgba(0, 0, 0, 0.3);
                border-bottom: solid 1px #555;
            }

            nav.navbar.bootsnav.navbar-transparent.white .attr-nav {
                border-left: solid 1px #bbb;
            }

            nav.navbar.navbar-inverse.bootsnav.navbar-transparent.dark .attr-nav,
            nav.navbar.bootsnav.navbar-transparent.dark .attr-nav {
                border-left: solid 1px #555;
            }

            nav.navbar.bootsnav.no-background.white .attr-nav>ul>li>a,
            nav.navbar.bootsnav.navbar-transparent.white .attr-nav>ul>li>a,
            nav.navbar.bootsnav.navbar-transparent.white ul.nav>li>a,
            nav.navbar.bootsnav.no-background.white ul.nav>li>a {
                color: #fff;
            }

            nav.navbar.bootsnav.navbar-transparent.dark .attr-nav>ul>li>a,
            nav.navbar.bootsnav.navbar-transparent.dark ul.nav>li>a {
                color: #eee;
            }

            nav.navbar.bootsnav.navbar-fixed.navbar-transparent .logo-scrolled,
            nav.navbar.bootsnav.navbar-fixed.no-background .logo-scrolled {
                display: none;
            }

            nav.navbar.bootsnav.navbar-fixed.navbar-transparent .logo-display,
            nav.navbar.bootsnav.navbar-fixed.no-background .logo-display {
                display: block;
            }

            nav.navbar.bootsnav.navbar-fixed .logo-display {
                display: none;
            }

            nav.navbar.bootsnav.navbar-fixed .logo-scrolled {
                display: block;
            }

            .attr-nav>ul>li.dropdown ul.dropdown-menu {
                margin-top: 0;
                margin-left: 55px;
                width: 250px;
                left: -250px;
            }

            nav.navbar.bootsnav.menu-center .container {
                position: relative;
            }

            nav.navbar.bootsnav.menu-center ul.nav.navbar-center {
                float: none;
                margin: 0 auto;
                display: table;
                table-layout: fixed;
            }

            nav.navbar.bootsnav.menu-center .navbar-header,
            nav.navbar.bootsnav.menu-center .attr-nav {
                position: absolute;
            }

            nav.navbar.bootsnav.menu-center .attr-nav {
                right: 15px;
            }

            nav.bootsnav.navbar-brand-top .navbar-header {
                display: block;
                width: 100%;
                text-align: center;
            }

            nav.bootsnav.navbar-brand-top ul.nav>li.dropdown>ul.dropdown-menu {
                margin-top: 0px;
            }

            nav.bootsnav.navbar-brand-top ul.nav>li.dropdown.megamenu-fw>ul.dropdown-menu {
                margin-top: 0;
            }

            nav.bootsnav.navbar-brand-top .navbar-header .navbar-brand {
                display: inline-block;
                float: none;
                margin: 0;
            }

            nav.bootsnav.navbar-brand-top .navbar-collapse {
                text-align: center;
            }

            nav.bootsnav.navbar-brand-top ul.nav {
                display: inline-block;
                float: none;
                margin: 0 0 -5px 0;
            }

            nav.bootsnav.brand-center .navbar-header {
                display: block;
                width: 100%;
                position: absolute;
                text-align: center;
                top: 0;
                left: 0;
            }

            nav.bootsnav.brand-center .navbar-brand {
                display: inline-block;
                float: none;
            }

            nav.bootsnav.brand-center.center-side .navbar-brand {
                display: inline-block;
                float: none;
                padding: 22px 0;
            }

            nav.bootsnav.brand-center .navbar-collapse {
                text-align: center;
                display: inline-block;
                padding-left: 0;
                padding-right: 0;
            }

            nav.bootsnav.brand-center ul.nav>li.dropdown>ul.dropdown-menu {
                margin-top: 0px;
            }

            nav.bootsnav.brand-center ul.nav>li.dropdown.megamenu-fw>ul.dropdown-menu {
                margin-top: 0;
            }

            nav.bootsnav.brand-center .navbar-collapse .col-half {
                width: 50%;
                float: left;
                display: block;
            }

            nav.bootsnav.brand-center .navbar-collapse .col-half.left {
                text-align: right;
                padding-right: 100px;
            }

            nav.bootsnav.brand-center .navbar-collapse .col-half.right {
                text-align: left;
                padding-left: 100px;
            }

            nav.bootsnav.brand-center ul.nav {
                float: none !important;
                margin-bottom: -5px !important;
                display: inline-block !important;
            }

            nav.bootsnav.brand-center ul.nav.navbar-right {
                margin: 0;
            }

            nav.bootsnav.brand-center.center-side .navbar-collapse .col-half.left {
                text-align: left;
                padding-right: 100px;
            }

            nav.bootsnav.brand-center.center-side .navbar-collapse .col-half.right {
                text-align: right;
                padding-left: 100px;
            }

            body.wrap-nav-sidebar .wrapper {
                padding-left: 260px;
                overflow-x: hidden;
            }

            nav.bootsnav.navbar-sidebar {
                position: fixed;
                width: 260px;
                overflow: hidden;
                left: 0;
                padding: 0 0 0 0 !important;
                background: #fff;
                -moz-box-shadow: 1px 0px 1px 0px #eee;
                -webkit-box-shadow: 1px 0px 1px 0px #eee;
                -o-box-shadow: 1px 0px 1px 0px #eee;
                box-shadow: 1px 0px 1px 0px #eee;
            }

            nav.bootsnav.navbar-sidebar.bg-dark {
                background: #fff none repeat scroll 0 0;
                -moz-box-shadow: 1px 0 6px 0 #040914;
                -webkit-box-shadow: 1px 0 6px 0 #040914;
                -o-box-shadow: 1px 0 6px 0 #040914;
                box-shadow: 1px 0 6px 0 #040914;
                left: 0;
                overflow: hidden;
                padding: 0 !important;
                position: fixed;
                width: 260px;
            }

            nav.bootsnav.navbar-sidebar.bg-dark {
                background-color: #1c1c1c;
            }

            nav.bootsnav.navbar-sidebar .scroller {
                width: 280px;
                overflow-y: auto;
                overflow-x: hidden;
            }

            nav.bootsnav.navbar-sidebar .container-fluid,
            nav.bootsnav.navbar-sidebar .container {
                padding: 0 !important;
            }

            nav.bootsnav.navbar-sidebar .navbar-header {
                float: none;
                display: block;
                width: 260px;
                padding: 10px 15px;
                margin: 10px 0 0 0 !important;
            }

            nav.bootsnav.navbar-sidebar .navbar-collapse {
                padding: 0 !important;
                width: 260px;
            }

            nav.bootsnav.navbar-sidebar ul.nav {
                float: none;
                display: block;
                width: 100%;
                padding: 0 15px !important;
                margin: 0 0 30px 0;
            }

            nav.bootsnav.navbar-sidebar ul.nav li {
                float: none !important;
            }

            nav.bootsnav.navbar-sidebar ul.nav>li {
                border-bottom: 1px solid #eeeeee;
            }

            nav.bootsnav.navbar-sidebar.bg-dark ul.nav>li {
                border-bottom: 1px solid #0f1a20;
            }

            nav.bootsnav.navbar-sidebar ul.nav>li>a {
                padding: 10px 15px;
            }

            nav.bootsnav.navbar-sidebar.bg-dark ul.nav>li>a {
                color: #ffffff;
            }

            nav.bootsnav.navbar-sidebar ul.nav>li>a:hover {
                color: #e7272d;
            }

            nav.bootsnav.navbar-sidebar.color-yellow ul.nav>li>a:hover {
                color: #ff9800;
            }

            nav.bootsnav.navbar-sidebar ul.nav>li.dropdown>a:after {
                float: right;
            }

            nav.bootsnav.navbar-sidebar ul.nav li.dropdown ul.dropdown-menu {
                left: 100%;
                top: 0;
                position: relative !important;
                left: 0 !important;
                width: 100% !important;
                height: auto !important;
                background-color: transparent;
                border: none !important;
                padding: 0;
                -moz-box-shadow: 0px 0px 0px;
                -webkit-box-shadow: 0px 0px 0px;
                -o-box-shadow: 0px 0px 0px;
                box-shadow: 0px 0px 0px;
            }

            nav.bootsnav.navbar-sidebar ul.nav .megamenu-content .col-menu {
                border: none !important;
            }

            nav.bootsnav.navbar-sidebar ul.nav>li.dropdown>ul.dropdown-menu {
                margin-bottom: 15px;
            }

            nav.bootsnav.navbar-sidebar ul.nav li.dropdown ul.dropdown-menu {
                padding-left: 15px;
                float: none;
                margin-bottom: 0;
            }

            nav.bootsnav.navbar-sidebar ul.nav li.dropdown ul.dropdown-menu li a {
                padding: 10px 15px;
                color: #333333;
                border: none;
            }

            nav.bootsnav.navbar-sidebar ul.nav li.dropdown ul.dropdown-menu ul.dropdown-menu {
                padding-left: 15px;
                margin-top: 0;
            }

            nav.bootsnav.navbar-sidebar ul.nav li.dropdown ul.dropdown-menu li.dropdown>a:before {
                font-family: 'FontAwesome';
                content: "\f105";
                float: right;
            }

            nav.bootsnav.navbar-sidebar ul.nav li.dropdown.on ul.dropdown-menu li.dropdown.on>a:before {
                content: "\f107";
            }

            nav.bootsnav.navbar-sidebar ul.dropdown-menu.megamenu-content>li {
                padding: 0 !important;
            }

            nav.bootsnav.navbar-sidebar .dropdown .megamenu-content .col-menu {
                display: block;
                float: none !important;
                padding: 0;
                margin: 0;
                width: 100%;
            }

            nav.bootsnav.navbar-sidebar .dropdown .megamenu-content .col-menu .title {
                padding: 7px 0;
                text-transform: none;
                font-weight: 400;
                letter-spacing: 0px;
                margin-bottom: 0;
                cursor: pointer;
                color: #333333;
                text-transform: uppercase;
            }

            nav.bootsnav.navbar-sidebar .dropdown .megamenu-content .col-menu .title:before {
                font-family: 'FontAwesome';
                content: "\f105";
                float: right;
            }

            nav.bootsnav.navbar-sidebar .dropdown .megamenu-content .col-menu.on .title:before {
                content: "\f107";
            }

            nav.bootsnav.navbar-sidebar .dropdown .megamenu-content .col-menu {
                border: none;
            }

            nav.bootsnav.navbar-sidebar .dropdown .megamenu-content .col-menu .content {
                padding: 0 0 0 15px;
            }

            nav.bootsnav.navbar-sidebar .dropdown .megamenu-content .col-menu ul.menu-col li a {
                padding: 3px 0 !important;
            }
        }

        @media (max-width: 1023px) {

            .attr-nav {
                margin-right: 0;
            }

            .navbar.navbar-fixed .top-search {
                top: 60px;
            }

            nav.navbar.bootsnav .navbar-brand {
                display: inline-block;
                float: none !important;
                margin: 0 !important;
            }

            nav.navbar.bootsnav .navbar-header {
                float: none;
                display: block;
                text-align: center;
                padding-left: 30px;
                padding-right: 30px;
            }

            nav.navbar.bootsnav .navbar-toggle {
                display: inline-block;
                float: left;
                margin-right: -200px;
                margin-top: 15px;
            }

            .attr-nav>ul>li {
                padding: 10px 0 !important;
            }

            nav.navbar.bootsnav.small-pad {
                min-height: 60px;
            }

            nav.navbar.bootsnav.attr-border .navbar-header {
                min-height: 60px;
            }

            nav.navbar.bootsnav.logo-less .navbar-brand {
                display: inline-block;
            }

            /* Navbar Brand Top */
            nav.navbar.navbar-default.bootsnav.brand-top .navbar-header {
                width: auto;
            }

            nav.navbar.navbar-default.bootsnav.brand-top .navbar-header .navbar-brand {
                padding: 15px 15px !important;
                margin-top: 0;
            }

            nav.navbar.bootsnav.navbar-default.navbar-fixed.navbar-transparent.inc-topbar {
                margin-top: 47px;
            }

            .navbar-brand>img {
                height: 30px !important;
            }

            nav.navbar.bootsnav.navbar-transparent.pad-top {
                background: #ffffff none repeat scroll 0 0 !important;
                border-bottom: none !important;
                margin-top: 0 !important;
            }

            nav.navbar.bootsnav.attr-border .navbar-header {
                border-bottom: 1px solid #e7e7e7;
            }

            nav.navbar.attr-border .attr-nav,
            nav.navbar.bootsnav.sticked.attr-border .attr-nav {
                height: 60px;
                min-height: 60px;
            }

            .top-search {
                top: 60px;
            }

            .navbar.navbar-fixed .top-search {
                top: 60px;
            }

            nav.navbar.bootsnav ul.nav>li.dropdown>a.dropdown-toggle::after {
                display: none;
            }

            .navbar.navbar-fixed .attr-nav>ul>li {
                padding: 16px 0 !important;
            }

            header nav.navbar.border.bootsnav.navbar-fixed.no-background ul li a {
                margin-left: 0;
            }

            nav.bootsnav.navbar-default.info-topbar .navbar-header {
                display: block !important;
            }

            nav.bootsnav.navbar-default.info-topbar ul li a.active::after {
                display: none;
            }

            nav.bootsnav.navbar-default.info-topbar ul li a::after {
                display: none;
            }

            .attr-nav>ul>li>a {
                padding: 17px 0 !important;
            }

            .top-bar-area .logo {
                display: none;
            }

            .top-bar-area.shadow::after {
                display: none;
            }

            nav.navbar.shadow.navbar-inverse.bootsnav.navbar-transparent.dark,
            nav.navbar.shadow.bootsnav.navbar-transparent.dark {
                background-color: #ffffff !important;
                border-bottom: medium none navy;
            }

            .navbar-default.bootsnav.navbar-sidebar.bg-dark .social-share {
                padding: 20px 0;
            }

            .attr-nav>ul li.dropdown ul.dropdown-menu {
                margin-top: -8px !important;
            }

            nav.navbar.bootsnav.no-background.wt-bar {
                background-color: #ffffff;
                margin: 0;
                position: relative;
                top: 0 !important;
            }

            .topbar-area.com.bg-transparent {
                border-bottom: 1px solid #e7e7e7 !important;
                position: relative !important;
            }

            .topbar-area.com.bg-transparent.text-light a {
                color: #333333 !important;
            }

            nav.bg-dark.navbar.bootsnav .navbar-toggle {
                color: #ffffff;
            }

            nav.bg-dark.navbar.bootsnav ul.nav>li>a {
                background-color: transparent;
                color: #333333 !important;
            }

            nav.navbar.bootsnav ul.nav li.dropdown>ul.dropdown-menu {
                box-shadow: inherit !important;
            }

            nav.navbar.bootsnav ul.nav li.dropdown>ul.dropdown-menu li>a {
                border-bottom: 1px solid #e7e7e7 !important;
            }

            nav.navbar.bootsnav ul.nav li.dropdown>ul.dropdown-menu li:hover>a {
                background-color: transparent !important;
                color: #e7272d !important;
            }

            nav.navbar.bootsnav.color-yellow ul.nav li.dropdown>ul.dropdown-menu li:hover>a {
                color: #ff9800 !important;
            }

            nav.bg-dark.navbar.bootsnav ul.nav li.dropdown>ul.dropdown-menu li a {
                background: transparent none repeat scroll 0 0 !important;
                border-bottom: 1px solid #e7e7e7;
                color: #333333 !important;
            }

            nav.bg-dark.navbar.bootsnav ul.nav li.dropdown>ul.dropdown-menu li a:hover {
                color: #5cb85c !important;
            }

            nav.navbar.bootsnav .navbar-collapse.collapse.in {
                background: #ffffff none repeat scroll 0 0;
                display: block;
                margin-bottom: 30px;
            }

            nav.bg-dark.navbar.bootsnav .dropdown .megamenu-content .col-menu .title {
                border-bottom: 1px solid #e0e0e0;
                font-size: 14px;
            }

            nav.navbar.bootsnav .navbar-collapse {
                border: none;
                margin-bottom: 0;
            }

            nav.navbar.bootsnav.no-full .navbar-collapse {
                max-height: 350px;
                overflow-y: auto !important;
            }

            nav.navbar.bootsnav .navbar-collapse.collapse {
                display: none !important;
            }

            nav.navbar.bootsnav .navbar-collapse.collapse.in {
                display: block !important;
            }

            nav.navbar.bootsnav .navbar-nav {
                float: none !important;
                padding-left: 30px;
                padding-right: 30px;
                margin: 0px;
            }

            nav.navbar.bootsnav .navbar-nav>li {
                float: none;
            }

            nav.navbar.bootsnav li.dropdown a.dropdown-toggle:before {
                font-family: 'Font Awesome 5 Free';
                font-weight: 900;
                content: "\f105";
                float: right;
                font-size: 16px;
                margin-left: 10px;
            }

            nav.navbar.bootsnav li.dropdown.on>a.dropdown-toggle:before {
                content: "\f107";
            }

            nav.navbar.bootsnav .navbar-nav>li>a {
                display: block;
                width: 100%;
                border-bottom: solid 1px #e0e0e0;
                padding: 10px 0 !important;
                border-top: solid 1px #e0e0e0;
                margin-bottom: -1px;
            }

            nav.navbar.bootsnav .navbar-nav>li:first-child>a {
                border-top: none;
            }

            nav.navbar.bootsnav ul.navbar-nav.navbar-left>li:last-child>ul.dropdown-menu {
                border-bottom: solid 1px #e0e0e0;
            }

            nav.navbar.bootsnav ul.nav li.dropdown li a.dropdown-toggle {
                float: none !important;
                position: relative;
                display: block;
                width: 100%;
            }

            nav.navbar.bootsnav ul.nav li.dropdown ul.dropdown-menu {
                width: 100%;
                position: relative !important;
                background-color: transparent;
                float: none;
                border: none;
                padding: 0 0 0 15px !important;
                margin: 0 0 -1px 0 !important;
                -moz-box-shadow: 0px 0px 0px;
                -webkit-box-shadow: 0px 0px 0px;
                -o-box-shadow: 0px 0px 0px;
                box-shadow: 0px 0px 0px;
                -moz-border-radius: 0px 0px 0px;
                -webkit-border-radius: 0px 0px 0px;
                -o-border-radius: 0px 0px 0px;
                border-radius: 0px 0px 0px;
            }

            nav.navbar.bootsnav ul.nav li.dropdown ul.dropdown-menu>li>a {
                border-bottom: 1px solid #e0e0e0;
                color: #333333;
                display: block;
                font-size: 14px;
                font-weight: 400;
                padding: 15px 0;
                text-transform: capitalize;
                width: 100%;
            }

            nav.navbar.bootsnav ul.nav ul.dropdown-menu li a:hover,
            nav.navbar.bootsnav ul.nav ul.dropdown-menu li a:focus {
                background-color: transparent;
            }

            nav.navbar.bootsnav ul.nav ul.dropdown-menu ul.dropdown-menu {
                float: none !important;
                left: 0;
                padding: 0 0 0 15px;
                position: relative;
                background: transparent;
                width: 100%;
            }

            nav.navbar.bootsnav ul.nav ul.dropdown-menu li.dropdown.on>ul.dropdown-menu {
                display: inline-block;
                margin-top: -10px;
            }

            nav.navbar.bootsnav li.dropdown ul.dropdown-menu li.dropdown>a.dropdown-toggle:after {
                display: none;
            }

            nav.navbar.bootsnav .dropdown .megamenu-content .col-menu .title {
                padding: 10px 15px 10px 0;
                line-height: 24px;
                text-transform: none;
                font-weight: 400;
                letter-spacing: 0px;
                margin-bottom: 0;
                cursor: pointer;
                border-bottom: solid 1px #e0e0e0;
                color: #333333;
                font-size: 14px;
                font-weight: 600;
                text-transform: uppercase;
            }

            nav.navbar.bootsnav .dropdown .megamenu-content .col-menu ul>li>a {
                display: block;
                width: 100%;
                border-bottom: solid 1px #e0e0e0;
                padding: 8px 0;
            }

            nav.navbar.bootsnav .dropdown .megamenu-content .col-menu .title::before {
                content: "\f105";
                float: right;
                font-family: "Font Awesome 5 Free";
                font-size: 16px;
                font-weight: 900;
                margin-left: 10px;
                position: relative;
                right: -15px;
            }

            nav.navbar.bootsnav .dropdown .megamenu-content .col-menu:last-child .title {
                border-bottom: none;
            }

            nav.navbar.bootsnav .dropdown .megamenu-content .col-menu.on:last-child .title {
                border-bottom: solid 1px #e0e0e0;
            }

            nav.navbar.bootsnav .dropdown .megamenu-content .col-menu:last-child ul.menu-col li:last-child a {
                border-bottom: none;
            }

            nav.navbar.bootsnav .dropdown .megamenu-content .col-menu.on .title:before {
                content: "\f107";
            }

            nav.navbar.bootsnav .dropdown .megamenu-content .col-menu .content {
                padding: 0 0 0 15px;
            }

            nav.bootsnav.brand-center .navbar-collapse {
                display: block;
            }

            nav.bootsnav.brand-center ul.nav {
                margin-bottom: 0px !important;
            }

            nav.bootsnav.brand-center .navbar-collapse .col-half {
                width: 100%;
                float: none;
                display: block;
            }

            nav.bootsnav.brand-center .navbar-collapse .col-half.left {
                margin-bottom: 0;
            }

            nav.bootsnav .megamenu-content {
                padding: 0;
            }

            nav.bootsnav .megamenu-content .col-menu {
                padding-bottom: 0;
            }

            nav.bootsnav .megamenu-content .title {
                cursor: pointer;
                display: block;
                padding: 10px 15px;
                margin-bottom: 0;
                font-weight: normal;
            }

            nav.bootsnav .megamenu-content .content {
                display: none;
            }

            .attr-nav {
                position: absolute;
                right: 60px;
            }

            .attr-nav>ul {
                padding: 0;
                margin: 0 -15px -7px 0;
            }

            .attr-nav>ul>li>a {
                padding: 16px 15px 15px;
            }

            .attr-nav>ul>li.dropdown>a.dropdown-toggle:before {
                display: none;
            }

            .attr-nav>ul>li.dropdown ul.dropdown-menu {
                margin-top: 2px;
                margin-left: 55px;
                width: 250px;
                left: -250px;
                border-top: none;
                box-shadow: 0 5px 50px 0 rgba(0, 0, 0, 0.15);
            }

            .top-search .container {
                padding: 0 45px;
            }

            nav.bootsnav.navbar-full ul.nav {
                margin-left: 0;
            }

            nav.bootsnav.navbar-full ul.nav>li>a {
                border: none;
            }

            nav.bootsnav.navbar-full .navbar-brand {
                float: left !important;
                padding-left: 0;
            }

            nav.bootsnav.navbar-full .navbar-toggle {
                display: inline-block;
                float: right;
                margin-right: 0;
                margin-top: 10px;
                top: 0;
            }

            nav.bootsnav.navbar-full .navbar-header {
                padding-left: 15px;
                padding-right: 15px;
            }

            nav.navbar.bootsnav.navbar-sidebar .share {
                padding: 30px 15px;
                margin-bottom: 0;
            }

            nav.navbar.bootsnav .megamenu-content.tabbed {
                padding-left: 0 !important;
            }

            nav.navbar.bootsnav .tabbed>li {
                padding: 25px 0;
                margin-left: -15px !important;
            }

            body>.wrapper {
                -webkit-transition: all 0.3s ease-in-out;
                -moz-transition: all 0.3s ease-in-out;
                -o-transition: all 0.3s ease-in-out;
                -ms-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
            }

            body.side-right>.wrapper {
                margin-left: 280px;
                margin-right: -280px !important;
            }

            nav.navbar.bootsnav.navbar-mobile .navbar-collapse {
                position: fixed;
                overflow-y: auto !important;
                overflow-x: hidden !important;
                display: block;
                background: #fff;
                z-index: 99;
                width: 280px;
                height: 100% !important;
                left: -280px;
                top: 0;
                padding: 0;
                -webkit-transition: all 0.3s ease-in-out;
                -moz-transition: all 0.3s ease-in-out;
                -o-transition: all 0.3s ease-in-out;
                -ms-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
            }

            nav.navbar.bootsnav.navbar-mobile .navbar-collapse.in {
                left: 0;
            }

            nav.navbar.bootsnav.navbar-mobile ul.nav {
                width: 293px;
                padding-right: 0;
                padding-left: 15px;
            }

            nav.navbar.bootsnav.navbar-mobile ul.nav>li>a {
                padding: 15px 15px;
            }

            nav.navbar.bootsnav.navbar-mobile ul.nav ul.dropdown-menu>li>a {
                padding-right: 15px !important;
                padding-top: 15px !important;
                padding-bottom: 15px !important;
            }

            nav.navbar.bootsnav.navbar-mobile ul.nav ul.dropdown-menu .col-menu .title {
                padding-right: 30px !important;
                padding-top: 13px !important;
                padding-bottom: 13px !important;
            }

            nav.navbar.bootsnav.navbar-mobile ul.nav ul.dropdown-menu .col-menu ul.menu-col li a {
                padding-top: 13px !important;
                padding-bottom: 13px !important;
            }

            nav.navbar.bootsnav.navbar-mobile .navbar-collapse [class*=' col-'] {
                width: 100%;
            }

            nav.navbar.bootsnav.navbar-fixed .logo-scrolled {
                display: block !important;
            }

            nav.navbar.bootsnav.navbar-fixed .logo-display {
                display: none !important;
            }

            nav.navbar.bootsnav.navbar-mobile .tab-menu,
            nav.navbar.bootsnav.navbar-mobile .tab-content {
                width: 100%;
                display: block;
            }
        }

        @media (max-width: 767px) {
            nav.navbar.bootsnav .navbar-header {
                padding-left: 15px;
                padding-right: 15px;
            }

            nav.navbar.bootsnav .navbar-nav {
                padding-left: 15px;
                padding-right: 15px;
                margin: 0;
            }

            .attr-nav {
                right: 30px;
            }

            .attr-nav>ul {
                margin-right: -25px;
            }

            .attr-nav>ul>li>a {
                padding: 16px 10px 15px;
                padding-left: 0 !important;
            }

            .attr-nav>ul>li.dropdown ul.dropdown-menu {
                left: -275px;
                box-shadow: 0 5px 50px 0 rgba(0, 0, 0, 0.15);
            }

            .top-search .container {
                padding: 0 15px;
            }

            nav.bootsnav.navbar-full .navbar-collapse {
                left: 15px;
            }

            nav.bootsnav.navbar-full .navbar-header {
                padding-right: 0;
            }

            nav.bootsnav.navbar-full .navbar-toggle {
                margin-right: -15px;
            }

            nav.bootsnav.navbar-full ul.nav>li>a {
                font-size: 18px !important;
                line-height: 14px !important;
                padding: 10px 10px !important;
            }

            nav.navbar.bootsnav.navbar-sidebar .share {
                padding: 30px 15px !important;
            }

            nav.navbar.bootsnav.navbar-sidebar .share {
                padding: 30px 0 !important;
                margin-bottom: 0;
            }

            nav.navbar.bootsnav.navbar-mobile.navbar-sidebar .share {
                padding: 30px 15px !important;
                margin-bottom: 0;
            }

            body.side-right>.wrapper {
                margin-left: 280px;
                margin-right: -280px !important;
            }

            nav.navbar.bootsnav.navbar-mobile .navbar-collapse {
                margin-left: 0;
            }

            nav.navbar.bootsnav.navbar-mobile ul.nav {
                margin-left: -15px;
            }

            nav.navbar.bootsnav.navbar-mobile ul.nav {
                border-top: solid 1px #fff;
            }

            li.close-full-menu {
                padding-top: 15px !important;
                padding-bottom: 15px !important;
            }
        }

        @media (min-width: 480px) and (max-width: 640px) {
            nav.bootsnav.navbar-full ul.nav {
                padding-top: 30px;
                padding-bottom: 30px;
            }
        }

        .navbar-brand>img {
            display: initial;
            height: auto;
        }

        .attr-nav>ul>li {
            padding: 25px 0;
            font-size: 18px;
        }

        .attr-nav>ul>li>a {
            font-size: 18px;
            padding: 8px 10px !important;
        }

        .attr-nav>ul>li.quote-btn>a {
            padding: 10px 25px !important;
            margin-left: 5px;
            border-radius: inherit;
            letter-spacing: 1px;
        }

        .attr-nav.menu li a {
            font-size: 14px;
            font-weight: 500;
            text-transform: uppercase;
        }

        .attr-nav.menu li {
            margin-left: 10px;
        }

        .attr-nav.menu li:last-child a {
            background: #e7272d none repeat scroll 0 0;
            border-radius: 30px;
            color: #ffffff !important;
            padding: 5px 20px !important;
        }

        .color-yellow .attr-nav.menu li:last-child a {
            background: #ff9800 none repeat scroll 0 0;
        }

        nav.bootsnav.navbar-default.info-topbar .attr-nav ul li a {
            font-size: 16px;
            margin-left: 25px;
            margin-right: 0;
        }

        nav.bootsnav.navbar-default.info-topbar.sticked .attr-nav ul li a {
            margin-right: 0;
        }

        nav.navbar.bootsnav.bg-dark .attr-nav>ul>li>a {
            color: #ffffff;
        }

        ul.cart-list>li.total>.btn {
            color: #232323;
            padding: 10px 25px !important;
        }

        @media (min-width: 1024px) {
            nav.navbar ul.nav>li>a {
                padding: 30px 15px;
                font-weight: 300;
            }

            nav.navbar .navbar-brand {
                margin-top: 0;
            }

            nav.navbar .navbar-brand {
                margin-top: 0;
            }

            nav.navbar li.dropdown ul.dropdown-menu {
                border-top: solid 5px;
            }

            nav.navbar-center .navbar-brand {
                margin: 0 !important;
            }

            nav.navbar-brand-top .navbar-brand {
                margin: 10px !important;
            }

            nav.navbar-full .navbar-brand {
                position: relative;
            }

            nav.navbar-sidebar ul.nav,
            nav.navbar-sidebar .navbar-brand {
                margin-bottom: 50px;
            }

            nav.navbar-sidebar ul.nav>li>a {
                padding: 10px 15px;
                font-weight: bold;
            }

            nav.navbar.bootsnav.navbar-transparent.white {
                background: transparent none repeat scroll 0 0;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }

            nav.navbar.bootsnav.bottom-border {
                border-bottom: 1px solid rgba(255, 255, 255, 0.5);
                background-color: rgba(255, 255, 255, 1);
            }

            nav.navbar.bootsnav.bottom-border.no-background {
                border-bottom: 1px solid rgba(255, 255, 255, 0.5);
                background-color: rgba(255, 255, 255, 0.7);
            }

            nav.navbar.bootsnav.navbar-transparent.white.barber {
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
                background-color: rgba(35, 35, 35, 0.3);
            }

            nav.navbar.navbar-inverse.bootsnav.navbar-transparent.dark,
            nav.navbar.bootsnav.navbar-transparent.dark {
                background-color: rgba(0, 0, 0, 0.3);
                border: none;
                box-shadow: 0 -1px 0 0 rgba(255, 255, 255, 0.1) inset;
            }

            nav.navbar.shadow-less.navbar-inverse.bootsnav.navbar-transparent.dark,
            nav.navbar.shadow-less.bootsnav.navbar-transparent.dark {
                background-color: transparent;
                border: none;
                box-shadow: 0 -1px 0 0 rgba(255, 255, 255, 0.1) inset;
            }

            nav.navbar.bootsnav.navbar-transparent.white .attr-nav {
                border-left: 1px solid rgba(255, 255, 255, 0.1);
                min-height: 90px;
            }

            nav.navbar.navbar-inverse.bootsnav.navbar-transparent.dark .attr-nav,
            nav.navbar.bootsnav.navbar-transparent.dark .attr-nav {
                border-left: solid 1px rgba(255, 255, 255, 0.1);
                min-height: 90px;
            }

            nav.navbar.bootsnav.no-background.white .attr-nav>ul>li>a,
            nav.navbar.bootsnav.navbar-transparent.white .attr-nav>ul>li>a,
            nav.navbar.bootsnav.navbar-transparent.white ul.nav>li>a,
            nav.navbar.bootsnav.no-background.white ul.nav>li>a {
                color: #fff;
            }

            nav.navbar.bootsnav.navbar-transparent.dark .attr-nav>ul>li>a,
            nav.navbar.bootsnav.navbar-transparent.dark ul.nav>li>a {
                color: #eee;
            }
        }

        @media (max-width: 992px) {
            nav.navbar .navbar-brand {
                margin-top: 0;
                position: relative;
            }

            nav.navbar.navbar-sticky .navbar-brand {
                top: 0;
            }

            nav.navbar.navbar-sidebar .navbar-brand {
                top: 0;
            }

            nav.navbar .navbar-brand img.logo {
                height: 30px;
            }

            .attr-nav>ul>li>a {
                padding: 20px 15px 15px;
            }

            nav.navbar.navbar-mobile ul.nav>li>a {
                padding: 15px 15px;
            }

            nav.navbar.navbar-mobile ul.nav ul.dropdown-menu>li>a {
                padding-right: 15px !important;
                padding-top: 15px !important;
                padding-bottom: 15px !important;
            }

            nav.navbar.navbar-mobile ul.nav ul.dropdown-menu .col-menu .title {
                padding-right: 30px !important;
                padding-top: 13px !important;
                padding-bottom: 13px !important;
            }

            nav.navbar.navbar-mobile ul.nav ul.dropdown-menu .col-menu ul.menu-col li a {
                padding-top: 13px !important;
                padding-bottom: 13px !important;
            }

            nav.navbar-full .navbar-brand {
                top: 0;
                padding-top: 10px;
            }
        }

        nav.navbar.navbar-inverse {
            background-color: #222;
            border-bottom: solid 1px #303030;
        }

        nav.navbar.navbar-inverse ul.cart-list>li.total>.btn {
            border-bottom: solid 1px #222 !important;
        }

        nav.navbar.navbar-inverse ul.cart-list>li.total .pull-right {
            color: #fff;
        }

        nav.navbar.navbar-inverse.megamenu ul.dropdown-menu.megamenu-content .content ul.menu-col li a,
        nav.navbar.navbar-inverse ul.nav>li>a {
            color: #eee;
        }

        nav.navbar.navbar-inverse ul.nav>li.dropdown>a {
            background-color: #222;
        }

        nav.navbar.navbar-inverse li.dropdown ul.dropdown-menu>li>a {
            color: #999;
        }

        nav.navbar.navbar-inverse ul.nav .dropdown-menu h1,
        nav.navbar.navbar-inverse ul.nav .dropdown-menu h2,
        nav.navbar.navbar-inverse ul.nav .dropdown-menu h3,
        nav.navbar.navbar-inverse ul.nav .dropdown-menu h4,
        nav.navbar.navbar-inverse ul.nav .dropdown-menu h5,
        nav.navbar.navbar-inverse ul.nav .dropdown-menu h6 {
            color: #fff;
        }

        nav.navbar.navbar-inverse .form-control {
            background-color: #333;
            border-color: #303030;
            color: #fff;
        }

        nav.navbar.navbar-inverse .attr-nav>ul>li>a {
            color: #eee;
        }

        nav.navbar.navbar-inverse .attr-nav>ul>li.dropdown ul.dropdown-menu {
            background-color: #222;
            border-left: solid 1px #303030;
            border-bottom: solid 1px #303030;
            border-right: solid 1px #303030;
        }

        nav.navbar.navbar-inverse ul.cart-list>li {
            border-bottom: solid 1px #303030;
            color: #eee;
        }

        nav.navbar.navbar-inverse ul.cart-list>li img {
            border: solid 1px #303030;
        }

        nav.navbar.navbar-inverse ul.cart-list>li.total {
            background-color: #333;
        }

        nav.navbar.navbar-inverse .share ul>li>a {
            background-color: #555;
        }

        nav.navbar.navbar-inverse .dropdown-tabs .tab-menu {
            border-right: solid 1px #303030;
        }

        nav.navbar.navbar-inverse .dropdown-tabs .tab-menu>ul>li>a {
            border-bottom: solid 1px #303030;
        }

        nav.navbar.navbar-inverse .dropdown-tabs .tab-content {
            border-left: solid 1px #303030;
        }

        nav.navbar.navbar-inverse .dropdown-tabs .tab-menu>ul>li>a:hover,
        nav.navbar.navbar-inverse .dropdown-tabs .tab-menu>ul>li>a:focus,
        nav.navbar.navbar-inverse .dropdown-tabs .tab-menu>ul>li.active>a {
            background-color: #333 !important;
        }

        nav.navbar-inverse.navbar-full ul.nav>li>a {
            border: none;
        }

        nav.navbar-inverse.navbar-full .navbar-collapse .wrap-full-menu {
            background-color: #222;
        }

        nav.navbar-inverse.navbar-full .navbar-toggle {
            background-color: #222 !important;
            color: #333333;
        }

        @media (min-width: 1024px) {
            nav.navbar.navbar-inverse ul.nav .dropdown-menu {
                background-color: #222 !important;
                border-left: solid 1px #303030 !important;
                border-bottom: solid 1px #303030 !important;
                border-right: solid 1px #303030 !important;
            }

            nav.navbar.navbar-inverse li.dropdown ul.dropdown-menu>li>a {
                border-bottom: solid 1px #303030;
            }

            nav.navbar.navbar-inverse ul.dropdown-menu.megamenu-content .col-menu {
                border-left: solid 1px #303030;
                border-right: solid 1px #303030;
            }

            nav.navbar.navbar-inverse.navbar-transparent.dark {
                background-color: rgba(0, 0, 0, 0.3);
                border-bottom: solid 1px #999;
            }

            nav.navbar.navbar-inverse.navbar-transparent.dark .attr-nav {
                border-left: solid 1px #999;
            }

            nav.navbar.navbar-inverse.no-background.white .attr-nav>ul>li>a,
            nav.navbar.navbar-inverse.navbar-transparent.dark .attr-nav>ul>li>a,
            nav.navbar.navbar-inverse.navbar-transparent.dark ul.nav>li>a,
            nav.navbar.navbar-inverse.no-background.white ul.nav>li>a {
                color: #fff;
            }

            nav.navbar.navbar-inverse.no-background.dark .attr-nav>ul>li>a,
            nav.navbar.navbar-inverse.no-background.dark .attr-nav>ul>li>a,
            nav.navbar.navbar-inverse.no-background.dark ul.nav>li>a,
            nav.navbar.navbar-inverse.no-background.dark ul.nav>li>a {
                color: #3f3f3f;
            }
        }

        @media (max-width: 992px) {
            nav.navbar.navbar-inverse .navbar-toggle {
                color: #eee;
                background-color: #222 !important;
            }

            nav.navbar.navbar-inverse .navbar-nav>li>a {
                border-top: solid 1px #303030;
                border-bottom: solid 1px #303030;
            }

            nav.navbar.navbar-inverse ul.nav li.dropdown ul.dropdown-menu>li>a {
                color: #999;
                border-bottom: solid 1px #303030;
            }

            nav.navbar.navbar-inverse .dropdown .megamenu-content .col-menu .title {
                border-bottom: solid 1px #303030;
                color: #eee;
            }

            nav.navbar.navbar-inverse .dropdown .megamenu-content .col-menu ul>li>a {
                border-bottom: solid 1px #303030;
                color: #999 !important;
            }

            nav.navbar.navbar-inverse .dropdown .megamenu-content .col-menu.on:last-child .title {
                border-bottom: solid 1px #303030;
            }

            nav.navbar.navbar-inverse .dropdown-tabs .tab-menu>ul {
                border-top: solid 1px #303030;
            }

            nav.navbar.navbar-inverse.navbar-mobile .navbar-collapse {
                background-color: #222;
            }
        }

        @media (max-width: 767px) {
            nav.navbar.navbar-inverse.navbar-mobile ul.nav {
                border-top: solid 1px #222;
            }
        }

        @media (min-width: 1024px) {
            .bootsnav.navbar-full.no-background .navbar-toggle {
                color: #fff;
            }
        }

        nav.bootsnav.navbar-full .navbar-toggle i {
            font-size: 18px;
            color: #9a9a9a;
            font-weight: bold;
            transition: .3s ease;
        }

        .navbar-toggle-txt {
            font-size: 13px;
            position: relative;
            top: -3px;
            font-weight: bold;
            color: #9a9a9a;
            transition: .3s ease;
        }

        nav.bootsnav.navbar-full .navbar-toggle:hover i,
        nav.bootsnav.navbar-full .navbar-toggle:hover span {
            color: #222;
            transition: .3s ease;
        }

        .top-search .input-group .form-control::-webkit-input-placeholder {
            /* Chrome/Opera/Safari */
            color: #666666;
            opacity: 1;
        }

        .top-search .input-group .form-control::-moz-placeholder {
            /* Firefox 19+ */
            color: #666666;
            opacity: 1;
        }

        .top-search .input-group .form-control::-ms-input-placeholder {
            /* IE 10+ */
            color: #666666;
            opacity: 1;
        }

        .top-search .input-group .form-control::-moz-placeholder {
            /* Firefox 18- */
            color: #666666;
            opacity: 1;
        }

        @media only screen and (max-width: 767px) {

            nav.navbar.bootsnav.navbar-fixed.nav-box.no-background {
                left: 0;
                top: 0;
                width: 100%;
            }
        }

        body.wrap-nav-sidebar {
            height: auto !important;
        }

    </style>
</head>

<body>

    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo">Marlon</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item" style="margin: 10">
                        <a href="/" class="nav__link active-link smooth-menu" style="color: brown">
                            <i class='bx bx-home-alt fas fa-home nav__icon' style="margin-top: 20px"></i>
                            <span class="nav__name" style="margin-bottom: 20px">Home</span>
                        </a>
                    </li>
                    <li class="nav__item" style="margin: 10">
                        <a href="#aboutus" class="nav__link active-link smooth-menu" style="color: brown">
                            <i class='bx bx-home-alt fas fa-id-badge nav__icon' style="margin-top: 20px"></i>
                            <span class="nav__name" style="margin-bottom: 20px">Profile</span>
                        </a>
                    </li>
                    <li class="nav__item" style="margin: 10">
                        <a href="#product" class="nav__link active-link smooth-menu" style="color: brown">
                            <i class='bx bx-home-alt fa fa-book nav__icon' style="margin-top: 20px"></i>
                            <span class="nav__name" style="margin-bottom: 20px">Product</span>
                        </a>
                    </li>
                    <li class="nav__item" style="margin: 10">
                        <a href="#team" class="nav__link active-link smooth-menu" style="color: brown">
                            <i class='bx bx-home-alt fas fa-user-circle nav__icon' style="margin-top: 20px"></i>
                            <span class="nav__name" style="margin-bottom: 20px">Team</span>
                        </a>
                    </li>
                </ul>
            </div>

            {{-- <img src="assets/img/profile.png" alt="" class="nav__img"> --}}
        </nav>
    </header>
    <!-- Header
    ============================================= -->

    {{-- <header id="home">

        <!-- Start Navigation -->
        <nav class="navbar navbar-default attr-border navbar-sticky bootsnav">

            

            <div class="container">

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                       
                        <li class="side-menu"><a href="#"><i class="fa fa-bars"></i></a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="/">
                        @if ($profile == null)
                        <img src="assets/img/logo.png" class="logo" alt="Logo">
                        @else
                        <img src="{{asset('img/logo/'.$profile->logo)}}" class="logo" alt="Logo">
                        @endif
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                        <li>
                            <a href="/">home</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="#aboutus">about us</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="#product">product</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="#team">Team</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="#contact">contact</a>
                        </li>
                        @auth
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}">login</a>
                            </li>
                        @endauth

                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>

            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                @if ($about !== null)
                <div class="widget">
                    <h4 class="title">{{$about->title}}</h4>
                    <p>
                       {!!$about->deskripsi!!}
                    </p>
                </div>
                @endif
                <h2>Contact Us</h2>
                        <p>You can contact us from this email <a href="mailto:admin@admin.com" class="text-primary">' admin@admin.com '</a></p>
                        <p>We are happy to receive messages and news from you. If thhere is anything you want to ask, you can contact us at following contact :</p>
                        <div class="address-items">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 equal-height">
                                    <div class="item">
                                        <div class="icon"><i class="fas fa-envelope-open"></i> </div>
                                        <a href="mailto:admin@admin.com" class="text-primary">admin@admin.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <div class="contact-box">
                    <div class="col-md-12 col-md-offset-1 info" style="margin-bottom: 20px;">
                        
                    </div>
                </div>
            </div>
            <!-- End Side Menu -->

        </nav>
        <!-- End Navigation -->

    </header> --}}
    <!-- End Header -->
    <header id="home">
        {{-- <style>
            nav.navbar.bootsnav {
                background-color: '.$profile->warna_bg.';
                border-radius: 0;
                border: none;
                box-shadow: 0 8px 25px 0 rgba(0, 0, 0, 0.04);
                -moz-box-shadow: 0 8px 25px 0 rgba(0, 0, 0, 0.04);
                -webkit-box-shadow: 0 8px 25px 0 rgba(0, 0, 0, 0.04);
                -o-box-shadow: 0 8px 25px 0 rgba(0, 0, 0, 0.04);
                margin: 0;
            }
        </style> --}}
        <!-- Start Navigation -->
        <nav class="navbar navbar-default navbar-fixed dark bootsnav shadow-less on no-full navbar-transparent">

            <div class="container">

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>

                        <li class="side-menu"><a href="#"><i class="fa fa-bars"></i></a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="/">
                        @if ($profile == null)
                            <img src="assets/img/logo.png" class="logo" alt="Logo">
                        @else
                            <img src="{{ asset('img/logo/' . $profile->logo) }}" class="logo" alt="Logo">
                        @endif
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                        <li>
                            <a href="/">home</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="#aboutus">about us</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="#product">product</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="#team">Team</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="#contact">contact</a>
                        </li>
                        @auth
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}">login</a>
                            </li>
                        @endauth

                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>

            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                @if ($about !== null)
                    <div class="widget">
                        <h4 class="title">{{ $about->title }}</h4>
                        <p>
                            {!! $about->deskripsi !!}
                        </p>
                    </div>
                @endif
                <h2>Contact Us</h2>
                <p>You can contact us from this email
                    @if ($profile !== null)
                        <a href="mailto:{{ $profile->email }}" class="text-primary">' {{ $profile->email }} '</a>
                    @else
                        <a href="mailto:admin@admin.com" class="text-primary">' admin@admin.com '</a>
                    @endif

                </p>
                <p>We are happy to receive messages and news from you. If thhere is anything you want to ask, you can
                    contact us at following contact :</p>
                <div class="address-items">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 equal-height">
                            <div class="item">
                                <div class="icon"><i class="fas fa-envelope-open"></i> </div>
                                @if ($profile == null)
                                    <a href="mailto:admin@admin.com" class="text-primary">admin@admin.com</a>
                                @else
                                    <a href="mailto:{{ $profile->email }}"
                                        class="text-primary">{{ $profile->email }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-box">
                    <div class="col-md-12 col-md-offset-1 info" style="margin-bottom: 20px;">

                    </div>
                </div>
            </div>
            <!-- End Side Menu -->

        </nav>
        <!-- End Navigation -->

    </header>
    <!-- Start Banner
    ============================================= -->
    <div class="banner-area content-less responsive-auto-height">
        <div id="bootcarousel" class="carousel inc-top-heading slide carousel-fade animate_text" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner text-light carousel-zoom">
                @if ($slide != null)
                    <div class="item active">
                        <div class="slider-thumb bg-cover"
                            style="background-image: url({{ asset('img/slider/' . $slide->img) }});"></div>
                        <div class="box-table shadow dark">
                            <div class="box-cell">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="content">
                                                <h3 data-animation="animated slideInDown">{{ $slide->mini_title }}
                                                </h3>
                                                <h1 data-animation="animated slideInLeft">{{ $slide->long_title }}
                                                </h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @foreach ($slider as $item)
                    <div class="item">
                        <div class="slider-thumb bg-cover"
                            style="background-image: url({{ asset('img/slider/' . $item->img) }});"></div>
                        <div class="box-table shadow dark">
                            <div class="box-cell">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="content">
                                                <h3 data-animation="animated slideInDown">{{ $item->mini_title }}
                                                </h3>
                                                <h1 data-animation="animated slideInLeft">{{ $item->long_title }}
                                                </h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- End Wrapper for slides -->

            <!-- Left and right controls -->
            <a class="left carousel-control shadow" href="#bootcarousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control shadow" href="#bootcarousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- End Banner -->

    <!-- Start About
    ============================================= -->
    <div class="about-area default-padding bg-gray" id="aboutus"
        @if ($profile !== null) style="background-color: {{ $profile->warna_bg }}" @endif>
        <div class="container">
            <div class="row">
                <div class="about-items">
                    @if ($about == null)
                        <div class="col-md-6 thumb">
                            <img src="assets/img/800x800.png" alt="Thumb">
                        </div>
                        <div class="col-md-6 info"
                            @if ($profile !== null) style="text-decoration-color: {{ $profile->warna_text }}" @endif>
                            <h3>Our Story</h3>
                            <h2>Until I discovered cooking I was never really interested in anything</h2>
                            <p>
                                Pleased anxious or as in by viewing forbade minutes prevent. Too leave had those get
                                being
                                led weeks blind. Had men rose from down lady able. Its son him ferrars proceed six
                                parlors.
                            </p>
                            <p>
                                Advanced diverted domestic sex repeated bringing you old. Possible procured her trifling
                                laughter thoughts property she met way. Companions shy had solicitude favourable own.
                                Which
                                could saw guest man now heard but. Lasted my coming uneasy marked so should. Gravity
                                letters
                                it amongst herself dearest an windows by. Wooded ladies she basket.
                            </p>
                            <div class="address">
                                <ul>
                                    <li>
                                        <span>Address</span>
                                        <p>
                                            22 Baker Street, London, United Kingdom, W1U 3BW
                                        </p>
                                    </li>
                                    <li>
                                        <span>Phone</span>
                                        <p>
                                            +123 456 7890
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @else
                        <div class="col-md-4 thumb" style="text-align: right">
                            <img src="{{ asset('img/about/' . $about->img) }}" id="img_about" alt="Thumb">
                        </div>
                        <div class="col-md-8 info"
                            @if ($profile !== null) style="text-decoration-color: {{ $profile->warna_text }}" @endif>
                            <h3 @if ($profile !== null) style="color: {{ $profile->warna_text }}" @endif>
                                {{ $about->title }}</h3>
                            <p
                                @if ($profile !== null) style="color: {{ $profile->warna_text }}; text-align: justify; " @endif>
                                {!! $about->deskripsi !!}
                            </p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

    <!-- Start Food Menu
    ============================================= -->
    <div class="food-menu-area inc-isotop default-padding " id="product"
        @if ($profile !== null) style="background-color:{{ $profile->warna_bg }}" @endif>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2"
                    @if ($profile !== null) style="color: {{ $profile->warna_text }}" @endif>
                    @if ($profile !== null)
                        <div class="site-heading text-center"
                            @if ($profile !== null) style="color: {{ $profile->warna_text }}" @endif>
                            <h3 style="color:{{ $profile->warna_text }}">Discover</h3>
                            <h2 style="color:{{ $profile->warna_text }}">Our Coffee</h2>
                            <p style="color:{{ $profile->warna_text }}">

                            </p>
                        </div>
                    @else
                        <div class="site-heading text-center"
                            @if ($profile !== null) style="color: {{ $profile->warna_text }}" @endif>
                            <h3>Discover</h3>
                            <h2>Our Coffee</h2>

                        </div>
                    @endif

                </div>
            </div>
            @if ($jenis->count() > 0 && $product->count() > 0)
                <div class="food-menu-area text-center"
                    @if ($profile !== null) style="color: {{ $profile->warna_text }}" @endif>
                    <div class="row">
                        <div class="col-md-12 food-menu-content">
                            <div class="mix-item-menu text-center">
                                <button class="active" data-filter="*"
                                    @if ($profile !== null) style="color: {{ $profile->warna_text }}" @endif>All</button>
                                @foreach ($jenis as $item)
                                    <button
                                        @if ($profile !== null) style="color: {{ $profile->warna_text }}" @endif
                                        data-filter=".{{ $item->slug }}">{{ $item->name }}</button>
                                @endforeach
                            </div>
                            <!-- End Mixitup Nav-->

                            <div class="row text-center masonary">
                                <div id="portfolio-grid" class="menu-lists text-center col-3">
                                    <!-- Single Item -->
                                    @foreach ($product as $item)
                                        <div class="item-single pf-item {{ $item->jenis->slug }} prod">
                                            <div class="item"
                                                @if ($profile !== null) style="background-color: {{ $profile->warna_text }}" @endif>
                                                <div class="thumb">
                                                    <a href="#">
                                                        <img src="{{ asset('img/product/' . $item->img) }}" alt="Thumb">
                                                    </a>
                                                </div>
                                                <div class="info">
                                                    <h4><a href="#"
                                                            @if ($profile !== null) style="color: {{ $profile->warna_bg }}" @endif>{{ $item->name }}</a>
                                                    </h4>
                                                    <span class="jenis_name"
                                                        @if ($profile !== null) style="color: {{ $profile->warna_bg }}" @endif>"{{ $item->jenis->name }}"</span>
                                                    <p class="jenis_desk"
                                                        @if ($profile !== null) style="color: {{ $profile->warna_bg }}" @endif>
                                                        {{ $item->deskripsi }}
                                                    </p>
                                                    <div class="button">
                                                        @if ($profile !== null)
                                                            <a href="mailto:{{ $profile->email }}"
                                                                class="ordernow"
                                                                style="color: {{ $profile->warna_bg }}">message</a>
                                                        @else
                                                            <a href="#email@notfound" class="ordernow"> - mail
                                                                corp is needed</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- End Single Item -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="food-menu-area text-center">
                    <div class="row">
                        <div class="col-md-12 food-menu-content">
                            <div class="mix-item-menu text-center">
                                <button class="active" data-filter="*">All</button>
                            </div>
                            <!-- End Mixitup Nav-->

                            <div class="row text-center masonary">
                                <div id="portfolio-grid" class="menu-lists text-center col-3">
                                    <!-- Single Item -->
                                    <div class="item-single pf-item pancakes meat">
                                        <div class="item">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img src="assets/img/800x600.png" alt="Thumb">
                                                </a>
                                                <div class="price">
                                                    <h5>$5.90</h5>
                                                </div>
                                            </div>
                                            <div class="info">
                                                <h4><a href="#">Crispy Crust Pizzeria</a></h4>
                                                <span>Mutton / Olive Oil / Salt</span>
                                                <p>
                                                    Considered introduced themselves mr to discretion at. Means among
                                                    saw
                                                    hopes for. Death mirth in oh learn he equal on.
                                                </p>
                                                <div class="button">
                                                    <a href="#">Order Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                    <!-- Single Item -->
                                    <div class="item-single pf-item sandwiches vegetarian">
                                        <div class="item">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img src="assets/img/800x600.png" alt="Thumb">
                                                </a>
                                                <div class="price">
                                                    <h5>$18.10</h5>
                                                </div>
                                            </div>
                                            <div class="info">
                                                <h4><a href="#">Luger Burger</a></h4>
                                                <span>Beef / Olive Oil / Salt</span>
                                                <p>
                                                    Considered introduced themselves mr to discretion at. Means among
                                                    saw
                                                    hopes for. Death mirth in oh learn he equal on.
                                                </p>
                                                <div class="button">
                                                    <a href="#">Order Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                    <!-- Single Item -->
                                    <div class="item-single pf-item sandwiches brunch">
                                        <div class="item">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img src="assets/img/800x600.png" alt="Thumb">
                                                </a>
                                                <div class="price">
                                                    <h5>$6.00</h5>
                                                </div>
                                            </div>
                                            <div class="info">
                                                <h4><a href="#">Fries McDonald's</a></h4>
                                                <span>Chicken / Olive Oil / Salt</span>
                                                <p>
                                                    Considered introduced themselves mr to discretion at. Means among
                                                    saw
                                                    hopes for. Death mirth in oh learn he equal on.
                                                </p>
                                                <div class="button">
                                                    <a href="#">Order Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                    <!-- Single Item -->
                                    <div class="item-single pf-item brunch">
                                        <div class="item">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img src="assets/img/800x600.png" alt="Thumb">
                                                </a>
                                                <div class="price">
                                                    <h5>$11.50</h5>
                                                </div>
                                            </div>
                                            <div class="info">
                                                <h4><a href="#">Chicken Popeyes</a></h4>
                                                <span>Mutton / Olive Oil / Salt</span>
                                                <p>
                                                    Considered introduced themselves mr to discretion at. Means among
                                                    saw
                                                    hopes for. Death mirth in oh learn he equal on.
                                                </p>
                                                <div class="button">
                                                    <a href="#">Order Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                    <!-- Single Item -->
                                    <div class="item-single pf-item meat pancakes">
                                        <div class="item">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img src="assets/img/800x600.png" alt="Thumb">
                                                </a>
                                                <div class="price">
                                                    <h5>$25.00</h5>
                                                </div>
                                            </div>
                                            <div class="info">
                                                <h4><a href="#">Chicken Sandwich</a></h4>
                                                <span>Chicken / Olive Oil / Salt</span>
                                                <p>
                                                    Considered introduced themselves mr to discretion at. Means among
                                                    saw
                                                    hopes for. Death mirth in oh learn he equal on.
                                                </p>
                                                <div class="button">
                                                    <a href="#">Order Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Item -->
                                    <!-- Single Item -->
                                    <div class="item-single pf-item sandwiches vegetarian">
                                        <div class="item">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img src="assets/img/800x600.png" alt="Thumb">
                                                </a>
                                                <div class="price">
                                                    <h5>$9.10</h5>
                                                </div>
                                            </div>
                                            <div class="info">
                                                <h4><a href="#">Salmon Steak</a></h4>
                                                <span>Beef / Olive Oil / Salt</span>
                                                <p>
                                                    Considered introduced themselves mr to discretion at. Means among
                                                    saw
                                                    hopes for. Death mirth in oh learn he equal on.
                                                </p>
                                                <div class="button">
                                                    <a href="#">Order Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Item -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
    <!-- End Food Menu -->

    <div class="chef-area default-padding bottom-less bg-gray" id="team"
        @if ($profile !== null) style="background-color: {{ $profile->warna_bg }}" @endif>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center"
                        @if ($profile !== null) style="text-decoration-color: {{ $profile->warna_text }}" @endif>
                        <h3 @if ($profile !== null) style="color: {{ $profile->warna_text }}" @endif>Well
                            Known</h3>
                        <h2 @if ($profile !== null) style="color: {{ $profile->warna_text }}" @endif>Our
                            Team</h2>
                    </div>
                </div>
            </div>

            <div class="row" style="text-align: center">
                <div class="chef-items">
                    <!-- Single Item -->
                    @foreach ($team as $item)
                        <div class="col-md-4 single-item" style="padding: 60px; ">
                            <div class="item"
                                style="text-align: center; align-content: center; align-items: center">
                                <div class="thumb" style="border-radius: 50%">
                                    <img src="{{ asset('img/team/' . $item->img) }}" alt="Thumb">
                                </div>
                                <div class="info"
                                    @if ($profile !== null) style="border-bottom-left-radius: 20px;border-bottom-right-radius: 20px;background-color: {{ $profile->warna_text }}; min-height: 280px;" @endif>
                                    <div class="overlay" style="background-color: {{ $item->warna_text }}">
                                        <h4>{{ $item->name }}</h4>
                                        <p class="btn btn-outline-primary" disabled
                                            style="font-size: 12px; color: {{ $item->warna_bg }}">
                                            {{ $item->position }}</p>
                                    </div>
                                    <div class="content" style="color: {{ $profile->warna_text }}">
                                        <p style="color:  {{ $profile->warna_bg }}">
                                            {!! $item->deskripsi !!}
                                        </p>
                                        <ul>
                                            @if ($item->sosmed->count() < 1)
                                                <li class="">

                                                </li>
                                            @else
                                                @foreach ($item->sosmed as $sosmed)
                                                    <li class="{{ $sosmed->name }}">
                                                        <a href="{{ $sosmed->link }}" target="_blank"><i
                                                                class="fab fa-{{ $sosmed->name }}"
                                                                style="color: {{ $profile->warna_bg }}"></i></a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    <div class="contact-us-area default-padding" id="contact"
        @if ($profile !== null) style="background-color: {{ $profile->warna_bg }}" @endif>
        <div class="container">
            <div class="row">
                <div class="contact-box">
                    <div class="col-md-6 col-md-offset-1 info" style="margin-bottom: 20px;">
                        @if ($profile !== null)
                            <h2 style="color: {{ $profile->warna_text }}">Contact Us</h2>
                            <p style="color: {{ $profile->warna_text }}">You can contact us from this email
                                @if ($profile !== null)
                                    <a href="mailto:{{ $profile->email }}" class="text-primary">'
                                        {{ $profile->email }} '</a>
                            </p>
                        @endif

                        <p style="color: {{ $profile->warna_text }}">We are happy to receive messages and news from
                            you. If thhere is anything you want to ask, you can contact us at following contact :</p>
                        <div class="address-items">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 equal-height">
                                    <div class="item">
                                        <div class="icon"><i class="fas fa-envelope-open"
                                                style="color: {{ $profile->warna_text }}"></i> </div>
                                        @if ($profile !== null)
                                            <a style="color: {{ $profile->warna_text }}"
                                                href="mailto:{{ $profile->email }}"
                                                class="text-primary">{{ $profile->email }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($choice->count() > 0)
                            <form method="POST" id="formadd">@csrf
                                <div class="address-items">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-8 equal-height">
                                            <div class="item">
                                                <h5 style="color: {{ $profile->warna_text }}">You can choose more than
                                                    one most frequently asked question below</h5>
                                            </div>
                                        </div>
                                        @foreach ($choice as $item)
                                            <div class="col-md-6">
                                                <input style="color: {{ $profile->warna_text }}" type="checkbox"
                                                    value="{{ $item->id }}" name="choice_id[]">
                                                <label
                                                    style="color: {{ $profile->warna_text }}">{{ $item->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                        @endif
                    @else
                        <h2>Contact Us</h2>
                        <p>You can contact us from this email
                            @if ($profile !== null)
                                <a href="mailto:{{ $profile->email }}" class="text-primary">' {{ $profile->email }}
                                    '</a>
                        </p>
                        @endif

                        <p>We are happy to receive messages and news from you. If thhere is anything you want to ask,
                            you can contact us at following contact :</p>
                        <div class="address-items">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 equal-height">
                                    <div class="item">
                                        <div class="icon"><i class="fas fa-envelope-open"></i> </div>
                                        @if ($profile !== null)
                                            <a href="mailto:{{ $profile->email }}"
                                                class="text-primary">{{ $profile->email }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($choice->count() > 0)
                            <form method="POST" id="formadd">@csrf
                                <div class="address-items">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-8 equal-height">
                                            <div class="item">
                                                <h5>You can choose more than one most frequently asked question below
                                                </h5>
                                            </div>
                                        </div>
                                        @foreach ($choice as $item)
                                            <div class="col-md-6">
                                                <input type="checkbox" value="{{ $item->id }}" name="choice_id[]">
                                                <label>{{ $item->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                        @endif
                        @endif

                    </div>
                    <!-- Start Form -->
                    <div class="col-md-5">
                        <div class="form-content"
                            @if ($profile !== null) style="background-color: {{ $profile->warna_bg }}" @endif>
                            <div class="heading">
                                <h3
                                    @if ($profile !== null) style="color: {{ $profile->warna_text }}" @endif>
                                    Drop us a line</h3>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control" id="name" name="name" placeholder="Name"
                                            type="text">
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" id="email" name="email" placeholder="Email*"
                                            type="email" required>
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" id="phone" name="phone" placeholder="Phone"
                                            type="text" required>
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group comments">
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Describe your question"
                                            required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <button type="submit" style="background-color: brown" name="submit" id="submit">
                                        Send Message <i class="fa fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Alert Message -->
                            <div class="col-md-12 alert-notification">
                                <div id="message" class="alert-msg"></div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact -->

    <!-- Start Footer
    ============================================= -->
    <footer>
        <!-- Start Footer Bottom -->
        <div class="footer-bottom bg-dark col-3 text-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <p>&copy; Copyright 2019. All Rights Reserved by <a href="#">coffina</a></p>
                    </div>
                    <div class="col-md-4 social">
                        {{-- <ul>
                            <li>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-dribbble"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-pinterest"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                            </li>
                        </ul> --}}
                    </div>
                    <div class="col-md-4 text-right link">
                        <ul>
                            <li>
                                <a href="#">Terms of user</a>
                            </li>
                            <li>
                                <a href="#">License</a>
                            </li>
                            <li>
                                <a href="#">Support</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="{{ asset('assets/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/equal-height.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/modernizr.custom.13711.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/count-to.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/YTPlayer.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootsnav.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    {{-- href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.css') }}"> --}}
    <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <script>
        $('#formadd').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('message.store') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                // beforeSend: function() {
                //     $('#btnadd').attr('disabled', 'disabled');
                //     $('#btnadd').val('Proses Input');
                // },
                success: function(response) {
                    if (response.status == 200) {
                        // $('#large').modal('hide');
                        $("#formadd")[0].reset();
                        // var oTable = $('#example').dataTable();
                        // oTable.fnDraw(false);
                        // $('#btnadd').val('INPUT!');
                        // $('#btnadd').attr('disabled', false);
                        toastr['success']('👋' + response.message, 'Success!', {
                            closeButton: true,
                            tapToDismiss: false,
                        });
                    } else {
                        // $('#btnadd').val('INPUT!');
                        // $('#btnadd').attr('disabled', false);
                        toastr['error']('👋' + response.message, 'Error!', {
                            closeButton: true,
                            tapToDismiss: false,
                        });
                        $('#errList').html("");
                        $('#errList').addClass('alert alert-danger');
                        $.each(response.errors, function(key, err_values) {
                            $('#errList').append('<div>' + err_values + '</div>');
                        });
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
</body>

</html>

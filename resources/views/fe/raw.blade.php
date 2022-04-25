<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    {{-- <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Rescaf - Food & Restauratn Template"> --}}
    <?php 
    $profile    = App\Models\Profile::first();
    $about      = App\Models\About::first();
    $jenis      = App\Models\Jenis::all();
    $jenis_aktif= App\Models\Jenis::first();
    $product    = App\Models\Product::all();
    $team       = App\Models\Team::all();
    $choice     = App\Models\Choice::all();
    ?>

    <meta property="og:title" content="Coffina" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://coffinashop.com" />
    {{-- <meta property="og:image" content="http://my.site.com/images/thumb.png" /> --}}
    @if ($profile !== null)
    <meta property="og:image" content="{{asset('img/icon/'.$profile->icon)}}" />
    @endif

    @if ($about !== null)
    <meta property="og:description" content="{{$about->deskripsi}}" />
    @endif
    <meta name="theme-color" content="#FF0000">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Include this to make the og:image larger -->
    <meta name="twitter:card" content="summary_large_image">

    <!-- ========== Page Title ========== -->
    <title>Coffinashop</title>
    
    <!-- ========== Favicon Icon ========== -->
    @if ($profile !== null)
    <link rel="shortcut icon" href="{{asset('img/icon/'.$profile->icon)}}" type="image/x-icon">
    @else
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    @endif

    <!-- ========== Start Stylesheet ========== -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/flaticon-set.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/magnific-popup.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/owl.theme.default.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/bootsnav.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet" />
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
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

            <img src="assets/img/perfil.png" alt="" class="nav__img">
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
                        <p>You can contact us from this email 
                            @if ($profile !== null)
                            <a href="mailto:{{$profile->email}}" class="text-primary">' {{$profile->email}} '</a>
                            @else
                            <a href="mailto:admin@admin.com" class="text-primary">' admin@admin.com '</a>
                            @endif
                            
                        </p>
                        <p>We are happy to receive messages and news from you. If thhere is anything you want to ask, you can contact us at following contact :</p>
                        <div class="address-items">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 equal-height">
                                    <div class="item">
                                        <div class="icon"><i class="fas fa-envelope-open"></i> </div>
                                        @if ($profile == null)
                                        <a href="mailto:admin@admin.com" class="text-primary">admin@admin.com</a>
                                        @else
                                        <a href="mailto:{{$profile->email}}" class="text-primary">{{$profile->email}}</a>
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
                                                <h3 data-animation="animated slideInDown">{{ $slide->mini_title }}</h3>
                                                <h1 data-animation="animated slideInLeft">{{ $slide->long_title }}</h1>
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
                                                <h3 data-animation="animated slideInDown">{{ $item->mini_title }}</h3>
                                                <h1 data-animation="animated slideInLeft">{{ $item->long_title }}</h1>
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
        @if ($profile !== null)
            style="background-color: {{$profile->warna_bg}}"
        @endif
    >
        <div class="container">
            <div class="row">
                <div class="about-items">
                    @if ($about == null)
                    <div class="col-md-6 thumb" >
                        <img src="assets/img/800x800.png" alt="Thumb">
                    </div>
                    <div class="col-md-6 info" 
                    @if ($profile !== null)
                        style="text-decoration-color: {{$profile->warna_text}}"
                    @endif
                    >
                        <h3>Our Story</h3>
                        <h2>Until I discovered cooking I was never really interested in anything</h2>
                        <p>
                            Pleased anxious or as in by viewing forbade minutes prevent. Too leave had those get being
                            led weeks blind. Had men rose from down lady able. Its son him ferrars proceed six parlors.
                        </p>
                        <p>
                            Advanced diverted domestic sex repeated bringing you old. Possible procured her trifling
                            laughter thoughts property she met way. Companions shy had solicitude favourable own. Which
                            could saw guest man now heard but. Lasted my coming uneasy marked so should. Gravity letters
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
                        <img src="{{asset('img/about/'.$about->img)}}" id="img_about"  alt="Thumb">
                    </div>
                    <div class="col-md-8 info" 
                    @if ($profile !== null)
                        style="text-decoration-color: {{$profile->warna_text}}"
                    @endif
                    >
                        <h3  @if ($profile !== null)
                        style="color: {{$profile->warna_text}}"
                    @endif>{{$about->title}}</h3>
                        <p
                        @if ($profile !== null)
                        style="color: {{$profile->warna_text}}; text-align: justify; "
                        @endif
                        >
                            {!!$about->deskripsi!!}
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
    @if ($profile !== null)
        style="background-color:{{$profile->warna_bg}}"
    @endif>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2" 
                @if ($profile !== null)
                    style="color: {{$profile->warna_text}}"
                @endif
                >
                    @if ($profile !== null)
                    <div class="site-heading text-center"
                        @if ($profile !== null)
                        style="color: {{$profile->warna_text}}"
                    @endif>
                        <h3 style="color:{{$profile->warna_text}}">Discover</h3>
                        <h2 style="color:{{$profile->warna_text}}">Our Coffee</h2>
                        <p style="color:{{$profile->warna_text}}">
                            
                        </p>
                    </div>
                    @else
                    <div class="site-heading text-center"  @if ($profile !== null)
                    style="color: {{$profile->warna_text}}"
                @endif>
                        <h3>Discover</h3>
                        <h2>Our Coffee</h2>
                        
                    </div>
                    @endif
                    
                </div>
            </div>
            @if ($jenis->count() > 0 && $product->count() > 0)
            <div class="food-menu-area text-center"  @if ($profile !== null)
            style="color: {{$profile->warna_text}}"
        @endif>
                <div class="row">
                    <div class="col-md-12 food-menu-content">
                        <div class="mix-item-menu text-center">
                            <button class="active" data-filter="*"  @if ($profile !== null)
                            style="color: {{$profile->warna_text}}"
                        @endif>All</button>
                            @foreach ($jenis as $item)
                                <button 
                                 @if ($profile !== null)
                                    style="color: {{$profile->warna_text}}"
                                @endif
                                data-filter=".{{$item->slug}}">{{$item->name}}</button>
                            @endforeach
                        </div>
                        <!-- End Mixitup Nav-->

                        <div class="row text-center masonary">
                            <div id="portfolio-grid" class="menu-lists text-center col-3">
                                <!-- Single Item -->
                                @foreach ($product as $item)
                                <div class="item-single pf-item {{$item->jenis->slug}} prod" 
                                   
                                    >
                                    <div class="item"
                                    @if ($profile !== null)
                                    style="background-color: {{$profile->warna_text}}"
                                @endif>
                                        <div class="thumb">
                                            <a href="#">
                                                <img src="{{asset('img/product/'.$item->img)}}" alt="Thumb">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <h4><a href="#" 
                                                @if ($profile !== null)
                                                style="color: {{$profile->warna_bg}}"
                                            @endif
                                            >{{$item->name}}</a></h4>
                                            <span class="jenis_name" 
                                            @if ($profile !== null)
                                            style="color: {{$profile->warna_bg}}"
                                        @endif
                                        >"{{$item->jenis->name}}"</span>
                                            <p class="jenis_desk"  @if ($profile !== null)
                                            style="color: {{$profile->warna_bg}}"
                                        @endif>
                                                {{$item->deskripsi}}
                                            </p>
                                            <div class="button">
                                                @if ($profile !== null)
                                                <a href="mailto:{{$profile->email}}" class="ordernow" style="color: {{$profile->warna_bg}}">message</a>
                                                @else
                                                <a href="#email@notfound" class="ordernow"> - mail corp is needed</a>
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
                                                Considered introduced themselves mr to discretion at. Means among saw
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
                                                Considered introduced themselves mr to discretion at. Means among saw
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
                                                Considered introduced themselves mr to discretion at. Means among saw
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
                                                Considered introduced themselves mr to discretion at. Means among saw
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
                                                Considered introduced themselves mr to discretion at. Means among saw
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
                                                Considered introduced themselves mr to discretion at. Means among saw
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
    @if ($profile !== null)
        style="background-color: {{$profile->warna_bg}}"
    @endif
    >
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center"
                    @if ($profile !== null)
                        style="text-decoration-color: {{$profile->warna_text}}"
                    @endif
                    >
                        <h3 
                        @if ($profile !== null)
                        style="color: {{$profile->warna_text}}"
                    @endif>Well Known</h3>
                        <h2 
                        @if ($profile !== null)
                        style="color: {{$profile->warna_text}}"
                    @endif>Our Team</h2>
                    </div>
                </div>
            </div>

            <div class="row" style="text-align: center">
                <div class="chef-items">
                    <!-- Single Item -->
                    @foreach ($team as $item)
                    <div class="col-md-4 single-item" style="padding: 60px; ">
                        <div class="item" style="text-align: center; align-content: center; align-items: center">
                            <div class="thumb">
                                <img src="{{asset('img/team/'.$item->img)}}" alt="Thumb">
                            </div>
                            <div class="info" 
                            @if ($profile !== null)
                                style="background-color: {{$profile->warna_text}}; min-height: 400px"
                            @endif
                            >
                                <div class="overlay">
                                    <h4 >{{$item->name}}</h4>
                                    <span style="color: {{$item->warna_bg}}">{{$item->position}}</span>
                                </div>
                                <div class="content" style="color: {{$profile->warna_text}}">
                                    <p style="color:  {{$profile->warna_bg}}">
                                        {!!$item->deskripsi!!}
                                    </p>
                                    <ul>
                                        @if ($item->sosmed->count() < 1)
                                            <li class="">
                                                
                                            </li>
                                            @else
                                                @foreach ($item->sosmed as $sosmed)
                                                <li class="{{$sosmed->name}}">
                                                    <a href="{{$sosmed->link}}" target="_blank"><i class="fab fa-{{$sosmed->name}}" style="color: {{$profile->warna_bg}}"></i></a>
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
    @if ($profile !== null)
    style="background-color: {{$profile->warna_bg}}"
    @endif
    >
        <div class="container">
            <div class="row">
                <div class="contact-box">
                    <div class="col-md-6 col-md-offset-1 info" style="margin-bottom: 20px;">
                        @if ($profile !== null)
                            <h2 style="color: {{$profile->warna_text}}">Contact Us</h2>
                            <p style="color: {{$profile->warna_text}}">You can contact us from this email 
                                @if ($profile !== null)
                                <a href="mailto:{{$profile->email}}" class="text-primary">' {{$profile->email}} '</a></p>    
                                @endif
                                
                            <p style="color: {{$profile->warna_text}}">We are happy to receive messages and news from you. If thhere is anything you want to ask, you can contact us at following contact :</p>
                            <div class="address-items">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 equal-height">
                                        <div class="item">
                                            <div class="icon"><i class="fas fa-envelope-open" style="color: {{$profile->warna_text}}"></i> </div>
                                            @if ($profile !== null)
                                            <a style="color: {{$profile->warna_text}}" href="mailto:{{$profile->email}}" class="text-primary">{{$profile->email}}</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($choice->count() > 0)
                            <form  method="POST" id="formadd">@csrf
                            <div class="address-items">
                                <div class="row">
                                    <div class="col-md-8 col-sm-8 equal-height">
                                        <div class="item">
                                            <h5 style="color: {{$profile->warna_text}}">You can choose more than one most frequently asked question below</h5>
                                        </div>
                                    </div>
                                    @foreach ($choice as $item)
                                    <div class="col-md-6">
                                        <input style="color: {{$profile->warna_text}}" type="checkbox" value="{{$item->id}}" name="choice_id[]">
                                        <label style="color: {{$profile->warna_text}}">{{$item->name}}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        @else
                        <h2>Contact Us</h2>
                        <p>You can contact us from this email 
                            @if ($profile !== null)
                            <a href="mailto:{{$profile->email}}" class="text-primary">' {{$profile->email}} '</a></p>    
                            @endif
                            
                        <p>We are happy to receive messages and news from you. If thhere is anything you want to ask, you can contact us at following contact :</p>
                        <div class="address-items">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 equal-height">
                                    <div class="item">
                                        <div class="icon"><i class="fas fa-envelope-open"></i> </div>
                                        @if ($profile !== null)
                                        <a href="mailto:{{$profile->email}}" class="text-primary">{{$profile->email}}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($choice->count() > 0)
                        <form  method="POST" id="formadd">@csrf
                        <div class="address-items">
                            <div class="row">
                                <div class="col-md-8 col-sm-8 equal-height">
                                    <div class="item">
                                        <h5>You can choose more than one most frequently asked question below</h5>
                                    </div>
                                </div>
                                @foreach ($choice as $item)
                                <div class="col-md-6">
                                    <input type="checkbox" value="{{$item->id}}" name="choice_id[]">
                                    <label>{{$item->name}}</label>
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
                        @if ($profile !== null)
                                    style="background-color: {{$profile->warna_bg}}"
                                @endif
                        >
                            <div class="heading">
                                <h3
                                @if ($profile !== null)
                                    style="color: {{$profile->warna_text}}"
                                @endif
                                >Drop us a line</h3>
                            </div>
                            
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group">
                                            <input class="form-control" id="name" name="name" placeholder="Name" type="text">
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" id="email" name="email" placeholder="Email*" type="email" required>
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control" id="phone" name="phone" placeholder="Phone" type="text" required>
                                            <span class="alert-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group comments">
                                            <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Describe your question" required></textarea>
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
    <script src="{{asset('assets/js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/equal-height.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.appear.js')}}"></script>
    <script src="{{asset('assets/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/modernizr.custom.13711.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/count-to.js')}}"></script>
    <script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/js/YTPlayer.min.js')}}"></script>
    <script src="{{asset('assets/js/bootsnav.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
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

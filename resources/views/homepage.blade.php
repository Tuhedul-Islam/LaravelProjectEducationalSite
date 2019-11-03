<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Academy of Information Technology</title>

    <!-- Google font -->
    <link href="{{URL::to('https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600')}}" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('frontend/css/style.css')}}"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{URL::to('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js')}}"></script>
    <script src="{{URL::to('https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
    <![endif]-->

</head>
<body>

<!-- Header -->
<header id="header">
    <div class="container">

        <div class="navbar-header">
            <!-- Logo -->
            <div class="navbar-brand">
                <a class="logo" href="{{URL::to('/')}}">
                    <?php
                    use App\BrandIcon;
                    $icon = BrandIcon::where('publication_status', 1)->first();
                    ?>
                    <img src="{{!empty($icon)? $icon->icon:asset('frontend/img/ait-logo-small.png')}}" alt="logo">
                </a>
            </div>
            <!-- /Logo -->

            <!-- Mobile toggle -->
            <button class="navbar-toggle">
                <span></span>
            </button>
            <!-- /Mobile toggle -->
        </div>

        <!-- Navigation -->
        <nav id="nav">
            <ul class="main-menu nav navbar-nav navbar-right">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#courses">Courses</a></li>
                <li><a href="#why-us">Why us</a></li>
                <!--<li><a href="#">Blog</a></li>-->
                <li><a href="{{route('contact')}}">Contact</a></li>
            </ul>
        </nav>
        <!-- /Navigation -->

    </div>
</header>
<!-- /Header -->

<!-- Home -->
<div id="home" class="hero-area">

    <!-- Backgound Image -->
    <?php $coverImg_data = \App\CoverImg::first(); ?>
    <div class="bg-image bg-parallax overlay" style="background-image:url({{asset($coverImg_data->coverImg)}})"></div>
    <!-- /Backgound Image -->

    <div class="home-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="white-text">{{$coverImg_data->title}}</h1>
                    <p class="lead white-text">{{$coverImg_data->body}}</p>
                    <a class="main-button icon-button" href="#courses">{{$coverImg_data->btnText}}</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /Home -->

<!-- About -->
<?php $aboutSection_data = \App\AboutContent::all(); ?>
<div id="about" class="section">

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">

            <div class="col-md-6">
                <div class="section-header">
                    <h2>Welcome to AIT</h2>
                    <p class="lead">Why we are best at</p>
                </div>

                @foreach($aboutSection_data as $aboutData)
                <!-- feature -->
                <div class="feature">
                    <i class="feature-icon fa fa-book"></i>
                    <div class="feature-content">
                        <h4>{{$aboutData->title}}</h4>
                        <p>{{$aboutData->body}}</p>
                    </div>
                </div>
                <!-- /feature -->
                @endforeach
            </div>

            <?php $aboutSection_img = \App\AboutImg::first(); ?>
            <div class="col-md-6">
                <div class="about-img">
                    <img src="{{$aboutSection_img->image}}" height="452px" alt="">
                </div>
            </div>

        </div>
        <!-- row -->

    </div>
    <!-- container -->
</div>
<!-- /About -->

<!-- Courses -->
<div id="courses" class="section">

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">
            <div class="section-header text-center">
                <h2>Explore Courses</h2>
                <p class="lead">AIT provide basic and advance training for several courses.</p>
            </div>
        </div>
        <!-- /row -->

        <!-- courses -->
        <div id="courses-wrapper">
            <!-- row -->
            <div class="row">
                @if(!empty($all_course))
                @foreach($all_course as $course)
                <!-- single course -->
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="course">
                        <a href="#" class="course-img">
                            <img src="{{$course->course_image}}" alt="Course Image">
                            <i class="course-link-icon fa fa-link"></i>
                        </a>
                        <a class="course-title" href="#">{{$course->course_title}}</a>
                        <div class="course-details">
                            <span class="course-category">{{$course->course_name}}</span>
                            <span class="course-price course-free">{{$course->course_fee}} /=</span>
                        </div>
                    </div>
                </div>
                <!-- /single course -->
                @endforeach
                @endif
            </div>
            <!-- /row -->
        </div>
        <!-- /courses -->

        <div class="row">
            <div class="col-sm-6 col-sm-offset-5">
                {{$all_course->render()}}
            </div>
        </div>

        {{--<div class="row">
            <div class="center-btn">
                <a class="main-button icon-button" href="#courses">More Courses</a>
            </div>
        </div>--}}
    </div>
    <!-- container -->
</div>
<!-- /Courses -->


<!-- Why us -->
<div id="why-us" class="section">

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">
            <div class="section-header text-center">
                <h2>Why will you choose AIT</h2>
                <p class="lead"></p>
            </div>

        <?php $whySection_data = \App\WhyusContent::all(); ?>
            @foreach($whySection_data as $singleData)
            <!-- feature -->
            <div class="col-md-4">
                <div class="feature">
                    <i class="feature-icon fa fa-book"></i>
                    <div class="feature-content">
                        <h4>{{$singleData->title}}</h4>
                        <p>{{$singleData->message}}</p>
                    </div>
                </div>
            </div>
            <!-- /feature -->
            @endforeach
        </div>
        <!-- /row -->

        <hr class="section-hr">

        <!-- row -->
        <div class="row">
            <div class="col-md-6">
                <?php $companyDetail_data = \App\CompanyDetail::all(); ?>

                @foreach($companyDetail_data as $companyDetail)
                <h3>{{$companyDetail->title}} </h3>
                <p>{{$companyDetail->details}}</p>
                @endforeach
            </div>

            <div class="col-md-5 col-md-offset-1">
                <a class="about-video" href="#">
                    <img src="{{asset('frontend/img/about-video-1.jpg')}}" alt="">
                    <i class="play-icon fa fa-play"></i>
                </a>
            </div>

        </div>
        <!-- /row -->

    </div>
    <!-- /container -->

</div>
<!-- /Why us -->

<!-- Contact CTA -->
<div id="contact-cta" class="section">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay" style="background-image:url({{asset('frontend/img/cta2-background.jpg')}})"></div>
    <!-- Backgound Image -->

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">

            <div class="col-md-8 col-md-offset-2 text-center">
                <h2 class="white-text">Contact Us</h2>
                <p class="lead white-text">242, Haji Bhaban (1st floor), Taraboniar Chara, Cox's bazaar-4700</p>
                <p class="lead white-text">Cell : 01842- 14 14 00  || 01778- 14 14 00</p>
                <a class="main-button icon-button" href="contact.html">Contact Us Now</a>
            </div>

        </div>
        <!-- /row -->

    </div>
    <!-- /container -->

</div>
<!-- /Contact CTA -->

<!-- Footer -->
<footer id="footer" class="section">

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">

            <!-- footer logo -->
            <div class="col-md-6">
                <div class="footer-logo">
                    <a class="logo" href="{{URL::to('/')}}">
                        <img src="{{!empty($icon)? $icon->icon:asset('frontend/img/ait-logo-small.png')}}" alt="logo">
                    </a>
                </div>
            </div>
            <!-- footer logo -->

            <!-- footer nav -->
            <div class="col-md-6">
                <ul class="footer-nav">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#courses">Courses</a></li>
                    <li><a href="#why-us">Why us</a></li>
                    <!--<li><a href="blog.html">Blog</a></li>-->
                    <li><a href="{{route('contact')}}">Contact</a></li>
                </ul>
            </div>
            <!-- /footer nav -->

        </div>
        <!-- /row -->

        <!-- row -->
        <div id="bottom-footer" class="row">

            <!-- social -->
            <div class="col-md-4 col-md-push-8">
                <ul class="footer-social">
                    <li><a href="https://www.facebook.com/AITBangladesh/" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
            <!-- /social -->

            <!-- copyright -->
            <div class="col-md-8 col-md-pull-4">
                <div class="footer-copyright">
                    <span>&copy; Copyright 2018. All Rights Reserved.</span>
                </div>
            </div>
            <!-- /copyright -->

        </div>
        <!-- row -->

    </div>
    <!-- /container -->

</footer>
<!-- /Footer -->

<!-- preloader -->
<div id='preloader'><div class='preloader'></div></div>
<!-- /preloader -->


<!-- jQuery Plugins -->
<script type="text/javascript" src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/main.js')}}"></script>

</body>
</html>

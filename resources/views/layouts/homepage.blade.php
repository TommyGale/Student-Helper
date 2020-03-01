<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="img/favicon.png" type="image/png">
  <title>@yield('title','Student Helper')</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('vendors/linericon/style.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('vendors/owl-carousel/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('vendors/nice-select/css/nice-select.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('vendors/animate-css/animate.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('vendors/flaticon/flaticon.css') }}">
  <!-- main css -->
  <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.0/css/bulma.min.css">
</head>

<body>

  <!--================Header Menu Area =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="/"><img src="img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
           aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-center">
              <li class="nav-item active"><a class="nav-link" href="/">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                 aria-expanded="false">Forums</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="/posts">Posts</a></li>
                </ul>
              </li>
              <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
            </ul>
            @guest
            <ul class="nav navbar-nav navbar-right">
              <li class="nav-item"><a href="/login" class="primary_btn">join us</a></li>
            </ul>
            @else
            <ul class="nav navbar-nav navbar-right">
             <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                 aria-expanded="false">Account</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="">My Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">Logout</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
                </ul>
              </li>
            @endguest
          </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->

  <!--================Home Banner Area =================-->
  <section class="home_banner_area">
    <div class="banner_inner">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="home_left_img">
              @yield('headImage')
            </div>
          </div>
          <div class="col-lg-6">
            <div class="banner_content">
             @yield('headContent')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Home Banner Area =================-->

  <!--================Recent update Banner Area =================-->

  <section class="recent_update_area section_gap">

    @yield('intro')

  </section>

  <!--================ End update Banner Area =================-->

  <!--================Recent blogs Area =================-->

  <section class="blog_area">

    @yield('blogs')

  </section>

  <!--================End recent blogs Area =================-->
  <!--================Footer Area =================-->
  <footer class="footer_area section_gap_top">
    <div class ="container">
      <div class="row single-footer-widget">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="copy_right_text">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
        </div>
      </div>
  </footer>
  <!--================End Footer Area =================-->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/stellar.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
  <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
  <script src="vendors/isotope/isotope-min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
  <script src="vendors/counter-up/jquery.counterup.min.js"></script>
  <script src="js/mail-script.js"></script>
  <!--gmaps Js-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
  <script src="js/gmaps.min.js"></script>
  <script src="js/theme.js"></script>
</body>

</html>
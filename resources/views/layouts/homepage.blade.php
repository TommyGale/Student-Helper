<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Website tab icon -->
  <link rel="icon" href=" {{ URL::asset('img/favicon.png') }}" type="image/png">
  <!-- Declare the title of the page -->
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
  @yield('head')
</head>

<style>
    
   
.content {
border-left: 300px solid #2c2172;
border-right: 300px solid #2c2172;
background-color: white;

}

</style>

<body>
<!-- Navigation -->
  <header class="header_area">
    <div class="main_menu">
      @include('layouts.navigation')
    </div>
  </header>
 <!-- Banner settings -->
 <section>

   @yield('banner')

 </section>

<!-- Main Content -->
  <section>
    <div class="content">

      @yield('content')
</div>
  </section>

<!-- Footer info -->
  <footer class="footer_area section_gap_top">
    <div class="container">
      <div class="row footer_inner">
        <div class="col-lg-3 col-sm-6">
          
        </div>
      </div>
      <div class="row single-footer-widget">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="copy_right_text">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="social_widget">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-dribbble"></i></a>
            <a href="#"><i class="fa fa-behance"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>

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
  <script src="https://js.pusher.com/5.1/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  @yield('scripts')
</body>

</html>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>@yield('title','Student Helper')</title>
        <!-- Bootstrap CSS -->
        @yield('head')
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('vendors/linericon/style.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('vendors/owl-carousel/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('vendors/lightbox/simpleLightbox.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('vendors/nice-select/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('vendors/animate-css/animate.css') }}">
        <!-- main css -->
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/responsive.css') }}">



    </head>
    <body class="about_page">

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
              <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                 aria-expanded="false">Forums</a>
                <ul class="dropdown-menu">
                	@if(auth()->check())
                	<li class="nav-item"><a class="nav-link" href="/posts/create">Create Post</a></li>
                  <li class="nav-item"><a class="nav-link" href="/posts?by={{ auth()->user()->name }}">My Posts</a></li>
                  @endif
                  <li class="nav-item"><a class="nav-link" href="/posts">All Posts</a></li>
                  <li class="nav-item"><a class="nav-link" href="/posts?popular=1">Popular Posts</a></li>
                </ul>

                </li>
                <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                 aria-expanded="false">Event Planner</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="">All Events</a></li>
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
                  <li class="nav-item"><a class="nav-link" href="{{ route('profile' , auth()->user()) }}">My Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">My Messages</a></li>
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
		<section class="banner_area">
			<div class="banner_inner d-flex align-items-center">
				<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<div class="page_link">
							@yield('headLinks')
						</div>
						@yield('headContent')
					</div>
				</div>
			</div>
		</section>
		<!--================End Home Banner Area =================-->
	
		<!--================Start Content Area =================-->

		<section>

			@yield('content')

		</section>
		
	
	
	
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
		<script src="{{ asset('js/app.js') }}"></script>
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
		<script> var receiver_id = '';
			     var my_id = "{{ Auth::id() }}";
			 	 $(document).ready(function (){

			 	 	$.ajaxSetup({
			 	 		headers: {
			 	 			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			 	 		}
			 	 	});

			 	 	// Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('668b2ace96dab23960cc', {
      cluster: 'eu',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      //alert(JSON.stringify(data));

      if(my_id == data.from) {
      	$('#' + data.to).click();
      }else if( my_id == data.to) {
      	if(receiver_id == data.from) {
      		$('#' + data.from).click();
      	} else {
      		var pending = parseInt ($('#' + data.from).find('.pending').html());	

      		if(pending) {

      			$('#' + data.from).find('.pending').html (pending + 1);
      		} else {
      			$('#' + data.from).append('<span class="pending">1</span>');
      		}

      	}
      }
    });
			 	 	

			 	 	$('.user').click(function (){
			 	 	$('.user').removeClass('active');
			 	 	$(this).addClass('active');
			 	 	$(this).find('.pending').remove();

			 	 	receiver_id = $(this).attr('id');
			 	 	$.ajax({
			 	 		type: "get",
			 	 		url: "message/" + receiver_id,
			 	 		data: "",
			 	 		cache: false,
			 	 		success: function(data) {
			 	 			$('#messages').html(data);
			 	 			scrollToBottomFunc();
			 	 		}
			 	 	});

			 	 });



			 	 	$(document).on('keyup', '.input-text input', function (e) {

			 	 		var message = $(this).val();

			 	 		if(e.keyCode == 13 && message != '' && receiver_id != '') {
			 	 			$(this).val('');

			 	 			var datastr = "receiver_id=" + receiver_id + "&message=" + message;
			 	 			$.ajax({
			 	 				type: "post",
			 	 				url: "message",
			 	 				data: datastr,
			 	 				cache: false,
			 	 				success: function(data) {

			 	 				},
			 	 				error: function (jqXHR, status, err) {

			 	 				},
			 	 				complete: function () {
			 	 					scrollToBottomFunc();
			 	 				}
			 	 			})
			 	 		}
			 	 	});

			 	 });

			 	 function scrollToBottomFunc() {
			 	 	$('.message-wrapper').animate({
			 	 		scrollTop: $('.message-wrapper').get(0).scrollHeight }, 50);
			 	 	
			 	 }

			 	</script>
	</body>
</html>
@extends('layouts.homepage')

@section('title')

About

@endsection


@section('headLinks')

<a href="/">Home</a>
<a href="/about">About</a>

@endsection

@section('headContent')

<h2>About Us</h2>

@endsection

@section('banner')

@include('layouts.mainbanner')

@endsection

@section('content')

<!--================ Start About us Area ================-->

<section class="about_us_area section_gap_top">
			<div class="container">
				<div class="row about_content align-items-center">
					<div class="col-lg-6">
						<div class="section_content">
							<h6>About Us</h6>
							<h1>We Believe that your education is important!</h1>
							<p>The purpose of this website it to benefit your education in anyway we can. Connect with others now to get started!</p>
							<a class="primary_btn" href="/">Learn More</a>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="about_us_image_box justify-content-center">
							<img class="img-fluid w-100" src="img/about_icon.jpg" alt="">
						</div>
					</div>
				</div>
			</div>
		</section>

<!--================ End Frequently Asked Questions Area ================-->

<!--================ Start Frequently Asked Questions Area ================-->
		<section class="frequently_area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="main_title">
							<h2>Frequently Asked Questions</h2>
							<h1>Frequently Asked Questions</h1>
						</div>
					</div>
				</div>
				<div class="row frequent_inner">
					<div class="col-lg-5 col-md-5">
						<div class="frequent_item">
							<h3>How can i make a post on the forums</h3>
							<p>You can make a post on the website by signing up for an account. Click the join button in the top right of the screen to make an account or login</p>
						</div>
					</div>
					<div class="offset-lg-2 col-lg-5 offset-md-2 col-md-5">
						<div class="frequent_item">
							<h3>Where can i find the chat application?</h3>
							<p>The chat application can be found by hovering over your account icon in the top right of the screen and selecting "My messages". This is for your protection.
							</p>
						</div>
					</div>
					<div class="col-lg-5 col-md-5">
						<div class="frequent_item">
							<h3>How can i see other users profiles on the website?</h3>
							<p>The best way to find another users profile is by selecting there name from something they have posted on. This provides a link directly to their profile page.</p>
						</div>
					</div>
					<div class="offset-lg-2 col-lg-5 offset-md-2 col-md-5">
						<div class="frequent_item">
							<h3>What is the purpose of the dashboard?</h3>
							<p>The dashboard or profile page shows all the details about the user such as their name, email and when they joined the website. You can also see an activity feed of their latest actions on the website.</p>
						</div>
					</div>
					<div class="col-lg-5 col-md-5">
						<div class="frequent_item last-child">
							<h3>How can i contact an admin?</h3>
							<p>The best way to communicate with a member of staff is either by direct messaging through the chat application or by using the contact form. The contact form can be used to send an email to the owner of the website.</p>
						</div>
					</div>
					<div class="offset-lg-2 col-lg-5 offset-md-2 col-md-5">
						<div class="frequent_item last-child">
							<h3>What happens when i join an event?</h3>
							<p>When you join an event you are added to the list of participants for the event.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--================ End Frequently Asked Questions Area ================-->
@endsection
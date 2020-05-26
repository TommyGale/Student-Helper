@extends('layouts.homepage')

@section('title')

Home

@endsection

<style>
    
   
.content {
border-left: 300px solid lightgrey;
border-right: 300px solid lightgrey;
background-color: white;
}

h1 {
  text-decoration: underline;
}


</style>
@section('headImage')

<img class="img-fluid" src="img/banner/home-left.png" alt="">

@endsection

@section('headContent')


 <h2>
Student Helper
</h2>
<p>
Our aim here at Student Helper is to connect students with likeminded individuals who want to take their university academic performance to the next level. <br>
Make new friends, Study, Succeed!
</p>

@endsection

@section('banner')

@include('layouts.homebanner')

@endsection

@section('content')

<section class="recent_update_area section_gap">
<div class="container">
      <div class="recent_update_inner">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
              Blog
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
             aria-selected="false">
              Messenger
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
             aria-selected="false">
              Events & Activities
            </a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row recent_update_text">
              <div class="col-lg-6">
                <div class="chart_img">
                  <img class="img-fluid" src="img/forums_icon.png" alt="">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="section_content">
                  <h6>Why use Forums?</h6>
                  <p>Forums are a great way to interact with other users and are a great source of information. Struggling with something on your course? Well, fear not the forums are the place to be to get help and help others. All you need to do is sign up and login! Get involved with discussions, sharing university experiences, tips & tricks and more...</p>
                  <a class="primary_btn" href="/posts">Learn more</a>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="row recent_update_text">
              <div class="col-lg-6">
                <div class="chart_img">
                  <img class="img-fluid" src="img/chat_icon.png" alt="">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="section_content">
                  <h6>Start Socializing Now!</h6>
                  <p>Chatting via the messenger system allows users to interact on a peer to peer level and build their friendships in private. Whether it’s simply chatting about life or helping each other through university it is worth your time to try out this feature. Get signed up/logged in to try it out now.</p>
                  <a class="primary_btn" href="/chats">Learn More</a>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="row recent_update_text">
              <div class="col-lg-6">
                <div class="chart_img">
                  <img class="img-fluid" src="img/events_icon.jpg" alt="">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="section_content">
                  <h6>Want to try something new?</h6>
                  <p>Events and activities are a great way to get involved with the university lifestyle and meet new people. Events and activities are open to all users so feel free to either make your own or look through the events page to find something that you are interested in. By pressing the join button, you will be instantly added to the event list and all you need to do now is attend.</p>
                  <a class="primary_btn" href="/events">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


<section class="blog_area">
<div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="main_title">
            <h1>Recent Blog Posts</h1>
          </div>
        </div>
      </div>
      <div class="row">
        @foreach($posts as $post)
        <div class="col-lg-4 col-md-6">
          <div class="blog_items">
            <div class="blog_img_box">
              <img class="img-fluid" src="" alt="">
            </div>
            <div class="blog_content">
              <a class="title" href="{{$post->path()}}">{{ $post->title}}</a>
              <p>{{ $post->description}}</p>
              <div class="date">
                <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>{{ $post->updated_at->diffForHumans()}}</a>
                <a href="#"><i class="fa fa-heart" aria-hidden="true"></i>{{$post->like_count}}</a>
                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>{{$post->comments_count }}</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </div>
  </div>
</section>
    @endsection

   
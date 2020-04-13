@extends('layouts.homepage')

@section('title')

Index

@endsection

@section('headImage')

<img class="img-fluid" src="img/banner/home-left.png" alt="">

@endsection

@section('headContent')

 <h2>
Student Helper
</h2>
<p>
Our aim here at Student Helper is to connect students with like minded individuals who want to take their university academic performance to the next level. <br>
Make new friends, Study, Succeed!
</p>

@endsection


@section('intro')

<div class="container">
      <div class="recent_update_inner">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
              Forums
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
             aria-selected="false">
              Peer to Peer communication
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
             aria-selected="false">
              Event planning
            </a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row recent_update_text">
              <div class="col-lg-6">
                <div class="chart_img">
                  <img class="img-fluid" src="img/recent_up.png" alt="">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="section_content">
                  <h6>Why Post?</h6>
                  <p>The forums are the perfect place to get involved in discussions around your interests, share tips and tricks to get through university and even post your own question to see who can help you out. Our website is rich with all levels of university students from a variety of different courses so fear not someone is bound to offer their help!</p>
                  <a class="primary_btn" href="/posts">Learn more</a>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="row recent_update_text">
              <div class="col-lg-6">
                <div class="chart_img">
                  <img class="img-fluid" src="img/recent_up.png" alt="">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="section_content">
                  <h6>Start Socializing</h6>
                  <p>It's important to understand the needs for the social aspect of university and it can become easy for students to feel lonely and depressed. We aim to offer you an easy way to track down students from your university courses and allow you to connect and chat about whatever you need.</p>
                  <a class="primary_btn" href="/chats">Learn More</a>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="row recent_update_text">
              <div class="col-lg-6">
                <div class="chart_img">
                  <img class="img-fluid" src="img/recent_up.png" alt="">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="section_content">
                  <h6>Get Involved</h6>
                  <p>Events are a great way of getting yourself out there and involved with your fellow students. Whereas we encourage learning in any way possible everybody needs to have a little fun sometime so why not connect the two.</p>
                  <a class="primary_btn" href="/events">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection

@section('blogs')

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
              <img class="img-fluid" src="img/blog_img1.png" alt="">
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

    @endsection

   
@extends('layouts.main')

@section('title')

Posts

@endsection

<style>
    
    p {
        text-align: center;
    }
</style>

@section('headLinks')

<a href="/">Home</a>
<a href="/posts">Posts</a>

@endsection

@section('headContent')

@endsection

@section('content')

@if(auth()->id() == true )

<p>Got something you would like to discuss? <a href ="/posts/create">Click here </a> to post on the forum</p>

@endif

@if(auth()->id() == false )

<p>Got something you would like to discuss? <a href ="/register">Click here </a> to create an account.Forgot to login? <a href ="/login">Click here </a> to login</p>

@endif

<section class="blog_categorie_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="categories_post">
                            <img src="img/blog/cat-post/cat-post-3.jpg" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="single-blog.html"><h5>Exams</h5></a>
                                    <div class="border_line"></div>
                                    <p>Exams can be stressful so we're here to help</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="categories_post">
                            <img src="img/blog/cat-post/cat-post-2.jpg" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="single-blog.html"><h5>Coursework</h5></a>
                                    <div class="border_line"></div>
                                    <p>Coursework can be tough so get started soon</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="categories_post">
                            <img src="img/blog/cat-post/cat-post-1.jpg" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="single-blog.html"><h5>Activities</h5></a>
                                    <div class="border_line"></div>
                                    <p>Extracurricular activities look great on a CV</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@foreach($posts as $post)

<section class="blog_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog_left_sidebar">
                            <article class="row blog_item">
                               <div class="col-md-3">
                                   <div class="blog_info text-right">
                                        <div class="post_tag">
                                            <a href="#">Tags here,</a>
                                            <a class="active" href="#">Tags here,</a>
                                            <a href="#">Tags here,</a>
                                            <a href="#">Tags here</a>
                                        </div>
                                        <ul class="blog_meta list">
                                            <li><a href="#">{{ $post->user->name}}<i class="lnr lnr-user"></i></a></li>
                                            <li><a href="#">{{ $post->created_at}}<i class="lnr lnr-calendar-full"></i></a></li>
                                            <li><a href="#">{{ $post->updated_at}}<i class="lnr lnr-pencil"></i></a></li>
                                            <li><a href="#">Put comments here!<i class="lnr lnr-bubble"></i></a></li>
                                        </ul>
                                    </div>
                               </div>
                                <div class="col-md-9">
                                    <div class="blog_post">
                                        <img src="img/blog/main-blog/m-blog-1.jpg" alt="">
                                        <div class="blog_details">
                                            <a href ="/posts/{{ $post->id}}"><h2>{{ $post->title }}</h2></a>
                                            <p>{{ $post->description}}</p>
                                            <a href="/posts/{{ $post->id}}" class="blog_btn">View More</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>

            @endforeach
        

@endsection
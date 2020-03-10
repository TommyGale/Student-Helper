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

<h2>Posts</h2>

@endsection

@section('content')

<br>

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
                                    <a href="single-blog.html"><h5>Social Life</h5></a>
                                    <div class="border_line"></div>
                                    <p>Enjoy your social life together</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="categories_post">
                            <img src="img/blog/cat-post/cat-post-2.jpg" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="single-blog.html"><h5>Politics</h5></a>
                                    <div class="border_line"></div>
                                    <p>Be a part of politics</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="categories_post">
                            <img src="img/blog/cat-post/cat-post-1.jpg" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="single-blog.html"><h5>Food</h5></a>
                                    <div class="border_line"></div>
                                    <p>Let the food be finished</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Blog Categorie Area =================-->
        
        <!--================Blog Area =================-->
        <section class="blog_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog_left_sidebar">
                          @forelse($posts as $post)
                            <article class="row blog_item">
                               <div class="col-md-3">
                                   <div class="blog_info text-right">
                                        <div class="post_tag">
                                            {{ $post->channel->slug}}
                                        </div>
                                        <ul class="blog_meta list">
                                            <li><a href="{{ route('profile' , $post->user)}}">{{ $post->user->name}}<i class="lnr lnr-user"></i></a></li>
                                            <li><a href="{{$post->path()}}">{{ $post->created_at->diffForHumans()}}<i class="lnr lnr-calendar-full"></i></a></li>
                                            <li><a href="{{$post->path()}}">{{ $post->updated_at->diffForHumans()}}<i class="lnr lnr-pencil"></i></a></li>
                                            <li><a href="{{$post->path()}}">{{$post->comments_count }}<i class="lnr lnr-bubble"></i></a></li>
                                            <li><a href="{{$post->path()}}">{{$post->likes->count()}}<i class="lnr lnr-thumbs-up"></i></a></li>
                                        </ul>
                                    </div>
                               </div>
                                <div class="col-md-9">
                                    <div class="blog_post">
                                        <img src="img/blog/main-blog/m-blog-1.jpg" alt="">
                                        <div class="blog_details">
                                            <a href="{{ $post->path()}}"><h2>{{ $post->title }}</h2></a>
                                            <p>{{ $post->description}}</p>
                                            <a href="{{ $post->path()}}" class="blog_btn">View More</a>
                                            @can('update', $post)
                                            <a href="{{ $post->path()}}/edit" class="blog_btn">Update Post</a>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                            </article>

                            @empty
                            <p>There are no results for the channel at this time</p>
                            @endforelse
                            <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <span aria-hidden="true">
                                            <span class="lnr lnr-chevron-left"></span>
                                        </span>
                                    </a>
                                </li>
                                <li class="page-item"><a href="#" class="page-link">01</a></li>
                                <li class="page-item active"><a href="#" class="page-link">02</a></li>
                                <li class="page-item"><a href="#" class="page-link">03</a></li>
                                <li class="page-item"><a href="#" class="page-link">04</a></li>
                                <li class="page-item"><a href="#" class="page-link">09</a></li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <span aria-hidden="true">
                                            <span class="lnr lnr-chevron-right"></span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget search_widget">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search Posts">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                                    </span>
                                </div><!-- /input-group -->
                                <div class="br"></div>
                            </aside>
                            <aside class="single_sidebar_widget author_widget">
                                <img class="author_img rounded-circle" src="img/blog/author.png" alt="">
                                <h4>Charlie Barber</h4>
                                <p>Senior blog writer</p>
                                <div class="social_icon">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-github"></i></a>
                                    <a href="#"><i class="fa fa-behance"></i></a>
                                </div>
                                <p>Boot camps have its supporters andit sdetractors. Some people do not understand why you should have to spend money on boot camp when you can get. Boot camps have itssuppor ters andits detractors.</p>
                                <div class="br"></div>
                            </aside>
                            <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title">Popular Posts</h3>
                                <div class="media post_item">
                                    <img src="img/blog/popular-post/post1.jpg" alt="post">
                                    <div class="media-body">
                                        <a href="blog-details.html"><h3>Space The Final Frontier</h3></a>
                                        <p>02 Hours ago</p>
                                    </div>
                                </div>
                                <div class="media post_item">
                                    <img src="img/blog/popular-post/post2.jpg" alt="post">
                                    <div class="media-body">
                                        <a href="blog-details.html"><h3>The Amazing Hubble</h3></a>
                                        <p>02 Hours ago</p>
                                    </div>
                                </div>
                                <div class="media post_item">
                                    <img src="img/blog/popular-post/post3.jpg" alt="post">
                                    <div class="media-body">
                                        <a href="blog-details.html"><h3>Astronomy Or Astrology</h3></a>
                                        <p>03 Hours ago</p>
                                    </div>
                                </div>
                                <div class="media post_item">
                                    <img src="img/blog/popular-post/post4.jpg" alt="post">
                                    <div class="media-body">
                                        <a href="blog-details.html"><h3>Asteroids telescope</h3></a>
                                        <p>01 Hours ago</p>
                                    </div>
                                </div>
                                <div class="br"></div>
                            </aside>
                            <aside class="single_sidebar_widget ads_widget">
                                <a href="#"><img class="img-fluid" src="img/blog/add.jpg" alt=""></a>
                                <div class="br"></div>
                            </aside>
                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title">Post Categories</h4>
                                <ul class="list cat-list">
                                  @foreach($channels as $channel)
                                    <li>
                                        <a href="/posts/{{ $channel->slug }}" class="d-flex justify-content-between">
                                            <p>{{ $channel->name }}</p>
                                            <p>{{ $channel->posts->count()}}</p>
                                        </a>
                                    </li>
                                    @endforeach                  
                                </ul>
                                <div class="br"></div>
                            </aside>
                            <aside class="single-sidebar-widget newsletter_widget">
                                <h4 class="widget_title">Newsletter</h4>
                                <p>
                                Here, I focus on a range of items and features that we use in life without
                                giving them a second thought.
                                </p>
                                <div class="form-group d-flex flex-row">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                                    </div>
                                    <a href="#" class="bbtns">Subcribe</a>
                                </div>  
                                <p class="text-bottom">You can unsubscribe at any time</p>  
                                <div class="br"></div>              
                            </aside>
                            <aside class="single-sidebar-widget tag_cloud_widget">
                                <h4 class="widget_title">Tag Clouds</h4>
                                <ul class="list">
                                    <li><a href="#">Technology</a></li>
                                    <li><a href="#">Fashion</a></li>
                                    <li><a href="#">Architecture</a></li>
                                    <li><a href="#">Fashion</a></li>
                                    <li><a href="#">Food</a></li>
                                    <li><a href="#">Technology</a></li>
                                    <li><a href="#">Lifestyle</a></li>
                                    <li><a href="#">Art</a></li>
                                    <li><a href="#">Adventure</a></li>
                                    <li><a href="#">Food</a></li>
                                    <li><a href="#">Lifestyle</a></li>
                                    <li><a href="#">Adventure</a></li>
                                </ul>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
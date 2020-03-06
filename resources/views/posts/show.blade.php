@extends('layouts.main')

@section('title')

Posts

@endsection

@section('head')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.0/css/bulma.min.css">

@endsection

@section('headLinks')

<a href="/">Home</a>
<a href="/posts">Posts</a>

@endsection

@section('headContent')

<h2>Posts</h2>

@endsection

@section('content')

 <section class="blog_area single-post-area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        <div class="single-post row">
                            <div class="col-lg-12">
                                <div class="feature-img">
                                    <img class="img-fluid" src="/img/blog/feature-img1.jpg" alt="">
                                </div>									
                            </div>
                            <div class="col-lg-3  col-md-3">
                                <div class="blog_info text-right">
                                    <div class="post_tag">
                                        TAGS
                                    </div>
                                    <ul class="blog_meta list">
                                        <li><a href="#">{{ $post->user->name}}<i class="lnr lnr-user"></i></a></li>
                                        <li><a href="#">{{ $post->created_at->diffForHumans()}}<i class="lnr lnr-calendar-full"></i></a></li>
                                        <li><a href="#">{{ $post->updated_at->diffForHumans()}}<i class="lnr lnr-pencil"></i></a></li>
                                        <li><a href="#">{{$post->comments->count()}}<i class="lnr lnr-bubble"></i></a></li>
                                        <li><a href="#">{{$post->likes->count()}}<i class="lnr lnr-thumbs-up"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 blog_details">
                                <h2>{{ $post->title }}</h2>
                                <p class="excert">
                                    {{ $post->description}}
                                </p>
                                
                                @if($post->postIsLiked())
                                        <form method="POST" action ="/posts/{{$post->id}}/unlike">
                                        @method('DELETE')
                                        @csrf
                                        
                                        <button class ="button is-link lnr lnr-thumbs-down" type="submit">Unlike</button>
                                        </form>
                                        @else

                                        <form method="POST" action ="/posts/{{$post->id}}/like">
                           
                                        @csrf
                                        
                                        <button class ="button is-link lnr lnr-thumbs-up" type="submit" {{ $post->postIsLiked() ? 'disabled' : '' }} >Like</button>
                                        </form>

                                        @endif
                            </div>
                            
                        </div>
                        <div class="navigation-area">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                    <div class="thumb">
                                        <a href="#"><img class="img-fluid" src="/img/blog/prev.jpg" alt=""></a>
                                    </div>
                                    <div class="arrow">
                                        <a href="#"><span class="lnr text-white lnr-arrow-left"></span></a>
                                    </div>
                                    <div class="detials">
                                        <p>Prev Post</p>
                                        <a href="#"><h4>Previous Nonce</h4></a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                    <div class="detials">
                                        <p>Next Post</p>
                                        <a href="#"><h4>Next Nonce</h4></a>
                                    </div>
                                    <div class="arrow">
                                        <a href="#"><span class="lnr text-white lnr-arrow-right"></span></a>
                                    </div>
                                    <div class="thumb">
                                        <a href="#"><img class="img-fluid" src="/img/blog/next.jpg" alt=""></a>
                                    </div>										
                                </div>									
                            </div>
                        </div>

                        <div class="comment-form">
                            <h4>Leave a Comment</h4>
                            
							 <form method="POST" action="/posts/{{ $post->id}}/comments">
                                 @csrf
                            <div class= "control">
                     <label class="label" for="description">Comment</label>
                    <textarea class="textarea @error('description') is-danger @enderror" name="description" id="description" required>{{ old('description')}}</textarea>

                    @error('description')
                        <p class="help is-danger">{{ $errors->first('description')}}</p>
                    @enderror
                </div> 

                <br>

                <div class="field is-grouped">
                        <div class="control">
                            <button class ="button is-link" type="submit">Submit</button>
                        </div>
                    </div>
                            </form>

                            
                        </div>

                        <div class="comments-area">
                            <h4>{{$post->comments->count()}} Comments</h4>
                            <div class="comment-list">
                            	@foreach ($post->comments as $comment)
                            	<br>
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                    	<div class="box">
                                        <div class="desc">
                                            <h5><a href="#">{{ $comment->user->name }}</a></h5>
                                            <p class="date">{{ $comment->created_at->diffForHumans()}}</p>
                                            <p class="lnr lnr-thumbs-up"> {{$comment->likes->count()}}</p>
                                            <p class="comment">
                                                {{ $comment->description}}
                                            </p>
                                            <br>
                                            @if($comment->commentIsLiked())
                                        <form method="POST" action ="/comments/{{$comment->id}}/unlike">
                                        @method('DELETE')
                                        @csrf
                                        
                                        <button class ="button is-link lnr lnr-thumbs-down" type="submit">Unlike</button>
                                        </form>
                                        @else

                                        <form method="POST" action ="/comments/{{$comment->id}}/like">
                           
                                        @csrf
                                        
                                        <button class ="button is-link lnr lnr-thumbs-up" type="submit" {{ $comment->commentIsLiked() ? 'disabled' : '' }} >Like</button>
                                        </form>

                                        @endif
                                        </div>
                                    </div>
                                    <div class="reply-btn">
                                        
                                           @can('update', $comment)
                                        <a href="/posts/{{ $post->id}}/comments/{{ $comment->id}}/edit" class="btn-reply text-uppercase">Edit Comment</a>
                                         @endcan
                                    </div>
                                </div>
                                <br>
                            </div>
                                @endforeach
                            </div>

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
                                <h4 class="widget_title">Post Catgories</h4>
                                <ul class="list cat-list">
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>Technology</p>
                                            <p>37</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>Lifestyle</p>
                                            <p>24</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>Fashion</p>
                                            <p>59</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>Art</p>
                                            <p>29</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>Food</p>
                                            <p>15</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>Architecture</p>
                                            <p>09</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>Adventure</p>
                                            <p>44</p>
                                        </a>
                                    </li>															
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
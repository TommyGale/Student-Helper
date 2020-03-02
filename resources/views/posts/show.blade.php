@extends('layouts.main')

@section('title')

Posts

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
                                    <ul class="social-links">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-github"></i></a></li>
                                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 blog_details">
                                <h2>{{ $post->title }}</h2>
                                <p class="excert">
                                    {{ $post->description}}
                                </p>
                            </div>
                        </div>
                        @can('update', $post)
                        <a href="/posts/{{ $post->id}}/edit" class="blog_btn">Update Post</a>
                        @endcan
                        <div class="navigation-area">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                    <div class="thumb">
                                        <a href="#"><img class="img-fluid" src="img/blog/prev.jpg" alt=""></a>
                                    </div>
                                    <div class="arrow">
                                        <a href="#"><span class="lnr text-white lnr-arrow-left"></span></a>
                                    </div>
                                    <div class="detials">
                                        <p>Prev Post</p>
                                        <a href="#"><h4>Space The Final Frontier</h4></a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                    <div class="detials">
                                        <p>Next Post</p>
                                        <a href="#"><h4>Telescopes 101</h4></a>
                                    </div>
                                    <div class="arrow">
                                        <a href="#"><span class="lnr text-white lnr-arrow-right"></span></a>
                                    </div>
                                    <div class="thumb">
                                        <a href="#"><img class="img-fluid" src="img/blog/next.jpg" alt=""></a>
                                    </div>										
                                </div>									
                            </div>
                        </div>
                        <div class="comments-area">
                            <h4>Count the comments here!</h4>
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

                            <br>
                            <div class="comment-list">
                            	@foreach ($post->comments as $comment)

                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="/img/blog/c1.jpg" alt="">
                                        </div>
                                        <div class="desc">
                                            <h5><a href="#">{{ $comment->user->name }}</a></h5>
                                            <p class="date">{{ $comment->created_at}}</p>
                                            <p class="comment">
                                                {{ $comment->description}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="reply-btn">
                                    	 @can('update', $comment)
                        				<a href="/posts/{{ $post->id}}/comments/{{ $comment->id}}/edit" class="blog_btn">Edit Comment</a>
                        				 @endcan
                                           <a href="" class="btn-reply text-uppercase">reply</a> 
                                    </div>
                                </div>
                            </div>	

                            @endforeach
                            
                                </div>
                            </div>	                                             				
                        </div>



@endsection
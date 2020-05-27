@extends('layouts.homepage')

@section('title')

Posts

@endsection

<style>
    
    h3 {
        text-align: center;
    }

    .postDiv {
  border: 0.5px outset black;
  padding: 10px;
  background-color: #fafaff;


  
}

 .help {
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

@section('banner')

@include('layouts.mainbanner')

@endsection

@section('content')


    <br>


@if(auth()->id() == true )

<h3>Got something you would like to discuss? <a href ="/posts/create">Click here </a> to post on the forum</h3>
<p class ="help">Why not check out some of our key categories?</p>

@endif

@if(auth()->id() == false )

<h3>Got something you would like to discuss? <a href ="/register">Click here </a> to create an account.Forgot to login? <a href ="/login">Click here </a> to login</h3>
<p class ="help">Why not check out some of our key categories?</p>

@endif

            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="categories_post">
                            <img src=" {{ URL::asset('img/blog/cat-post/cat-post-3.jpg') }}" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="/posts/University"><h5>University</h5></a>
                                    <div class="border_line"></div>
                                    <p>Need some university advice?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="categories_post">
                            <img src=" {{ URL::asset('img/blog/cat-post/cat-post-2.jpg') }}" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="/posts/Studying"><h5>Studying</h5></a>
                                    <div class="border_line"></div>
                                    <p>Need some help?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="categories_post">
                            <img src=" {{ URL::asset('img/blog/cat-post/cat-post-1.jpg') }}" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="/posts/Other"><h5>Other</h5></a>
                                    <div class="border_line"></div>
                                    <p>Something else on your mind?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--================Blog Categorie Area =================-->
        
        <!--================Blog Area =================-->





        <section class="blog_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        @forelse($posts as $post)
                        <div class="postDiv">
                    <a href="{{ $post->path()}}"><h2>{{ $post->title }}</h2></a>
                    <p> Category: <a href="posts/{{ $post->channel->slug}}">{{ $post->channel->slug}}</p></a>
                    <p>Last updated {{ $post->updated_at->diffForHumans()}} by <a href="{{ route('profile' , $post->user)}}">{{ $post->user->name}}</p></a>
                    <p>{{$post->comments_count }}<i class="fa fa-comments-o"></i>       {{$post->likes->count() }}<i class="fa fa-heart"></i></p>
                    <hr>
                    <p>{{ $post->description}}</p>
                    <a href="{{ $post->path()}}" class="blog_btn">View More</a>
                    @can('update', $post)
                    <a href="{{ $post->path()}}/edit" class="blog_btn">Update Post</a>
                    @endcan
                    </div>

                        <br>

                            @empty
                            <p>There are no results for the channel at this time</p>
                            @endforelse
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                            {{ $posts->links()}}
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
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
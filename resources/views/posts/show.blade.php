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

textarea{
    height:150px;
    width:600px;
    font-size:14pt;
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

<section class="blog_area single-post-area section_gap">

            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                 
                        <div class="postDiv">
                    <a href="{{ $post->path()}}"><h2>{{ $post->title }}</h2></a>
                    <p> Category: <a href="posts/{{ $post->channel->slug}}">{{ $post->channel->slug}}</p></a>
                    <p>Last updated {{ $post->updated_at->diffForHumans()}} by <a href="{{ route('profile' , $post->user)}}">{{ $post->user->name}}</p></a>
                    <p>{{$post->comments_count }}<i class="fa fa-comments-o"></i>       {{$post->likes->count() }}<i class="fa fa-heart"></i></p>
                    <hr>
                    <p>{{ $post->description}}</p>

                     

                      @if(auth()->check())
                                            @if($post->postIsLiked())
                                        <form method="POST" action ="{{ $post->path()}}/unlike">
                                        @method('DELETE')
                                        @csrf
                                        
                                        <button class ="blog_btn" type="submit">Unlike</button>
                                        </form>
                                        @else

                                        <form method="POST" action ="{{ $post->path()}}/like">
                           
                                        @csrf
                                        
                                        <button class ="blog_btn" type="submit" {{ $post->postIsLiked() ? 'disabled' : '' }} >Like</button>
                                        </form>

                                        @endif
                                        @endif

                                        @can('update', $post)
                    <a href="{{ $post->path()}}/edit" class="blog_btn">Update Post</a>
                    @endcan

                          @if(auth()->check())

                        <div class="comment-form">  
                             <form method="POST" action="{{ $post->path() . '/comments'}}">
                                 @csrf
                            <div class= "control">
                    <textarea class="textarea" placeholder="Comment your thoughts..." name="description" id="description" required>{{ old('description')}}</textarea>

                </div> 

                <br>

                <div class="field is-grouped">
                        <div class="control">
                            <button class ="blog_btn" type="submit">Publish Comment</button>
                        </div>
                    </div>
                            </form>

                            <br>

                            @include('errors.errors')
                            
                        </div>
                        @else
                            <p class="text-center">Please <a href="{{ route('login') }}">sign in</a> to comment on this post.</p>
                        @endif

                 
                        <div>
                            @foreach ($comments as $comment)

                                @include('comments.comment')
                                <hr>

                                @endforeach


                        
                      </div>
                      
                       {{ $comments->links()}}
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
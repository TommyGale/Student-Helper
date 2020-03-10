@extends('layouts.main')

@section('title')

Posts

@endsection

@section('head')



@endsection

@section('headLinks')

<a href="/">Home</a>
<a href="/profiles/{{$profileUser->id}}">My Profile</a>

@endsection

@section('headContent')

<h2>My Profile</h2>

@endsection

@section('content')

            <div class="container">
            <div class="page-header">
                <h1>
                {{$profileUser->name}}
                <small> Joined {{ $profileUser->created_at->diffForHumans() }} </small>
               </h1>
            </div>

            @foreach($posts as $post)

            <div class = "box">
            <div class="single-post row">
                            <div class="col-md-3  col-md-3">
                                <div class="blog_info text-right">
                                    <div class="post_tag">
                                        {{ $post->channel->slug}}
                                    </div>
                                    <ul class="blog_meta list">
                                        <li><a href="{{ route('profile' , $post->user)}}">{{ $post->user->name}}<i class="lnr lnr-user"></i></a></li>
                                        <li><a href="{{$post->path()}}">{{ $post->created_at->diffForHumans()}}<i class="lnr lnr-calendar-full"></i></a></li>
                                        <li><a href="{{$post->path()}}">{{ $post->updated_at->diffForHumans()}}<i class="lnr lnr-pencil"></i></a></li>
                                        <li><a href="{{$post->path()}}">{{$post->comments_count }}<i class="lnr lnr-bubble"></i></a></li>
                                        <li><a href="{{$post->path()}}">{{$post->like_count}}<i class="lnr lnr-thumbs-up"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 blog_details">
                                <h2>{{ $post->title }}</h2>
                            </div>
                        </div>
                                
            @endforeach

            {{$posts->links()}}

        </div>
        <br>                
@endsection
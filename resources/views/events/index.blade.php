@extends('layouts.homepage')

@section('title')

Events

@endsection

<style>
    
    h3 {
        text-align: center;
    }

    .postDiv {
  border: 0.5px outset black;
  padding: 10px;
  background-color: #e6f7f6;
  border-radius: 25px;

  
}

 .help {
 text-align: center;
  
}


</style>

@section('head')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.0/css/bulma.min.css">

@endsection

@section('headLinks')

<a href="/">Home</a>
<a href="/events">Events</a>

@endsection

@section('headContent')

<h2>Events</h2>

@endsection

@section('banner')

@include('layouts.mainbanner')

@endsection

@section('content')


    <br>


@if(auth()->id() == true )

<h3>Want to make an event? <a href ="/events/create">Click here </a> to share one</h3>

@endif

@if(auth()->id() == false )

<h3>Got an event in mind? <a href ="/register">Click here </a> to create an account.Forgot to login? <a href ="/login">Click here </a> to login</h3>

@endif



    <!-- Page Heading -->

    <section class="blog_area">
<div class="container">
      <div class="row">
        @foreach($events as $event)
 
        <div class="col-lg-4 col-md-6">
          <div class="blog_items">
            <div class="blog_img_box">
              <img class="img-fluid" src="" alt="">
            </div>
            <div class="blog_content">
            	<p><b><u>{{ $event->title}}</u></b></p>
              <p>Last updated {{ $event->updated_at->diffForHumans()}} by <a href="{{ route('profile' , $event->user)}}">{{ $event->user['name']}}</p></a>
              <p>{{ $event->description}}</p>
              @if(auth()->check())

                                            @if($event->eventIsJoined())
                                        <form method="POST" action ="/events/{{$event->id}}/leave">
                                        @method('DELETE')
                                        @csrf
                                        
                                        <button class ="blog_btn" type="submit">Leave</button>
                                        </form>
                                        @else

                                        <form method="POST" action ="/events/{{$event->id}}/join">
                           
                                        @csrf
                                 
                                        <button class ="blog_btn" type="submit" {{ $event->eventIsJoined() ? 'disabled' : '' }} >Join</button>
                                        </form>

                                        @endif
                                        @endif


                                         @can('update', $event)
                                            <a href="{{ $event->id}}/edit" class="blog_btn">Update Event</a>
                                            @endcan
              <div class="date">

                  

                <a href="#">Start date: {{ $event->start_date}}</a>
                <a href="#">End date: {{ $event->end_date}}</a>
                <br>
                <a href="#">People going: {{$event->join_count}}</a>
              </div>
            </div>
          </div>
          <br>
        </div>
        @endforeach
    </div>
  </div>
</section>


@endsection
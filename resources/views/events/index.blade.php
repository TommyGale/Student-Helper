@extends('layouts.homepage')

@section('title')

Events

@endsection

<style>
    
    h4 {
    	color:white;
        text-decoration: underline;
    }

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
            	<h4>{{ $event->title}}</h4>
              Last updated {{ $event->updated_at->diffForHumans()}} by <a href="{{ route('profile' , $event->user)}}">{{ $event->user['name']}}</a>
              <hr>
              {{ $event->description}}
  

                                           
              <div class="date">

                  

                <p>Start date: {{ $event->start_date}} <br> End date: {{ $event->end_date}} <br> Attendees: {{$event->join_count}}</p>
                
              </div>
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
            </div>
          </div>
          <br>
        </div>
        @endforeach

    </div>
      {{ $events->links()}}

  </div>

</section>


@endsection
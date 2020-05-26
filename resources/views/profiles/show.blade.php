@extends('layouts.homepage')

@section('title')

Profile

@endsection

<style>
   
    h1 {
        text-decoration: underline;
    }
    .profileDiv {
  border: 0.5px outset black;
  margin-top: 10px;
  padding-left: 10px;
  margin-left: -75px;
  background-color: #e6f7f6;


  
}

.postDiv {
  border: 0.5px outset black;
  margin-top: 10px;
  padding-left: 10px;
  margin-left: -75px;
  background-color: #e6f7f6;


  
}



</style>


@section('headContent')

<h2>My Profile</h2>

@endsection

@section('headLinks')

<a href="/">Home</a>
<a href="">My Profile</a>

@endsection

@section('banner')

@include('layouts.mainbanner')

@endsection

@section('content')

 <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="profileDiv">
                            <h1>Profile Details</h1>
                            <p>Name: {{ $profileUser->name }}</p>
                            <p>Email: {{ $profileUser->email }}</p>
                            <p>Joined: {{ $profileUser->created_at->diffForHumans() }}</p>
                    </div>

        </div>
            
<br>
<h1>Welcome to my profile!</h1>
            <div class="col-lg-9 col-md-9">
                <div class="postDiv">
<h1>Activity feed</h1>
                @foreach ($dashboards as $date => $dashboard)
                    <h3 class="page-header">{{ $date }}</h3>

                    @foreach ($dashboard as $record)
                        @include ("profiles.dashboards.{$record->type}", ['dashboard' => $record])
                    @endforeach
                @endforeach
            </div>
            <br>
</div>
</div>
</div>
    
             
@endsection
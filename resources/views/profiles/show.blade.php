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
        <div class="row">
            <div class="col-lg-9 col-md-9">
                <div class="page-header">
                    <h1>
                        {{ $profileUser->name }}
                    </h1>
                </div>

                @foreach ($dashboards as $date => $dashboard)
                    <h3 class="page-header">{{ $date }}</h3>

                    @foreach ($dashboard as $record)
                        @include ("profiles.dashboards.{$record->type}", ['dashboard' => $record])
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
             
@endsection
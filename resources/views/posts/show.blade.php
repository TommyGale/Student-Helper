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

<div class ="box">

<h1>{{ $post->title }}</h1>

<div class="content">{{ $post->description }}</div>
<div>Posted by: {{ $post->user->name }}</div>
<div>Updated: {{ $post->updated_at->diffForHumans() }}</div>

@endsection
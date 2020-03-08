@extends('layouts.main')

@section('title')

Create Post

@endsection

@section('head')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.0/css/bulma.min.css">

@endsection

@section('headLinks')

<a href="/">Home</a>
<a href="/posts/create">Create Posts</a>

@endsection

@section('headContent')

<h2>Posts</h2>

@endsection

@section('content')

<div id="wrapper">
	<div class="box">
	<div id="page" class="container">
		
		<h1 class="heading has-text-weight-bold is-size-4">Create a New Post</h1>

		<form method ="POST" action = "/posts">
			@csrf

			<div class = "field">
				<label class="label" for="channel_id">Choose a Category</label>

				<div class= "control">

					<select name="channel_id" id="channel_id" class="form-control" required>
						<option value="">Choose a Category</option>
						@foreach ($channels as $channel)
						<option value ="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>{{ $channel->name }}</option>
						@endforeach
					</select>
				
				</div>

			<div class = "field">
				<label class="label" for="title">Title</label>

				<div class= "control">
					<input class="input" type="text" name="title" id="title" value ="{{ old('title')}}" required>

				</div> 
				</div>

				<div class="field">
					<label class="label" for="description">Description</label>

					<div class="contorl">
						<textarea class="textarea" name="description" id="description" required>{{ old('description')}}</textarea>

					</div>
					</div>

					<div class="field is-grouped">
						<div class="control">
							<button class ="button is-link" type="submit">Pulish Post</button>
						</div>
					</div>

				</form>
				@include('errors.errors')

			</div>

		</div>
	</div>


@endsection
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
	<div id="page" class="container">
		
		<h1 class="heading has-text-weight-bold is-size-4">New Post</h1>

		<form method ="POST" action = "/posts">
			@csrf
			<div class = "field">
				<label class="label" for="title">Title</label>

				<div class= "control">
					<input class="input @error('title') is-danger @enderror" type="text" name="title" id="title" value ="{{ old('title')}}" required>

					@error('title')
						<p class="help is-danger">{{ $errors->first('title')}}</p>
					@enderror
				</div> 
				</div>

				<div class="field">
					<label class="label" for="description">Description</label>

					<div class="contorl">
						<textarea class="textarea @error('description') is-danger @enderror" name="description" id="description" required>{{ old('description')}}</textarea>

					@error('description')
						<p class="help is-danger">{{ $errors->first('description')}}</p>
					@enderror
					</div>
					</div>

					<div class="field is-grouped">
						<div class="control">
							<button class ="button is-link" type="submit">Submit</button>
						</div>
					</div>

					
				</form>

			</div>

		</div>


@endsection
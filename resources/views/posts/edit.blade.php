@extends('layouts.homepage')

@section('title')

Edit Post

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

@section('banner')

@include('layouts.mainbanner')

@endsection

@section('content')

<div id="wrapper">
	<div id="page" class="container">
		
		<h1 class="heading has-text-weight-bold is-size-4">Update Post</h1>

		<form method ="POST" action = "{{ $post->path() }}">

			{{ csrf_field() }}
            {{ method_field('PUT') }}

			<div class = "field">
				<label class="label" for="channel_id">Choose a Category</label>

				<div class= "control">

					<select name="channel_id" id="channel_id" class="form-control">
						<option value="">{{ $post->channel->name }}</option>
						@foreach (App\Channel::all() as $channel)
						<option value ="{{ $channel->id }}">{{ $channel->name }}</option>
						@endforeach
					</select>
				
				</div>

			<div class = "field">
				<label class="label" for="title">Title</label>

				<div class= "control">
					<input class="input" type="text" name="title" id="title" value="{{ $post->title }}" required>
				</div> 
				</div>

				<div class="field">
					<label class="label" for="description">Description</label>

					<div class="contorl">
						<textarea class="textarea" name="description" id="description" required>{{ $post->description }}</textarea>
					</div>
					</div>

					<div class="field is-grouped">
						<div class="control">
							<button class ="button is-link" type="submit">Submit</button>
						</div>
					</div>
					
				</form>

				<br>

				<form method="POST" action="{{ $post->path() }}">

        		{{ csrf_field() }}
                {{ method_field('DELETE') }}

        		<div class="field is-grouped">
						<div class="control">
							<button class ="button is-link" type="submit">Delete Post</button>
						</div>
					</div>

					<br>
@include('errors.errors')
<br>

            </div>
        </div>

</div>
</form>





@endsection
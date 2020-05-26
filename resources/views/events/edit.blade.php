@extends('layouts.homepage')

@section('title')

Edit Event

@endsection

@section('head')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.0/css/bulma.min.css">

@endsection

@section('headLinks')

<a href="/">Home</a>
<a href="/events/create">Edit Comments</a>

@endsection

@section('headContent')

<h2>Events</h2>

@endsection

@section('banner')

@include('layouts.mainbanner')

@endsection

@section('content')


<div id="wrapper">
	<div id="page" class="container">
		
		<h1 class="heading has-text-weight-bold is-size-4">Update Comment</h1>

		<form method ="POST" action = "/events/{{ $event->id}}">

			{{ csrf_field() }}
            {{ method_field('PUT') }}

			<div class="field">
					<label class="label" for="description">Description</label>

					<div class="contorl">
						<textarea class="textarea" name="description" id="description" required>{{ $comment->description }}</textarea>
					</div>
					</div>

					<div class="field is-grouped">
						<div class="control">
							<button class ="button is-link" type="submit">Submit</button>
						</div>
					</div>
					
				</form>


				<br>

				<form method="POST" action="/comments/{{ $comment->id}}">

        		@csrf
				@method('DELETE')

        		<div class="field is-grouped">
						<div class="control">
							<button class ="button is-link" type="submit">Delete Comment</button>
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

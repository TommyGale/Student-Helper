@extends('layouts.main')

@section('title')

Edit Comment

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
		
		<h1 class="heading has-text-weight-bold is-size-4">Update Comment</h1>

		<form method ="POST" action = "/comments/{{ $comment->id}}">

			@csrf
			@method('PUT')

				<div class="field">
					<label class="label" for="description">Description</label>

					<div class="contorl">
						<textarea class="textarea" name="description" id="description">{{ $comment->description }}</textarea>
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

            </div>
        </div>

</div>
</form>

<br>

			</div>

		</div>


@endsection

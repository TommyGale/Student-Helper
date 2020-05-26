@extends('layouts.homepage')

@section('title')

Create Event

@endsection

@section('head')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.0/css/bulma.min.css">

@endsection

@section('headLinks')

<a href="/">Home</a>
<a href="/events/create">Create Events</a>

@endsection

@section('headContent')

<h2>Events</h2>

@endsection

@section('banner')

@include('layouts.mainbanner')

@endsection

@section('content')

<div id="wrapper">
	<div class="box">
	<div id="page" class="container">
		
		<h1 class="heading has-text-weight-bold is-size-4">Create a New Post</h1>

		<form method ="POST" action = "/events">
			@csrf


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

					<div class="field">
						<label class="label" for="start_date">Start_date</label>

						<div class="contorl">
						<input type="date" name="start_date" id="start_date" required>{{ old('start_date')}}</textarea>

					</div>
					</div>

					<div class="field">
						<label class="label" for="end_date">End_date</label>

						<div class="contorl">
						<input type="date" name="end_date" id="end_date" required>{{ old('start_date')}}</textarea>

					</div>
					</div>

					<div class="field is-grouped">
						<div class="control">
							<button class ="button is-link" type="submit">Pulish Event</button>
						</div>
					</div>

				</form>
				@include('errors.errors')

			</div>

		</div>
	</div>


@endsection
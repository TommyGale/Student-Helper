@extends('layouts.main')

@section('title')

Create Post

@endsection

@section('content')

<h1>Create a New Post</h1>

<form method ="POST" action="/posts">

@csrf

<div class="box">

<div class ="field">

<label class ="label" for="title">Title</label>

<div class="control">

<input type="text" name="title" placeholder="Post title" value="{{old('title')}}" class="input {{ $errors->has('title') ? 'is-danger' : ''}}" required>

</div>

</div>

<label class="label" for="description">Description</label>


<div class ="control">

<textarea name ="description" placeholder ="Post description" value ="{{ old('description')}}" class="input {{ $errors->has('description') ? 'is-danger' : ''}}" required></textarea>


</div>
</div>

<div class="field">

<div class ="control">

<button type="submit" class="button is-link">Create Post</button>

</div>
</div>

</div>

@include ('errors.errors')
</form>
@endsection
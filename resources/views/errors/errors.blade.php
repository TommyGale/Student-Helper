@if ($errors->any())

<div>

<ul class = "alert alert-danger">
@foreach ($errors->all () as $error)

<li> {{ $error }}</li>

@endforeach

</ul>

</div>

@endif
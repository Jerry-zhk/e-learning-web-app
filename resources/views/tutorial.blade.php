@extends('layouts.app')
@section('content')
<nav class="breadcrumb" aria-label="breadcrumbs">
	<ul>
		<li><a href="{{ route('home') }}"  aria-current="page">Home</a></li>
		<li><a href="{{ route('series.public', ['series4public' => $tutorial->series->id]) }}"  aria-current="page">{{ $tutorial->series->title }}</a></li>
		<li class="is-active"><a href="#">{{ $tutorial->title }}</a></li>
	</ul>
</nav>
<div class="content p-20">
	<h3 class="title is-3 m-b-10">{{ $tutorial->title }}</h3>
	<span class="has-text-grey-light"><em>Created at: {{ $tutorial->created_at }}</em></span>
	<hr>
	{!! $tutorial->body !!}
</div>

@endsection
@extends('layouts.app')
@section('content')
<nav class="breadcrumb" aria-label="breadcrumbs">
	<ul>
		<li><a href="{{ route('home') }}" aria-current="page">Home</a></li>
		<li class="is-active"><a href="#">{{ $series->title }}</a></li>
	</ul>
</nav>
<div class="box p-20">
	<div class="content has-text-centered">
		<p class="title is-4">
			{{ $series->title }} 
			@if($series->price == 0)
			<span class="tag is-success">FREE</span>
			@endif
		</p>
		<p class="m-b-20">
			Skills: 
			@foreach($series->skills as $skill)
			<span class="tag">{{ $skill->display_name }}</span>
			@endforeach
		</p>
		<p class="m-b-20">{{$series->description}}</p>
		
		@if(isset($auth))
			@if(!$auth->accessibleToSeries($series))
			<p>
				You have to purchase the series before start the tutorial...<br/>
				<form action="{{ route('series.purchase', ['series4public' => $series->id]) }}" method="POST" class="m-t-5">
					{{ csrf_field() }}
					<button class="button is-success">Purchase ${{$series->price}}</button>
				</form>
			</p>

			@endif
		@else
			You have to <a href="{{ route('login') }}">Login</a> first.
		@endif

	</div>
	@if(isset($auth) && $auth->accessibleToSeries($series))
	<hr>
	<div class="content">
		<h6 class="title is-6 has-text-centered">{{$series->tutorials->count()}} Tutorials</h6>
		
		<div class="columns is-multiline m-lr-20">
			@foreach($series->tutorials as $tutorial)
			<div class="column is-half">
				<div class="content">
					<div class="has-text-weight-semibold is-size-6"><a href="{{ route('tutorial.public', ['tutorialSlug' => $tutorial->slug]) }}">{{ $tutorial->title }}</a></div>
					<div class="has-text-grey-dark is-size-7">
						<div>
							Introduction: 
							<?php 
							$bodyWithoutTags = strip_tags($tutorial->body);
							echo (strlen($bodyWithoutTags) > 250) ? substr($bodyWithoutTags, 0, 250) . '...' : $bodyWithoutTags;
							?>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	@endif
</div>

@endsection
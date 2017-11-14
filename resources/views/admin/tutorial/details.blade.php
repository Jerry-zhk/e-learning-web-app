@extends('layouts.app')

@section('content')
<nav class="breadcrumb" aria-label="breadcrumbs">
	<ul>
		<li><a href="{{ route('admin.home') }}"  aria-current="page">Dashboard</a></li>
		<li><a href="{{ route('series.index') }}"  aria-current="page">Series</a></li>
		<li><a href="{{ route('series.show', ['series' => $series->id]) }}"  aria-current="page">{{ $series->title }}</a></li>
		<li class="is-active"><a href="#">{{ $tutorial->title }}</a></li>
	</ul>
</nav>
<div class="columns">
	<div class="column is-one-quarter">
		@include('admin.side-menu')
	</div>
	<div class="column">
		<div class="box">
			<nav class="level">
				<div class="level-left">
					<div class="level-item">
						<h3 class="title is-3">{{ $tutorial->title }}</h3>
					</div>
				</div>
				<div class="level-right">
					<div class="level-item">
						<a href="{{ route('series.tutorial.edit', ['series' => $series->id, 'tutorial' => $tutorial->id]) }}" class="button is-link m-r-5" title="Edit">
							<span class="icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>&nbsp;Edit
						</a>
						<button class="button is-danger" title="Delete">
							<span class="icon"><i class="fa fa-trash" aria-hidden="true"></i></span>&nbsp;Delete
						</button>
					</div>
				</div>
			</nav>
			<div class="content">
				{!! $tutorial->body !!}
			</div>
		</div>

	</div>
</div>

@endsection

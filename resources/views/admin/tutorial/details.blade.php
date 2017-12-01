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
						@if($tutorial->deleted_at != null)
						<span class="tag is-danger m-l-10">Deleted</span>
						@endif
					</div>
				</div>
				<div class="level-right">
					<div class="level-item">
						<a href="{{ route('series.tutorial.edit', ['series' => $series->id, 'tutorial' => $tutorial->id]) }}" class="button is-link m-r-5" title="Edit">
							<span class="icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>&nbsp;Edit
						</a>
						@if($tutorial->deleted_at == null && $auth->can('series&tutorial-delete'))
						<form action="{{ route('series.tutorial.destroy', ['series' => $series, 'tutorial' => $tutorial->id]) }}" method="POST">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button class="button is-danger" title="Delete">
								<span class="icon"><i class="fa fa-trash" aria-hidden="true"></i></span>&nbsp;Delete
							</button>
						</form>
						@elseif($auth->can('deletion-restore'))
						<form action="{{ route('series.tutorial.restore', ['series' => $series, 'tutorial' => $tutorial->id]) }}" method="POST">
							{{ csrf_field() }}
							{{ method_field('PUT') }}
							<button class="button is-danger" title="Delete">
								<span class="icon"><i class="fa fa-undo" aria-hidden="true"></i></span>&nbsp;Restore
							</button>
						</form>
						@endif
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

@extends('layouts.app')

@section('content')

<script src="{{ asset('tinymce/tinymce.js') }}"></script>

<nav class="breadcrumb" aria-label="breadcrumbs">
	<ul>
		<li><a href="{{ route('admin.home') }}"  aria-current="page">Dashboard</a></li>
		<li><a href="{{ route('series.index') }}"  aria-current="page">Series</a></li>
		<li><a href="{{ route('series.show', ['series' => $series]) }}"  aria-current="page">{{ $series->title }}</a></li>
		<li><a href="{{ route('series.tutorial.show', ['series' => $series, 'tutorial' => $tutorial->id]) }}"  aria-current="page">{{ $tutorial->title }}</a></li>
		<li class="is-active"><a href="#">Edit</a></li>
	</ul>
</nav>
<div class="columns">
	<div class="column is-one-quarter">
		@include('admin.side-menu')
	</div>
	<div class="column">
		<div class="box">
			<h3 class="title is-3">Edit Tutorial</h3>
			<form action="{{ route('series.tutorial.update', ['series' => $series->id, 'tutorial' => $tutorial->id]) }}" method="POST">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="field {{ $errors->has('title') ? ' has-error' : '' }}">
					<label for="title" class="label">Title</label>
					<div class="control">
						<input type="text" id="title" class="input" name="title" value="{{ old('title') == null ? $tutorial->title : old('title') }}"  autofocus>
					</div>
					@if ($errors->has('title'))
					<p class="help is-danger">{{ $errors->first('title') }}</p>
					@endif
				</div>
				<div class="field">
					<label for="slug" class="label">Slug</label>
					<div class="control">
						{{ $tutorial->slug }}
					</div>
				</div>
				<div class="field {{ $errors->has('body') ? ' has-error' : '' }}"">
					<label for="tinymce" class="label">Body</label>
					<div class="control">
						<textarea id="tinymce" name="body" rows="15">{{ old('body') == null ? $tutorial->body : old('body') }}</textarea>
					</div>
					@if ($errors->has('body'))
					<p class="help is-danger">{{ $errors->first('body') }}</p>
					@endif
				</div>
				<div class="field">
					<div class="control">
						<button class="button is-danger" title="Save Changes">
							<span class="icon"><i class="fa fa-floppy-o" aria-hidden="true"></i></span>&nbsp;Save
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>



@endsection

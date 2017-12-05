@extends('layouts.app')

@section('content')
<nav class="breadcrumb" aria-label="breadcrumbs">
	<ul>
		<li><a href="{{ route('admin.home') }}"  aria-current="page">Dashboard</a></li>
		<li><a href="{{ route('series.index') }}"  aria-current="page">Series</a></li>
		<li class="is-active"><a href="#">New Series</a></li>
	</ul>
</nav>
<div class="columns">
	<div class="column is-one-quarter">
		@include('admin.side-menu')
	</div>
	
	<div class="column">
		<div class="box">
			<h3 class="title is-3">Edit Series</h3>

			<div class="columns">
				<div class="column is-half is-offset-one-quarter">
					<form action="{{ route('series.update', ['series' => $series->id]) }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('PUT') }}
						<div class="field {{ $errors->has('title') ? ' has-error' : '' }}">
							<label for="title" class="label">Title</label>
							<div class="control">
								<input type="text" id="title" class="input" name="title" value="{{ old('title') == null ? $series->title : old('title') }}" placeholder="Eyecatching title here..." required autofocus>
							</div>
							@if ($errors->has('title'))
							<p class="help is-danger">{{ $errors->first('title') }}</p>
							@endif
						</div>
						<div class="field">
							<label for="skill" class="label">Skills</label>
							<div class="control">
								<div class="tags">
									@foreach($series->skills as $skill)
									<span class="tag">{{ $skill->display_name }}</span>
									@endforeach
								</div>
							</div>
						</div>

						<label for="price" class="label">Price</label>
						<div class="field has-addons">
							<p class="control">
								<a class="button is-static">
									HKD $
								</a>
							</p>
							<p class="control">
								<input type="number" id="price" name="price" class="input" min="0" value="{{ old('price') == null ? $series->price : old('price') }}" placeholder="Price" required>
							</p>
						</div>
						<div class="field {{ $errors->has('description') ? ' has-error' : '' }}">
							<label for="description" class="label">Description</label>
							<div class="control">
								<textarea id="description" name="description" class="textarea" placeholder="Type description here...">{{ old('description') == null ? $series->description : old('description') }}</textarea>
							</div>
							@if ($errors->has('description'))
							<p class="help is-danger">{{ $errors->first('description') }}</p>
							@endif
						</div>
						<div class="field">
							<div class="control">
								<button class="button is-danger" title="Delete">
									<span class="icon"><i class="fa fa-floppy-o" aria-hidden="true"></i></span>&nbsp;Save
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('.selectize').selectize();
</script>

@endsection

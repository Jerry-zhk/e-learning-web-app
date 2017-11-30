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
			<h3 class="title is-3">New Series</h3>

			<div class="columns">
				<div class="column is-half is-offset-one-quarter">
					<form action="{{ route('series.store') }}" method="POST">
						{{ csrf_field() }}
						<div class="field {{ $errors->has('title') ? ' has-error' : '' }}">
							<label for="title" class="label">Title</label>
							<div class="control">
								<input type="text" id="title" class="input" name="title" value="{{ old('title') }}" placeholder="Eyecatching title here..." required autofocus>
							</div>
							@if ($errors->has('title'))
							<p class="help is-danger">{{ $errors->first('title') }}</p>
							@endif
						</div>
						<div class="field {{ $errors->has('skills') ? ' has-error' : '' }}">
							<label for="skill" class="label">Skills</label>
							<div class="control">
								<select id="skill" name="skill[]" class="selectize" multiple required>
									<option value="">Select Series Skills</option>
									@foreach($skills as $skill)
									<option value="{{ $skill->id }}"
										@if(old('skill') != null && !$errors->has('skill.*') && in_array($skill->id, old('skill'))) 
										selected 
										@endif
										>
										{{ $skill->display_name }}
									</option>
									@endforeach
								</select>
								@if ($errors->has('skill.*'))
								<p class="help is-danger">{{ $errors->first('skill.*') }}</p>
								@endif
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
								<input type="number" id="price" name="price" class="input" min="0" value="0" placeholder="Price" required>
							</p>
						</div>
						<div class="field {{ $errors->has('description') ? ' has-error' : '' }}">
							<label for="description" class="label">Description</label>
							<div class="control">
								<textarea id="description" name="description" class="textarea" placeholder="Type description here...">{{ old('description') }}</textarea>
							</div>
							@if ($errors->has('description'))
							<p class="help is-danger">{{ $errors->first('description') }}</p>
							@endif
						</div>
						<div class="field">
							<div class="control">
								<button class="button is-danger" title="Delete">
									<span class="icon"><i class="fa fa-floppy-o" aria-hidden="true"></i></span>&nbsp;Create
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

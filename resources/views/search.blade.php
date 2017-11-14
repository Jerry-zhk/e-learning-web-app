@extends('layouts.app')

@section('content')

<div class="columns">
	<div class="column is-10 is-offset-1">
		<form action="" method="GET">
			<div class="field has-addons">
				<div class="control full-width">
					<input class="input" type="text" name="keyword" 
					value="{{ request()->has('keyword') ? request()->input('keyword') : '' }}"
					placeholder="Find series, tutorials" required>
				</div>
				<div class="control">
					<button class="button is-info">
						<i class="fa fa-search" aria-hidden="true"></i>
					</button>
				</div>
			</div>
			<div class="field">
				<p class="is-size-5 has-text-weight-bold">Skills</p>
				@foreach($skillGroups as $type => $skills)
					<p class="has-text-weight-semibold">{{ $type }}</p>
					@foreach($skills as $skill)
					<label class="checkbox" style="width: 19.5%;">
						<input type="checkbox" name="skill[]" value="{{ $skill->id }}" 
						{{ (request()->has('skill') && in_array($skill->id, request()->input('skill'))) ? 'checked' : '' }}>
					 	{{ $skill->display_name }}
					</label>
					@endforeach
				@endforeach
			</div>
		</form>
	</div>
</div>
<div class="box">
	@if(count($results) > 0)
		@foreach($results as $object)
			@if($object instanceof App\Models\Series)
				<span class="tag">Series</span>
				{{ $object->title }}
			@elseif($object instanceof App\Models\Tutorial)
				<span class="tag">Tutorial</span>
				{{ $object->title }}
			@endif
		@endforeach
	@else
		No Result...
	@endif

</div>

@endsection
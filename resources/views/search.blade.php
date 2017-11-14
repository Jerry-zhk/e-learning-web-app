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
			<button type="button" class="accordion">Filter</button>
			<div class="field accordion-panel">
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
<div class="columns">
	<div class="column is-10 is-offset-1">
		<div class="box">
			@if(count($results) > 0)
				<ul class="has-spacing">
				@foreach($results as $object)
					@if($object instanceof App\Models\Series)
					<li>
						<article class="media">
							<div class="media-left">
								<span class="tag is-link" style="width: 60px;">Series</span>
							</div>
							<div class="media-content">
								<div class="has-text-weight-semibold is-size-6"><a href="{{ route('series.public', ['series4public' => $object->id]) }}">{{ $object->title }}</a></div>
								<div class="has-text-grey-dark is-size-7">
									<span class="m-r-20">Popularity: 1522</span>
									<span class="m-r-20"># of Tutorials: 12</span>
									<div>Description: {{ $object->description }}</div>
								</div>
							</div>
						</article>
					</li>
					@elseif($object instanceof App\Models\Tutorial)
					<li>
						<article class="media">
							<div class="media-left">
								<span class="tag" style="width: 60px;">Tutorial</span>
							</div>
							<div class="media-content">
								<div class="has-text-weight-semibold is-size-6"><a href="{{ route('tutorial.public', ['tutorialSlug' => $object->slug]) }}">{{ $object->title }}</a></div>
								<div class="has-text-grey-dark is-size-7">
									<div>
										Introduction: 
										<?php 
											$bodyWithoutTags = strip_tags($object->body);
											echo (strlen($bodyWithoutTags) > 250) ? substr($bodyWithoutTags, 0, 250) . '...' : $bodyWithoutTags;
										?>
									</div>
								</div>
							</div>
						</article>
					</li>
					@endif
				@endforeach
				</ul>
			@else
			No Result...
			@endif
		</div>
	</div>
</div>

<script type="text/javascript">
	$('button.accordion').on('click', function(){
		$(this).toggleClass('active');
		var panel = this.nextElementSibling;
		if (panel.style.maxHeight){
			panel.style.maxHeight = null;
		} else {
			panel.style.maxHeight = panel.scrollHeight + "px";
		} 
	});
	
</script>

@endsection


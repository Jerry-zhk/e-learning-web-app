@extends('layouts.app')

@section('content')
<nav class="breadcrumb" aria-label="breadcrumbs">
	<ul>
		<li><a href="{{ route('home') }}" aria-current="page">Home</a></li>
		<li><a href="{{ route('profile.index') }}">Profile</a></li>
		<li class="is-active"><a href="#">Activities</a></li>
	</ul>
</nav>
<div class="columns">
	<div class="column is-10 is-offset-1">
		<div class="box">
			<div class="level">
				<div class="level-left">
					<div class="level-item">
						<h5 class="title is-5">Activities</h5>
					</div>
				</div>
			</div>
			<hr>
			<div style="width: 80%; margin: 0 auto;">
				<table class="table is-fullwidth">
					<thead>
						<tr>
							<th>Activity</th>
							<th class="has-text-centered">Date Time</th>
						</tr>
					</thead>
					<tbody>
						@foreach($activities as $activity)
						<tr>
							<td>{!! $activity->renderHTML4Profile() !!}</td>
							<td class="has-text-centered">{{ $activity->created_at }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>

				{{$activities->render('layouts.pagination', ['paginator' => $activities->appends(request()->except('page'))])}}
			</div>
		</div>
	</div>
</div>

@endsection
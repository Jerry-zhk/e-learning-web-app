@extends('layouts.app')

@section('content')
<nav class="breadcrumb" aria-label="breadcrumbs">
	<ul>
		<li><a href="{{ route('admin.home') }}"  aria-current="page">Dashboard</a></li>
		<li class="is-active"><a href="#">Statistics</a></li>
	</ul>
</nav>
<div class="columns">
	<div class="column is-one-quarter">
		@include('admin.side-menu')
	</div>
	<div class="column">
		<div class="box">
			<nav class="level">
				<div class="level-item has-text-centered">
					<div>
						<p class="heading">New Users Today</p>
						<p class="title">{{ $newUserCount }}</p>
					</div>
				</div>
				<div class="level-item has-text-centered">
					<div>
						<p class="heading"># of Users</p>
						<p class="title">{{ $activeUserCount }}</p>
					</div>
				</div>
				<div class="level-item has-text-centered">
					<div>
						<p class="heading"># of Consumers</p>
						<p class="title">{{ $consumerCount }}</p>
					</div>
				</div>
			</nav>
		</div>

		<div class="box">
			<nav class="level">
				<div class="level-item has-text-centered">
					<div>
						<p class="heading">Profit Today</p>
						<p class="title">${{ $profitToday }}</p>
					</div>
				</div>
				<div class="level-item has-text-centered">
					<div>
						<p class="heading">Profit This Week</p>
						<p class="title">${{ $profitThisWeek }}</p>
					</div>
				</div>
			</nav>
		</div>

		<div class="box">
			<table class="table is-fullwidth">
				<thead>
					<tr>
						<th>Popular Series</th>
						<th class="has-text-centered"># of Tutorials</th>
						<th class="has-text-centered">Purchases</th>
						<th>Skills</th>
					</tr>
				</thead>
				<tbody>
					@foreach($popularSeries as $series)
					<tr>
						<td><a href="{{ route('series.show', ['series' => $series->id]) }}">{{ $series->title }}</a></td>
						<td class="has-text-centered">{{ $series->tutorials->count() }}</td>
						<td class="has-text-centered">{{ $series->purchase_count }}</td>
						<td>
							<div class="tags">
								@foreach($series->skills as $skill)
								<span class="tag">{{ $skill->display_name }}</span>
								@endforeach
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

	</div>
</div>

@endsection

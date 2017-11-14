@extends('layouts.app')

@section('content')
<nav class="breadcrumb" aria-label="breadcrumbs">
	<ul>
		<li><a href="{{ route('admin.home') }}"  aria-current="page">Dashboard</a></li>
		<li><a href="{{ route('series.index') }}"  aria-current="page">Series</a></li>
		<li class="is-active"><a href="#">{{ $series->title }}</a></li>
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
						<h3 class="title is-3">{{ $series->title }}</h3>
					</div>
				</div>
				<div class="level-right">
					<div class="level-item">
						<a href="" class="button is-link m-r-5" title="Edit">
							<span class="icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>&nbsp;Edit
						</a>
						<button class="button is-danger" title="Delete">
							<span class="icon"><i class="fa fa-trash" aria-hidden="true"></i></span>&nbsp;Delete
						</button>
					</div>
				</div>
			</nav>
			<div class="content">
				<table class="table is-fullwidth">
					<colgroup>
						<col class="has-text-weight-semibold" style="width: 150px;">
						<col>
						<col class="has-text-weight-semibold" style="width: 150px;">
						<col>
					</colgroup>
					<tbody>
						<tr>
							<th>Title</th>
							<td colspan="3">{{ $series->title }}</td>
						</tr>
						<tr>
							<th>Skills</th>
							<td colspan="3">
								<div class="tags">
									@foreach($series->skills as $skill)
									<span class="tag">{{ $skill->display_name }}</span>
									@endforeach
								</div>
							</td>
						</tr>
						<tr>
							<th>Price</th>
							<td>${{ $series->price }}</td>
							<th>Public</th>
							<td>
								{{ ($series->is_public === 1) ? 'Yes' : 'No' }}
							</td>
						</tr>
						<tr>
							<th># of toturials</th>
							<td>{{ $series->tutorials_count }}</td>
							<th># of purchases</th>
							<td>0</td>
						</tr>
						<tr>
							<th>Created At</th>
							<td>{{ $series->created_at }}</td>
							<th>Last Update</th>
							<td>{{ $series->updated_at }}</td>
						</tr>
						

					</tbody>
				</table>
			</div>
		</div>

		<div class="box">
			<nav class="level">
				<div class="level-left">
					<div class="level-item">
						<h3 class="title is-3">Tutorials</h3>
					</div>
				</div>
				<div class="level-right">
					<div class="level-item">
						<a href="{{ route('series.tutorial.create', ['series' => $series->id]) }}" class="button" title="New Tutorial">
							<span class="icon"><i class="fa fa-plus" aria-hidden="true"></i></span>&nbsp;New Tutorial
						</a>
					</div>
				</div>
			</nav>
			<table class="table is-fullwidth">
				<colgroup>
					<col>
					<col style="width: 200px">
					<col style="width: 200px">
				</colgroup>
				<thead>
					<tr>
						<th>Series Name</th>
						<th class="has-text-centered">Slug</th>
						<th class="has-text-centered">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($series->tutorials as $tutorial)
					<tr>
						<td>{{ $tutorial->title }}</td>
						<td class="has-text-centered">{{ $tutorial->slug }}</td>
						<td class="has-text-centered">
							<a href="{{ route('series.tutorial.show', ['series' => $series->id, 'tutorial' => $tutorial->id]) }}" class="button is-small is-link" title="More Details">
								<span class="icon"><i class="fa fa-info" aria-hidden="true"></i></span>
							</a>
							<a href="#" class="button is-small" title="Public Link">
								<span class="icon"><i class="fa fa-link" aria-hidden="true"></i></span>
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

	</div>
</div>

@endsection
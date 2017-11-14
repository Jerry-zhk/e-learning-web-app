@extends('layouts.app')

@section('content')
<nav class="breadcrumb" aria-label="breadcrumbs">
	<ul>
		<li><a href="{{ route('admin.home') }}"  aria-current="page">Dashboard</a></li>
		<li class="is-active"><a href="#">Series</a></li>
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
						<span class="title is-3">Series</h3>
					</div>
					@if(request()->has('keyword'))
					<div class="level-item">
						<h5 class="subtitle is-5">Find: {{ request()->input('keyword') }}</h5>
					</div>
					@endif
				</div>
				
				<div class="level-right">
					<div class="level-item">
						<a href="{{ route('series.create') }}" class="button">
							<span class="icon">
								<i class="fa fa-plus" aria-hidden="true"></i>
							</span>&nbsp;
							New Series
						</a>
					</div>
					<div class="level-item">
						<form action="" method="GET">
							<div class="field has-addons">
								<div class="control">
									<input class="input" type="text" name="keyword" 
									value="{{ request()->has('keyword') ? request()->input('keyword') : '' }}" 
									placeholder="Find a series">
								</div>
								<div class="control">
									<button class="button is-info">
										<i class="fa fa-search" aria-hidden="true"></i>
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</nav>
			<table class="table is-fullwidth">
				<colgroup>
					<col>
					<col style="width: 150px;">
					<col style="width: 150px;">
					<col style="width: 100px;">
					<col style="width: 100px;">
				</colgroup>
				<thead>
					<tr>
						<th>Series Title</th>
						<th># of tutorials</th>
						<th># of purchases</th>
						<th>Public</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($series as $s)
					<tr>
						<td>{{ $s->title }}</td>
						<td>{{ $s->tutorials_count }}</td>
						<td>0</td>
						<td>{{ ($s->is_public === 1) ? 'Yes' : 'No' }}</td>
						<td>
							<a href="{{ route('series.show', ['series' => $s->id]) }}" class="button is-small is-link" title="More Details">
								<span class="icon"><i class="fa fa-info" aria-hidden="true"></i></span>
							</a>
							<a href="#" class="button is-small" title="Edit">
								<span class="icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			
			{{$series->render('layouts.pagination', ['paginator' => $series->appends(request()->except('page'))])}}
		</div>
	</div>
</div>

@endsection
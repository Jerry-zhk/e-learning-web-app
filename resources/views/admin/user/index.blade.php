@extends('layouts.app')

@section('content')
<nav class="breadcrumb" aria-label="breadcrumbs">
	<ul>
		<li><a href="{{ route('admin.home') }}"  aria-current="page">Dashboard</a></li>
		<li class="is-active"><a href="#">User</a></li>
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
						<span class="title is-3">Users</span>
					</div>
					@if(request()->has('keyword'))
					<div class="level-item">
						<h5 class="subtitle is-5">Find: {{ request()->input('keyword') }}</h5>
					</div>
					@endif
				</div>
				<div class="level-right">
					<div class="level-item">
						<form action="{{ route('user.index') }}" method="GET">
							<div class="field has-addons">
								<div class="control">
									<input class="input" type="text" name="keyword" 
									value="{{ request()->has('keyword') ? request()->input('keyword') : '' }}" 
									placeholder="Find an user">
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
				<thead>
					<tr>
						<th>Username</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
					<tr>
						<td>{{ $user->username }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->phone }}</td>
						<td>
							<a href="{{ route('user.show', ['user' => $user->id]) }}" class="button is-small is-link" title="More Details">
								<span class="icon"><i class="fa fa-info" aria-hidden="true"></i></span>
							</a>
							@if($auth->can('user-role-perm-update'))
							<a href="{{ route('user.edit', ['user' => $user->id]) }}" class="button is-small" title="Settings">
								<span class="icon"><i class="fa fa-wrench" aria-hidden="true"></i></span>
							</a>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			
			{{$users->render('layouts.pagination', ['paginator' => $users->appends(request()->except('page'))])}}
		</div>
	</div>
</div>

@endsection

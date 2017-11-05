@extends('layouts.app')

@section('content')
<nav class="breadcrumb" aria-label="breadcrumbs">
	<ul>
		<li><a href="{{ route('admin.home') }}"  aria-current="page">Dashboard</a></li>
		<li><a href="{{ route('user.index') }}"  aria-current="page">User</a></li>
		<li class="is-active"><a href="#">{{ $user->username }}</a></li>
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
						<h3 class="title is-3">{{ $user->username }}</h3>
					</div>
				</div>
				<div class="level-right">
					<div class="level-item">
						<a href="{{ route('user.edit', ['user' => $user->id]) }}" class="button is-link m-r-5" title="Settings">
							<span class="icon"><i class="fa fa-wrench" aria-hidden="true"></i></span>&nbsp;Settings
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
							<th>Name</th>
							<td>{{ $user->name }}</td>
							<th>E-Mail</th>
							<td>{{ $user->email }}</td>
						</tr>
						<tr>
							<th>Phone</th>
							<td>{{ $user->phone }}</td>
							<th>Age</th>
							<td>{{ $user->age }}</td>
						</tr>
						<tr>
							<th>Register At</th>
							<td>{{ $user->created_at }}</td>
							<th>Last Login</th>
							<td>2017-10-05 23:23</td>
						</tr>
						<tr>
							<th>Roles</th>
							<td colspan="3">
								<div class="tags">
								@foreach($user->roles as $role)
									<span class="tag">{{ $role->display_name }}</span>
								@endforeach
								</div>
							</td>
						</tr>
						<tr>
							<th>Extra Permissions</th>
							<td colspan="3">
								<div class="tags">
								@foreach($user->permissions as $permissions)
									<span class="tag">{{ $permissions->display_name }}</span>
								@endforeach
								</div>
							</td>
						</tr>

					</tbody>
				</table>
			</div>
		</div>

		<div class="box">
			<h4 class="title is-4">Purchase Record</h4>
			<table class="table is-fullwidth">
				<colgroup>
					<col>
					<col style="width: 100px">
					<col style="width: 200px">
					<col style="width: 200px">
				</colgroup>
				<thead>
					<tr>
						<th>Series Name</th>
						<th class="has-text-centered">Price ($)</th>
						<th class="has-text-centered">Transaction ID</th>
						<th class="has-text-centered">Purchased At</th>
					</tr>
				</thead>
				<tbody>
					@for($i = 0; $i < 5; $i++)
					<tr>
						<td>PHP for beginners</td>
						<td class="has-text-centered">8</td>
						<td class="has-text-centered">273858687363</td>
						<td class="has-text-centered">2017-10-08 22:00</td>
					</tr>
					@endfor
				</tbody>
			</table>
		</div>

		<div class="box">
			<h4 class="title is-4">Activities</h4>
			<table class="table is-fullwidth">
				<colgroup>
					<col>
					<col style="width: 200px">
				</colgroup>
				<thead>
					<tr>
						<th>Description</th>
						<th class="has-text-centered">Made at</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{ $user->username }} has purchased series PHP for beginners.</td>
						<td class="has-text-centered">2017-10-08 22:00</td>
					</tr>
					<tr>
						<td>{{ $user->username }} has logged in.</td>
						<td class="has-text-centered">2017-10-08 22:00</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection

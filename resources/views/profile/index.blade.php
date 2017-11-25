@extends('layouts.app')

@section('content')
<nav class="breadcrumb" aria-label="breadcrumbs">
	<ul>
		<li><a href="{{ route('home') }}" aria-current="page">Home</a></li>
		<li class="is-active"><a href="#">Profile</a></li>
	</ul>
</nav>
<div class="columns">
	<div class="column is-10 is-offset-1">
		<div class="box">
			<div class="level">
				<div class="level-left">
					<div class="level-item">
						<h5 class="title is-5">Personal Information</h5>
					</div>
				</div>
				<div class="level-right">
					<div class="level-item">
						<a href="{{ route('profile.edit') }}" class="button">
							<i class="fa fa-pencil"></i>&nbsp;Edit
						</a>
					</div>
				</div>
			</div>
			
			<hr>
			<table class="table" style="width: 80%; margin: 0 auto;">
				<colgroup>
					<col style="width: 200px;">
					<col>
				</colgroup>
				<tbody>
					<tr>
						<th class="has-text-right">Username</th>
						<td>{{ $user->username }}</td>
					</tr>
					<tr>
						<th class="has-text-right">E-Mail Address</th>
						<td>{{ $user->email }}</td>
					</tr>
					<tr>
						<th class="has-text-right">Name</th>
						<td>{{ $user->name }}</td>
					</tr>
					<tr>
						<th class="has-text-right">Age</th>
						<td>{{ $user->age }}</td>
					</tr>
					<tr>
						<th class="has-text-right">Phone</th>
						<td>{{ $user->phone }}</td>
					</tr>
					<tr>
						<th class="has-text-right">Joined at</th>
						<td>{{ $user->created_at }}</td>
					</tr>
					<tr>
						<th class="has-text-right">Roles</th>
						<td colspan="3">
							<div class="tags">
								@foreach($user->roles as $role)
								<span class="tag">{{ $role->display_name }}</span>
								@endforeach
							</div>
						</td>
					</tr>
					<tr>
						<th class="has-text-right">Extra Permissions</th>
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
		@if($user->seriesPurchases->count() > 0)
		<div class="box">
			<div class="level">
				<div class="level-left">
					<div class="level-item">
						<h5 class="title is-5">My Series</h5>
					</div>
				</div>
				<div class="level-right">
					<div class="level-item">
						<a href="{{ route('profile.series') }}" class="button">
							Show All
						</a>
					</div>
				</div>
			</div>
			<hr>
			<table class="table" style="width: 80%; margin: 0 auto;">
				<thead>
					<tr>
						<th>Series</th>
						<th class="has-text-centered">Price</th>
						<th class="has-text-centered">Transaction ID</th>
						<th class="has-text-centered">Purchased at</th>
					</tr>
				</thead>
				<tbody>
					@foreach($user->seriesPurchases->take(10) as $purchase)
					<tr>
						<td>
							<a href="{{ route('series.public', ['series4public' => $purchase->series_id]) }}">
								{{ $purchase->series->title }}
							</a>
						</td>
						<td class="has-text-centered">{{ $purchase->price }}</td>
						<td class="has-text-centered">{{ $purchase->transaction_id }}</td>
						<td class="has-text-centered">{{ $purchase->created_at }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@endif
		<div class="box">
			<div class="level">
				<div class="level-left">
					<div class="level-item">
						<h5 class="title is-5">Activities</h5>
					</div>
				</div>
				<div class="level-right">
					<div class="level-item">
						<a href="{{ route('profile.activities') }}" class="button">
							Show All
						</a>
					</div>
				</div>
			</div>
			<hr>
			<table class="table" style="width: 80%; margin: 0 auto;">
				<thead>
					<tr>
						<th>Activity</th>
						<th class="has-text-centered">Date Time</th>
					</tr>
				</thead>
				<tbody>
					@foreach($user->events->take(10) as $event)
					<tr>
						<td>{!! $event->renderHTML4Profile() !!}</td>
						<td class="has-text-centered">{{ $event->created_at }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection
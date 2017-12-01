@extends('layouts.app')

@section('content')
<nav class="breadcrumb" aria-label="breadcrumbs">
	<ul>
		<li><a href="{{ route('admin.home') }}"  aria-current="page">Dashboard</a></li>
		<li ><a href="{{ route('role.index') }}">Role</a></li>
		<li class="is-active"><a href="#">{{ $role->display_name }}</a></li>
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
						<span class="title is-3">Role: {{ $role->display_name }}</h3>
					</div>
				</div>
			</nav>
			<table class="table is-fullwidth">
				<colgroup>
					<col style="width: 350px;">
					<col>
				</colgroup>
				<thead>
					<tr>
						<th>Permission</th>
						<th>Description</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($role->permissions as $perm)
					<tr>
						<td>{{ $perm->display_name }}</td>
						<td>{{ $perm->description }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection

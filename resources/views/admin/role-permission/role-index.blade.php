@extends('layouts.app')

@section('content')
<nav class="breadcrumb" aria-label="breadcrumbs">
	<ul>
		<li><a href="{{ route('admin.home') }}"  aria-current="page">Dashboard</a></li>
		<li class="is-active"><a href="#">Role</a></li>
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
						<span class="title is-3">Roles</h3>
					</div>
				</div>
				
				<div class="level-right">
					<div class="level-item">
						<a href="{{ route('role.create') }}" class="button">
							<span class="icon">
								<i class="fa fa-plus" aria-hidden="true"></i>
							</span>&nbsp;
							New Role
						</a>
					</div>
				</div>
			</nav>
			<table class="table is-fullwidth">
				<colgroup>
					<col>
					<col style="width: 250px;">
					<col style="width: 200px;">
					<col style="width: 100px;">
				</colgroup>
				<thead>
					<tr>
						<th>Display Name</th>
						<th class="has-text-centered">Name</th>
						<th class="has-text-centered"># of permissions</th>
						<th class="has-text-centered">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($roles as $role)
					<tr>
						<td>{{ $role->display_name }}</td>
						<td class="has-text-centered">{{ $role->name }}</td>
						<td class="has-text-centered">{{ $role->permissions->count() }}</td>
						<td class="has-text-centered">
							<a href="{{ route('role.show', ['role' => $role->id]) }}" class="button is-small is-link" title="More Details">
								<span class="icon"><i class="fa fa-info" aria-hidden="true"></i></span>
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

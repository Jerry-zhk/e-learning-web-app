@extends('layouts.app')

@section('content')
<style>
label.checkbox{
	width: 24.5%;
}
</style>

<nav class="breadcrumb" aria-label="breadcrumbs">
	<ul>
		<li><a href="{{ route('admin.home') }}"  aria-current="page">Dashboard</a></li>
		<li><a href="{{ route('user.index') }}"  aria-current="page">User</a></li>
		<li><a href="{{ route('user.show', ['user' => $user->id]) }}">{{ $user->username }}</a></li>
		<li class="is-active"><a href="#"  aria-current="page">Settings</a></li>
	</ul>
</nav>
<div class="columns">
	<div class="column is-one-quarter">
		@include('admin.side-menu')
	</div>
	<div class="column">
		<div class="box">
			<div class="columns">
				<div class="column is-two-thirds">
					<h5 class="title is-5">Operations</h5>
					<button class="button is-danger">
						<span class="icon">
							<i class="fa fa-trash-o" aria-hidden="true"></i>
						</span>&nbsp;
						Delete
					</button>
				</div>
				<div class="column">
					
				</div>
			</div>
		</div>

		

		<div class="box">
			<h5 class="title is-5">Permissions</h5>
			<form action="" method="POST">
				@foreach ($permissions as $permission)
				<label class="checkbox">
					<input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
					@if (in_array($permission->id, $userPermissions)) checked @endif> {{$permission->display_name}}
				</label>
				@endforeach

				<div class="field m-t-10">
					<div class="control">
						<button class="button is-success">
							<span class="icon">
								<i class="fa fa-floppy-o" aria-hidden="true"></i>
							</span>&nbsp;
							Save
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection

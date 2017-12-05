@extends('layouts.app')

@section('content')
<nav class="breadcrumb" aria-label="breadcrumbs">
	<ul>
		<li><a href="{{ route('home') }}" aria-current="page">Home</a></li>
		<li><a href="{{ route('profile.index') }}">Profile</a></li>
		<li class="is-active"><a href="#">Edit Profile</a></li>
	</ul>
</nav>

<div class="columns">
	<div class="column is-10 is-offset-1">
		<div class="box">
			<h5 class="title is-5">Edit Profile</h5>
			<hr>
			<form action="{{ route('profile.update') }}" method="POST" style="width: 80%; margin: 0 auto;">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="field {{ $errors->has('name') ? ' has-error' : '' }}">
					<label for="name" class="label">Name</label>
					<div class="control">
						<input type="text" class="input" name="name" value="{{ old('name') == null ? $user->name : old('name') }}" required autofocus>
						@if ($errors->has('name'))
						<p class="help is-danger">{{ $errors->first('name') }}</p>
						@endif
					</div>
				</div>
				<div class="field">
					<label class="label">Username</label>
					<div class="control">
						{{ $user->username }}
					</div>
				</div>
				<div class="field">
					<label class="label">E-Mail Address</label>
					<div class="control">
						{{ $user->email }}
					</div>
				</div>
				<div class="field {{ $errors->has('current_password') ? ' has-error' : '' }}">
					<label for="current_password" class="label">Current Password</label>
					<div class="control">
						<input id="current_password" type="password" class="input" name="current_password">
						@if ($errors->has('current_password'))
						<p class="help is-danger">{{ $errors->first('current_password') }}</p>
						@endif
					</div>
				</div>
				<div class="field {{ $errors->has('password') ? ' has-error' : '' }}">
					<label for="password" class="label">Password</label>
					<div class="control">
						<input id="password" type="password" class="input" name="password">
						@if ($errors->has('password'))
						<p class="help is-danger">{{ $errors->first('password') }}</p>
						@endif
					</div>
				</div>
				<div class="field">
					<label for="password_confirmation" class="label">Comfirm Password</label>
					<div class="control">
						<input id="password_confirmation" type="password" class="input" name="password_confirmation">
						@if ($errors->has('password_confirmation'))
						<p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
						@endif
					</div>
				</div>
				<div class="field {{ $errors->has('age') ? ' has-error' : '' }}">
					<label for="age" class="label">Age</label>
					<div class="control">
						<input type="number" class="input" name="age" value="{{ old('age') == null ? $user->age : old('age') }}" required>
						@if ($errors->has('age'))
						<p class="help is-danger">{{ $errors->first('age') }}</p>
						@endif
					</div>
				</div>
				<div class="field {{ $errors->has('phone') ? ' has-error' : '' }}">
					<label for="phone" class="label">Phone</label>
					<div class="control">
						<input type="text" class="input" name="phone" value="{{ old('phone') == null ? $user->phone : old('phone') }}" required>
						@if ($errors->has('phone'))
						<p class="help is-danger">{{ $errors->first('phone') }}</p>
						@endif
					</div>
				</div>
				<div class="field">
					<div class="control">
						<button class="button is-success">Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection
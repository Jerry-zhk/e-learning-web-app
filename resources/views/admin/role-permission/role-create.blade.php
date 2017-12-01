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
		<li ><a href="{{ route('role.index') }}">Role</a></li>
		<li class="is-active"><a href="#">New Role</a></li>
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
						<span class="title is-3">New Role</h3>
						</div>
					</div>
				</nav>
				<form action="{{ route('role.store') }}" method="POST">
					{{ csrf_field() }}
					<div class="field {{ $errors->has('display_name') ? ' has-error' : '' }}">
						<label for="display_name" class="label">Display Name</label>
						<div class="control">
							<input type="text" id="display_name" class="input" name="display_name" value="{{ old('display_name') }}" placeholder="Eyecatching title here..." required autofocus>
						</div>
						@if ($errors->has('display_name'))
						<p class="help is-danger">{{ $errors->first('display_name') }}</p>
						@endif
					</div>
					<div class="field {{ $errors->has('name') ? ' has-error' : '' }}">
						<label for="name" class="label">Name</label>
						<div class="control">
							<input type="text" id="name" class="input" name="name" value="{{ old('name') }}" placeholder="Eyecatching title here..." required autofocus>
						</div>
						@if ($errors->has('name'))
						<p class="help is-danger">{{ $errors->first('name') }}</p>
						@endif
					</div>
					<div class="field {{ $errors->has('description') ? ' has-error' : '' }}">
						<label for="description" class="label">Description</label>
						<div class="control">
							<textarea name="description" id="description" rows="5" class="textarea">{{ old('description') }}</textarea>
						</div>
						@if ($errors->has('description'))
						<p class="help is-danger">{{ $errors->first('description') }}</p>
						@endif
					</div>
					<div class="field">
						<label class="label">Permissions</label>
						@foreach ($permissions as $permission)
		                <label class="checkbox">
		                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"> {{$permission->display_name}}
		                </label>
                		@endforeach
					</div>
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

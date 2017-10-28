@extends('layouts.app')

@section('content')
@auth
You are logged in!
<p>

	My Roles: 
	@foreach (Auth::user()->roles as $role)
		<span class="tag">{{ $role->display_name }}</span>
	@endforeach
	Can I do deletion-restore?
	@if(Auth::user()->can('deletion-restore'))
		Yes
	@else
		No
	@endif
</p>
@endauth

@endsection

@extends('layouts.app')

@section('content')
<nav class="breadcrumb" aria-label="breadcrumbs">
	<ul>
		<li><a href="{{ route('admin.home') }}"  aria-current="page">Dashboard</a></li>
		<li class="is-active"><a href="#">Member</a></li>
	</ul>
</nav>
<div class="columns">
	<div class="column is-one-quarter">
		@include('admin.side-menu')
	</div>
	<div class="column">
		<div class="box">
			@foreach ($users as $user)
				{{ $user->name }} <br />
			@endforeach
			{{$users->render('layouts.pagination', ['paginator' => $users])}}
		</div>
	</div>
</div>

@endsection

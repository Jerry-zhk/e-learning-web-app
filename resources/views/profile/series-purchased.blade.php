@extends('layouts.app')

@section('content')
<nav class="breadcrumb" aria-label="breadcrumbs">
	<ul>
		<li><a href="{{ route('home') }}" aria-current="page">Home</a></li>
		<li><a href="{{ route('profile.index') }}">Profile</a></li>
		<li class="is-active"><a href="#">Series Purchased</a></li>
	</ul>
</nav>
<div class="columns">
	<div class="column is-10 is-offset-1">
		<div class="box">
			<div class="level">
				<div class="level-left">
					<div class="level-item">
						<h5 class="title is-5">My Series</h5>
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
					@foreach($seriesPurchases as $purchase)
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
	</div>
</div>

@endsection
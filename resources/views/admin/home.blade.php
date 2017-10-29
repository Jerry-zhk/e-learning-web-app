@extends('layouts.app')

@section('content')
<nav class="breadcrumb" aria-label="breadcrumbs">
	<ul>
		<li class="is-active"><a href="#"  aria-current="page">Admin</a></li>
		<li><a href="#">Home</a></li>
	</ul>
</nav>
<div class="columns">
	<div class="column is-one-quarter">
		@include('admin.side-menu')
	</div>
	<div class="column">
		<!-- statistics -->
		<div class="box">
			<nav class="level">
				<div class="level-item has-text-centered">
					<div>
						<p class="heading">New Users Today</p>
						<p class="title">335</p>
					</div>
				</div>
				<div class="level-item has-text-centered">
					<div>
						<p class="heading">Purchases Today</p>
						<p class="title">123</p>
					</div>
				</div>
				<div class="level-item has-text-centered">
					<div>
						<p class="heading">Tutorials in Total</p>
						<p class="title">1,585</p>
					</div>
				</div>
				<div class="level-item has-text-centered">
					<div>
						<p class="heading">Likes</p>
						<p class="title">789</p>
					</div>
				</div>
			</nav>
		</div>
		<!-- /statistics -->

		<!-- user activities -->
		<div class="box">
			<table class="table is-fullwidth">
				<thead>
					<tr>
						<th>User Activity</th>
						<th class="has-text-centered">Date Time</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><a href="#">@jerryzhou</a> has purchased series <a href="#">PHP for beginner</a></td>
						<td class="has-text-centered">2017-10-28 17:08</td>
					</tr>
					<tr>
						<td><a href="#">@jerryzhou</a> has joined us</td>
						<td class="has-text-centered">2017-10-28 13:08</td>
					</tr>
					<tr>
						<td><a href="#">@ivanmok</a> has joined us</td>
						<td class="has-text-centered">2017-10-28 12:08</td>
					</tr>
					<tr>
						<td><a href="#">@flamyli</a> has joined us</td>
						<td class="has-text-centered">2017-10-28 12:08</td>
					</tr>
					<tr>
						<td><a href="#">@jackyangara</a> has joined us</td>
						<td class="has-text-centered">2017-10-28 12:08</td>
					</tr>
				</tbody>
			</table>
		</div>
		<!-- /user activities -->
		
		<!-- popular series -->
		<div class="box">
			<table class="table is-fullwidth">
				<thead>
					<tr>
						<th>Popular Series</th>
						<th class="has-text-centered"># of Tutorials</th>
						<th class="has-text-centered">Purchases</th>
						<th>Skills</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><a href="#">MySQL Basics</a></td>
						<td class="has-text-centered">13</td>
						<td class="has-text-centered">681</td>
						<td>
							<div class="tags">
								<span class="tag">MySQL</span>
							</div>
						</td>
					</tr>
					<tr>
						<td><a href="#">PHP for beginner</a></td>
						<td class="has-text-centered">18</td>
						<td class="has-text-centered">466</td>
						<td>
							<div class="tags">
								<span class="tag">PHP</span>
							</div>
						</td>
					</tr>
					<tr>
						<td><a href="#">PHP PDO Tutorials</a></td>
						<td class="has-text-centered">8</td>
						<td class="has-text-centered">295</td>
						<td>
							<div class="tags">
								<span class="tag">PHP</span>
								<span class="tag">MySQL</span>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<!-- /popular series -->
	</div>
</div>

@endsection

<nav class="panel">
	<p class="panel-heading">Actions</p>
	<a href="#" class="panel-block @if(Route::currentRouteName() === 'admin.home') is-active @endif">
		<span class="panel-icon">
			<i class="fa fa-tachometer" aria-hidden="true"></i>
		</span>
		Dashboard
	</a>
	<a href="#" class="panel-block">
		<span class="panel-icon">
			<i class="fa fa-commenting" aria-hidden="true"></i>
		</span>
		Tutorials
	</a>
	<a href="#" class="panel-block">
		<span class="panel-icon">
			<i class="fa fa-user-circle-o" aria-hidden="true"></i>
		</span>
		Users
	</a>
	<a href="#" class="panel-block">
		<span class="panel-icon">
			<i class="fa fa-bar-chart" aria-hidden="true"></i>
		</span>
		Statistics
	</a>
	<a href="#" class="panel-block">
		<span class="panel-icon">
			<i class="fa fa-key" aria-hidden="true"></i>
		</span>
		Roles &#38; Permissions
	</a>
</nav>
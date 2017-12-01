<nav class="panel">
	<p class="panel-heading">Manage</p>
	<a href="{{ route('admin.home') }}"
		class="panel-block @if(Route::currentRouteName() === 'admin.home') is-active @endif">
		<span class="panel-icon">
			<i class="fa fa-tachometer" aria-hidden="true"></i>
		</span>
		Dashboard
	</a>
	@if($auth->hasRole('admin|superadmin'))
	<a href="{{ route('user.index') }}"
		class="panel-block @if(Request::segment(2) === 'user') is-active @endif">
		<span class="panel-icon">
			<i class="fa fa-user-circle-o" aria-hidden="true"></i>
		</span>
		Users
	</a>
	@endif
	<a href="{{ route('series.index') }}" 
		class="panel-block @if(Request::segment(2) === 'series' || Request::segment(2) === 'tutorial') is-active @endif">
		<span class="panel-icon">
			<i class="fa fa-commenting" aria-hidden="true"></i>
		</span>
		Series &#38; Tutorials
	</a>
	@if($auth->can('statistics'))
	<a href="#" class="panel-block">
		<span class="panel-icon">
			<i class="fa fa-bar-chart" aria-hidden="true"></i>
		</span>
		Statistics
	</a>
	@endif

	@if($auth->hasRole('superadmin'))
	<a href="{{ route('role.index') }}" 
		class="panel-block @if(Request::segment(2) === 'role' || Request::segment(2) === 'permission') is-active @endif">
		<span class="panel-icon">
			<i class="fa fa-key" aria-hidden="true"></i>
		</span>
		Roles &#38; Permissions
	</a>
	@endif
</nav>
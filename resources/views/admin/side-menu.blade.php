<nav class="panel">
	<p class="panel-heading">Manage</p>
	<a href="@if(Route::currentRouteName() === 'admin.home') # @else {{ route('admin.home') }} @endif"
		class="panel-block @if(Route::currentRouteName() === 'admin.home') is-active @endif">
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
	<a href="@if(Route::currentRouteName() === 'admin.member') # @else {{ route('admin.member') }} @endif"
		class="panel-block @if(Route::currentRouteName() === 'admin.member') is-active @endif">
		<span class="panel-icon">
			<i class="fa fa-user-circle-o" aria-hidden="true"></i>
		</span>
		Members
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
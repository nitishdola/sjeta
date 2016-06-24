<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
</script>

<div class="navbar-container" id="navbar-container">
	<!-- #section:basics/sidebar.mobile.toggle -->
	<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
		<span class="sr-only">Toggle sidebar</span>

		<span class="icon-bar"></span>

		<span class="icon-bar"></span>

		<span class="icon-bar"></span>
	</button>

	<!-- /section:basics/sidebar.mobile.toggle -->
	<div class="navbar-header pull-left">
		<!-- #section:basics/navbar.layout.brand -->
		<a href="{{ route('admin.home') }}" class="navbar-brand">
			<small>
				<i class="fa fa-leaf"></i>
				SJETA Govt of AP
			</small>
		</a>

		<!-- /section:basics/navbar.layout.brand -->

		<!-- #section:basics/navbar.toggle -->

		<!-- /section:basics/navbar.toggle -->
	</div>

	<!-- #section:basics/navbar.dropdown -->
	<div class="navbar-buttons navbar-header pull-right" role="navigation">
		<ul class="nav ace-nav">

			<!-- #section:basics/navbar.user_menu -->
			<li class="light-blue">
				<a data-toggle="dropdown" href="#" class="dropdown-toggle">
					<span class="user-info">
						 
						@if(Auth::guard('admin')->user())
						{{ Auth::guard('admin')->user()->name }}
						@endif
						<i class="ace-icon fa fa-caret-down"></i>
					</span>
				</a>

				<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
					<li>
						<a href="#">
							<i class="ace-icon fa fa-cog"></i>
							Change Password
						</a>
					</li>

					<li>
						<a href="profile.html">
							<i class="ace-icon fa fa-user"></i>
							Profile
						</a>
					</li>

					<li class="divider"></li>

					<li>
						<a href="{{ route('admin.logout') }}">
							<i class="ace-icon fa fa-power-off"></i>
							Logout
						</a>
					</li>
				</ul>
			</li>

			<!-- /section:basics/navbar.user_menu -->
		</ul>
	</div>

	<!-- /section:basics/navbar.dropdown -->
</div><!-- /.navbar-container -->
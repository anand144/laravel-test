<header class="header">
	<div class="logo-container">
		<a href="/" class="logo">
			<h4>Dashboard</h4>
		</a>
		<div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
			<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
		</div>
	</div>

	
	<div class="header-right">
		<span class="separator"></span>

		<div id="userbox" class="userbox">
			<a href="#" data-toggle="dropdown">
				<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
					<span class="name"> {{ Auth::user()->name }}</span>
					<span class="role">Dashboard</span>
				</div>
				<i class="fa custom-caret"></i>
			</a>

			<div class="dropdown-menu">
				<ul class="list-unstyled mb-2">
					<li class="divider"></li>
					<li>
						<a role="menuitem" tabindex="-1" href="{{ route('profile') }}"><i class="fa fa-user"></i> My Profile</a>
					</li>
					<li>
						<a role="menuitem" tabindex="-1" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i> {{ __('Logout') }}
                        </a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</header>


	<aside id="sidebar-left" class="sidebar-left">
	
	    <div class="sidebar-header">
	        <div class="sidebar-title">
	            Navigation
	        </div>
	        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
	            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
	        </div>
	    </div>
	
	    <div class="nano">
	        <div class="nano-content">
	            <nav id="menu" class="nav-main" role="navigation">
	            
	                <ul class="nav nav-main">
	                   <li class="{{ Route::is('dashboard') ? 'nav-active' : '' }}">
	                        <a class="nav-link" href="{{ route('dashboard') }}">
	                            <i class="fa fa-home" aria-hidden="true"></i>
	                            <span>Dashboard</span>
	                        </a>                        
	                    </li>

	                    <li class="nav-parent {{ Route::is('category.*') ? ' nav-expanded nav-active' : '' }}">
	                        <a class="nav-link" href="#">
	                            <i class="fa fa-columns" aria-hidden="true"></i>
	                            <span>Category</span>
	                        </a>
	                        <ul class="nav nav-children">
	                            <li class="{{ Route::is('category.list') ? 'nav-active' : '' }}">
	                                <a class="nav-link" href="{{route('category.list')}}">
	                                    List
	                                </a>
	                            </li>
	                           
	                            <li class="{{ Route::is('category.add') ? 'nav-active' : '' }}">
	                                <a class="nav-link" href="{{route('category.add')}}">
	                                    Add
	                                </a>
	                            </li>
	                            
	                        </ul>
	                    </li>

	                    <li class="nav-parent {{ Route::is('product.*') ? ' nav-expanded nav-active' : '' }}">
	                        <a class="nav-link" href="#">
	                            <i class="fa fa-columns" aria-hidden="true"></i>
	                            <span>Product</span>
	                        </a>
	                        <ul class="nav nav-children">
	                            <li class="{{ Route::is('product.list') ? 'nav-active' : '' }}">
	                                <a class="nav-link" href="{{route('product.list')}}">
	                                    List
	                                </a>
	                            </li>
	                           
	                            <li class="{{ Route::is('product.add') ? 'nav-active' : '' }}">
	                                <a class="nav-link" href="{{route('product.add')}}">
	                                    Add
	                                </a>
	                            </li>
	                            
	                        </ul>
	                    </li>
	                     <li class="{{ Route::is('profile') ? 'nav-active' : '' }}">
	                        <a class="nav-link" href="{{ route('profile') }}">
	                            <i class="fa fa-user" aria-hidden="true"></i>
	                            <span>My Profile</span>
	                        </a>                        
	                    </li>
	                  
	                </ul>
	            </nav>
	        </div>
	
	        <script>
	            // Maintain Scroll Position
	            if (typeof localStorage !== 'undefined') {
	                if (localStorage.getItem('sidebar-left-position') !== null) {
	                    var initialPosition = localStorage.getItem('sidebar-left-position'),
	                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');
	                    
	                    sidebarLeft.scrollTop = initialPosition;
	                }
	            }
	        </script>
	        
	
	    </div>
	
	</aside>

<!DOCTYPE html>
<html>

	@include('admin.common.meta')
	@yield('css')

	<body class=" hold-transition skin-blue sidebar-mini">
		<div class="wrapper">

		    @include('admin.common.header')
		    <div class="inner-wrapper">
		    	@include('admin.common.sidebar')
		    	 <section role="main" class="content-body card-margin">
		   	 		
		    	 	@yield('breadcrumb')
		    		@yield('content')
		    	</section>
		    </div>
		   
		</div>

		@include('admin.common.scripts')
		@yield('js')

	</body>
</html>
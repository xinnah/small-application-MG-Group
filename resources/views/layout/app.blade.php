@include('_partials.header')
	<style type="text/css">
		.alert.alert-danger { background: #f8b2b2; width: 82%; float: right;}
	</style>
	@if(Session::has('success'))
		<style type="text/css">
			.alert-dismissable{margin-left: 17%; margin-top: 25px;}
		</style>
	    <div class="alert alert-success alert-dismissable">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	       <b>{!! Session::get('success')!!}</b> 
	    </div>
	
	@elseif(Session::has('error'))
		
	    <div class="alert alert-danger alert-dismissable">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	       <b>{!! Session::get('error')!!}</b> 
	       </div>
		
	@endif
	<section>
		@yield('content')
	</section>

@include('_partials.footer')
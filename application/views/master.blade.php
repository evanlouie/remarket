<!DOCTYPE HTML>
<html>
	@yield('header')
      @if($title!="REMARKET")
<style>
html{
		background:url("/img/wavegrid.png");	

}
body{
	background:url("/img/wavegrid.png");	

}
</style>
@endif
	<body>
		<div id="wrapper">
			<div class='content'>
				@yield('loginbar')
				@if(Session::has('alert'))
					{{ Session::get('alert') }}
					{{ Session::forget('alert') }}
				@endif
				@yield('content')
			</div>
			@yield('footer')
		</div>
        
	</body>
</html>
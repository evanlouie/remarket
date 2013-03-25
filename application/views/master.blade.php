<!DOCTYPE HTML>
<html>
	@yield('header')
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
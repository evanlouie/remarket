<!DOCTYPE HTML>
<html>
	@yield('header')
	<body>
		<div id="wrapper">
			<div class='content'>
				@yield('loginbar')
				@yield('content')
			</div>
			@yield('footer')
		</div>
	</body>
</html>
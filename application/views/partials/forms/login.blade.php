@if (Auth::check()) 
<div class='pull-left'>
	<a href="/" class="btn btn-link" style="text-shadow:none; font-size: 20px; color: #ffffff;">Reduce, reuse, recycle, REMARKET</a>
</div>

<div class='pull-right' style="margin-right: 10px;">
	<form class="navbar-form pull-left">
		<input class="textinput span5" type="text" name="q" placeholder="eg. Wood, Windows, Plumbing, etc...">
		<button type="submit" class="btn btn-primary">Search</button>
		<a href="/listing/" class="btn btn-success" style="margin-right:4px">Browse Listings</a>
	</form>
	<!-- <a class="btn btn-primary" href="/account/myListings">My Account</a> -->
	<!-- <a class="btn btn-danger" href="/account/logout/">Logout</a> -->

	<div class="btn-group">
  <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
    My Account
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu pull-right">
    <li><a tabindex="-1" href="/account/myListings">User Dashboard</a></li>
    <li class="divider"></li>
  	<li><a tabindex="-1" href="/account/logout">Logout</a></li>
  </ul>
</div>

</div>
@else
<div class='pull-left'>
	<a href="/" class="btn btn-link" style="text-shadow:none; font-size: 20px; color: #ffffff;">Reduce, reuse, recycle, REMARKET</a>
</div>
<form class="navbar-form pull-right" action="/account/login/" method='post' style="margin-right: 10px;">
	<input class="textinput" type="email" placeholder="Email" name="email" id='email'>
	<input class="textinput" type="password" placeholder="Password" name="password" id='password'>
	<button class="btn btn-primary" id='loginButton'>Login</button>
	<a href="#" class="btn btn-link" style="text-shadow:none">Forgot Password?</a>
</form>
@endif

<script>
function login() {
	e = $('#email').val();
	p = $('#password').val();
		// alert(e);/
		path = window.location.pathname;
		$.post("/account/login/", {email: e, password: p}).done(function() {
			window.location.reload();
		});
	}
	$(document).on('click','#loginButton', function() {
		login();
		return false;
	});

	</script>
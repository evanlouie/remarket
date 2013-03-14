@if (Auth::check()) 
<div class='pull-right'>
	<a class="btn btn-primary" href="/account/">My Account</a>
	<a class="btn btn-danger" href="/account/logout/">Logout</a>
</div>
@else
<form class="navbar-form pull-right" action="/account/login/" method='post'>
	<input class="textinput" type="email" placeholder="Email" name="email">
	<input class="textinput" type="password" placeholder="Password" name="password">
	<button class="btn btn-primary">Login</button>
	<a href="/account/" class="btn btn-link">Forgot Password?</a>
</form>
@endif
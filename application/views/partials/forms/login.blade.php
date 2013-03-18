@if (Auth::check()) 
<div class='pull-left'>
	<a href="#" class="btn btn-link" style="text-shadow:none; font-size: 20px; color: #ffffff;">Reduce, reuse, recycle, REMARKET</a>
</div>
<div class='pull-right'>
	<a class="btn btn-primary" href="/account/myListings">My Account</a>
	<a class="btn btn-danger" href="/account/logout/">Logout</a>
</div>
@else
<div class='pull-left'>
	<a href="#" class="btn btn-link" style="text-shadow:none; font-size: 20px; color: #ffffff;">Reduce, reuse, recycle, REMARKET</a>
</div>
<form class="navbar-form pull-right" action="/account/login/" method='post'>
	<input class="textinput" type="email" placeholder="Email" name="email">
	<input class="textinput" type="password" placeholder="Password" name="password">
	<button class="btn btn-primary">Login</button>
	<a href="#" class="btn btn-link" style="text-shadow:none">Forgot Password?</a>
</form>
@endif
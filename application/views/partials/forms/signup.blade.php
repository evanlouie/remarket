<form id='form-signup' class="navbar-form" action="/account/create/" style="padding: 0 5px 5px 35px;" method='post'>
	<div class='row'>
	<h4 class="heading">Create your account now!</h1>
	<input class="textinput span12" type="email" name="email" placeholder="Email">
	<input class="textinput span12" type="text" name="email2" placeholder="Enter email again">
	<input class="textinput span12" type="password" name="password" placeholder="Password">
	<input class="textinput span12" type="password" name="password2" placeholder="Enter password again"><br>
	</div>
	<div class='row'>
	<button id='button-signup'  class="btn btn-warning span12" style='width:100%; margin: 5px 0 0 0;'>Sign up</button>
</div>
</form>
<script>
	$(document).on('click', '#button-signup', function() {
		alert("Signup successful, please check you email your email for confirmation or log in using the login bar");
	}) 
</script>

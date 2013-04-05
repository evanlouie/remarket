<form id='form-signup' class="navbar-form" action="/account/create/" style="padding: 0 5px 5px 35px;" method='post'>
	<div class='row'>
	<h4 class="heading">Create your account now!</h1>
	<input class="textinput span12" type="email" id='signupEmail' name="email" placeholder="Email">
	<input class="textinput span12" type="email" id='signupEmail2' name="email2" placeholder="Enter email again">
	<input class="textinput span12" type="password" id='signupPassword' name="password" placeholder="Password">
	<input class="textinput span12" type="password" id='signupPassword2' name="password2" placeholder="Enter password again"><br>
	</div>
	<div class='row'>
	<button id='button-signup'  class="btn btn-warning span12" style='width:100%; margin: 5px 0 0 0;'>Sign up</button>
</div>
</form>
<script>
	$(document).on('click', '#button-signup', function(e) {
		e.preventDefault();
		signemail1 = $('#signupEmail').val();
		signemail2 = $('#signupEmail2').val();
		signpass1 = $('#signupPassword').val();
		signpass2 = $('#signupPassword2').val();
		if (signemail1==signemail2 && signpass1==signpass2) 
		{
			$.post('/account/create/', {
				email : signemail1, 
				email2: signemail2, 
				password : signpass1, 
				password2 : signpass2
			}).done(function(data) {
				alert(data);
			})
		}
		else
		{
			if(signemail1!=signemail2) {
				alert('Emails do not match.');
			}
			if(signpass1!=signpass2) {
				alert('Passwords do not match.');
			}
		}
		

	}) 
</script>

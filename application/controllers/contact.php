<?php

class Contact_Controller extends Base_Controller {

	public function action_index()
	{
		if (Input::has('email') && Input::has('subject') && Input::has('name') && Input::has('message')) {
			echo '<br><br><br><div class="alert alert-success"><strong>Success! </strong>Thanks for the feedback!</div>';
			return View::make('contact.index')->with('title', 'Contact Us');
		// 	$name = Input::get('name');
		// 	$subject = Input::get('subject'); 
		// 	$message= Input::get('message');
		// 	$mail_from= Input::get('email'); 
		// 	$header="from: $name <$mail_from>";

		// 	// Enter your email address
		// 	$to ='tristan.ng.sebens@gmail.com';
		// 	$sent=mail($to,$subject,$message,$header);

		// 	if($sent){
		// 	echo '<div class="alert alert-success"><strong>Success!</strong>Thanks for the feedback!</div>';
		// 	return View::make('contact.index')->with('title', 'Contact Us');
		// 	}
		// 	else {
		// 	echo "ERROR";
		// 	return View::make('contact.index')->with('title', 'Contact Us')
		// 	}
		}
		else {
			return View::make('contact.index')->with('title', 'Contact Us');
		}
	}
}
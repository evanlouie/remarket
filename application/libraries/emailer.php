<?php

class Emailer {

	/* Confirmation email of signup
	 * No data
	 */
	public static function signUpConfirmation($email) {
		$subject = 'Welcome to REMARKET!';
		$message = 'TEST';
		$header="from: REMARKET <no-reply@market.tk>";
		$sent=mail($email,$subject,$message,$header);
	}
	/* 
	 * Email linking you to take a survey about your REMARKET experience
	 */
	public static function surveyEmail($email, $listing) {
		$subject = 'Tell what happened with your listing.';
		$message = "Your posting titled '".addslashes($listing->title).
					"' was recently deleted from market.tk. How did it go?";
		$header="from: REMARKET <no-reply@market.tk>";
		$sent=mail($email,$subject,$message,$header);
	}
	/*
	 * Email linking you to your wishlist
	 */
	public static function wishlistResults($email) {
		$subject = 'You have new matches on REMARKET';
		$message = 'TEST';
		$header="from: REMARKET <no-reply@market.tk>";
		$sent=mail($email,$subject,$message,$header);
	}

}

?>
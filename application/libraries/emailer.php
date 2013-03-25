<?php

class Emailer {

	/* Confirmation email of signup
	 * No data
	 */
	public static function signUpConfirmation($email) {
		$subject = 'REMARKET: Welcome to REMARKET!';
		$message = "Welcome to the world of reusable building materials. \n\n" .
					"Go to market319.tk/account to view and add your listings.\n".
					"Go to market319.tk/listing to view all listings.".
					"\n\n Thanks for joining, \n The REMARKET team";
		$header="from: REMARKET <no-reply@market.tk>";
		$sent=mail($email,$subject,$message,$header);
	}
	/* 
	 * Email linking you to take a survey about your REMARKET experience
	 */
	public static function surveyEmail($email, $listing) {
		$subject = 'REMARKET: Tell us what happened with your listing.';
		$message = "Your posting titled '".addslashes($listing->title).
					"' was recently deleted from market319.tk. \n\n How did it go?".
					"\n\n We were wondering if you would fill out our customer survey".
					" at market319.tk/survey \n\n Thanks, \n The REMARKET team";
		$header="from: REMARKET <no-reply@market.tk>";
		$sent=mail($email,$subject,$message,$header);
	}
	/*
	 * Email linking you to your wishlist
	 */
	public static function wishlistResults($email) {
		$subject = 'REMARKET: You have new matches for your Wishlist';
		$message = "You have matches for your wishlist \n\n" .
					"Go to market319.tk/wishlist to view your matches.".
					"\n\n Thanks, \n The REMARKET team";
		$header="from: REMARKET <no-reply@market.tk>";
		$sent=mail($email,$subject,$message,$header);
	}

}

?>
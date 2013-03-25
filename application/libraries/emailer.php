<?php

class Emailer {

	/* Confirmation email of signup
	 * No data
	 */
	public static function signUpConfirmation($email) {
		Mail::send(array('mail.signup.html', 'mail.signup.text'), $data = null, function($m) {
	    	$m->to($email, '')->subject('Welcome to REMARKET!');
		});
	}
	/* Notification that listing has been deleted due to flags
	 * $listing is the listing that was deleted
	 */
	public static function deletedDueToFlags($email, $listing) {
		Mail::send(array('mail.deleteFlags.html', 'mail.deleteFlags.text'), $listing, function($m) {
	    	$m->to($email, '')->subject('One of your posts has been deleted.');
		});
	}

	/* Notification that listing has been deleted due to expiry
	 * $listing is the listing that was deleted
	 */
	public static function deletedDueToExpiry($email, $listing) {
		Mail::send(array('mail.deleteExpiry.html', 'mail.deleteExpiry.text'), $listing, function($m) {
	    	$m->to($email, '')->subject('One of your posts has been deleted.');
		});
	}
	/* 
	 * Email linking you to take a survey about your REMARKET experience
	 */
	public static function surveyEmail($email) {
		Mail::send(array('mail.surveyEmail.html', 'mail.surveyEmail.text'), $data = null, function($m) {
	    	$m->to($email, '')->subject('How did your listing on REMARKET go?');
		});
	}
	/*
	 * Email linking you to your wishlist
	 */
	public static function wishlistResults($email) {
		Mail::send(array('mail.wishlistResult.html', 'mail.wishlistResult.text'), $data = null, function($m) {
	    	$m->to($email, '')->subject('You have matches on REMARKET.');
		});
	}
}


?>
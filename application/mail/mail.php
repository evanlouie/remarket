<?php

public static function signUpConfirmation() {
	Mail::send(array('html.view', 'text.view'), $data, function($m) {
    	$m->to('foo@example.com', 'John Smith')->subject('Welcome!');
	});
}

public static function deletedDueToFlags() {
	Mail::send(array('html.view', 'text.view'), $data, function($m) {
    	$m->to('foo@example.com', 'John Smith')->subject('Welcome!');
	});
}

public static function deletedDueToExpiry() {
	Mail::send(array('html.view', 'text.view'), $data, function($m) {
    	$m->to('foo@example.com', 'John Smith')->subject('Welcome!');
	});
}

public static function surveyEmail() {
	Mail::send(array('html.view', 'text.view'), $data, function($m) {
    	$m->to('foo@example.com', 'John Smith')->subject('Welcome!');
	});
}

public static function wishlistResults() {
	Mail::send(array('html.view', 'text.view'), $data, function($m) {
    	$m->to('foo@example.com', 'John Smith')->subject('Welcome!');
	});
}



?>
<?php

class Flag extends Eloquent {

	public static $timestamps = false;

	public function account()
	{
		return $this->has_one('Account');
	}

	public function listing()
	{
		return $this->has_one('Listing');
	}

}

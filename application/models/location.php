<?php

class Location extends Eloquent {

	public static $timestamps = false;
	public function account()
	{
		return $this->belongs_to('Account');
	}

	public function listings()
	{
		return $this->has_many('Listing');
	}

}

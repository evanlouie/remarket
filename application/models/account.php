<?php

class Account extends Eloquent {

	public static $timestamps = false;
	public function locations()
	{
		return $this->has_many('Location');
	}

	public function wishlistitems()
	{
		return $this->has_many('WishlistItem');
	}

	public function role()
	{
		return $this->has_one('Role');
	}

}

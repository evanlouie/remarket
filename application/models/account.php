<?php

class Account extends Eloquent {

	public function locations()
	{
		return $this->has_many('Location');
	}

	public function wishlistitems()
	{
		return $this->has_many('WishlistItem');
	}

}

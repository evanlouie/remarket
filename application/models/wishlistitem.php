<?php

class WishlistItem extends Eloquent {

	public static $timestamps = false;
	public function account()
	{
		return $this->belongs_to('Account');
	}

}

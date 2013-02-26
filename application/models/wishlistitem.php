<?php

class WishlistItem extends Eloquent {

	public function account()
	{
		return $this->belongs_to('Account');
	}

}

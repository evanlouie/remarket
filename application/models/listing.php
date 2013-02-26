<?php

class Listing extends Eloquent {

	public static $timestamps = true;

	public function images()
	{
		return $this->has_many('Image');
	}

	public function location()
	{
		return $this->belongs_to('Location');
	}

}

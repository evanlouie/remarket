<?php

class Image extends Eloquent {

	public static $timestamps = false;
	public function listing()
	{
		return $this->belongs_to('Listing');
	}

}

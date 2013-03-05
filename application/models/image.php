<?php

class Image extends Eloquent {

	public function listing()
	{
		return $this->belongs_to('Listing');
	}

}

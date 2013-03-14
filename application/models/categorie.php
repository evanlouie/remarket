<?php

class Categorie extends Eloquent {

	public static $timestamps = false;
	public function listings()
	{
		return $this->has_many('Listing');
	}

}

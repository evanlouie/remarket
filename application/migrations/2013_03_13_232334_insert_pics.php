<?php

class Insert_Pics {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		$listings = Listing::all();
		foreach($listings as $l) 
		{
			for($i=0;$i<5;$i++)
			{
				$image = new Image;
				$image->description = "PIC DESCRIPTIOIN";
				$image->listing_id = $l->id;
				$image->save();
			}
		}
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		$imgs = Image::all();
		foreach($imgs as $i) {
			$i->delete();
		}
	}

}
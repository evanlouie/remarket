<?php

class Insert_Listings {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		$locations = Location::all();
		foreach($locations as $loc)
		{
			for($i=0; $i<2; $i++)
			{
				$l = new Listing;
				$l->title = $i;
				$l->description = "THSI IFS AWIFAWOEIJFAWIEJFWEIFJ";
				$l->category_id = "1";
				$l->price = 123.12;
				$l->date_expiry = "1000-01-01 00:00:00";
				$l->date_available = "2013-07-27 00:00:00";
				$l->date_unavailable = "2013-08-05 00:00:00";
				$l->location_id = $loc->id;
				$l->save();
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
		$listings = Listing::all();
		foreach($listings as $l) {
			$l->delete();
		}
	}

}
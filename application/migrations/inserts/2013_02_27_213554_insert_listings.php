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
		foreach($locations as $location)
		{

			for ($i=1; $i<=2; $i++)
			{
				$listing = new Listing;
				$listing->title = "$i";
				$listing->description = "description $i";
				$listing->category = "wood";
				$listing->quantity = "$i";
				$listing->price = "$".$i;
				$listing->date_expiry = "2013-03-19 11:33:22";
				$listing->date_available = "2013-03-19 11:33:22";
				$listing->date_unavailable = "2013-03-19 11:33:22";
				$listing->location_id = $location->id;
				$listing->save();
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
		foreach($listings as $listing)
		{
			$listing->delete();
		}
	}

}
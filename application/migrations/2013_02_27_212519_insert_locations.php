<?php

class Insert_Locations {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		$accounts = Account::all();
		foreach($accounts as $account)
		{
			for($i=1; $i<=5; $i++)
			{
				$location = new Location;
				$location->address = "$i blah St.";
				$location->city = "Vancouver";
				$location->postal_code = "v8v2v3";
				$location->account_id = $account->id;
				$location->save();
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
		$locations = Location::all();
		foreach($locations as $location)
		{
			$location->delete();
		}
	}

}
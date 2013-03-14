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
			for($i=0; $i<2; $i++)
			{
				$l = new Location;
				$l->address = "123 fake St.";
				$l->city = "Vancouver";
				$l->postal_code = "V8V3X4";
				$l->account_id = $account->id;
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
		$locations = Location::all();
		foreach($locations as $l) {
			$l->delete();
		}
	}
}
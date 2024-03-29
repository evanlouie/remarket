<?php

class Location_Controller extends Base_Controller {


	public function action_index()
	{
		echo "Location Controller";
	}

	public function action_id($id)
	{
		if ($location = Location::find($id))
		{
			var_dump($location);
		}

	}
	public function action_add()
	{
		if (Session::has('id'))
		{
			$account = Account::find(Session::get('id'));
			if($account)
			{
				if(Input::has('address') && Input::has('city') && Input::has('postal_code'))
				{
					$location = new Location;
					$location->address = strip_tags(Input::get('address'));
					$location->city = strip_tags(Input::get('city'));
					$location->postal_code = strip_tags(Input::get('postal_code'));
					if ($location->save())
					{
						return true;
					}
					else 
					{
						return false;
					}
				}
				else
				{
					die('address, city or psotal_code not set');
				}
			}
			else {
				die('inconsistant session data');
			}
		}
		else
		{
			die('session id not found');
		}
	}

	public function action_edit($id)
	{
		if (Auth::check() && Session::has('id')) 
		{
			$account = Account::find(Session::get('id'));
			$location = Location::find($id);
			if( Input::has('address') && Input::has('city') && Input::has('postal_code') )
			{
				if( $account->id == $location->account_id ) {
					(Input::has('address') ?
						$location->address = strip_tags(Input::get('address')) :
						$location->address = '');
					(Input::has('city') ? 
						$location->city = strip_tags(Input::get('city')) :
						$location->city = '');
					(Input::has('postal_code') ? 
						$location->postal_code= strip_tags(Input::get('postal_code')) :
						$location->postal_code='');
					$location->save();
					return Redirect::to("/account/myLocations");
				}
				else {
					return Redirect::to("/account/myLocations");
				}
			}
			else {
				if ($location->account_id == $account->id)
				{
					$locations = Location::all();
					$view = View::make('location.edit.index')
					->with('title', 'Edit Location')
					->with('location', $location)
					->with('locations', $locations);
					return $view;
				}
				else
				{
					return Response::error('403');
				}
			}
		}
		else
		{
			return Redirect::to('/');
		}
	}
	
	public function action_delete($id)
	{
		if(Session::has('id'))
		{

			$account = Account::find(Session::get('id'));
			$location = Location::find($id);
			$owner = Account::find($location->account_id);
			if ($account->id == $owner->id) 
			{
				$listings = Listing::where_location_id($location->id);
				// foreach($listings as $listing)
				// {
				// 	$images = Image::where_listing_id($listing->id);
				// 	foreach($images as $image) 
				// 	{
				// 		$image->delete();
				// 	}
				// 	$listing->delete();
				// }
				$location->delete();
				return Redirect::to('/account/myLocations/');
			}
			else 
			{
				return Redirect::to('/');
			}
		}	
		else 
		{
			return Redirect::to('/');
		}
	}


}

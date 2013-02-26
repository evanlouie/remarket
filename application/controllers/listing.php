<?php

class Listing_Controller extends Base_Controller {

	/*
	|--------------------------------------------------------------------------
	| The Default Controller
	|--------------------------------------------------------------------------
	|
	| Instead of using RESTful routes and anonymous functions, you might wish
	| to use controllers to organize your application API. You'll love them.
	|
	| This controller responds to URIs beginning with "home", and it also
	| serves as the default controller for the application, meaning it
	| handles requests to the root of the application.
	|
	| You can respond to GET requests to "/home/profile" like so:
	|
	|		public function action_profile()
	|		{
	|			return "This is your profile!";
	|		}
	|
	| Any extra segments are passed to the method as parameters:
	|
	|		public function action_profile($id)
	|		{
	|			return "This is the profile for user {$id}.";
	|		}
	|
	*/

	public function action_index()
	{
		echo "Search form";
	}


	public function action_id($id)
	{
		$listing = Listing::find($id);
		if ($listing)
		{
			var_dump($listing);
			var_dump($listing->images());
			var_dump($listing->location());
		}
		else
		{
			echo "Invalid Listing ID";
		}
	}

	public function action_create()
	{
		if(Session::has('id'))
		{
			$account = Account::find(Session::get('id'));
			if(Input::has('title') && Input::has('description') && Input::has('category') && Input::has('quantity') && Input::has('price') 
				&& Input::has('date_expiry') && Input::has('date_available') && Input::has('date_unavailable') && Input::has('location_id'))
			{
				$listing = new Listing;
				$listing->title = Input::get('title');
				$listing->description = Input::get('description');
				$listing->category = Input::get('category');
				$listing->quantity = Input::get('quantity');
				$listing->price = Input::get('price');
				$listing->date_expirty = Input::has('date_expiry');
				$listing->date_available = Input::has('date_available');
				$listing->date_unavailable = Input::has('date_unavailable');
				$listing->location_id = Input::has('location_id');
				$listing->save();
			}
			else
			{
				die('Required variables not set');
			}
		}
		else
		{
			die('Session data unavailable: Enable cookies');
		}
		
	}
	public function action_delete()
	{
		if (Session::has('id')) 
		{
			$account = Session::get('id');
			if (Input::has('id')) 
			{
				$id = Input::get('id');
				if ($listing = Listing::find($id))
				{
					$listing->delete();
				}
				else
				{
					die("Invalid Listing ID");
				}
			}
			
		}
		
	}

}

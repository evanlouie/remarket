<?php

class Listing_Controller extends Base_Controller {


	public function action_index()
	{
		 // && Input::has('minP') && Input::has('maxP') && Input::has('category')
		$listings;
		if(Input::has('q') || Input::has('minP') || Input::has('maxP') || Input::has('city') || Input::has('category'))
		{	
			$from = 'FROM listings WHERE ';
			if(Input::has('city')) {
				$city = Input::get('city');
				$from ='FROM listings, locations WHERE locations.city="$city" AND listings.location_id = locations.id AND';
			}
			$query = "	SELECT * $from";

			$keywords = explode(" ", Input::get('q'));
			foreach($keywords as $word)
			{
				$query.="(listings.title LIKE '%$word%' ";
				$query.="OR listings.description LIKE '%$word%') ";
			}
			if (Input::has('minP')) 
			{
				$minP = Input::get('minP');
				$query.= "AND listings.price > $minP ";
			}
			if (Input::has('maxP'))
			{
				$maxP = Input::get('maxP');
				$query.= "AND listings.price < $maxP ";
			}
			if (Input::has('category') && Input::get('category')!="all")
			{
				$category = Input::get('category');
				$query.= "AND listings.category_id = $category'";
			}

			$listings = DB::query($query);
			// var_dump($query);

		} 
		else
		{
			$listings = Listing::order_by('created_at', 'desc')->take(10)->get();
			
			
		}
		foreach ($listings as $listing)
			{
				$location = Location::find($listing->location_id)->address;
				$listing->location = $location;
			}

		$categories = Categorie::order_by('id', 'desc')->get();
		// var_dump($categories);
		$view = View::make('listing.browse.index')->with('title', 'Search')->with('listings', $listings)->with('categories', $categories);
		return $view;	
			
	}


	public function action_id($id)
	{
		$listing = Listing::find($id);
		if ($listing)
		{
			$imageArray = array();

			$images = $listing->images()->get();
			foreach($images as $image) {
				array_push($imageArray, $image);
			}
			$listing->images = $imageArray;
			$loc = $listing->location()->first();
			$account = Account::find($loc->account_id);
			$listing->email = $account->email;
			$listing->date_available = substr($listing->date_available, 0, 10);
			$listing->date_unavailable = substr($listing->date_unavailable, 0, 10);


			$view = View::make('listing.index')->with('title', $listing->title)->with('listing', $listing);

			return $view;
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


			if(Input::has('title') && Input::has('description') && Input::has('category') && Input::has('price') 
				&& Input::has('date_available') && Input::has('date_unavailable'))
			{
				$location;
				if(Input::has('location_id'))
				{
					$location = Location::find(Input::get('location_id'));
				}
				if(Input::has('address') && Input::has('city') && Input::has('postal_code'))
				{
					$location = new Location;
					$location->address = Input::get('address');
					$location->city = Input::get('city');
					$location->postal_code = Input::get('postal_code');
					$location->account_id = $account->id;
					$location->save();

					$location = Location::where_address_and_city_and_postal_code(Input::get('address'), Input::get('city'), Input::get('postal_code'))->first();


				}
				$listing = new Listing;
				$listing->title = Input::get('title');
				$listing->description = Input::get('description');
				$listing->category = Input::get('category');
				// $listing->quantity = Input::get('quantity');
				$listing->quantity = 1;
				$listing->price = Input::get('price');
				// $listing->date_expiry = Input::get('date_expiry');
				$listing->date_expiry = "1999-07-27-11-11-11";
				$listing->date_available = Input::get('date_available');
				$listing->date_unavailable = Input::get('date_unavailable');
				$listing->location_id = $location->id;
				$listing->save();
				return Redirect::to('account');
			}
			else
			{
				$locations = $account->locations()->get();
				$view = View::make('listing.create.index')->with('title', 'Create a Posting')->with('locations', $locations);
				var_dump($_POST);
				return $view;

			}
		}
		else
		{
			return Redirect::to('/account');
		}
		
	}
	public function action_delete($id)
	{
		// if (Session::has('id')) 
		// {
		// 	$account = Session::get('id');
		// 	if (Input::has('id')) 
		// 	{
		// 		$id = Input::get('id');
		// 		if ($listing = Listing::find($id))
		// 		{
		// 			$images = Image::where_listing_id($listing->id);
		// 			foreach($images as $image)
		// 			{
		// 				$image->delete();
		// 			}
		// 			$listing->delete();
		// 		}
		// 		else
		// 		{
		// 			die("Invalid Listing ID");
		// 		}
		// 	}
			
		// }
		if (Session::has('id')) 
		{
			$account = Session::get('id');
			if ($listing = Listing::find($id))
			{
				$images = Image::where_listing_id($listing->id);
				foreach($images as $image)
				{
					$image->delete();
				}
				$listing->delete();
			}
			else
			{
				die("Invalid Listing ID");
			}
			
		}
		
	}

}

<?php

class Listing_Controller extends Base_Controller {


	public function action_index()
	{
		 // && Input::has('minP') && Input::has('maxP') && Input::has('category')
		$listings;
		if(Input::has('q') || Input::has('minP') || Input::has('maxP') || Input::has('city') || Input::has('category_id'))
		{	
			$from = 'FROM listings WHERE ';
			if(Input::has('city')) {
				$city = Input::get('city');
				$from ='FROM listings, locations WHERE locations.city="$city" AND listings.location_id = locations.id AND';
			}
			$query = "SELECT * $from";

			if(Input::has('q')) 
			{
				$keywords = explode(" ", Input::get('q'));
				foreach($keywords as $word)
				{
					$query.="(listings.title LIKE '%$word%' ";
					$query.="OR listings.description LIKE '%$word%') AND";
				}
			}
			if (Input::has('minP')) 
			{
				$minP = Input::get('minP');
				$query.= " listings.price >= $minP AND";
			}
			if (Input::has('maxP'))
			{
				$maxP = Input::get('maxP');
				$query.= " listings.price <= $maxP AND";
			}
			if (Input::has('category_id') && Input::get('category_id')!="all")
			{
				$category_id = Input::get('category_id');
				$query.= " listings.category_id = '$category_id'";
			}
			if (substr($query, -3) == 'AND')
			{
				$query = substr($query, 0, -4);
			}

			$listings = DB::query($query);

		} 
		else
		{
			$listings = Listing::order_by('created_at', 'desc')->take(10)->get();
			
			
		}
		$cats = Categorie::all();
		foreach ($listings as $listing)
		{
			foreach($cats as $c)
			{
				if ($listing->category_id == $c->id)
				{
					$listing->category = $c->title;
				}
			}
			$location = Location::find($listing->location_id);
			$listing->location = $location->address . ', ' . $location->city . ', ' . $location->postal_code;
		}

		$categories = Categorie::all();
		$view = View::make('listing.search.index')->with('title', 'Search')->with('listings', $listings)->with('categories', $categories);
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
			$view = View::make('listing.index')
			->with('title', $listing->title)
			->with('listing', $listing)
			->with('location', $loc);
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


			if(Input::has('title') && Input::has('description') && Input::has('category_id') && Input::has('price') 
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
				$listing->category_id = Input::get('category_id');
				$listing->price = Input::get('price');
				$date_available = Input::get('date_available');
				$date_unavailable = Input::get('date_unavailable');
				$listing->date_available = $date_available."-00-00-00";
				$listing->date_unavailable = $date_unavailable."-00-00-00";
				$listing->location_id = $location->id;
				$listing->save();
				return Redirect::to('account');
			}
			else
			{	$categories = Categorie::all();
				$locations = $account->locations()->get();
				$view = View::make('listing.create.index')->with('title', 'Create a Posting')->with('locations', $locations)->with('categories', $categories);
				// var_dump($_POST);
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
		if (Session::has('id') && Auth::check()) 
		{
			$account = Session::get('id');
			if ($listing = Listing::find($id))
			{
				$listing->delete();
				return Redirect::to('/account');
			}
			else
			{
				die("Invalid Listing ID");
			}
			
		}
		
	}

	public function action_edit($id) 
	{
		if (Auth::check() && Session::has('id')) 
		{
			$account = Account::find(Session::get('id'));
			if(Input::has('title') && Input::has('description') && Input::has('category_id') && Input::has('price') 
				&& Input::has('date_available') && Input::has('date_unavailable'))
				{
					$listing = Listing::find($id);
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
					$listing->title = Input::get('title');
					$listing->description = Input::get('description');
					$listing->category_id = Input::get('category_id');
					$listing->price = Input::get('price');
					$date_available = Input::get('date_available');
					$date_unavailable = Input::get('date_unavailable');
					$listing->date_available = $date_available."-00-00-00";
					$listing->date_unavailable = $date_unavailable."-00-00-00";
					$listing->location_id = $location->id;
					$listing->timestamp();
					$listing->save();
					// var_dump($_POST);
					// var_dump($listing);
					return Redirect::to("/account/");
				}
			$account = Account::find(Session::get('id'));
			$listing = Listing::find($id);
			$location = Location::find($listing->location_id);
			$locations = $account->locations()->get();
			$categories = Categorie::all();

			$price = $listing->price;

			if ($location->account_id == $account->id)
			{
				// var_dump($categories);
				$view = View::make('listing.edit.index')->with('title', 'Edit Listing')
								->with('listing', $listing)
								->with('location', $location)
								->with('locations', $locations)
								->with('account', $account)
								->with('categories', $categories);
				return $view;
			}
			else
			{
				return Response::error('403');
			}
			
		}
		else
		{
			return Redirect::to('/');
		}
	}

	public function action_flag($id) 
	{
		$success = null;
		$error = null;
		if (Auth::check() && Session::has('id')) 
		{
			$flags = Flag::where_listing_id($id)->get();
			$size = sizeof($flags);
			if( $size < 4 ) {
				$flag = new Flag;
				$flag->account_id = Session::get('id');
				$flag->listing_id = $id;
				$flag->save();
				$success = '<strong>Success! </strong>This listing has been flagged.';
			}
			else {
				// Set up view
				$listing = Listing::find($id);
				$location = $listing->location()->first();
				$success = '<strong>Success! </strong>This listing has been flagged.';
				// Delete listing
				$this->action_delete($id);
				// Show user view as though listing has just been flagged
				$view = View::make('listing.index')
				->with('title', $listing->title)
				->with('listing', $listing)
				->with('location', $location)
				->with('success', $success);
				return $view;
			}
		} 
		else {
			$error = '<strong>Error! </strong>You must be logged in to flag a post.';
		}
		$listing = Listing::find($id);
		$location = $listing->location()->first();
		$view = View::make('listing.index')
		->with('title', $listing->title)
		->with('listing', $listing)
		->with('location', $location)
		->with('success', $success)
		->with('error', $error);
		return $view;
	}
	public function action_imgUpload() {
		// $allowedExts = array("jpg", "jpeg", "gif", "png");
		// $temp = explode(".", $_FILES["file"]["name"]);
		// $extension = end($temp);
		// if ((($_FILES["file"]["type"] == "image/gif")
		// || ($_FILES["file"]["type"] == "image/jpeg")
		// || ($_FILES["file"]["type"] == "image/png")
		// || ($_FILES["file"]["type"] == "image/pjpeg"))
		// && ($_FILES["file"]["size"] < 200000000)
		// && in_array($extension, $allowedExts))
		//   {
		//   if ($_FILES["file"]["error"] > 0)
		//     {
		//     echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
		//     }
		//   else
		//     {
		//     echo "Upload: " . $_FILES["file"]["name"] . "<br>";
		//     echo "Type: " . $_FILES["file"]["type"] . "<br>";
		//     echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		//     echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

		//     if (file_exists("upload/" . $_FILES["file"]["name"]))
		//       {
		//       echo $_FILES["file"]["name"] . " already exists. ";
		//       }
		//     else
		//       {
		//       move_uploaded_file($_FILES["file"]["tmp_name"],
		//       "upload/" . $_FILES["file"]["name"]);
		//       echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
		//       }
		//     }
		//   }
		// else
		//   {
		//   echo "Invalid file";
  // }
		var_dump($_FILES);
		Input::upload('file', '/img/', $_FILES['file']['name']);
		echo realpath('/');

	}
}

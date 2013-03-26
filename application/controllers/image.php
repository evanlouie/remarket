<?php

class Image_Controller extends Base_Controller {

	public function action_index()
	{
		echo "Image Page";
	}

	public function action_id($id)
	{
		$image = Image::find($id);
		if($image)
		{
			var_dump($image);
			var_dump($image->listings());
		}
	}
	public function action_add()
	{
		if(Input::has('listing_id'))
		{
			$image = new Image;
			$image->description = Input::get('description');
			// $image->description = "";
			$image->listing_id = Input::get('listing_id');
			$image->save();
			return true;
		}
		else
		{
			echo "description or listing_id not set";
			return false;
		}
	}
	public function action_remove()
	{
		if (Input::has('image_id') && Input::has('listing_id') && Session::has('id'))
		{
			$account = Account::find(Session::get('id'));
			$image = Image::find(Input::get('image_id'));
			$listing = Listing::find(Input::get('listing_id'));
			$location = Location::find($listing->location_id);
			$owner = Account::find($location->account_id);
			if ($account && $image && $listing && $location && $owner)
			{
				if ($account->id == $owner->id) 
				{
					$image->delete();
				}
				else
				{
					die('logged in user does not match image owner');
				}
			}
			else
			{
				die('class unable to instantiat, wrong id somehwere');
			}
		}
		else
		{
			die('missing input');
		}
	}

	public function action_upload($id) 
	{
		if (Session::has('id') && Auth::check())
		{
			$account = Account::find(Session::get('id'));
			$listing = Listing::find($id);

			$sizes = array( 
			    array(200 , 200 , 'crop', 'public/images/thumbs/200/', 90 ), 
			    array(300 , 300 , 'crop', 'public/images/thumbs/300/', 90 ), 
			);
			if (!is_dir("public/img/listingImages/$id")) {
	    		mkdir("public/img/listingImages/$id");
			}
			
		    $success = Multup::open('file', 'image|max:30000|mimes:jpg,gif,png', "public/img/$id/")
	        ->filename_callback(function( $filename ){ 
	                /* prepend lolcat to our image */
	                // return 'lolcat_'.basename($filename); 
	                return basename($filename); 

	            }
	        )
	        ->upload();


	    	die(json_encode( $success ));
		}

	}
	public function action_delete()
	{
		if (Session::has('id') && Auth::check() && Input::has('file') && Input::has('listing_id'))
		{
			$account = Account::find(Session::get('id'));
			$listing = Listing::find(Input::get('listing_id'));
			$location = Location::find($listing->location_id);
			if($account->id == $location->account_id)
			{
				unlink(Input::get('file'));
			}
			else
			{
				die("Image does not belogn to user");
			}
		}

	}

}

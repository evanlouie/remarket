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
		if(Input::has('description') && Input::has('listing_id'))
		{
			$image = new Image;
			$image->description = Input::get('description');
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

}

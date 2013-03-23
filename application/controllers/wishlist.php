<?php

class Wishlist_Controller extends Base_Controller {

	public function action_index()
	{
		$account;
		if (Auth::check() && Session::has('id')) 
		{
			$account = Account::find(Session::get('id'));
		}
		$tags=$account->wishlistitems()->get();
		$listings = array();
		$tempListings = array();
		foreach($tags as $tag)
		{
			$tagListings;
			$strings = explode(' ', $tag->item);
			if (sizeof($strings) == 1) 
			{
				$tagListings = Listing::where('title', 'LIKE', "%$tag->item%")
				->or_where("description", 'LIKE', "%$tag->item%")
				->get();
			}
			else
			{

				$string = array_pop($strings);
				$query = "	SELECT *
							FROM listings
							WHERE
								(title LIKE '%$string%'
								OR description LIKE '%$string%')";
				while(!empty($strings))
				{
					$string = array_pop($strings);
					$query .= " AND (title LIKE '%$string%'
								OR description LIKE '%$string%')";
				}
				$tagListings = DB::query($query);

			}
			foreach($strings as $string) {

			}
			// $tagListings = Listing::where('title', 'LIKE', "%$tag->item%")
			// ->or_where("description", 'LIKE', "%$tag->item%")
			// ->get();
			foreach($tagListings as $listing) 
			{
				$listing->location = Location::find($listing->location_id);
				$listing->category = Categorie::find($listing->category_id);
			}
			array_push($tempListings, $tagListings);	
		}
		foreach($tempListings as $key=>$tagListings)
		{
        	foreach($tagListings as $listing)
        	{
        		$listings[$listing->id] = $listing;
        	}
        }

		$view = View::make('account.wishlist.index')
			->with('title', 'My Wishlist')
			->with('tags', $tags)
			->with('listings', $listings);
		echo $view;
	}

	public function action_id($id)
	{
		if($account=Account::find($id))
		{
			$items = WishlistItem::where_account_id($account->account_id);
			foreach($items as $item) 
			{
				var_dump($item);
			}
		}
	}

	public function action_add()
	{
		if (Input::has('tags') && Session::has('id')) 
		{
			$tags = WishlistItem::where('item', '=', Input::get('tags'))->get();
			if (sizeof($tags)==0) 
			{
				$account = Account::find(Session::get('id'));
				$wishlistitem = new WishlistItem;
				$wishlistitem->item = Input::get('tags');
				$wishlistitem->account_id = $account->id;
				$wishlistitem->save();
			}
		}
		else 
		{
			die('not logged in or no package sent');
		}
	}

	public function action_delete()
	{
		if (Input::has('tag_id') && Auth::check() && Session::has('id'))
		{
			$account = Account::find(Session::get('id'));
			$wishlistitem = WishlistItem::find(Input::get('tag_id'));
			$wishlistitem->delete();
		}
	}






}

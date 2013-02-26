<?php

class Wishlist_Controller extends Base_Controller {

	public function action_index()
	{
		echo "Wishlist Page";
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


}

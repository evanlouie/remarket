<?php

class Home_Controller extends Base_Controller {

	public function action_index()
	{
		$categories = Categorie::all();
		$view = View::make('home.index')->with('title','REMARKET')->with('categories', $categories);	
		return $view;
	}
	
	public function action_terms() {
		$view = View::make('home.tou.index')->with('title', "Terms of Use");
		return $view;	
	}

}

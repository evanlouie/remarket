<?php

class Statistics_Controller extends Base_Controller {

	public function action_index()
	{
		$categories = Categorie::all();
		$view = View::make('home.index')->with('title','REMARKET')->with('categories', $categories);	
		return $view;
	}

	public function action_reply()
	{
		$view = View::make('statistics.survey')
		->with('title','Satisfaction Survey');	
		return $view;
	}

}

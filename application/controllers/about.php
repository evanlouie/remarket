<?php

class About_Controller extends Base_Controller {

	public function action_index()
	{
		$pages = Staticpage::all();
		$page = $pages[0];
		$view = View::make('about.index')
		->with('title', 'About')
		->with('pages', $pages)
		->with('page', $page);
		return $view;
	}

	public function action_view($id)
	{
		$pages = Staticpage::all();
		$page = Staticpage::find($id);
		$view = View::make('about.index')
		->with('title', 'About')
		->with('pages', $pages)
		->with('page', $page);
		return $view;
	}

	public function action_edit($id)
	{
		if(Session::has('id') )
		{
			// Check if admin
			if( Session::get('admin') == 1) {
				if( Input::has('title') && Input::has('body')) {
					// Save page
					$page = Staticpage::find($id);
					$page->title = Input::get('title');
					$page->body = Input::get('body');
					$page->save();
					// Take user to page
					$alert = '<div class="alert alert-success"><strong>Success!</strong> ' .
							"'$page->title' page updated.</div>";
					Session::put('alert', $alert);
					$pages = Staticpage::all();
					$view = View::make('about.index')
					->with('title', 'About')
					->with('pages', $pages)
					->with('page', $page);
					return $view;
				}
				else {
					// Show edit form
					$page = Staticpage::find($id);
					$view = View::make('about.edit.index')
					->with('title', 'Edit Page')
					->with('page', $page);
					return $view;
				}
			}
			else {
				// Not an admin
				$alert = '<div class="alert alert-error"><strong>Error!</strong> ' .
							'You must be an admin to create pages.</div>';
				Session::put('alert', $alert);
				$pages = Staticpage::all();
				$page = $pages[0];
				$view = View::make('about.index')
				->with('title', 'About')
				->with('pages', $pages)
				->with('page', $page);
				return $view;
			}
		}
		else
		{
			// Not logged in
			$alert = '<div class="alert alert-error"><strong>Error!</strong> ' .
						'You are not logged in.</div>';
			Session::put('alert', $alert);
			$pages = Staticpage::all();
			$page = $pages[0];
			$view = View::make('about.index')
			->with('title', 'About')
			->with('pages', $pages)
			->with('page', $page);
			return $view;
		}
	}

	public function action_create()
	{
		if( Session::has('id') )
		{
			// Check if admin
			if( Session::get('admin') == 1) {
				if( Input::has('title') && Input::has('body')) {
					// Save page
					$page = new Staticpage;
					$page->title = Input::get('title');
					$page->body = Input::get('body');
					$page->save();
					// Take user to page
					$alert = '<div class="alert alert-success"><strong>Success!</strong> ' .
							"'$page->title' page created.</div>";
					Session::put('alert', $alert);
					$pages = Staticpage::all();
					$view = View::make('about.index')
					->with('title', 'About')
					->with('pages', $pages)
					->with('page', $page);
					return $view;
				}
				else {
					// Show create form
					$view = View::make('about.create.index')
					->with('title', 'Create Page');
					return $view;
				}
			}
			else {
				// Not an admin
				$alert = '<div class="alert alert-error"><strong>Error!</strong> ' .
							'You must be an admin to create pages.</div>';
				Session::put('alert', $alert);
				$pages = Staticpage::all();
				$page = $pages[0];
				$view = View::make('about.index')
				->with('title', 'About')
				->with('pages', $pages)
				->with('page', $page);
				return $view;
			}
		}
		else
		{
			// Not logged in
			$alert = '<div class="alert alert-error"><strong>Error!</strong> ' .
						'You are not logged in.</div>';
			Session::put('alert', $alert);
			$pages = Staticpage::all();
			$page = $pages[0];
			$view = View::make('about.index')
			->with('title', 'About')
			->with('pages', $pages)
			->with('page', $page);
			return $view;
		}
	}

	public function action_delete($id)
	{
		if(Session::has('id') )
		{
			$account = Account::find(Session::get('id'));
			// Check if admin
			if( $account->admin ) {
				if ($page = Staticpage::find($id))
				{
					if( $page->id != 1 ) {
						$page->delete();
						return Redirect::to('/about');
					}
					else {
						$pages = Staticpage::all();
						$alert = '<div class="alert alert-error"><strong>Error!</strong> ' .
							'You must have at least one About page.</div>';
						Session::put('alert', $alert);
						$view = View::make('about.index')
						->with('title', 'About')
						->with('pages', $pages)
						->with('page', $page);
						return $view;
					}
				}
				else
				{
					die("Invalid Listing ID");
				}
			}
			else {
				// Not an admin
				$alert = '<div class="alert alert-error"><strong>Error!</strong> ' .
							'You must be an admin to create pages.</div>';
				Session::put('alert', $alert);
				$pages = Staticpage::all();
				$page = $pages[0];
				$view = View::make('about.index')
				->with('title', 'About')
				->with('pages', $pages)
				->with('page', $page);
				return $view;
			}
		}
		else
		{
			// Not logged in
			$alert = '<div class="alert alert-error"><strong>Error!</strong> ' .
						'You are not logged in.</div>';
			Session::put('alert', $alert);
			$pages = Staticpage::all();
			$page = $pages[0];
			$view = View::make('about.index')
			->with('title', 'About')
			->with('pages', $pages)
			->with('page', $page);
			return $view;
		}
	}
}
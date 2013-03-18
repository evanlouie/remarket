<?php

class About_Controller extends Base_Controller {

	public function action_index()
	{
		echo 'display all pages';
	}

	public function action_view($id)
	{
		echo 'view' . $id;
	}

	public function action_edit($id)
	{
		echo 'edit' . $id;
	}

	public function action_create()
	{
		$page = new Staticpage;
		$title = 'Static Page Test';
		$body = '<strong>Test</strong>';
		$page->title = $title;
		$page->body = $body;
		$page->save();
	}
}
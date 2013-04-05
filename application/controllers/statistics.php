<?php

class Statistics_Controller extends Base_Controller {

	public function action_index()
	{
		if(Auth::check())
		{
			if(Session::has('id'))
			{
				if(Session::get('admin') == 1) {
					$listings_count = Listing::count();
					$successes = 0;
					$money = 0;
					$survey_results = Surveyresult::all();
					foreach ( $survey_results as $result ) {
						$money += $result->monetary_value;
						$successes += $result->exchange_success;
					}
					$view = View::make('statistics.index')
					->with('title','Current Stats')
					->with('listings_count', $listings_count)
					->with('successes', $successes)
					->with('money', $money);	
					return $view;
				}
			}
		}
		return Redirect::to('/');
	}

	public function action_reply()
	{
		if (Input::has('material_type') && Input::has('monetary_value') && Input::has('exchange_success') ) {
			$survey = new Surveyresult;
			$survey->material_type = Input::get('material_type');
			$survey->monetary_value = Input::get('monetary_value');
			$survey->exchange_success = Input::get('exchange_success');
			$survey->save();

			$alert = '<div class="alert alert-success" style="margin-top: 45px; margin-bottom: -45px;"><strong>Success!</strong> ' .
				'Thanks for filling out the survey!</div>';
			Session::put('alert', $alert);
			return Redirect::to('/');
		}
		else {
			$view = View::make('statistics.reply.index')
			->with('title','Satisfaction Survey');	
			return $view;
		}
	}

}

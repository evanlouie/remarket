<?php

class Role_Account extends Eloquent {

	public function account()
	{
		return $this->has_one('Account');
	}

	public function role()
	{
		return $this->has_one('Role');
	}

}

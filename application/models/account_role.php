<?php

class Account_Role extends Eloquent {

	public static $timestamps = false;
	public function account()
	{
		return $this->has_one('Account');
	}

	public function role()
	{
		return $this->has_one('Role');
	}

}

<?php

class Role extends Eloquent {

	public static $timestamps = false;

	public function role_accounts()
	{
		return $this->has_many('Account_role');
	}

}

<?php

use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'User';
    protected $primaryKey = 'User_ID';
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');



    public function getAuthIdentifier() {
        return $this->getKey();
    }

    public function getAuthPassword() {
        return $this->password;
    }

    public function getRememberToken() {
        return $this->remember_token;
    }

    public function setRememberToken($value) {
    }

    public function getRememberTokenName() {
    }
}

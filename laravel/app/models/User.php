<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
	use UserTrait, RemindableTrait;

	protected $table = 'Users';
	protected $hidden = array('password', 'remember_token');

	public function getName(){
		return $this->first_name . " " . $this->last_name;
	}

	public function bookings() {
		return $this->belongsToMany('Booking', 'User_Booking', 'user_id', 'booking_id');
	}

	public function currentBookings() {
		return $this->bookings()->where('end_date', '<=', 'TIME()');
	}

	public function branch() {
		return $this->belongsTo('Branch', 'branch_id'); 
	}
}

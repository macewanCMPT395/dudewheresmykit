<?php

class Booking extends Eloquent {
	protected $table = 'Bookings';
	protected $fillable = array('destination_branch_id', 'user_ids', 'start_date', 'end_date', 'kit_id', 'status_id', 'event');

	public function kit() {
		return $this->belongsTo('Kit');
	}

	public function destination() {
		return $this->belongsTo('Branch', 'destination_branch_id');
	}

	public function users() {
		return $this->belongsToMany('User', 'User_Booking', 'booking_id','user_id');
	}

	public function status() {
		return $this->belongsTo('Status'); 
	}
}

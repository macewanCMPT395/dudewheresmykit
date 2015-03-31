<?php

class Booking extends Eloquent {
	protected $table = 'Bookings';

	public function item() {
		return $this->belongsTo('Kit');
	}   

	public function destination() {
		return $this->belongsTo('Branch', 'destination_branch_id');
	}
}

<?php

class Booking extends Eloquent {
	protected $table = 'Bookings';

	public function item() {
		return $this->belongsTo('Kit');
	}	
	
}

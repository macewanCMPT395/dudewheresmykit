<?php

class Booking extends Eloquent {
	protected $table = 'Bookings';
<<<<<<< HEAD

	public function item() {
		return $this->belongsTo('Kit');
	}	
	
=======
	protected $fillable = array('destination_branch_id', 'user_ids', 'start_date', 'end_date', 'kit_id');

	public function item() {
		return $this->belongsTo('Kit');
	}   
>>>>>>> upstream/master
}

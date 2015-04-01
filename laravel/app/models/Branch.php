<?php

class Branch extends Eloquent {
	protected $table = 'Branches';

	public function bookings() {
		return $this->hasMany('Booking','destination_branch_id');
	}

	public function activeIncomingBookings() {
		return $this->bookings()->where('end_date', '<=', 'TIME()'); 
	}

	public function activeOutgoingBookings() {
		// Ugly solution I'm sorry... I tried eager loading and failed.
		$bookings = Booking::where('end_date', '<=', 'TIME()')->get();
		$outgoing = array();
		foreach ($bookings as $booking) {
			if ($booking->kit->branch_id == $this->id) {
				array_push($outgoing, $booking);
			}
		}
		return $outgoing;
	}
}

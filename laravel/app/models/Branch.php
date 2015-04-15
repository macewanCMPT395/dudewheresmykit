<?php

class Branch extends Eloquent {
	protected $table = 'Branches';

	public function bookings() {
		return $this->hasMany('Booking','destination_branch_id');
	}

	public function activeIncomingBookings() {
		return $this->bookings()->where('end_date', '<=', 'TIME()'); 
	}

	public function activeOutgoingBookings($recent=false) {
		// Ugly solution I'm sorry... I tried eager loading and failed.
		if ($recent) {
			$withinDays = strtotime('-5 days');
			$bookings = Booking::whereRaw("start_date >= $withinDays AND start_date < DATE()")->get();
		} else {
			$bookings = Booking::where('end_date', '<=', 'TIME()')->get();
		}
		$outgoing = array();
		foreach ($bookings as $booking) {
			if ($booking->kit->branch_id == $this->id) {
				if ($booking->status_id == 3) {
					array_push($outgoing, $booking);
				}
			}
		}
		return $outgoing;
	}
}

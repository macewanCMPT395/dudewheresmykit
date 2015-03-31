<?php

class Branch extends Eloquent {
	protected $table = 'Branches';

	public function bookings() {
		return $this->hasMany('Booking','destination_branch_id');
	}
}

<?php

use Carbon\Carbon;

class Kit extends Eloquent {
	protected $table = 'Kits';

	public function items() {
		return $this->hasMany('Item');
	}

	public function type() {
		return $this->belongsTo('KitType');
	}

	public function bookings() {
		return $this->hasMany('Booking');
	}	

	// Returns bookings that have not passed yet
	public function currentBookings() {
		return $this->hasMany('Booking')->where('end_date', '<=' , 'TIME()');
	}

	public static function validate($input, $edit=false) {
		$rules = array(
			"code" => "Required",
			"branch_id" => "Required",
			"type_id" => "Required",
		);
		if (!$edit) {
			$rules["code"] = $rules["code"] . "|Unique:Kits";
		}
		$validator = Validator::make($input,$rules);

		return $validator;
	}
}

<?php

class KitType extends Eloquent {
	protected $table = 'KitTypes';

	public function kits() {
		return $this->hasMany('Kit', 'type_id');
	}

	public static function validate($input, $edit=false) {
		$rules = array(
			'name' => "Required" . ($edit ? '' : '|Unique:KitTypes')
		);

		$validator = Validator::make($input,$rules);
		return $validator;
	}	
}

<?php

class KitType extends Eloquent {
	protected $table = 'KitTypes';

	public function kits() {
		return $this->hasMany('Kit', 'type_id');
	}
}

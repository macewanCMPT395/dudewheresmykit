<?php

class Item extends Eloquent {
	protected $table = 'Items';

	public static function validate($input, $edit=false) {
		$rules = array(
			"asset_tag" => "Required|Digits:6",
			"name" => "Required"
		);

		if (!$edit) {
			$rules["asset_tag"] = $rules["asset_tag"] . "|Unique:Items";
		}
		$validator = Validator::make($input,$rules);

		return $validator;

	}
}

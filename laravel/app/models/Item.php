<?php

class Item extends Eloquent {
	public  $table = 'Items';

	public static function validate($input, $edit=false) {
		$rules = array(
			"asset_tag" => "Required",
			"name" => "Required"
		);

		if (!$edit) {
			$rules["asset_tag"] = $rules["asset_tag"] . "|Unique:Items";
		}
		$validator = Validator::make($input,$rules);

		return $validator;

	}
}

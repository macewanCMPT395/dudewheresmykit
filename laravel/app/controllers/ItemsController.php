<?php

class ItemsController extends \BaseController {
	public function create($kit_id) {
		if (Auth::user()->permission_id != 2) {
			Session::flash("message", "You must be an admin to do that!");
			return Redirect::to("kits/");
		}
		try { 
			$kit = Kit::findOrFail($kit_id);
		} catch (Exception $e) {
			Session::flash("message", "Invalid kit id"); 
			return Redirect::to("kits/"); 
		}

		$data = array(
			"title" => "Create item",
			"kit" => $kit
		);
		return View::make("items/create")->with($data);
	}

	public function store($kit_id) {
		$input = Input::all();
		if (Auth::user()->permission_id != 2) {
			Session::flash("message", "You must be an admin to do that!");
			return Redirect::to("kits/");
		}

		try {
			$kit = Kit::findOrFail($kit_id);
		} catch (Exception $e) {
			Session::flash("message", "Unable to find kits");
			return Redirect::to("/kits/");
		}

		$validator = Item::validate($input);
		if ($validator->fails()) {
			Session::flash("errors", $validator->messages()->all());
			return Redirect::back();
		}
		$item = new Item;
		foreach($input as $key => $value) {
			if ($key != '_token') {	
				$item->$key = $value;
			}
		}
		$item->kit_id = $kit_id;
		$item->save();


		Session::flash("message", "Item added");
		return Redirect::to("kits/show/$item->kit_id");

	}

	public function report($id) {
		try {
			$item = Item::findOrFail($id);
		} catch (Exception $e) {
			Session::flash("message", "Invalid item id");
			return Redirect::to("kits/");
		}

		$data = array(
			"title" => "Report item problem",
			"item" => $item
		);
		return View::make("items/report")->with($data);

	}

	public function update($id) {
		$userinput = Input::all();
		$item = Item::findOrFail($id);

		$edit = false;

		// don't run validator if just updating with notice.
		if (isset($userinput['asset_tag'])) {
			if ($userinput["asset_tag"] == $item->asset_tag) {
				$edit = true;
			}
			$validator = Item::validate($userinput, $edit);
			if ($validator->fails()) {
				Session::flash("errors", $validator->messages()->all());
				return Redirect::back();
			}
			foreach($userinput as $key => $value) {
				if ($key != "_token") {
					$item->$key = $value;
				}
			}
		} else {
			$note = $userinput["note"];
			$item->note = "$item->note | $note";
		}

		
		$item->save();
		Session::flash("message", "Updated item successfully");
		return Redirect::to("kits/show/$item->kit_id");


	}

	public function edit($id) {
		if (Auth::user()->permission_id != 2) {
			Session::flash("message", "You must be an admin to do that!");
			return Redirect::to("kits/");
		}

		try {
			$item = Item::findOrFail($id);
		} catch (Exception $e) {
			Session::flash("message", "Invalid item id");
			return Redirect::to("kits/");
		}

		$data = array(
			"title" => "Edit Item",
			"item" => $item
		);
		return View::make("items/edit")->with($data);
	}	

	public function destroy($id) {
		if (Auth::user()->permission_id != 2) {
			Session::flash("message", "You must be an admin to do that!");
			return Redirect::to("kits/");
		}
		try {
			$item = Item::findOrFail($id);
		} catch (Exception $e) {
			Session::flash("message", "Unable to find item");
			return Redirect::to("/kits/");
		}
		Item::destroy($id);
		Session::flash("message", "Item Deleted");
		return Redirect::to("kits/show/$item->kit_id");

	}

}

?>


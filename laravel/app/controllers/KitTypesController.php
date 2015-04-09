<?php

class KitTypesController extends \BaseController {

	public function __construct() {
		$this->beforeFilter(function() {
			if (Auth::user()->permission_id != 2) {
				Session::flash("errors", array("You must be an admin to do that!"));
				return Redirect::to("kits/");
			}
		});
	}

	public function create() {
		$data = array(
			'title' => 'Create New Kit Type',
			'back' => url("types/")
		);

		return View::make("types/new")->with($data);
	}	

	public function edit($id) {
		try {
			$type = KitType::findOrFail($id);
		} catch (Exception $e) {
			Session::flash("errors", array("That kit type does not exist."));
			return Redirect::to("/types/");
		}	

		$data = array(
			'type' => $type,
			'title' => "Editing Kit Type: $type->name",
			'back' => url("types/$id")
		);

		return View::make("types/edit")->with($data);
	}

	public function update($id) {
		try {
			$type = KitType::findOrFail($id);
		} catch (Exception $e) {
			Session::flash("errors", array("That kit type does not exist."));
			return Redirect::to("/types/");
		}
		
		$input = Input::all();
		$edit = $input['name'] == $type->name;	
		$validator = KitType::validate($input, $edit);
		if ($validator->fails()) {
			Session::flash("errors", $validator->messages()->all());
			return Redirect::back();
		}

		$type->name = $input['name'];
		$type->save();
	
		Session::flash('message', 'Kit type updated.');
		return Redirect::to("types/$type->id");
	}

	public function index() {
		$data = array(
			'title' => 'Kit Types',
			'types' => KitType::all(),
			'back' => url("kits/")
		);
		
		return View::make("types/index")->with($data);
	}

	public function store() {
		$input = Input::all();
		$validator = KitType::validate($input);
		if ($validator->fails()) {
			Session::flash("errors", $validator->messages()->all());
			return Redirect::back();
		}

		$type = new KitType;
		$type->name = $input['name'];
		$type->save();

		Session::flash('message', 'Kit type added.');
		return Redirect::to("types/$type->id");
	}

	public function destroy($id) {
		try {
			$type = KitType::findOrFail($id);
		} catch (Exception $e) {
			Session::flash("errors", array("That kit type does not exist."));
			return Redirect::to("/types/");
		}	

		if ($type->kits->count() > 0) {
			Session::flash("errors", array("There are kits of this type, you cannot delete this kit type."));
			return Redirect::to("types/");
		} else {
			KitType::destroy($id);
			Session::flash("message", "Kit type deleted successfully.");
			return Redirect::to("types/");
		}
	}

	public function show($id) {
		try {
			$type = KitType::findOrFail($id);
		} catch (Exception $e) {
			Session::flash("errors", array("That kit type does not exist."));
			return Redirect::to("/types/");
		}

		$data = array( 
			'title' => "Details of $type->name",
			'type' => $type,
			'back' => url("/types/")
		);
		return View::make('/types/show')->with($data);
	}	
}

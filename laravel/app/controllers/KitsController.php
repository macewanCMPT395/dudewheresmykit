<?php

class KitsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */


	public function index() {
		$kits = Kit::all();
		$data = array ( 'title' => "Kits",
						'kits' => $kits,
						'types' => KitType::all(),
						'single' => true);
		return View::make ('kits/index')->with($data);
	}

	public function type($type_id) {
		try {
			$type = KitType::findOrFail($type_id);
		} catch (Exception $e) {
			Session::flash("errors", array("Kit Type does not exist."));
			return Redirect::to("/kits");
		}
		$data = array ( 'title' => $type->name . " Kits", 
						'kits' => $type->kits,
						'types' => KitType::all(),
						'single' => true); 

		return View::make ('kits/index')->with($data);
	}

	public function create() {
		if (Auth::user()->permission_id != 2) {
			Session::flash("errors", array("You must be admin to do that!"));
			return Redirect::to("kits/");
		}	
		$kitTypes = KitType::all();
		$locations  = Branch::all(); 
		$types = array();
		$branches = array();

		foreach($kitTypes as $type) {
			$types[$type->id] = $type->name; 
		}

		foreach($locations as $branch) {
			$branches[$branch->id] = $branch->name;
		}
		
		$data = array ( 'title' => "Create Kit",
						'types' => $types,
						'branches' => $branches	);
		return View::make ('kits/new')->with($data);
	}

	public function store()	{		
		if (Auth::user()->permission_id != 2) {
			Session::flash("errors", array("You must be admin to do that!"));
			return Redirect::to("kits/");
		}	
	
		$input = Input::all();
		$validator = Kit::validate($input);
		if ($validator->fails()) {
			Session::flash("errors", $validator->messages()->all());
			return Redirect::back();
		}
		$kit = new Kit;
		foreach($input as $key => $value) {
			if ($key != '_token') {	
				$kit->$key = $value;
			}
		}
		$kit->save();
		Session::flash("message", "Created kit sucessfullly.");
		return Redirect::to("kits/show/$kit->id");
	}


	public function show($id) {
		try {
			$kit = Kit::findOrFail($id);
		} catch (Exception $e)  {
			Session::flash("errors", array("Kit $id does not exist."));
			Redirect::to("/kits/");
		}

		$data = array (
			"title" => "Kit #$kit->code Details",
			"kit" => $kit
		);

		return View::make("/kits/show")->with($data);
	}

	public function edit($id) {			
		if (Auth::user()->permission_id != 2) {
			Session::flash("errors", array("You must be admin to do that!"));
			return Redirect::to("kits/");
		}	
	
		try {
			$kit = Kit::findOrFail($id);	
		} catch (Exception $e) {
			Session::flash("errors", array("Invalid kit id."));
			Redirect::to("kits");
		}

		$locations = Branch::all();
		$kitTypes = KitType::all();

		foreach($kitTypes as $type) {
			$types[$type->id]  = $type->name; 
		}

		foreach($locations as $branch) {
			$branches[$branch->id] = $branch->name;
		}

		$data = array(
			"kit" => $kit,
			"title" => "Edit Kit #$kit->code",
			"branches" => $branches,
			"types" => $types
		);

		return View::make("kits/edit")->with($data);
	}
	 
	public function update($id) {
		
		$userinput = Input::all();
		$kit = Kit::findOrFail($id);

		$edit = false;
		
		// don't run validator if just updating with notice.
		if (isset($userinput['code'])) {
			if ($userinput["code"] == $kit->code) {
				$edit = true;
			}
			$validator = Kit::validate($userinput, $edit);
			if ($validator->fails()) {
				Session::flash("errors", $validator->messages()->all());
				return Redirect::back();
			}
			foreach($userinput as $key => $value) {
				if ($key != "_token") {
					$kit->$key = $value;
				}
			}
		} else {
			$note = $userinput['note'];
			$kit->note = $kit->note . " | $note";
		}

		
		$kit->save();
		Session::flash("message", "Updated kit successfully.");
		return Redirect::to("kits/show/$id");
	}

	public function destroy($id) {
		if (Auth::user()->permission_id != 2) {
			Session::flash("message", "You must be admin to do that!");
			return Redirect::to("kits/");
		}	
		Kit::destroy($id);
		Session::flash("message", "Kit deleted.");
		return Redirect::to("kits/");
	}

	public function report($id) {
		try {
			$kit = Kit::findOrFail($id); 		
		} catch (Exception $e) {
			Session::flash('errors', array("Kit $id does not exist."));
			return Redirect::to("/kits");
		}

		$data = array (
			'title' => "Report problem",
			'kit' => $kit
		);

		return View::make('kits/report')->with($data); 
	}
}

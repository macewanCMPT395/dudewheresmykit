<?php

class BookingsController extends \BaseController {

	public function index() {
		$data = array ( 'title' => "Create Booking" );
		return View::make ('booking')->with($data);
	}

	public function create() {
		$data = array ( 'title' => "Create Booking" );
		return View::make ('booking')->with($data);
	}

	public function store() {
		$startDate = Input::get('startDate');
		$endDate = Input::get('endDate');
		$kit = Input::get('kit');
		$users = Input::get('users');
		$event = Input::get('event');
		$users = explode (',', $users);
		array_shift($users);
		array_pop($users);
		array_push($users, Auth::User()->id);
		$destBranch = Auth::User()->branch_id;

	
		$booking = Booking::create(array(
			'destination_branch_id' => $destBranch,
			'start_date' => $startDate,
			'end_date' => $endDate,
			'kit_id' => $kit,
			'event' => $event,
			'status_id' => 3
		));

		$booking->users()->attach($users);
		
		foreach ($users as $id) {
			$user = User::find($id); 

			Mail::send('emails.bookingEmail',array('name' => $user->getName(),'date' => $booking->start_date,'event' => $booking->event), function($message) use ($user){
				$message->to($user->email)->subject('Booking Creation');
			});
		}
		return Redirect::to ('/summary');
	}

	public function show($id) {
		$data = array('title' => "Create Booking", 'kitId' => $id);
		return View::make('booking')->with($data);
	}

	public function edit($id) {
		//
	}

	public function update($id) {
		//
	}

	public function destroy($id) {
		//
	}
}

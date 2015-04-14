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
		$kitType = Input::get('kit');
		$users = Input::get('users');
		$event = Input::get('event');
		$users = explode (',', $users);
		$kitType = KitType::findOrFail($kitType);
		$edate = strtotime($endDate);
		$date = strtotime($startDate);
		$date = strtotime('-1 day', $date);
		$current = date('Y-m-d');
		$current = strtotime($current);
		array_shift($users);
		array_pop($users);
		array_push($users, Auth::User()->id);
		$destBranch = Auth::User()->branch_id;
		if(strtotime($current) <= strtotime($date)){
			foreach ($kitType->kits as $kit){
				$invalidDates = array();
				foreach ($kit->currentBookings as $booking){
					for ($i = strtotime($booking->start_date), $end = strtotime($booking->end_date);
							$i <= $end; $i = strtotime('+1 day', $i)){
						array_push($invalidDates, $i);
					}
				}
				for ($j = $date; $j > $current; $j = strtotime('-1 day', $j)){
					if(in_array($date, $invalidDates) || in_array($edate, $invalidDates) || Blackout::where('day', $j)->first()
							|| (date("N", $j) >= 6)){
						continue;
					}

					$booking = Booking::create(array(
						'destination_branch_id' => $destBranch,
						'start_date' => date('Y-m-d',$j),
						'end_date' => $endDate,
						'kit_id' => $kit->id,
						'event' => $event,
						'status_id' => 3
					));

					$booking->users()->attach($users);
					try {
						foreach ($users as $id) {
							$user = User::find($id);

							Mail::send('emails.bookingEmail',array('name' => $user->getName(),
								'date' => $booking->start_date,'event' => $booking->event),
							function($message) use ($user){
								$message->to($user->email)->subject('Booking Creation');
							});
						}
					}catch (Exception $e) {
						Session::flash('errors', array('Invalid Email; Email not sent'));
					}
					return Redirect::to ('/summary');
				}
			}
		}
		Session::flash('errors', array('Cannot create booking; Please consult booking rules.'));
		return Redirect::to ('/booking');
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
		$branch_id = "";
		if ($booking = Booking::find($id)){
			$user = Auth::user();
			$branch_id = $booking->destination_branch_id;
			if($user->permission_id == 2 || ($user->permission_id == 1 && $branch_id == $user->branch_id)  || ($user->branch_id == $branch_id)){
				$booking->destroy($id);
				return Redirect::to("/summary/$branch_id");
			}
			$hit = false;
			foreach ($booking->users->all() as $positive) {
				if ($positive->id == $user->id) {
					$hit = true;
					break;
				}
			}
			if($hit) $booking->destroy($id);
			else Session::flash('errors', array('You do not have permission to delete this booking.'));
		}else{
			Session::flash('errors', array('Unable to delete booking. Please contact system administrator.'));
		}
		$branch_id = "/$branch_id";
		return Redirect::to("/summary$branch_id");
	}
}

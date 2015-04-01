<?php

class TransferController extends \BaseController {

	public function shipDate($booking) {
		$date = $booking->start_date;
		$date = strtotime($date);
		$date = strtotime('-1 day', $date);

		// While date is either a stat holiday OR a weekend, move back one day.
		while (Blackout::where('day',$date)->first() || date("N", $date) >= 6) {
			$date = strtotime('-1 day', $date);
		}	
		return date('l, M d, Y',$date);
	}
	
	public function index() {
		$branch = Auth::user()->branch;
		$out = $branch->activeOutgoingBookings();
		$in = $branch->activeIncomingBookings;

		foreach ($out as $booking) {
			$booking->ship_date = $this->shipDate($booking); 
		}	
		$data = array (
			'title' => 'Transfers',
			'in' => $in,
			'out' => $out
		);
	
		return View::make('transfer')->with($data); 
	}

	public function ship($id) {
		try {
			$booking = Booking::findOrFail($id);
		} catch (Exception $e) {
			Session::flash('message', "Invalid booking id");
			return redirect_to("/transfers");
		}	

		$booking->status_id = 1;
	   	$booking->shipped = Carbon/Carbon::now();
		$booking->save();

		Session::flash('message', 'Kit marked as shipped');
		return Redirect::to("transfers");
	}

	public function receive($id) {
		try {
			$booking = Booking::findOrFail($id);
		} catch (Exception $e) {
			Session::flash('message', "Invalid booking id");
			return redirect_to("/transfers");
		}	

		$booking->status_id = 2;
		$booking->save();

		Session::flash('message', 'Kit marked as received');
		return Redirect::to("transfers");
	}

}

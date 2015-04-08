<?php

class HomeController extends BaseController {

	public function home() {
		$newKitTypes = KitType::orderBy('created_at', 'desc')->take(2)->get();
		$branch = Auth::user()->branch;
		$incomingBookings = Booking::whereRaw("status_id = 1 AND destination_branch_id = " . $branch->id)->get();
		$outgoingBookings = $branch->activeOutgoingBookings(true);
		$data = array(
			'newKitTypes' => $newKitTypes,
			'title' => 'Home',
			'incomingBookings' => $incomingBookings,
			'outgoingBookings' => $outgoingBookings
		);

		return View::make('home')->with($data);
	}
}

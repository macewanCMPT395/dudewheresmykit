<?php

class SummaryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$user = Auth::user();
		$results = $user->currentBookings;
		$data = array (
			'title' => "Summary",
			'results' => $results
		);
		return View::make('summary/mybookings')->with($data);
	}

	public function branchBookings() {
		$results = Booking::join('Kits', 'Kits.id', '=', 'Bookings.kit_id')
			->whereRaw('start_date >= DATE()', array())
			->get();
		$data = array (
			'title' => "Summary",
			'single' => true,
			'results' => $results
		);
		return View::make('summary/branchbookings')->with($data);
	}
}

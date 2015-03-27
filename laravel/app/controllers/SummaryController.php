<?php

class SummaryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function myBookings() {
		$id = Auth::user()->id;

		$results = Booking::join('Kits', 'Kits.id', '=', 'Bookings.id')
			->whereRaw('user_ids = '.$id.' AND start_date >= DATE()', array())
			->get();
		$data = array (
			'title' => "Summary",
			'single' => true,
			'results' => $results
		);
		return View::make('summary/mybookings')->with($data);
	}

	public function branchBookings() {
		$results = Booking::join('Kits', 'Kits.id', '=', 'Bookings.id')
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

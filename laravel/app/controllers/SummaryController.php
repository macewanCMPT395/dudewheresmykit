<?php

class SummaryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$id = Auth::user()->id;
		$results = Booking::join('Kits', 'Kits.id', '=', 'Bookings.id')
			->whereRaw('user_ids = '.$id.' AND start_date >= DATE()', array())
			->get();
		$data = array (
			'title' => "Summary",
			'results' => $results
		);
		return View::make('summary')->with($data);
	}
}

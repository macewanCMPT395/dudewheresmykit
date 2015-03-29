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
		return View::make('summary')->with($data);
	}
}

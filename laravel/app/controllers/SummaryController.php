<?php

class SummaryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$branches = DB::table('Branches')
			->select('id', 'name', 'code')
			->orderBy('name', 'asc')->get();
		$filter_value = Input::get('branch');
		if($filter_value != 'mybookings' && $filter_value != '') {
			$data = array (
				'title' => "Bookings",
				'bookings' => Booking::whereRaw('start_date >= date() AND destination_branch_id = '.$filter_value)->get(),
				'branches' => $branches,
				'curBranch' => $filter_value
			);
			return View::make('summary')->with($data);
		}else{
			$data = array (
				'title' => "Bookings",
				'bookings' => Booking::whereHas('users', function($q) {
						$q->where('user_id', '=', Auth::user()->id);
					})
						->whereRaw('start_date >= date()')->get(),
							'branches' => $branches,
							'curBranch' => $filter_value
			);
			return View::make('summary')->with($data);
		}
	}
}

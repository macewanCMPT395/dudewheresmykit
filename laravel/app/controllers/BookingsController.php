<?php

class BookingsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
     */


	public function index()
    {
        $data = array ( 'title' => "Create Booking" );
		return View::make ('booking')->with($data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $data = array ( 'title' => "Create Booking" );
        return View::make ('booking')->with($data);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {

        $startDate = Input::get('start_date');
        $endDate = Input::get('end_date');
        $kit = Input::get('kit_id');
        $users = Input::get('users');
        $users = explode (',', $users);
        array_shift($users);
        array_pop($users);
        array_push($users, Auth::User()->id);
        $destBranch = Auth::User()->branch_id;
        
        Booking::create(array(
            'destination_branch_id' => $destBranch,
		    'user_ids' => serialize($users),
            'start_date' => $startDate,
            'end_date' => $endDate,
		    'kit_id' => $kit,
	));
    
    
        $email = "david.brookwell@shaw.ca";
        $mail =  explode( ',' , $email );
        
         
        Mail::send('emails.bookingEmail',[],function($message) use ($mail){
            
            foreach ($mail as $recipient){

                $message->to($recipient, 'Jdoe')->subject('Booking Creation');
            }

        });
        return Redirect::to ('/summary');     
    }
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}

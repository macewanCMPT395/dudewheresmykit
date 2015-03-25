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
	public function store()
    {
        $email = "david.brookwell@shaw.ca";
        $mail =  explode( ',' , $email );
        
         
        Mail::send('emails.bookingEmail',[],function($message) use ($mail){
            
            foreach ($mail as $recipient){

                $message->to($recipient, 'Jdoe')->subject('Booking Creation');
            }

        });
	       
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

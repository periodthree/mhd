<?php

class ContactController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        return View::make('contacts/index');

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

        $rules = array(
            'first_name'                => 'required',
            'last_name'                 => 'required',
            'email'                     => 'required|email',

        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('contact')
                ->withErrors($validator)
                ->withInput(Input::all());

        } else {

		//
        //Mail
        Mail::send('emails.thankyoucontact', array('first_name' => Input::get('first_name')), function($message)
        {

            $username = Input::get('first_name')." ".Input::get('last_name');

            $message->from('info@mcclureair.com', 'McClure Air');
            $message->to(Input::get('email'), $username)->subject( Input::get('first_name') .', Thank You for Contacting Us.');


        });

        Mail::send('emails.admincontact', array( 'email' => Input::get('email'), 'first_name' => Input::get('first_name'), 'last_name' => Input::get('last_name'), 'comments' => Input::get('comments')), function($message)
        {

            $username = Input::get('first_name')." ".Input::get('last_name');

            $message->from('info@mcclureair.com', 'McClure Air');

            //Send to Admin
            $message->to('info@mcclureair.com', 'Admin')->subject( 'Contact Form Submission from ' .Input::get('first_name'). ' ' .Input::get('last_name'));
        });

        Session::flash('message', 'Thank You for Contacting Us!');

        return Redirect::action('ContactController@index');

       }

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

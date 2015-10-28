<?php

class UserController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //return View::make('admin.user.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        //Installers
         // $installers = Installer::orderBy('business_name','ASC')->get()->toArray();
        $installers = array('' => 'Select an Installer') + Installer::orderBy('business_name','ASC')->lists('business_name', 'id');

        return View::make('register.create')
            ->with('installers',$installers);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {

        $units = $_POST['unit'];
        $i = 1;
        foreach($units as $unit) {

            $units_array['unit_'.$i] = $unit;
            $i++;
        }
        Input::merge($units_array);
        $numunits = array('numunits'=>sizeof($units_array));
        Input::merge($numunits);

        // echo "<pre>";
        // print_r(Input::all());
        // echo "</pre>";
        // exit;

        $rules = array(
            'first_name'                => 'required',
            'last_name'                 => 'required',
            'email'                     => 'required|email',
            'unit_1'                    => 'required|digits:10|numeric',
            'unit_2'                    => 'digits:10|numeric',
            'unit_3'                    => 'digits:10|numeric',
            'unit_4'                    => 'digits:10|numeric',
            'unit_5'                    => 'digits:10|numeric',
            'unit_6'                    => 'digits:10|numeric',
            'unit_7'                    => 'digits:10|numeric',
            'unit_8'                    => 'digits:10|numeric',
            'unit_9'                    => 'digits:10|numeric',
            'unit_10'                   => 'digits:10|numeric',

            'address'                   => 'required',
            'city'                      => 'required',
            'state'                     => 'required',
            'zip'                       => 'required'

        );

        $messages = array(
            'unit_1.required' => 'You must enter at least one serial number.',
            'unit_1.digits' => 'Your serial number must be 10 digits.',
            'unit_1.exists' => 'That serial number doesn\'t exist in our database.'
        );

        $validator = Validator::make(Input::all(), $rules, $messages);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('register')
                ->withErrors($validator)
                ->withInput(Input::all());

        } else {

            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            // exit;

            // store
            $user = new User;
            $user->first_name       = Input::get('first_name');
            $user->last_name        = Input::get('last_name');
            $user->address          = Input::get('address');
            $user->address_2        = Input::get('address_2');
            $user->city             = Input::get('city');
            $user->state            = Input::get('state');
            $user->zip              = Input::get('zip');
            $user->country          = Input::get('country');
            $user->phone            = Input::get('phone');
            $user->email            = Input::get('email');
            $user->comments         = Input::get('comments');
            $user->installer_id            = Input::get('installer_id');
            //$user->password         = Hash::make('test');
            $user->save();


            $units = $_POST['unit'];

            foreach($units as $unit) {

                if($unit) {

                    $serial = new Serial;
                    // $serials = $serial->where('serial','=',$unit)->first();
                    $serial->serial = $unit;
                    $serial->save();

                    $serialid = $serial->id ;


                    $user->serials()->attach($user->id,array('serial_id' => $serialid ));


                }

            }

            // //Find Serial Outdoor
            // $serial_input = Input::get('serial_outdoor');

            // $serial = new Serial;
            // $serials = $serial->where('serial','=',$serial_input)->first();
            // if($serials) {
            //     $user->serials()->attach($user->id,array('serial_id' => $serials->id ));
            // }

            // $serial_indoor_coil = Input::get('serial_indoor_coil');

            // if($serial_indoor_coil) {

            //     $serial_2 = new Serial;
            //     $serials_2 = $serial_2->where('serial','=',$serial_indoor_coil)->first();
            //     if($serials_2) {
            //         $user->serials()->attach($user->id,array('serial_id' => $serials_2->id ));
            //     }

            // }


            // $serial_indoor_furnace = Input::get('serial_indoor_furnace');

            // if($serial_indoor_furnace) {

            //     $serial_3 = new Serial;
            //     $serials_3 = $serial_3->where('serial','=',$serial_indoor_coil)->first();
            //     if($serials_2) {
            //         $user->serials()->attach($user->id,array('serial_id' => $serials_3->id ));
            //     }

            // }




            //Review

            // $rating = new Rating();
            // $rating->user_id                = $user->id;
            // $rating->timeliness_rating      = Input::get('timeliness_rating');
            // $rating->cleanliness_rating     = Input::get('cleanliness_rating');
            // $rating->courteous_rating       = Input::get('courteous_rating');
            // $rating->answer_rating          = Input::get('answer_rating');
            // $rating->recommend              = Input::get('recommend');
            // $rating->review                 = Input::get('review');

            // if( !$rating->save() ) {
            //     echo "Whoops";
            //     exit;
            // }

            $data = Input::all();
            //Mail
            Mail::send('emails.thankyouregister', $data, function($message)
            {

                $username = Input::get('first_name')." ".Input::get('last_name');

                $message->from(Config::get('site.mail_from'), Config::get('site.mail_from_name') );
                $message->to(Input::get('email'), $username)->subject( Input::get('first_name') .', Thank You for Registering your Product!');
            });

            Mail::send('emails.adminregister', $data, function($message)
            {

                // $username = Input::get('first_name')." ".Input::get('last_name');

                $message->from(Config::get('site.mail_from'), Config::get('site.mail_from_name') );
                $message->to(Config::get('site.mail_from'), Config::get('site.mail_from_name') )->subject( 'New Registration: ' .Input::get('email'));
            });


            // redirect
            Session::flash('message', 'Successfully registered!');
            Session::put('user_id', $user->id);
            Session::put('units', $units);
            return Redirect::action('UserController@confirm');
            //return Redirect::route('register.confirm')->with('user', $user->id);

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
        // return View::make('register.confirm');
        return View::make('register.confirm');
    }

    public function confirm()
    {



        $id = Session::get('user_id');

        $user = User::find($id);

        $units = Session::get('units');

        // print_r($units);

        if($id && $user) {

            // foreach($user->serials as $serial) {
            //     if(in_array($serial->serial, $units)) {
            //         $serials[] = $serial->model_id;
            //     }
            // }

            //$products = Products::whereIn('model_id', $serials )->get();

            return View::make('register.confirm')
                ->with('user', $user);
                // ->with('products',$products);



        } else {

            return Redirect::to('/');

        }
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

    public function showPassword() {
        return View::make('pages.password');
    }

    public function resetPassword() {

        $rules = array(
            'username'    => 'required|exists:users',
        );

        $messages = array(
            'username.required' => 'You must enter your username.',
            'username.exists' => 'We couldn\'t find that username.',
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules, $messages);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('password')
                ->withErrors($validator)
                ->withInput(Input::all()); // send back all errors to the login form

        } else {

            $password = str_random(12);

            $user = User::where('username', '=', Input::get('username'))->firstOrFail();

            $user->password         = Hash::make($password);
            $user->save();

            //Hash::make('secret');

            // // create our user data for the authentication
            // $userdata = array(
            //     'email'         => Input::get('email'),
            //     'password'      => Input::get('password'),
            //     'active'        => 1,
            //     'admin_level'   => 'Administrator'

            // );

            // // attempt to do the login
            // if (Auth::attempt($userdata)) {


            //     Session::put('user', $userdata);
            //     return Redirect::to('admin');

            // } else {

            //     // validation not successful, send back to form
            //     return Redirect::to('login')->with('message', 'Login Failed');

            // }

            $data = array(
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'username'=>$user->username,
                'password' => $password
                );

            Mail::send('emails.password', $data, function($message) use ($data)
            {

                $emailname = $data['first_name']." ".$data['last_name'];

                $message->from( Config::get('site.mail_from'), Config::get('site.mail_from_name' ) );
                $message->to($data['email'], $emailname)->subject( 'Your Password was Reset.');
            });

            return Redirect::to('password')->with('message', 'Check your email for a new password.');

        }

        //return View::make('pages.password');
    }

    public function showLogin() {
        return View::make('pages.login');
    }

    public function doLogin() {

        $rules = array(
            'username'    => 'required', // make sure the email is an actual email
            'password' => 'required|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
            $userdata = array(
                'username'      => Input::get('username'),
                'password'      => Input::get('password'),
                'active'        => 1,
                'admin_level'   => 'Administrator'

            );

            // attempt to do the login
            if (Auth::attempt($userdata)) {


                Session::put('user', $userdata);
                return Redirect::to('admin');

            } else {

                // validation not successful, send back to form
                return Redirect::to('login')->with('message', 'Login Failed');

            }

        }

    }

    public function doLogout()
    {
        Auth::logout(); // log the user out of our application
        return Redirect::to('login'); // redirect the user to the login screen
    }

}

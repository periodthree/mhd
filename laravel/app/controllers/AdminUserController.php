<?php

class AdminUserController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    var $pagesize = 5;

    public function index()
    {

        $users = User::where('admin_level','=','Administrator')->orderBy('last_name', 'ASC')->get();

        return View::make('admin.user.index')
            ->with('users', $users);
    }

    public function showRegistrations()
    {

        $users = User::where('admin_level','=','')->orderBy('created_at', 'DESC')->paginate(20);


        return View::make('admin.user.registrations')
            ->with('users', $users);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return View::make('admin.user.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {

        $rules = array(
            'username'         => 'required|unique:users|max:25|alpha_dash',
            'first_name'       => 'required',
            'last_name'        => 'required',
            'email'            => 'required|email',
            'password'         => 'required|min:3',
            'admin_level'      => 'required'


        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/users/create')
                ->withErrors($validator)
                ->withInput(Input::all());

        } else {
            // store
            $user = new User;
            $user->first_name       = Input::get('first_name');
            $user->last_name        = Input::get('last_name');
            $user->email            = Input::get('email');
            $user->username         = Input::get('username');
            $user->admin_level         = Input::get('admin_level');
            $user->password         = Hash::make(Input::get('password'));
            $user->active           = 1;
            $user->save();

            // redirect
            Session::flash('message', 'Successfully registered!');
            return Redirect::action('AdminUserController@index',array('user' => $user->id));

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
         $user = User::find($id);

         $serials = $user->serials()->get();

        // foreach($serials as $serial) {
        //     echo $serial->serial;
        // }

         return View::make('admin.user.view')
            ->with('user', $user)
            ->with('serials', $serials);
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

        $user = User::find($id);



         return View::make('admin.user.edit')
            ->with('user', $user);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id='')
    {


        $rules = array(
            'username'         => 'required|unique:users,id,'.Input::get('id').'|max:25|alpha_dash',
            'first_name'       => 'required',
            'last_name'        => 'required',
            'email'            => 'required|email'

        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/users/' .Input::get('id') .'/edit')
                ->withErrors($validator)
                ->withInput(Input::all());

        } else {
            // store

            $user = User::find(Input::get('id'));
            $user->first_name       = Input::get('first_name');
            $user->last_name        = Input::get('last_name');
            $user->email            = Input::get('email');
            $user->admin_level      = Input::get('admin_level');
            $user->username         = Input::get('username');
            $user->password         = Hash::make(Input::get('password'));
            $user->save();

            // redirect
            Session::flash('message', 'Successfully Saved!');
            return Redirect::action('AdminUserController@index',array('user' => $user->id));

        }

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
         if($this->isAdminRequest()) {


            $user = User::find($id);
            $user->delete();

            return Redirect::back()->with('message', 'Successfully deleted!');
        }
    }

}

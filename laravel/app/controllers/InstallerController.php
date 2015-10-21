<?php

class InstallerController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//

        $view = ($this->isAdminRequest()) ? 'admin.installers.index' : 'installers.index';


        if(!is_null(Input::get("zip"))) {

            $rules = array(
                'zip'            => 'required|digits:5',
            );
            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                return Redirect::to('/')
                    ->withErrors($validator);

            } else {

                $installers = Installer::where('zipcodes_served','LIKE','%'.Input::get("zip").'%')->orderBy('business_name','ASC')->get();

            }

        } else {
            $installers = Installer::orderBy('business_name','ASC')->get();
        }





        return View::make($view)
            ->with('installers',$installers);


    }


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

        if($this->isAdminRequest()) {

            $services = InstallerService::all();

            return View::make('admin.installers.create')
            ->with('services',$services);
        }

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

        if($this->isAdminRequest()) {

    		$rules = array(
                'account_number'            => 'required|unique:installers',
                'business_name'             => 'required|unique:installers',
                //'first_name'                => 'required',
                //'last_name'                 => 'required',
                'email'                     => 'email',
                'address'                   => 'required',
                'city'                      => 'required',
                'state'                     => 'required',
                'zip'                       => 'required',
                'website'                   => 'url'
            );
            $validator = Validator::make(Input::all(), $rules);

            $post = Input::all();


            // process the login
            if ($validator->fails()) {
                return Redirect::to('admin/installers/create')
                    ->withErrors($validator)
                    ->withInput(Input::all());

            } else {
                // store
                $installer = new Installer;
                $installer->business_name         = Input::get('business_name');
                $installer->first_name            = Input::get('first_name');
                $installer->last_name             = Input::get('last_name');
                $installer->email                 = Input::get('email');
                $installer->address               = Input::get('address');
                $installer->address_2             = Input::get('address_2');
                $installer->city                  = Input::get('city');
                $installer->state                 = Input::get('state');
                $installer->zip                   = Input::get('zip');
                $installer->phone                 = Input::get('phone');
                $installer->alt_phone             = Input::get('alt_phone');
                $installer->schedule_phone        = Input::get('schedule_phone');
                $installer->territory             = Input::get('territory');
                $installer->alt_phone             = Input::get('alt_phone');
                $installer->zipcodes_served       = Input::get('zipcodes_served');
                $installer->country               = Input::get('country');
                $installer->account_number        = Input::get('account_number');
                $installer->website               = Input::get('website');

                $installer->save();

                $services = Input::get('services');

                if(sizeof($services) > 0) {

                    foreach(Input::get('services') as $service) {

                        $installer->services()->attach($installer->id,array('service_id' => $service));

                    }

                }

                // redirect
                Session::flash('message', 'Successfully added ' .Input::get('business_name'));

                return Redirect::to('admin/installers');
                //return Redirect::route('register.confirm')->with('user', $user->id);

            }

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

        if($this->isAdminRequest()) {

            $services = InstallerService::all();


            $installer = Installer::find($id);

            $related_services = $installer->services()->lists('service_id');


            return View::make('admin.installers.edit')
            ->with('installer',$installer)
            ->with('services',$services)
            ->with('related_services',$related_services);

        }
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

        if($this->isAdminRequest()) {


            $rules = array(
                'account_number'            => 'required',
                'business_name'             => 'required',
                //'first_name'                => 'required',
                //'last_name'                 => 'required',
                'email'                     => 'email',
                'address'                   => 'required',
                'city'                      => 'required',
                'state'                     => 'required',
                'zip'                       => 'required',
                'website'                   => 'url'
            );
            $validator = Validator::make(Input::all(), $rules);

            // process the login
            if ($validator->fails()) {
                return Redirect::to('admin/installers/' .$id .'/edit')
                    ->withErrors($validator)
                    ->withInput(Input::all());

            } else {
                // store
                $installer = Installer::find($id);
                $installer->business_name         = Input::get('business_name');
                $installer->first_name            = Input::get('first_name');
                $installer->last_name             = Input::get('last_name');
                $installer->email                 = Input::get('email');
                $installer->address               = Input::get('address');
                $installer->address_2             = Input::get('address_2');
                $installer->city                  = Input::get('city');
                $installer->state                 = Input::get('state');
                $installer->zip                   = Input::get('zip');
                $installer->phone                 = Input::get('phone');
                $installer->alt_phone             = Input::get('alt_phone');
                $installer->schedule_phone        = Input::get('schedule_phone');
                $installer->territory             = Input::get('territory');
                $installer->zipcodes_served       = Input::get('zipcodes_served');
                $installer->country               = Input::get('country');
                $installer->account_number        = Input::get('account_number');
                $installer->website               = Input::get('website');

                $installer->save();

                $services = Input::get('services');

                Installer::find($id)->services()->detach();

                if(sizeof($services) > 0) {

                    foreach(Input::get('services') as $service) {

                        $installer->services()->attach($installer->id,array('service_id' => $service));

                    }

                }

                // redirect
                Session::flash('message', 'Successfully updated ' .Input::get('business_name'));

                return Redirect::to('admin/installers');
                //return Redirect::route('register.confirm')->with('user', $user->id);

            }

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
            // delete
            $installer = Installer::find($id);
            $installer->delete();

            // redirect
            Session::flash('message', 'Successfully deleted the Installer!');
            return Redirect::to('admin/installers');
        }
	}


}

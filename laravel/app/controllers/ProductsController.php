<?php

class ProductsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		////Get All Product Categories
        //$productcategories = ProductCategory::where('parent_category','=',0)->get();
        //$users = User::where('votes', '>', 100)->take(10)->get();


	}

    //

    public function models($id)
    {
        if($this->isAdminRequest()) {

        //
        $productcategory = ProductCategory::find($id);
        $models = Products::where('product_category_id','=',$id)->get();

        return View::make('admin.products.models')
            ->with('productcategory',$productcategory)
            ->with('models',$models);

        }

    }

    public function addmodels($id)
    {
        if($this->isAdminRequest()) {

            //$id = $_POST['id'];

            // print_r($_POST);

            $rules = array(
                'models'             => 'required'
            );


            $validator = Validator::make(Input::all(), $rules);

            // process the login
            if ($validator->fails()) {
                return Redirect::to('admin/products/' .$id .'/models')
                    ->withErrors($validator)
                    ->with('productcategory',ProductCategory::find($id))
                    ->with('models',Products::where('product_category_id','=',$id)->get())
                    ->withInput(Input::all());

            } else {

                $models = Input::get('models');

                $models_arr = explode(",",$models);

                foreach($models_arr as $model) {

                    $product_model = new Products;
                    $product_model->model_id  = $model;
                    $product_model->product_category_id  = $id;
                    $product_model->save();

                }

                // // redirect
                Session::flash('message', 'Successfully added models.');

                return Redirect::to('admin/products/' .$id .'/models');


            }

            //$import = importmodels('boo');

        //
        // $productcategory = ProductCategory::find($id);
        // $models = Products::where('product_category_id','=',$id)->get();

        // return View::make('admin.products.models')
        //     ->with('productcategory',$productcategory)
        //     ->with('models',$models);

        // }
        }

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
		//
	}



	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

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
	public function deletemodel($id)
	{
		//
        if($this->isAdminRequest()) {


            $product_category_id = Input::get('product_category_id');


            $product = Products::find($id);
            $product->delete();

            Session::flash('message', 'Successfully deleted model.');

            return Redirect::to('admin/products/' .$product_category_id .'/models');
        }

	}


}

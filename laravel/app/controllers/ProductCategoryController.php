<?php

class ProductCategoryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id='')
	{



        if($this->isAdminRequest()) {


            if(is_null($id)) {

                //Get All Product Categories
                $productcategories = ProductCategory::where('parent_category','=',0)->get();

                return View::make('admin.products.index')
                    ->with('productcategories', $productcategories);

            } else {

                $parentcategory = ProductCategory::find($id);

                //Get Sub Categories
                $productcategories = ProductCategory::where('parent_category','=',$id)->get();

                return View::make('admin.products.index')
                    ->with('productcategories', $productcategories)
                    ->with('parentcategory', $parentcategory);


            }



        } else {


    		//Get All Product Categories
            $productcategories = ProductCategory
                ::where('parent_category','=',0)
                ->where('product_active','=',1)
                ->get();



            return View::make('productcategory.index')
                ->with('productsnav', $this->productsNav())
                ->with('productcategory', $productcategories);

        }

	}

    public function models()
    {
        //
    }

    public function getParents($id='') {

        if($this->isAdminRequest()) {

            if($id) {
                $parents = array('' => 'Select a Parent (if applicable)') + ProductCategory::where('parent_category','=',0)->lists('title', 'id');
            } else {
                $parents = array('' => 'Select a Parent (if applicable)') + ProductCategory::where('parent_category','=',0)->where('id','!=',$id)->lists('title', 'id');
            }


            return $parents;

        }

    }


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

        if($this->isAdminRequest()) {

            $parents = $this->getParents();

            return View::make('admin.products.create')
                ->with('productcategories',$parents);

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
                'title'             => 'required'
            );


            $validator = Validator::make(Input::all(), $rules);

            // process the login
            if ($validator->fails()) {
                return Redirect::to('admin/products/create')
                    ->withErrors($validator)
                    ->with('productcategories',$this->getParents())
                    ->withInput(Input::all());

            } else {


                $productcategory = new ProductCategory;
                $productcategory->title                     = Input::get('title');
                $productcategory->short_description         = Input::get('short_description');
                $productcategory->long_description          = Input::get('long_description');
                $productcategory->parent_category           = Input::get('parent_category');
                $productcategory->product_active            = Input::get('product_active');
                $productcategory->product_features          = Input::get('product_features');

                $productcategory->save();

                // redirect
                Session::flash('message', 'Successfully updated ' .Input::get('title'));

                return Redirect::to('admin/products');
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
		//Get Cat
        $productcategory = ProductCategory::find($id);

        //Get SUbcats
        $subcategories = $productcategory->children()->where('product_active','=',1)->get();


        return View::make('productcategory.show')
            ->with('productsnav', $this->productsNav())
            ->with('productcategory', $productcategory)
            ->with('subcategories',$subcategories);


        //Get Subcategories

    }



    public function detail($id,$productid)
    {
        //Get Cat
        $productcategory = ProductCategory::find($id);

        //Get SUbcats
        $product = ProductCategory::find($productid);

        $image = McFile::find($product->default_image);

        $file_categories = FileCategory::lists('file_category_name', 'id');


        $files = $product->files;


        $cats = array();

        foreach($file_categories as $k => $cat) {


            foreach($files as $file) {
                if($k == $file->file_category) {

                    $tmp['file_title'] = $file->file_title;
                    $tmp['file_name'] = $file->file_name;

                    $cats[$cat][]  = $tmp;
                    $tmp = '';
                }
            }


        }



        return View::make('productcategory.detail')
            ->with('productsnav', $this->productsNav())
            ->with('productcategory', $productcategory)
            ->with('files',$cats)
            ->with('image',$image)
            ->with('product',$product);


        //Get Subcategories

    }

    public function productsNav() {

        $productsnav = ProductCategory::where('parent_category','=',0)->where('product_active','=',1)->get();

        return $productsnav;

    }

    public function showProducts($id)
    {
        //Get Parent
        $productcategory = ProductCategory::find($id);
        $products = ProductCategory::find($id)->products;

        //Get SUbcats
        $parentcategory = $productcategory->find($productcategory->parent_category);

        return View::make('products.show')
            ->with('productsnav', $this->productsNav())
            ->with('productcategory', $productcategory)
            ->with('parentcategory',$parentcategory)
            ->with('products', $products);

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



        if($this->isAdminRequest()) {

            $productcategory = ProductCategory::find($id);

            $parents = array('' => 'Select a Parent (if applicable)') + ProductCategory::where('parent_category','=',0)->where('id','!=',$id)->lists('title', 'id');



            return View::make('admin.products.edit')
                ->with('productcategory',$productcategory)
                ->with('productcategories',$parents);




        }


	}

    public function files($id)
    {

        if($this->isAdminRequest()) {

            //Get File Categories
            $filecategories = array('' => 'Choose a Category') + FileCategory::lists('file_category_name','id');

            $productcategory = ProductCategory::find($id);

            return View::make('admin.products.files')
                ->with('productcategory',$productcategory)
                ->with('filecategories',$filecategories)
                ->with('files',$productcategory->files)
                ->with('imgexts',array('jpg','png','gif'));

        }


    }



    public function addfile()
    {
        //

        // echo "<pre>";
        // print_r($_POST);
        // print_r($_FILES);
        // echo "</pre>";
        // exit;

        $id = $_POST['id'];

        if($this->isAdminRequest() && $_POST) {

            $rules = array(
                'file_category'     => 'required',
                'file_name'         => 'required|mimes:pdf,jpeg,png,gif|max:20000'
            );


            $validator = Validator::make(Input::all(), $rules);



            // process the login
            if ($validator->fails()) {
                return Redirect::to('admin/products/' .$id .'/files')
                    ->withErrors($validator)
                    ->with('productcategory',ProductCategory::find($id))
                    ->withInput(Input::flashExcept('file_name'));

            } else {

                $imgexts = array('jpg','png','gif');

                if (Input::file('file_name') && Input::file('file_name')->isValid()) {

                    $uploaded = Input::file('file_name')->getClientOriginalName();

                    $ext = Input::file('file_name')->getClientOriginalExtension();
                    $file_name = time().".".$ext;

                    //Make Alt Images
                    if(in_array($ext, $imgexts)) {

                        $image = Image::make(Input::file('file_name'));
                        $image->fit(200);
                        $image->save(Config::get('uploads.square')."/".$file_name);

                        $height = Image::make(Input::file('file_name'))->height();
                        $width = Image::make(Input::file('file_name'))->width();

                        if($height >= $width) {
                            //Vertical

                            //Small
                            $image = Image::make(Input::file('file_name'));
                            $image->resize(200, null, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                            $image->save(Config::get('uploads.small')."/".$file_name);

                            //Medium
                            $image = Image::make(Input::file('file_name'));
                            $image->resize(500, null, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                            $image->save(Config::get('uploads.medium')."/".$file_name);

                            //Large
                            $image = Image::make(Input::file('file_name'));
                            $image->resize(800, null, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                            $image->save(Config::get('uploads.large')."/".$file_name);

                        } else {
                            //Horizontal
                            $image = Image::make(Input::file('file_name'));
                            $image->resize(null, 200, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                            $image->save(Config::get('uploads.small')."/".$file_name);

                            //Medium
                            $image = Image::make(Input::file('file_name'));
                            $image->resize(null, 500, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                            $image->save(Config::get('uploads.medium')."/".$file_name);

                            //Large
                            $image = Image::make(Input::file('file_name'));
                            $image->resize(null, 800, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                            $image->save(Config::get('uploads.large')."/".$file_name);

                        }




                    }

                    Input::file('file_name')->move(Config::get('uploads.originals'), $file_name);


                }



                $file = new McFile;

                $file->file_title         = Input::get('file_title');
                $file->file_name          = $file_name;
                $file->file_category      = Input::get('file_category');
                $file->file_type          = $ext;

                $file->save();

                $productcategory = ProductCategory::find($id);

                $productcategory->files()->attach($id,array('file_id' => $file->id  ));



                // redirect
                Session::flash('message', 'Successfully updated ' .Input::get('title'));

                return Redirect::to('admin/products/'.$id.'/files');
                //return Redirect::route('register.confirm')->with('user', $user->id);

            }




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
		//
        if($this->isAdminRequest()) {


            $rules = array(
                'title'             => 'required',
                'warranty_icon'     => 'image|max:20000',
                'warranty_pdf'      => 'mimes:pdf|max:20000',
                'brochure_pdf'      => 'mimes:pdf|max:20000',
                'category_image'    => 'image|max:20000',
            );


            $validator = Validator::make(Input::all(), $rules);



            // process the login
            if ($validator->fails()) {
                return Redirect::to('admin/products/' .$id .'/edit')
                    ->withErrors($validator)
                    ->withInput(Input::flashExcept('warranty_pdf','warranty_icon','brochure_pdf','category_image'));

            } else {



                if (Input::file('warranty_icon') && Input::file('warranty_icon')->isValid()) {

                    $ext = Input::file('warranty_icon')->getClientOriginalExtension();
                    $warranty_icon_filename = $id."_icon_".time().".".$ext;

                    Input::file('warranty_icon')->move(Config::get('uploads.warranty_icon'), $warranty_icon_filename);

                }

                if (Input::file('warranty_pdf') && Input::file('warranty_pdf')->isValid()) {

                    $ext = Input::file('warranty_pdf')->getClientOriginalExtension();
                    $warranty_pdf_filename = $id."_pdf_".time().".".$ext;

                    Input::file('warranty_pdf')->move(Config::get('uploads.warranty_pdf'), $warranty_pdf_filename);

                }

                if (Input::file('brochure_pdf') && Input::file('brochure_pdf')->isValid()) {

                    $ext = Input::file('brochure_pdf')->getClientOriginalExtension();
                    $brochure_pdf_filename = $id."_b_".time().".".$ext;

                    Input::file('brochure_pdf')->move(Config::get('uploads.brochure_pdf'), $brochure_pdf_filename);

                }

                if (Input::file('category_image') && Input::file('category_image')->isValid()) {

                    $ext = Input::file('category_image')->getClientOriginalExtension();
                    $category_image_filename = $id."_b_".time().".".$ext;

                    Input::file('category_image')->move(Config::get('uploads.category_image'), $category_image_filename);

                }

                $productcategory = ProductCategory::find($id);
                $productcategory->title                     = Input::get('title');
                $productcategory->short_description         = Input::get('short_description');
                $productcategory->long_description          = Input::get('long_description');
                $productcategory->parent_category           = Input::get('parent_category');
                $productcategory->product_active            = Input::get('product_active');
                $productcategory->product_features          = Input::get('product_features');


                if(isset($warranty_icon_filename) && $warranty_icon_filename)  $productcategory->warranty_icon = $warranty_icon_filename;
                if(isset($warranty_pdf_filename) && $warranty_pdf_filename)  $productcategory->warranty_pdf = $warranty_pdf_filename;
                if(isset($brochure_pdf_filename) && $brochure_pdf_filename)  $productcategory->brochure_pdf = $brochure_pdf_filename;
                if(isset($category_image_filename) && $category_image_filename)  $productcategory->category_image = $category_image_filename;

                $productcategory->save();



                // redirect
                Session::flash('message', 'Successfully updated ' .Input::get('title'));

                return Redirect::to('admin/products');
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
            $product = ProductCategory::find($id);
            $product->delete();

            $product->products()->delete();
            $product->children()->delete();

            // redirect
            Session::flash('message', 'Successfully deleted the Product!');
            return Redirect::to('admin/products');
        }
	}

    public function findModel()
    {


         if(Request::ajax()) {

            $data = Input::all();
            $serial = $data['serial'];

            $findserial = Serial::where('serial','=',$serial)->first();

                if( is_null($findserial) ) {
                    //Not Found
                    $data = array(
                        'serial' => $serial,
                        'model' => ''
                    );
                } else {
                    $data = array(
                        'serial' => $findserial->serial,
                        'model' => $findserial->model_id
                    );
                }


            echo json_encode($data);

         }
    }


}

<?php

class FileController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
	public function deletefile($id)
	{
		//
        $paths = Config::get('uploads');

        $file = McFile::find($id);
        $product = ProductCategory::find(Input::get('product_category_id'));




        //$full = $filepath."/".$file->file_name;
        //echo $full;

        //Delete from Files Table
        $file->delete();

        //Delete from Files/Product Table
        $product->files()->where('file_id','=',$id)->delete();

        //Delete Files
        foreach($paths as $path) {
            $filepath = $path ."/".$file->file_name;
            if(File::exists($filepath)) {

                File::delete($filepath);

                // echo "Deleted: ".$filepath."<br>";
            }
        }

        Session::flash('message', 'Successfully deleted files for ' .$product->title );

        return Redirect::to('admin/products/'.Input::get('product_category_id').'/files');

	}

    public function setdefault($id,$fileid)
    {
        //


        $default = ProductCategory::find($id);

        if($default->default_image == $fileid) {
            $default->default_image = '';
        } else {
            $default->default_image = $fileid;
        }


        $default->save();

        Session::flash('message', 'Successfully set default status for ' .$default->title );

        return Redirect::to('admin/products/'.$id.'/files');

    }


}

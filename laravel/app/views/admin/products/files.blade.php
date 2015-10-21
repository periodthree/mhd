@extends('admin.layouts.admin')

@section('title') Manage Files for {{ $productcategory->title }} @stop

@section('content')


    <div class="row">


        <!-- Files -->
        <div class="col-md-9">


                        @if (Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif


                        @if($files->count()>0)



                                @foreach ($files as $key => $file)

                                    @if ( $key%3 == 0)

                                        <div class="row">

                                    @endif

                                    <div class="col-sm-6 col-md-4">

                                        <div class="@if($file->id == $productcategory->default_image) default-thumbnail @endif thumbnail">
                                            @if (in_array($file->file_type,$imgexts))

                                                <img src="{{ URL::to('/') }}/{{ Config::get('uploads.square') }}/{{ $file->file_name }}" alt="">

                                            @else
                                                <img src="{{ URL::to('/') }}/{{ Config::get('uploads.placeholder') }}/doc.svg" alt="">
                                            @endif
                                          <div class="caption">
                                            <p><strong>{{ $file->filecategory->file_category_name }}</strong></p>
                                            <h4>{{ $file->file_title ? $file->file_title : $file->file_name }}</h4>

                                            <p>
                                                {{ Form::open(array('url' => 'admin/products/deletefile/' .$file->id .'/' , 'class' => 'form-inline')) }}

                                                <a target="_blank" href="{{ URL::to('/') }}/{{ Config::get('uploads.originals') }}/{{ $file->file_name }}" class="btn btn-primary" role="button">View</a>
                                                @if($file->filecategory->file_category_name == 'Image')
                                                    <a href="{{ URL::to('/') }}/admin/products/{{ $productcategory->id }}/setdefault/{{ $file->id }}" class="btn btn-info" role="button">@if($file->id == $productcategory->default_image) Unset Default @else Set as Default @endif</a>
                                                    @endif
                                                <input type="hidden" name="product_category_id" value="{{ $productcategory->id }}">
                                                {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-delete')) }}
                                                {{ Form::close() }}
                                            </p>
                                          </div>
                                        </div>
                                    </div>

                                    @if ( ($key+1)%3 == 0)
                                            </div>
                                    @else
                                        @if( ($key+1) == $files->count() )
                                            </div>
                                        @endif
                                    @endif

                                @endforeach


                        @else

                            <p>No Files Found.</p>

                        @endif
</div>


        <!-- END Files -->


        <!-- Upload -->
        <div class="col-md-3">

            @if ($errors->has())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
        @endif

            <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Add File</h3>
        </div>

        <div class="panel-body">

            {{ Form::open(array('url' => 'admin/products/addfile', 'files' => true)) }}
            <input type="hidden" name="id" value="{{ $productcategory->id }}">

                <div class="form-group">

                        {{ Form::label('file_title', 'File Title (optional)') }}


                        {{ Form::text('file_title', Input::old('file_category'),  array('class' => 'form-control') ) }}

                </div>

                <div class="form-group">
                        <label for="file_title">File Category</label> <span class="text-danger">*</span>
                        {{ Form::select('file_category', $filecategories, Input::old('file_category'),  array('class' => 'form-control') ) }}
                        @if ($errors->has('file_category')) <p class="help-block">{{ $errors->first('file_category') }}</p> @endif
                </div>

                <div class="form-group">
                        {{ Form::label('file_name', 'File') }} <span class="text-danger">*</span>
                        {{ Form::file('file_name', null, array('class' => 'form-control')) }}
                        @if ($errors->has('file_name')) <p class="help-block">{{ $errors->first('file_name') }}</p> @endif

                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>

            {{ Form::close() }}

        </div>

    </div>

        </div>
        <!-- END Upload -->



    </div>


    <!-- Upload -->


    <!-- END Upload -->





<!--
    <div class="panel panel-default">
      <div class="panel-heading">
            <h3 class="panel-title">Warranty</h3>
        </div>

        <div class="panel-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group @if ($errors->has('warranty_icon')) has-error @endif">

                            {{ Form::label('warranty_icon', 'Warranty Icon') }}
                            {{ Form::file('warranty_icon', null, array('class' => 'form-control')) }}
                            @if ($errors->has('warranty_icon')) <p class="help-block">{{ $errors->first('warranty_icon') }}</p> @endif

                        </div>
                    </div>

                     <div class="col-md-6">
                        <div class="form-group @if ($errors->has('warranty_pdf')) has-error @endif">

                            @if ($productcategory->warranty_pdf)
                            <p>
                                Uploaded File: <a href="{{ asset( Config::get('uploads.warranty_pdf')."/".$productcategory->warranty_pdf) }}">Download Warranty PDF</a> | <a class="text-danger" href="#">Delete File</a>
                            </p>

                            @endif

                            {{ Form::label('warranty_pdf', 'Warranty PDF') }}
                            {{ Form::file('warranty_pdf', null, array('class' => 'form-control')) }}
                            @if ($errors->has('warranty_pdf')) <p class="help-block">{{ $errors->first('warranty_pdf') }}</p> @endif

                            @if ( !$errors->has('warranty_pdf') && $productcategory->warranty_pdf )



                            @endif

                        </div>
                    </div>
                </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Brochure</h3>
                    </div>

                    <div class="panel-body">

                                    <div class="form-group @if ($errors->has('brochure_pdf')) has-error @endif">

                                        {{ Form::label('brochure_pdf', 'Brochure PDF') }}
                                        {{ Form::file('brochure_pdf', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('brochure_pdf')) <p class="help-block">{{ $errors->first('brochure_pdf') }}</p> @endif

                                    </div>



                    </div>

                </div>


        </div>


            <div class="col-md-6">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Category Image</h3>
                    </div>

                    <div class="panel-body">

                                    <div class="form-group @if ($errors->has('category_image')) has-error @endif">

                                        {{ Form::label('category_image', 'Category Product Image') }}
                                        {{ Form::file('category_image', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('category_image')) <p class="help-block">{{ $errors->first('category_image') }}</p> @endif

                                    </div>



                    </div>

                </div>


        </div>
    </div>


 -->
<!--
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Submit</button>
    </div> -->






@stop
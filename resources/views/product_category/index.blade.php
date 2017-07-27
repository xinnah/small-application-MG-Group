
	@extends('layout.app')
		@section('content')
		<!-- begin #content -->
		<div id="content" class="content">
			
			<div class="row">
			    <div class="col-md-12">
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                            	<a class="btn btn-info btn-xs" href="{{URL::to('/product-category')}}">View Categories</a>
                                
                            </div>
                            <h4 class="panel-title">Product Category Page </h4>
                        </div>
                        <div class="panel-body">
                            {!! Form::open(array('route' => 'product-category.store','class'=>'form-horizontal author_form','method'=>'POST','files'=>'true', 'id'=>'commentForm','role'=>'form','data-parsley-validate novalidate')) !!}
                        	    
                            	<div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4">Category Status :</label>
                                    <div class="col-md-1 col-sm-1">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="status" value="1" id="radio-required" data-parsley-required="true" checked /> Active
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="status" id="radio-required2" value="0" /> Inactive
                                            </label>
                                        </div>
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4" for="category_name">Category Name * :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="text" id="category_name" name="category_name" placeholder="Category Name" data-parsley-required="true" />
                                    </div>
                                </div>
                                
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4"></label>
									<div class="col-md-6 col-sm-6">
										<button type="submit" class="btn btn-primary">Confirm</button>
									</div>
								</div>
                            {!! Form::close(); !!}
                        </div>
                    </div>
			    </div>
			</div>
		</div>
		<!-- end #content -->
		
    <script src="{{asset('public/plugins/jquery/jquery-1.9.1.min.js')}}"></script>        
    <script type="text/javascript">
    	$(document).ready(function() {
	        App.init();
	        FormPlugins.init();
	        //
	    });
    </script>
    @endsection

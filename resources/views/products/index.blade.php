
	@extends('layout.app')
		@section('content')
		<!-- begin #content -->
		<div id="content" class="content">
			
			<div class="row">
			    <div class="col-md-12">
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                            	<a class="btn btn-info btn-xs" href="{{URL::to('/products')}}">View All product List</a>
                                
                            </div>
                            <h4 class="panel-title">Product Page </h4>
                        </div>
                        <div class="panel-body">
                            {!! Form::open(array('route' => 'products.store','class'=>'form-horizontal author_form','method'=>'POST','files'=>'true', 'id'=>'commentForm','role'=>'form','data-parsley-validate novalidate')) !!}
                        	    
                            	
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4" for="product_name">Product Name * :</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="text" id="product_name" name="product_name" placeholder="product Name" data-parsley-required="true" />
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4" for="specification">Product Category *:</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control select" id="select-required" name="fk_category_id" data-parsley-required="true">
                                            <option value="">Please choose</option>
                                            @foreach($getCategories as $category)
                                                <option value="<?php echo $category->id; ?>"><?php echo $category->category_name; ?></option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4" for="summery">Product Details *:</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea class="form-control" id="summery" name="product_details" rows="4"  placeholder="Details"></textarea>
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
